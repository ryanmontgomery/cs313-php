<?php

function get_author($author_id) {
    global $db;
    $query = 'SELECT * FROM library.author
              WHERE author_id = :author_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':author_id', $author_id);
    $statement->execute();
    $author = $statement->fetch();
    $statement->closeCursor();
    return $author;
}

function get_author_list() {
    global $db;
    $query = 'SELECT * FROM library.author
              ORDER BY last_name ASC,
                       first_name DESC';
    $statement = $db->prepare($query);
    $statement->execute();
    $authors = $statement->fetchAll();
    $statement->closeCursor();
    return $authors;
}

function search_author_list($last_name) {
    global $db;
    $query = 'SELECT * FROM library.author
              WHERE last_name LIKE :last_name
              ORDER BY first_name ASC';
    $statement = $db->prepare($query);
    $statement->bindValue(":last_name", $last_name);
    $statement->execute();
    $authors = $statement->fetchAll();
    $statement->closeCursor();
    return $authors;
}

function add_author($first_name, $last_name, $bio) {
    global $db;
    $query = 'INSERT INTO library.author (first_name, last_name, bio)
              VALUES (:first_name, :last_name, :bio)';
    $statement = $db->prepare($query);
    $statement->bindValue(":first_name", $first_name);
    $statement->bindValue(":last_name", $last_name);
    $statement->bindValue(":bio", $bio);
    $statement->execute();
    $statement->closeCursor();
}

function update_author($author_id, $first_name, $last_name, $bio) {
    var_dump($first_name);
    var_dump($last_name);
    var_dump($bio);
    global $db;
    $query = 'UPDATE library.author
              SET 
               first_name = :first_name,
               last_name = :last_name,
               bio = :bio
              WHERE author_id = :author_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":author_id", $author_id);
    $statement->bindValue(":first_name", $first_name);
    $statement->bindValue(":last_name", $last_name);
    $statement->bindValue(":bio", $bio);
    $statement->execute();
    $statement->closeCursor();
}

function delete_author($author_id) {
    global $db;
    $query = 'DELETE FROM library.author
              WHERE author_id = :author_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":author_id", $author_id);
    $statement->execute();
    $statement->closeCursor();
}

?>