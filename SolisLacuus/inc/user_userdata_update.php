<?php
    $updateSuccess = $updateFail = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
        $updateMade = false;

        // Check and update username if not empty
        if (!empty($_POST['username'])) {
            $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);

            // Check if the new username is already taken
            $stmt = $conn->prepare("SELECT COUNT(*) FROM user WHERE username = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_array();
            if ($row[0] > 0) {
                $updateFail .= "Der gewählte Benutzername ist bereits vergeben. ";
            } else {
                $stmt = $conn->prepare("UPDATE user SET username = ? WHERE username = ?");
                $stmt->bind_param("ss", $username, $_SESSION['username']);
                if ($stmt->execute()) {
                    $_SESSION['username'] = $username; // Update session variable
                    $updateMade = true;
                }
                $stmt->close();
            }
        }

        // Check and update email if not empty
        if (!empty($_POST['email'])) {
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

            // Check if the new email is already taken
            $stmt = $conn->prepare("SELECT COUNT(*) FROM user WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_array();
            if ($row[0] > 0) {
                $updateFail .= "Die gewählte E-Mail-Adresse ist bereits vergeben. ";
            } else {
                $stmt = $conn->prepare("UPDATE user SET email = ? WHERE username = ?");
                $stmt->bind_param("ss", $email, $_SESSION['username']);
                if ($stmt->execute()) {
                    $updateMade = true;
                }
                $stmt->close();
            }
        }
        // Update anrede if not empty
        if (!empty($_POST['anrede'])) {
            $anrede = htmlspecialchars($_POST['anrede']);
            $stmt = $conn->prepare("UPDATE user SET anrede = ? WHERE username = ?");
            $stmt->bind_param("ss", $anrede, $_SESSION['username']);
            if ($stmt->execute()) {
                $updateMade = true;
            } else {
                $updateFail .= "Fehler beim Aktualisieren der Anrede. ";
            }
            $stmt->close();
        }

        // Update fname if not empty
        if (!empty($_POST['fname'])) {
            $fname = htmlspecialchars($_POST['fname']);
            $stmt = $conn->prepare("UPDATE user SET fname = ? WHERE username = ?");
            $stmt->bind_param("ss", $fname, $_SESSION['username']);
            if ($stmt->execute()) {
                $updateMade = true;
            } else {
                $updateFail .= "Fehler beim Aktualisieren des Vornamens. ";
            }
            $stmt->close();
        }

        // Update lname if not empty
        if (!empty($_POST['lname'])) {
            $lname = htmlspecialchars($_POST['lname']);
            $stmt = $conn->prepare("UPDATE user SET lname = ? WHERE username = ?");
            $stmt->bind_param("ss", $lname, $_SESSION['username']);
            if ($stmt->execute()) {
                $updateMade = true;
            } else {
                $updateFail .= "Fehler beim Aktualisieren des Nachnamens. ";
            }
            $stmt->close();
        }

        // Update password logic
        if (!empty($_POST['oldPassword']) && !empty($_POST['newPassword']) && !empty($_POST['confirmNewPassword'])) {
            $old_password = $_POST['oldPassword'];
            $new_password = $_POST['newPassword'];
            $confirm_new_password = $_POST['confirmNewPassword'];
        
            if ($new_password != $confirm_new_password) {
                $updateFail .= "Die neuen Passwörter stimmen nicht überein. ";
            }
        
            $stmt = $conn->prepare("SELECT password FROM user WHERE username = ?");
            $stmt->bind_param("s", $_SESSION['username']);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($row = $result->fetch_assoc()) {
                if (!password_verify($old_password, $row['password'])) {
                    $updateFail .= "Das aktuelle Passwort ist falsch. ";
                } else {
                    $stmt->close();
        
                    $new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $stmt = $conn->prepare("UPDATE user SET password = ? WHERE username = ?");
                    $stmt->bind_param("ss", $new_password_hash, $_SESSION['username']);
                    if ($stmt->execute()) {
                        session_destroy(); // Destroy session
                        header("Location: account.php"); // Redirect to login page
                        exit;
                    } else {
                        $updateFail .= "Fehler beim Aktualisieren des Passworts. ";
                    }
                    $stmt->close();
                }
            }
        }
        // Set success or fail message
        if ($updateMade) {
            $updateSuccess = "Die Benutzerdaten wurden erfolgreich aktualisiert.";
        } else {
            $updateFail .= "Aktualisierung fehlgeschlagen, bitte überprüfen Sie noch einmal Ihre Eingaben!";
        }
    }
