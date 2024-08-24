<?php
    $updateSuccess = $updateFail = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user_id'])) {
        $userId = $_POST['user_id'];
        $usernameUpdateMade = $emailUpdateMade = $anredeUpdateMade = $fnameUpdateMade = $lnameUpdateMade = $roleUpdateMade = $userStatusUpdateMade = $passwordUpdateMade = false;

        // Fetch existing user data to compare it with the input
        $stmt = $conn->prepare("SELECT * FROM user WHERE user_id = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $existingData = $stmt->get_result()->fetch_assoc();
        $stmt->close();

        // Update username
        if (!empty($_POST['username']) && $_POST['username'] != $existingData['username']) {
            $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);

            // Check if the new username is already taken
            $stmt = $conn->prepare("SELECT COUNT(*) FROM user WHERE username = ? AND user_id != ?");
            $stmt->bind_param("si", $username, $userId);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_array();
            if ($row[0] > 0) {
                $updateFail .= "Der gewählte Benutzername ist bereits vergeben. ";
            } else {
                $stmt = $conn->prepare("UPDATE user SET username = ? WHERE user_id = ?");
                $stmt->bind_param("si", $username, $userId);
                if ($stmt->execute()) {
                    $usernameUpdateMade = true;
                }
                $stmt->close();
            }
        }

        // Update email
        if (!empty($_POST['email']) && $_POST['email'] != $existingData['email']) {
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

            // Validate email format
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $updateFail .= "Die eingegebene E-Mail-Adresse ist ungültig. ";
            } else {
                // Check if the new email is already taken
                $stmt = $conn->prepare("SELECT COUNT(*) FROM user WHERE email = ? AND user_id != ?");
                $stmt->bind_param("si", $email, $userId);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_array();
                if ($row[0] > 0) {
                    $updateFail .= "Die gewählte E-Mail-Adresse ist bereits vergeben. ";
                } else {
                    $stmt = $conn->prepare("UPDATE user SET email = ? WHERE user_id = ?");
                    $stmt->bind_param("si", $email, $userId);
                    if ($stmt->execute()) {
                        $emailUpdateMade = true;
                    }
                    $stmt->close();
                }
            }
        }

        // Update anrede
        if (!empty($_POST['anrede']) && $_POST['anrede'] != $existingData['anrede']) {
            $anrede = htmlspecialchars($_POST['anrede']);
            $stmt = $conn->prepare("UPDATE user SET anrede = ? WHERE user_id = ?");
            $stmt->bind_param("si", $anrede, $userId);
            if ($stmt->execute()) {
                $anredeUpdateMade = true;
            } else {
                $updateFail .= "Fehler beim Aktualisieren der Anrede. ";
            }
            $stmt->close();
        }

        // Update first name
        if (!empty($_POST['fname']) && $_POST['fname'] != $existingData['fname']) {
            $fname = htmlspecialchars($_POST['fname']);
            $stmt = $conn->prepare("UPDATE user SET fname = ? WHERE user_id = ?");
            $stmt->bind_param("si", $fname, $userId);
            if ($stmt->execute()) {
                $fnameUpdateMade = true;
            } else {
                $updateFail .= "Fehler beim Aktualisieren des Vornamens. ";
            }
            $stmt->close();
        }

        // Update last name
        if (!empty($_POST['lname']) && $_POST['lname'] != $existingData['lname']) {
            $lname = htmlspecialchars($_POST['lname']);
            $stmt = $conn->prepare("UPDATE user SET lname = ? WHERE user_id = ?");
            $stmt->bind_param("si", $lname, $userId);
            if ($stmt->execute()) {
                $lnameUpdateMade = true;
            } else {
                $updateFail .= "Fehler beim Aktualisieren des Nachnamens. ";
            }
            $stmt->close();
        }

        // Update role
        if (!empty($_POST['role']) && $_POST['role'] != $existingData['role']) {
            $role = htmlspecialchars($_POST['role']);
            $stmt = $conn->prepare("UPDATE user SET role = ? WHERE user_id = ?");
            $stmt->bind_param("si", $role, $userId);
            if ($stmt->execute()) {
                $roleUpdateMade = true;
            } else {
                $updateFail .= "Fehler beim Aktualisieren der Rolle. ";
            }
            $stmt->close();
        }

        // Update user status
        if (isset($_POST['user_status']) && $_POST['user_status'] != $existingData['user_status']) {
            $user_status = htmlspecialchars($_POST['user_status']);
            $stmt = $conn->prepare("UPDATE user SET user_status = ? WHERE user_id = ?");
            $stmt->bind_param("si", $user_status, $userId);
            if ($stmt->execute()) {
                $userStatusUpdateMade = true;
            } else {
                $updateFail .= "Fehler beim Aktualisieren des Benutzerstatus. ";
            }
            $stmt->close();
    }

        // Update password logic
        if (!empty($_POST['old_password']) && !empty($_POST['new_password']) && !empty($_POST['confirm_new_password'])) {
            $old_password = $_POST['old_password'];
            $new_password = $_POST['new_password'];
            $confirm_new_password = $_POST['confirm_new_password'];

            if ($new_password != $confirm_new_password) {
                $updateFail .= "Die neuen Passwörter stimmen nicht überein. ";
            } else {
                $stmt = $conn->prepare("SELECT password FROM user WHERE user_id = ?");
                $stmt->bind_param("s", $userId);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($row = $result->fetch_assoc()) {
                    if (!password_verify($old_password, $row['password'])) {
                        $updateFail .= "Das aktuelle Passwort ist falsch. ";
                    } else {
                        $new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                        $stmt = $conn->prepare("UPDATE user SET password = ? WHERE user_id = ?");
                        $stmt->bind_param("si", $new_password_hash, $userId);
                        if ($stmt->execute()) {
                            $passwordUpdateMade = true;
                        }
                        $stmt->close();
                    }
                }
            }
        }

        // Set success or fail message
        $anyUpdatesMade = $usernameUpdateMade || $emailUpdateMade || $anredeUpdateMade || $fnameUpdateMade || $lnameUpdateMade || $roleUpdateMade || $userStatusUpdateMade || $passwordUpdateMade;

        if ($anyUpdatesMade === true && empty($updateFail)) {
            $updateSuccess = "Die Benutzerdaten wurden erfolgreich aktualisiert.";
        } else {
            $updateFail .= "Aktualisieren fehlgeschlagen, bitte überprüfen Sie noch einmal Ihre Eingaben!";
        }
    }
