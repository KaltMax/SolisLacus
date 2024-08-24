<?php
    session_start();

    session_destroy();

    if (isset($_COOKIE['user'])) {
        setcookie('user', '', time() - 3600, '/'); // Set expire date in the past to delete the cookie
    }
    if (isset($_COOKIE['admin'])) {
        setcookie('admin', '', time() - 3600, '/'); // Set expire date in the past to delete the cookie
    }
    header("Location: ../index.php");
    exit();
