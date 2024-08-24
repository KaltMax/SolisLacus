<?php
session_start();

// Initialize session variables if they are not already set
if (!isset($_SESSION['loggedin'])) {
    $_SESSION['loggedin'] = false;
    $_SESSION['username'] = 'guest';
    $_SESSION['role'] = 'guest';
}
