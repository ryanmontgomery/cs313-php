DROP SCHEMA conference_notes CASCADE;
CREATE SCHEMA conference_notes;

CREATE TABLE app_user(
    id INTEGER PRIMARY KEY,
    username TEXT UNIQUE,
    fullname TEXT,
    user_password TEXT
);