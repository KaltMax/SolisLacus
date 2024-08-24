<?php
    $noBookingsError = '';
    $statusError = '';
    $statusSuccess = '';

    // Function to translate boolean to text
    function translateBoolean($value) {
        if ($value) {
            return 'Ja';
        } else {
            return 'Nein';
        }
    }

    $filter = 'alle'; // default filter to display all bookings
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['status_filter'])) {
            $filter = $_POST['status_filter'];
        }

        // Update booking status
        if (isset($_POST['booking_id']) && isset($_POST['booking_status'])) {
            $bookingId = $_POST['booking_id'];
            $bookingStatus = $_POST['booking_status'];

            $updateSql = "UPDATE bookings SET status = ? WHERE booking_id = ?";
            $stmt = $conn->prepare($updateSql);
            $stmt->bind_param("si", $bookingStatus, $bookingId);

            if (!$stmt->execute()) {
                $statusError = "Fehler beim Aktualisieren des Buchungsstatus.";
            } else {
                $statusSuccess = "Der Buchungsstatus wurde erfolgreich aktualisiert.";
            }

            $stmt->close();
        }
    }
