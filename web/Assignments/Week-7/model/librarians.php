<?php

function login_librarian($username) {
    global $db;
    $query = 'SELECT * FROM library.librarian
              WHERE username = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $librarian = $statement->fetch();
    $statement->closeCursor();
    return $librarian;
}

?>