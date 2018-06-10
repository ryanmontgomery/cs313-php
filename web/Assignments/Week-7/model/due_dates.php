<?php

function get_overdue_books() {
    global $db;
    $query = 'SELECT * FROM library.due_date
              WHERE CURRENT_DATE > return_by_date'; 
    $statement = $db->prepare($query);
    $statement->execute();
    $overdue_books = $statement->fetchAll();
    $statement->closeCursor();
    return $overdue_books;
}

function get_patrons_books($patron_id) {
    global $db;
    $query = 'SELECT * FROM library.book
              INNER JOIN library.author
              ON book.author_id = author.author_id
              LEFT JOIN library.due_date
              ON book.book_id = due_date.book_id
              WHERE due_date.patron_id = :patron_id AND is_checked_out = TRUE
              ORDER BY due_date.return_by_date ASC';
    $statement = $db->prepare($query);
    $statement->bindValue(':patron_id', $patron_id);
    $statement->execute();
    $checked_out_books = $statement->fetchAll();
    $statement->closeCursor();
    return $checked_out_books; 
}

function get_patrons_checkout_history($patron_id) {
    global $db;
    $query = 'SELECT * FROM library.book
              INNER JOIN library.author
              ON book.author_id = author.author_id
              LEFT JOIN library.due_date
              ON book.book_id = due_date.book_id
              WHERE due_date.patron_id = :patron_id
              ORDER BY due_date.is_checked_out DESC';
    $statement = $db->prepare($query);
    $statement->bindValue(':patron_id', $patron_id);
    $statement->execute();
    $checked_out_books = $statement->fetchAll();
    $statement->closeCursor();
    return $checked_out_books; 
}

function check_out_book($patron_id, $book_id) {
    global $db;
    $query = "INSERT INTO library.due_date (patron_id, book_id, return_by_date, is_checked_out, fee_paid)
              VALUES (:patron_id, :book_id, CURRENT_DATE + INTERVAL '21 day', TRUE, FALSE)";
    $statement = $db->prepare($query);
    $statement->bindValue(':patron_id', $patron_id);
    $statement->bindValue(':book_id', $book_id);
    $statement->execute();
    $statement->closeCursor();
}

function check_in_book($book_id) {
    global $db;
    $query = 'UPDATE library.due_date
              SET checked_in_date = CURRENT_DATE, is_checked_out = FALSE
              WHERE book_id = :book_id AND is_checked_out = TRUE';
    $statement = $db->prepare($query);
    $statement->bindValue(':book_id', $book_id);
    $statement->execute();
    $statement->closeCursor();    
}

function is_it_checked_out($book_id) {
    global $db;
    $query = 'SELECT book_id FROM library.due_date
              WHERE book_id = :book_id AND is_checked_out = TRUE';
    $statement = $db->prepare($query);
    $statement->bindValue(':book_id', $book_id);
    $statement->execute();
    $checked_out_book = $statement->fetch();
    $statement->closeCursor();
    return $checked_out_book;
}

?>