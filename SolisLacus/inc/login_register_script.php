<?php
    // Login
    $user = $password = '';
    $userErr = $passwordErr = '';
    $invalidErr = '';
    $loginSuccess = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
        // check if the form fields are empty
        if (empty($_POST["user"])) {
            $userErr = "Bitte geben Sie einen Usernamen ein!";
        } else {
            $user = $_POST["user"];
        }
        if (empty($_POST["password"])) {
            $passwordErr = "Bitte geben Sie ein Passwort ein!";
        } else {
            $password = $_POST["password"];
        }

        if (!empty($user) && !empty($password)) {
            // Prepare a select statement
            $sql = "SELECT user_id, username, password, role, user_status FROM user WHERE username = ? AND user_status = 'active'";
            
            if ($stmt = $conn->prepare($sql)) {
                // Bind variables to the prepared statement as parameters
                $stmt->bind_param("s", $param_username);
        
                // Set parameters
                $param_username = $user;
        
                // Attempt to execute the prepared statement
                if ($stmt->execute()) {
                    // Store result
                    $stmt->store_result();
        
                    // Check if username exists, if yes then verify password
                    if ($stmt->num_rows == 1) {
                        // Bind result variables
                        $stmt->bind_result($user_id, $username, $hashed_password, $role, $user_status);
        
                        if ($stmt->fetch()) {
                            if (password_verify($password, $hashed_password) && $user_status == 'active') {
                                // Store data in session variables
                                $_SESSION['user_id'] = $user_id;
                                $_SESSION['loggedin'] = true;
                                $_SESSION['username'] = $username;
                                $_SESSION['role'] = $role;
                                
                                $loginSuccess = "Herzlich willkommen " . $username . "! Sie haben sich erfolgreich eingeloggt.";
        
                                // Set a cookie based on user role
                                $cookie_name = $role == 'admin' ? "admin" : "user";
                                $cookie_value = $username;
                                setcookie($cookie_name, $cookie_value, time() + 3600, '/');
                            } else {
                                // Display an error message if password is not valid
                                $invalidErr = "Ihr Konto ist entweder nicht aktiv oder Sie haben einen ungültigen Benutzernamen bzw. Passwort eingegeben.";
                            }
                        }
                    } else {
                        // Display an error message if username doesn't exist
                        $invalidErr = "Kein Benutzer mit diesem Namen gefunden oder Ihr Konto ist nicht aktiv.";
                    }
                } else {
                    $invalidErr = "Oops! Something went wrong. Please try again later.";
                }
                // Close statement
                $stmt->close();
            }
        }
    }

    // Register
    $anredeErr = $fnameErr = $lnameErr = $emailErr = $usernameErr = $password1Err = $password2Err = '';
    $registrationSuccess = $registrationFail = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
        // Sanitize and validate inputs
        $anrede = $_POST["anrede"];
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password1 = $_POST["password1"];
        $password2 = $_POST["password2"];

        if (empty($anrede)) {
            $anredeErr = "Bitte wählen Sie eine Anrede aus!";
        }
        if (empty($fname)) {
            $fnameErr = "Bitte geben Sie einen Vornamen ein!";
        }
        if (empty($lname)) {
            $lnameErr = "Bitte geben Sie einen Nachnamen ein!";
        }
        if (empty($email)) {
            $emailErr = "Bitte geben Sie eine E-Mail Adresse ein!";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Falsches E-Mail Format";
        }
        if (empty($username)) {
            $usernameErr = "Bitte geben Sie einen Usernamen ein!";
        }
        if (empty($password1)) {
            $password1Err = "Bitte geben Sie ein Passwort ein!";
        }
        if (empty($password2)) {
            $password2Err = "Bitte bestätigen Sie ihr Passwort!";
        } elseif ($password1 !== $password2) {
            $password2Err = "Die Passwörter stimmen nicht überein";
        }

        // If all fields are validated successfully, you can proceed with registration logic
        if (empty($anredeErr) && empty($fnameErr) && empty($lnameErr) && empty($emailErr) && empty($usernameErr) && empty($password1Err) && empty($password2Err)) {
            // Check if username or email already exists
            $userCheckSql = "SELECT * FROM user WHERE username = ? OR email = ?";
            if ($stmt = $conn->prepare($userCheckSql)) {
                $stmt->bind_param("ss", $param_username, $param_email);
                $param_username = $username;
                $param_email = $email;
                
                if ($stmt->execute()) {
                    $result = $stmt->get_result();
                    if ($result->num_rows > 0) {
                        $registrationFail = "Benutzername oder E-Mail existiert bereits!";
                    } else {
                        // Hash the password
                        $hashed_password = password_hash($password1, PASSWORD_DEFAULT);

                        // Insert new user into database
                        $insertSql = "INSERT INTO user (anrede, fname, lname, email, username, password, role, user_status) VALUES (?, ?, ?, ?, ?, ?, 'user', 'active')";
                        if ($insert_stmt = $conn->prepare($insertSql)) {
                            $insert_stmt->bind_param("ssssss", $anrede, $fname, $lname, $email, $username, $hashed_password);

                            if ($insert_stmt->execute()) {
                                $registrationSuccess = "Herzlich willkommen bei Solis Lacus, $username! Die Registrierung war erfolgreich. Sie können sich jetzt einloggen.";
                            } else {
                                $registrationFail = "Fehler bei der Registrierung: " . $conn->error;
                            }
                            $insert_stmt->close();
                        }
                    }
                    $stmt->close();
                } else {
                    $registrationFail = "Fehler bei der Überprüfung des Benutzernamens und der E-Mail: " . $conn->error;
                }
            }
        } else {
            $registrationFail = "Registrierung fehlgeschlagen! Bitte füllen Sie alle Felder richtig aus!";
        }
    }
