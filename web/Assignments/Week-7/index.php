<?php 
require 'model/librarians.php';
require 'model/database.php';
require 'model/patrons.php';
require 'model/authors.php';
require 'model/books.php';
require 'model/due_dates.php';

session_start();
if (isset($_SESSION['librarian'])) {
    $logout = '<a href="index.php?action=logout" id="logout">Logout</a>';
}

else {
    $logout = '';
}

$page = '';

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'librarian_dashboard';
    }
}

//-----------------------------------------
//Login/Logout
//------------------------------------------
if ($action == 'authenticate') {
    $page = 'login';
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = $_POST["password"];
    $librarian = login_librarian($username);
    if ($librarian['username'] == $username) {
        if (password_verify($password, $librarian['password_hash'])) {
            $_SESSION['librarian'] = $username;
            $page = 'home';
            header('Location: index.php');
            die();
        }
        else {
            $login_error = '<p class="error">Invalid Password</p>';
            $page = 'login';
            header('Location: index.php');
            die();
        }
    }
    else {
        $login_error = '<p class="error">Invalid User</p>';
        $page = 'login';
        header('Location: index.php');
        die();
    }
}

else if (!isset($_SESSION['librarian'])) {
    $login_error = '';
    $page = 'login';
    include 'view/login.php';
}

else if ($action == 'logout') {
    session_destroy();
    header('Location: index.php');
    die();
}

else if ($action == 'librarian_dashboard') {
    $page = 'home';
    include 'view/librarian_dashboard.php';
}

//-----------------------------------------
//PATRONS - GET, UPDATE, ADD, DELETE, SEARCH
//------------------------------------------

else if ($action == 'patron_dashboard') {
    $page = 'patron_dashboard';
    include 'view/patron_dashboard.php';
}

else if ($action == 'get_patron') {
    $page = 'patron_dashboard';
    $patron_id = filter_input(INPUT_POST, 'patron_id', FILTER_SANITIZE_NUMBER_INT);
    $patron = get_patron($patron_id);
    $checked_out_books = get_patrons_checkout_history($patron_id);
    include 'view/patron_details.php';
    include 'view/patron_checked_out_history.php';
    include 'view/_footer.php';
}

else if ($action == 'patron_update_form') {
    $page = 'patron_dashboard';
    $patron_id = filter_input(INPUT_POST, 'patron_id', FILTER_SANITIZE_NUMBER_INT);
    $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
    $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
    $address1 = filter_input(INPUT_POST, 'address1', FILTER_SANITIZE_STRING);
    $address2 = filter_input(INPUT_POST, 'address2', FILTER_SANITIZE_STRING);
    $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
    $state = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING);
    $zip_code = filter_input(INPUT_POST, 'zip_code', FILTER_SANITIZE_NUMBER_INT);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT);
    
    include 'view/patron_update_form.php';
}

else if ($action == 'update_patron') {
    $page = 'patron_dashboard';
    $patron_id = filter_input(INPUT_POST, 'patron_id', FILTER_SANITIZE_NUMBER_INT);
    $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
    $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
    $address1 = filter_input(INPUT_POST, 'address1', FILTER_SANITIZE_STRING);
    $address2 = filter_input(INPUT_POST, 'address2', FILTER_SANITIZE_STRING);
    $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
    $state = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING);
    $zip_code = filter_input(INPUT_POST, 'zip_code', FILTER_SANITIZE_NUMBER_INT);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT);
    update_patron($patron_id, $first_name, $last_name, $address1, $address2, $city, $state, $zip_code, $phone);
    
    $patron = get_patron($patron_id);
    include 'view/patron_details.php';
}

else if ($action == 'add_patron') {
    $page = 'patron_dashboard';
    $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
    $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
    $address1 = filter_input(INPUT_POST, 'address1', FILTER_SANITIZE_STRING);
    $address2 = filter_input(INPUT_POST, 'address2', FILTER_SANITIZE_STRING);
    $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
    $state = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING);
    $zip_code = filter_input(INPUT_POST, 'zip_code', FILTER_SANITIZE_NUMBER_INT);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT);
    
    add_patron($first_name, $last_name, $address1, $address2, $city, $state, $zip_code, $phone);
    $patrons = search_patron_list($last_name);
    include 'view/patrons_list.php';
}

else if ($action == 'delete_patron') {
    $page = 'patron_dashboard';
    $patron_id = filter_input(INPUT_POST, 'patron_id', FILTER_SANITIZE_NUMBER_INT);
    delete_patron($patron_id);
    include 'view/patron_dashboard.php';
}

else if ($action == 'search_patron') {
    $page = 'patron_dashboard';
    $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
    if (isset($last_name) && $last_name != '') {
        $patrons = search_patron_list($last_name);
        include 'view/patrons_list.php';
    }
    else {
        $patrons = get_patron_list();
        include 'view/patrons_list.php';
    }
        
}

//------------------------------------------
//AUTHORS - GET, UPDATE, ADD, DELETE, SEARCH
//------------------------------------------

else if ($action == 'author_dashboard') {
    $page = 'author_dashboard';
    include 'view/author_dashboard.php';
}

else if ($action == 'get_author') {
    $page = 'author_dashboard';
    if (isset($_POST['author_id'])) {
        $author_id = filter_input(INPUT_POST, 'author_id', FILTER_SANITIZE_NUMBER_INT);
    }
    else if (isset($_GET['author_id'])) {
        $author_id = filter_input(INPUT_GET, 'author_id', FILTER_SANITIZE_NUMBER_INT);
    }
    $author = get_author($author_id);
    $authors_books = get_authors_books($author_id);
    include 'view/author_details.php';
}

else if ($action == 'author_update_form') {
    $page = 'author_dashboard';
    $author_id = filter_input(INPUT_POST, 'author_id', FILTER_SANITIZE_NUMBER_INT);
    $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
    $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
    $bio = filter_input(INPUT_POST, 'bio', FILTER_SANITIZE_STRING);
    
    include 'view/author_update_form.php';
}

else if ($action == 'update_author') {
    $page = 'author_dashboard';
    $author_id = filter_input(INPUT_POST, 'author_id', FILTER_SANITIZE_NUMBER_INT);
    $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
    $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
    $bio = filter_input(INPUT_POST, 'bio', FILTER_SANITIZE_STRING);
    update_author($author_id, $first_name, $last_name, $bio);
    
    $author = get_author($author_id);
    include 'view/author_details.php';
}

else if ($action == 'add_author') {
    $page = 'author_dashboard';
    $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
    $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
    $bio = filter_input(INPUT_POST, 'bio', FILTER_SANITIZE_STRING);
    
    add_author($first_name, $last_name, $bio);
    $authors = search_author_list($last_name);
    include 'view/authors_list.php';
}

else if ($action == 'delete_author') {
    $page = 'author_dashboard';
    $author_id = filter_input(INPUT_POST, 'author_id', FILTER_SANITIZE_NUMBER_INT);
    delete_author($author_id);
    include 'view/author_dashboard.php';
}

else if ($action == 'search_author') {
    $page = 'author_dashboard';
    $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
    if (isset($last_name) && $last_name != '') {
        $authors = search_author_list($last_name);
        include 'view/authors_list.php';
    }
    else {
        $authors = get_author_list();
        include 'view/authors_list.php';
    }
        
}

//----------------------------------------
//BOOKS - GET, UPDATE, ADD, DELETE, SEARCH
//----------------------------------------

else if ($action == 'book_dashboard') {
    $page = 'book_dashboard';
    include 'view/book_dashboard.php';
}

else if ($action == 'get_book') {
    $page = 'book_dashboard';
    if (isset($_POST['book_id'])){
        $book_id = filter_input(INPUT_POST, 'book_id', FILTER_SANITIZE_NUMBER_INT);
    }
    else if (isset($_GET['book_id'])) {
        $book_id = filter_input(INPUT_GET, 'book_id', FILTER_SANITIZE_NUMBER_INT);
    }
    $book = get_book($book_id);
    include 'view/book_details.php';
}

else if ($action == 'book_update_form') {
    $page = 'book_dashboard';
    $book_id = filter_input(INPUT_POST, 'book_id', FILTER_SANITIZE_NUMBER_INT);
    $author_id = filter_input(INPUT_POST, 'author_id', FILTER_SANITIZE_NUMBER_INT);
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $published_date = filter_input(INPUT_POST, 'published_date', FILTER_SANITIZE_STRING);
    
    include 'view/book_update_form.php';
}

else if ($action == 'update_book') {
    $page = 'book_dashboard';
    $book_id = filter_input(INPUT_POST, 'book_id', FILTER_SANITIZE_NUMBER_INT);
    $author_id = filter_input(INPUT_POST, 'author_id', FILTER_SANITIZE_NUMBER_INT);
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $published_date = filter_input(INPUT_POST, 'published_date', FILTER_SANITIZE_STRING);
    update_book($book_id, $author_id, $title, $published_date);
    
    $book = get_book($book_id);
    include 'view/book_details.php';
}

else if ($action == 'add_book') {
    $page = 'book_dashboard';
    $author_id = filter_input(INPUT_POST, 'author_id', FILTER_SANITIZE_NUMBER_INT);
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $published_date = filter_input(INPUT_POST, 'published_date', FILTER_SANITIZE_STRING);
    
    add_book($author_id, $title, $published_date);
    $books = book_by_title($title);
    include 'view/books_list.php';
}

else if ($action == 'delete_book') {
    $page = 'book_dashboard';
    $book_id = filter_input(INPUT_POST, 'book_id', FILTER_SANITIZE_NUMBER_INT);
    delete_book($book_id);
    include 'view/librarian_dashboard.php';
}

else if ($action == 'search_books') {
    $page = 'book_dashboard';
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    if (isset($title) && $title != '') {
        $books = book_by_title($title);
        include 'view/books_list.php';
    }
    else {
        include 'view/librarian_dashboard.php';
    }
        
}

//---------------------------------------------------------------------
//CHECK OUT BOOKS
//---------------------------------------------------------------------

else if ($action == 'check_out_books') {
    $page = 'check_out_dashboard';
    include 'view/checkout_dashboard.php';
    include 'view/_footer.php';    
}

else if ($action == 'get_patrons_books') {
    $page = 'check_out_dashboard';
    $checkout_error = '';
    $patron_id = filter_input(INPUT_POST, 'patron_id', FILTER_SANITIZE_NUMBER_INT);
    $patron = get_patron($patron_id);
    $checked_out_books = get_patrons_books($patron_id);
    include 'view/checkout_dashboard.php';
    if(isset($patron) && $patron != FALSE) { include 'view/checkout_book_dashboard.php'; }
    if(isset($checked_out_books) && $checked_out_books != FALSE) { include 'view/patron_checked_out_list.php'; }
    include 'view/_footer.php';
}

else if ($action == 'checkout_book') {
    $page = 'check_out_dashboard';
    $checkout_error = '';
    $patron_id = filter_input(INPUT_POST, 'patron_id', FILTER_SANITIZE_NUMBER_INT);
    $book_id = filter_input(INPUT_POST, 'book_id', FILTER_SANITIZE_NUMBER_INT);
    $patron = get_patron($patron_id);
    $status = is_it_checked_out($book_id);
    
    if($status['book_id'] == $book_id) {
        $checkout_error = '<p class="error">This book is already checked out.</p>';
    }
    else {
        try {
            check_out_book($patron_id, $book_id);
        }
        catch(Exception $e) {
            $checkout_error = '<p class="error">This book does not exist.</p>';
        }
    }
    
    $checked_out_books = get_patrons_books($patron_id);
    include 'view/checkout_dashboard.php';
    if(isset($patron) && $patron != FALSE) { include 'view/checkout_book_dashboard.php'; }
    if(isset($checked_out_books) && $checked_out_books != FALSE) { include 'view/patron_checked_out_list.php'; }
    include 'view/_footer.php';
}

//---------------------------------------------------------------------
//CHECK IN BOOKS
//---------------------------------------------------------------------

else if ($action == 'check_in_books') {
    $page = 'check_in_dashboard';
    $checked_in_verification = '';
    $checked_in_error = '';
    include 'view/checkin_dashboard.php';
    include 'view/_footer.php';    
}

else if ($action == 'checkin_book') {
    $page = 'check_in_dashboard';
    $checked_in_verification = '';
    $checked_in_error = '';
    $book_id = filter_input(INPUT_POST, 'book_id', FILTER_SANITIZE_NUMBER_INT);
    $book = get_book($book_id);

    if (!$book){
        $checked_in_error = '<p class="error">Checked out book does not exist.</p>';

    } else{
        $status = is_it_checked_out($book_id);

        if($status['book_id'] == $book_id) {
            check_in_book($book_id);
            $checked_in_verification = '<p class="verification">' . $book['title'] . ' is successfully checked in.';
        }
        else {
            $checked_in_error = '<p class="error">' . $book['title'] . ' is not checked out.';
        }
    }



    
    include 'view/checkin_dashboard.php';
    include 'view/_footer.php';  
}

?>