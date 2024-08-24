<?php
$roomType = $checkIn = $checkOut = $breakfast = $parking = $pet = '';
$roomTypeError = $checkInError = $checkOutError = $breakfastError = $parkingError = $petError = '';
$bookingFail = $bookingSuccess = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Room Type Validation
    if (empty($_POST["room_type"])) {
        $roomTypeError = "Zimmertyp ist erforderlich.";
    } else {
        $roomType = $_POST["room_type"];
    }

    // Check-In Date Validation
    if (empty($_POST["check_in"])) {
        $checkInError = "Check-in-Datum ist erforderlich.";
    } else {
        $checkIn = $_POST["check_in"];
        $today = new DateTime('today');
        $selectedCheckIn = new DateTime($checkIn);
        if ($selectedCheckIn < $today) {
            $checkInError = "Check-in-Datum kann nicht in der Vergangenheit liegen.";
        }
        $checkIn = $selectedCheckIn->format('Y-m-d'); // Convert back to string
    }
    
    // Check-Out Date Validation
    if (empty($_POST["check_out"])) {
        $checkOutError = "Check-out-Datum ist erforderlich.";
    } else {
        $checkOut = $_POST["check_out"];
        $selectedCheckOut = new DateTime($checkOut);
        if ($selectedCheckOut <= $selectedCheckIn) {
            $checkOutError = "Check-out-Datum muss nach dem Check-in-Datum liegen.";
        }
        $checkOut = $selectedCheckOut->format('Y-m-d'); // Convert back to string
    }

    // Breakfast Option Validation
    if (isset($_POST["breakfast"]) && $_POST["breakfast"] === 'withBreakfast') {
        $breakfast = 1;
    } else {
        $breakfast = 0;
    }

    // Parking Option Validation
    if (isset($_POST["parking"]) && $_POST["parking"] === 'withParking') {
        $parking = 1;
    } else {
        $parking = 0;
    }

    // Pet Option Validation
    if (isset($_POST["pet"]) && $_POST["pet"] === 'withPet') {
        $pet = 1;
    } else {
        $pet = 0;
    }

    // Process Booking if No Errors
    if (empty($roomTypeError) && empty($checkInError) && empty($checkOutError)
        && empty($breakfastError) && empty($parkingError) && empty($petError)) {

        // Convert room type to room_id
        $roomID = 0;
        switch ($roomType) {
            case "singleRoom":
                $roomID = 1;
                break;
            case "doubleRoom":
                $roomID = 2;
                break;
            case "luxuryRoom":
                $roomID = 3;
                break;
            default:
                error_log("Invalid room type: " . $roomType);
        }

        // Check if the room is available
        if (isRoomAvailable($conn, $roomID, $checkIn, $checkOut)) {
            // Retrieve room price
            $roomPriceSql = "SELECT room_price FROM rooms WHERE room_id = ?";
            $roomStmt = $conn->prepare($roomPriceSql);
            $roomStmt->bind_param("i", $roomID);
            $roomStmt->execute();
            $roomResult = $roomStmt->get_result();
            $roomRow = $roomResult->fetch_assoc();
            $roomPrice = $roomRow['room_price'];

            // Calculate the total price
            $nights = (new DateTime($checkOut))->diff(new DateTime($checkIn))->days; // Calculate the nights
            
            // Fetch prices from the database
            $statement = $conn->query("SELECT type, price FROM prices");
            $prices = [];
            while ($row = $statement->fetch_assoc()) {
                $prices[strtoupper($row['type']) . '_PRICE'] = $row['price'];
            }
            
            // Use the fetched prices
            $adjustedBreakfastPrice = $prices['BREAKFAST_PRICE'];
            if ($roomID == 2 || $roomID == 3) { // 2 for "Doppelzimmer", 3 for "Luxus-Doppelzimmer"
                $adjustedBreakfastPrice *= 2;
            }
            
            $totalPrice = ($nights * $roomPrice) +
                          ($breakfast * $adjustedBreakfastPrice * $nights) +
                          ($pet * $prices['PETS_PRICE'] * $nights) +
                          ($parking * $prices['PARKING_PRICE'] * $nights);

            // Current date and time for the booking date
            $bookingDate = date('Y-m-d H:i:s');

            // Insert the booking with total price and booking date
            $sql = "INSERT INTO bookings (user_id, room_id, bookingdate, checkin, checkout, breakfast, pets, parking, totalprice, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 'neu')";
            $stmt = $conn->prepare($sql);
            $user_id = $_SESSION['user_id'];
            $stmt->bind_param("iisssiiid", $user_id, $roomID, $bookingDate, $checkIn, $checkOut, $breakfast, $pet, $parking, $totalPrice);

            if ($stmt->execute()) {
                $bookingSuccess = 'Buchung erfolgreich! Vielen Dank für Ihre Reservierung! Die Buchungsdaten wurden unter "Mein Account" gespeichert.';
            } else {
                $bookingFail = 'Buchung fehlgeschlagen: ' . $stmt->error;
            }
            $stmt->close();
        } else {
            $bookingFail = "Das gewählte Zimmer ist für den angegebenen Zeitraum nicht verfügbar.";
        }
    } else {
        $bookingFail = 'Buchung fehlgeschlagen! Bitte überprüfen Sie Ihre Angaben und füllen Sie alle Felder korrekt aus!';
    }
}

// Function to check room availability
function isRoomAvailable($conn, $roomID, $checkIn, $checkOut) {
    $count = '';
    $sql = "SELECT COUNT(*) FROM bookings WHERE room_id = ? AND NOT (checkout <= ? OR checkin >= ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iss", $roomID, $checkIn, $checkOut);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();
    return $count == 0;
}
