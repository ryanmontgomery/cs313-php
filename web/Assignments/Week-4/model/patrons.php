<?php

function get_patron($patron_id) {
    global $db;
    $query = 'SELECT * FROM library.patron
              WHERE patron_id = :patron_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':patron_id', $patron_id);
    $statement->execute();
    $patron = $statement->fetch();
    $statement->closeCursor();
    return $patron;
}

function get_patron_list() {
    global $db;
    $query = 'SELECT * FROM library.patron';
    $statement = $db->prepare($query);
    $statement->execute();
    $patrons = $statement->fetchAll();
    $statement->closeCursor();
    return $patrons;
}

function search_patron_list($last_name) {
    global $db;
    $query = 'SELECT * FROM library.patron
              WHERE last_name LIKE :last_name';
    $statement = $db->prepare($query);
    $statement->bindValue(":last_name", $last_name);
    $statement->execute();
    $patrons = $statement->fetchAll();
    $statement->closeCursor();
    return $patrons;
}

function add_patron($first_name, $last_name, $address1, $address2, $city, $state, $zip_code, $phone) {
    global $db;
    $query = 'INSERT INTO library.patron (first_name, last_name, address1, address2, city, state, zip_code, phone)
              VALUES (:first_name, :last_name, :address1, :address2, :city, :state, :zip_code, :phone)';
    $statement = $db->prepare($query);
    $statement->bindValue(":first_name", $first_name);
    $statement->bindValue(":last_name", $last_name);
    $statement->bindValue(":address1", $address1);
    $statement->bindValue(":address2", $address2);
    $statement->bindValue(":city", $city);
    $statement->bindValue(":state", $state);
    $statement->bindValue(":zip_code", $zip_code);
    $statement->bindValue(":phone", $phone);
    $statement->execute();
    $statement->closeCursor();
}

function update_patron($patron_id, $first_name, $last_name, $address1, $address2, $city, $state, $zip_code, $phone) {
    global $db;
    $query = 'UPDATE library.patron
              SET 
               first_name = :first_name,
               last_name = :last_name,
               address1 = :address1,
               address2 = :address2,
               city = :city,
               state = :state,
               zip_code = :zip_code,
               phone = :phone
              WHERE patron_id = :patron_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":patron_id", $patron_id);
    $statement->bindValue(":first_name", $first_name);
    $statement->bindValue(":last_name", $last_name);
    $statement->bindValue(":address1", $address1);
    $statement->bindValue(":address2", $address2);
    $statement->bindValue(":city", $city);
    $statement->bindValue(":state", $state);
    $statement->bindValue(":zip_code", $zip_code);
    $statement->bindValue(":phone", $phone);
    $statement->execute();
    $statement->closeCursor();
}

function delete_patron($patron_id) {
    global $db;
    $query = 'DELETE FROM library.patron
              WHERE patron_id = :patron_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":patron_id", $patron_id);
    $statement->execute();
    $statement->closeCursor();
}

?>