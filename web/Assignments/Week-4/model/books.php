<?php

function get_book($book_id) {
    global $db;
    $query = 'SELECT * FROM library.book
              WHERE book_id = :book_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':book_id', $book_id);
    $statement->execute();
    $book = $statement->fetch();
    $statement->closeCursor();
    return $book;
}

function get_authors_books($author_id) {
    global $db;
    $query = 'SELECT * FROM library.book
              WHERE author_id = :author_id
              ORDER BY published_date DESC';
    $statement = $db->prepare($query);
    $statement->bindValue(':author_id', $author_id);
    $statement->execute();
    $authors_books = $statement->fetchAll();
    $statement->closeCursor();
    return $authors_books;
}

function book_by_title($title) {
    global $db;
    $query = 'SELECT * FROM library.book
              WHERE title LIKE :title
              ORDER BY title ASC';
    $statement = $db->prepare($query);
    $statement->bindValue(':title', $title);
    $statement->execute();
    $books = $statement->fetchAll();
    $statement->closeCursor();
    return $books;
}

function add_book($author_id, $title, $published_date) { 
    global $db;
    $query = 'INSERT INTO library.book (author_id, title, published_date)
              VALUES (:author_id, :title, :published_date)';
    $statement = $db->prepare($query);
    $statement->bindValue(":author_id", $author_id);
    $statement->bindValue(":title", $title);
    $statement->bindValue(":published_date", $published_date);
    $statement->execute();
    $statement->closeCursor();
}

function update_book($book_id, $author_id, $title, $published_date) {
    global $db;
    $query = 'UPDATE library.book
              SET 
               author_id = :author_id,
               title = :title,
               published_date = :published_date
              WHERE book_id = :book_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":book_id", $book_id);
    $statement->bindValue(":author_id", $author_id);
    $statement->bindValue(":title", $title);
    $statement->bindValue(":published_date", $published_date);
    $statement->execute();
    $statement->closeCursor();
}

function delete_book($book_id) {
    global $db;
    $query = 'DELETE FROM library.book
              WHERE book_id = :book_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":book_id", $book_id);
    $statement->execute();
    $statement->closeCursor();
}

?>