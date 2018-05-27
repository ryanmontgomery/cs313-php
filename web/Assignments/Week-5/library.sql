DROP TABLE library.due_date;
DROP TABLE library.book;
DROP TABLE library.author;
DROP TABLE library.patron;
DROP TABLE library.librarian;
DROP SCHEMA library;

CREATE SCHEMA library;

CREATE TABLE library.librarian
(librarian_id SERIAL PRIMARY KEY,
 username VARCHAR(25) NOT NULL,
 first_name VARCHAR(100) NOT NULL,
 last_name VARCHAR(100) NOT NULL,
 password_hash VARCHAR(100) NOT NULL
);

CREATE TABLE library.patron
(patron_id SERIAL PRIMARY KEY,
 first_name VARCHAR(100) NOT NULL,
 last_name VARCHAR(100) NOT NULL,
 address1 VARCHAR(255) NOT NULL,
 address2 VARCHAR(255),
 city VARCHAR(255) NOT NULL,
 state VARCHAR(50) NOT NULL,
 zip_code VARCHAR(5) NOT NULL,
 phone VARCHAR(10) NOT NULL
);

CREATE TABLE library.author
(author_id SERIAL PRIMARY KEY,
 first_name VARCHAR(100) NOT NULL,
 last_name VARCHAR(100) NOT NULL,
 bio TEXT
);

CREATE TABLE library.book
(book_id SERIAL PRIMARY KEY,
 author_id INT NOT NULL REFERENCES library.author(author_id) ON DELETE CASCADE,
 title VARCHAR(100) NOT NULL,
 published_date DATE NOT NULL
);

CREATE TABLE library.due_date
(due_date_id SERIAL PRIMARY KEY,
 patron_id INT NOT NULL REFERENCES library.patron(patron_id) ON DELETE CASCADE,
 book_id INT NOT NULL REFERENCES library.book(book_id) ON DELETE CASCADE,
 return_by_date DATE NOT NULL,
 is_checked_out BOOL NOT NULL,
 checked_in_date DATE,
 fee_paid BOOL
);

INSERT INTO library.librarian (username, first_name, last_name, password_hash)
VALUES
('montgomr',
 'Ryan',
 'Montgomery',
 'ABC123'
);

INSERT INTO library.patron (first_name, last_name, address1, city, state, zip_code, phone)
VALUES
('Ryan',
 'Montgomery',
 '153 East 400 North',
 'Logan',
 'Utah',
 '84341',
 '4359998888'
);

INSERT INTO library.patron (first_name, last_name, address1, city, state, zip_code, phone)
VALUES
('Terry',
 'Fergusen',
 '1016 N 700 E',
 'Logan',
 'Utah',
 '84321',
 '4358889999'
);

INSERT INTO library.author (first_name, last_name, bio)
VALUES
('Brandon',
 'Sanderson',
 'In December 2007 Brandon was chosen by Harriet McDougal Rigney to complete Robert Jordan''s Wheel of Time series after his untimely passing. 2009''s The Gathering Storm and 2010''s Towers of Midnight was followed by the final volume in the series, A Memory of Light, in January 2013.'
);

INSERT INTO library.book (author_id, title, published_date)
VALUES
(1,
 'The Way of Kings',
 '2010-08-01'
);

INSERT INTO library.due_date (patron_id, book_id, return_by_date, is_checked_out)
SELECT 
 1,
 1,
 CURRENT_DATE - INTERVAL '14 day',
 TRUE;