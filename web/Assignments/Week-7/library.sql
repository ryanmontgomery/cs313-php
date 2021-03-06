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
 '$2y$10$ZgQv3Yu72srvGwmBLxG8K.vw3rQHEKoc.sDU4jBViKajcrRgMDHa2'
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

INSERT INTO library.author (first_name, last_name, bio)
VALUES
('J.K.',
 'Rowling',
 'J.K. Rowling was a struggling mother when she wrote the beginnings of Harry Potter and the Sorcerer''s stone on scraps of paper at a local cafe. But her efforts soon paid off, as she received an unprecedented award from the Scottish Arts Council enabling her to finish the book. Since then, the debut novel has become an international phenomenon, garnering rave reviews and major awards, including the British Book Awards Children''s Book of the Year, and the Smarties prize.'
);

INSERT INTO library.book (author_id, title, published_date)
VALUES
(1,
 'The Way of Kings',
 '2010-08-01'
);

INSERT INTO library.book (author_id, title, published_date)
VALUES
(1,
 'Words of Radiance',
 '2014-03-04'
);

INSERT INTO library.book (author_id, title, published_date)
VALUES
(1,
 'Oathbringer',
 '2017-11-01'
);

INSERT INTO library.book (author_id, title, published_date)
VALUES
(2,
 'Harry Potter and the Sorcerer''s Stone',
 '1999-09-01'
);

INSERT INTO library.book (author_id, title, published_date)
VALUES
(2,
 'Harry Potter and the Chamber of Secrets',
 '2000-09-01'
);

INSERT INTO library.book (author_id, title, published_date)
VALUES
(2,
 'Harry Potter and the Prisoner of Azkaban',
 '2001-09-01'
);

INSERT INTO library.book (author_id, title, published_date)
VALUES
(2,
 'Harry Potter and the Goblet of Fire',
 '2002-09-01'
);

INSERT INTO library.due_date (patron_id, book_id, return_by_date, is_checked_out)
SELECT 
 1,
 1,
 '2018-05-28',
 TRUE;