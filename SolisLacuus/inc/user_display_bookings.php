<?php
    $noBookingsError ='';
    $bookings = [];

    // SQL query to fetch bookings for the given user ID
    $sql = "SELECT b.booking_id, b.bookingdate, b.checkin, b.checkout, b.breakfast, b.pets, b.parking, b.totalprice, b.status, r.room_type FROM bookings b LEFT JOIN rooms r ON b.room_id = r.room_id WHERE b.user_id = ?";
    if ($stmt = $conn->prepare($sql)) {
        // Bind the user ID parameter
        $stmt->bind_param("i", $_SESSION['user_id']);

        // Execute the query
        $stmt->execute();

        // Bind the result variables
        $result = $stmt->get_result();

        // Fetch the results into an array
        while ($row = $result->fetch_assoc()) {
            $bookings[] = $row;
        }
        if (empty($bookings)) {
            $noBookingsError = "Es wurden noch keine Zimmer gebucht!";
        }
        $stmt->close();
    }

    // Function to translate boolean to text (for breakfast, parking and pets)
    function translateBoolean($value) {
        if ($value) {
            return 'Ja';
        } else {
            return 'Nein';
        }
    }
?>

<div class ="noBookingsError"><?php echo $noBookingsError;?></div>

<!-- Display the bookings of a user using a for-loop -->
<div class="accordion" id="accordionUserBookings">
    <?php foreach ($bookings as $index => $booking): ?>
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading<?php echo $index; ?>">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $index; ?>" aria-expanded="false" aria-controls="collapse<?php echo $index; ?>">
                    Buchung <?php echo $index + 1; ?>
                </button>
            </h2>
            <div id="collapse<?php echo $index; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $index; ?>" data-bs-parent="#accordionUserBookings">
                <div class="accordion-body">
                <div class="container">
                  <div class="row justify-content-center">
                    <div class="col-auto">
                        <table class="table table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <th>Buchungsnummer</th>
                                        <td><?php echo $booking['booking_id']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Buchungsdatum</th>
                                        <td><?php echo $booking['bookingdate']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Zimmertyp</th>
                                        <td><?php echo $booking['room_type']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Checkin</th>
                                        <td><?php echo $booking['checkin']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Checkout</th>
                                        <td><?php echo $booking['checkout']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Frühstück</th>
                                        <td><?php echo translateBoolean($booking['breakfast']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Haustier</th>
                                        <td><?php echo translateBoolean($booking['pets']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Parkplatz</th>
                                        <td><?php echo translateBoolean($booking['parking']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Preis</th>
                                        <td><?php echo $booking['totalprice']; ?>€</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td><?php echo $booking['status']; ?></td>
                                    </tr>
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
