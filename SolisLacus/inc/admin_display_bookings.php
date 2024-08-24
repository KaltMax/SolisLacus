 <?php
    // Build SQL query based on the filter
    $sql = "SELECT b.booking_id, b.bookingdate, b.user_id, b.room_id, b.checkin, b.checkout, b.breakfast, b.pets, b.parking, b.totalprice, b.status, u.username, u.fname, u.lname, r.room_type FROM bookings b LEFT JOIN user u ON b.user_id = u.user_id LEFT JOIN rooms r ON b.room_id = r.room_id";
    if ($filter !== 'alle') {
        $sql .= " WHERE b.status = '".$conn->real_escape_string($filter)."'";
    }
    $result = $conn->query($sql);
?>

<!-- display the bookings within an accorion using a while-loop -->
<div class="accordion" id="accordionBookingOverview">
    <?php
    $noBookingsError = '';

    if ($result->num_rows > 0) {
        while ($booking = $result->fetch_assoc()) {
            echo '<div class="accordion-item">';
            echo '  <h2 class="accordion-header" id="headingBooking' . $booking['booking_id'] . '">';
            echo '    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBooking' . $booking['booking_id'] . '" aria-expanded="false" aria-controls="collapseBooking' . $booking['booking_id'] . '">Buchung #' . $booking['booking_id'] . '</button>';
            echo '  </h2>';
            echo '  <div id="collapseBooking' . $booking['booking_id'] . '" class="accordion-collapse collapse" aria-labelledby="headingBooking' . $booking['booking_id'] . '" data-bs-parent="#accordionBookingOverview">';
            echo '    <div class="accordion-body">';
            echo '      <div class="row justify-content-center">';
            echo '        <div class="col-auto">';
            echo '          <table class="table table-bordered table-striped">';
            echo '            <tbody>';
            echo '              <tr><th>Buchungsnummer</th><td>' . $booking['booking_id'] . '</td></tr>';
            echo '              <tr><th>Buchungsdatum</th><td>' . $booking['bookingdate'] . '</td></tr>';
            echo '              <tr><th>User</th><td>' . $booking['username'] . '</td></tr>';
            echo '              <tr><th>Vorname</th><td>' . $booking['fname'] . '</td></tr>';
            echo '              <tr><th>Nachname</th><td>' . $booking['lname'] . '</td></tr>';
            echo '              <tr><th>Zimmertyp</th><td>' . $booking['room_type'] . '</td></tr>';
            echo '              <tr><th>Checkin</th><td>' . $booking['checkin'] . '</td></tr>';
            echo '              <tr><th>Checkout</th><td>' . $booking['checkout'] . '</td></tr>';
            echo '              <tr><th>Frühstück</th><td>' . translateBoolean($booking['breakfast']) . '</td></tr>';
            echo '              <tr><th>Haustier</th><td>' . translateBoolean($booking['pets']) . '</td></tr>';
            echo '              <tr><th>Parkplatz</th><td>' . translateBoolean($booking['parking']) . '</td></tr>';
            echo '              <tr><th>Preis</th><td>' . $booking['totalprice'] . '€</td></tr>';
            echo '              <tr><th>Status</th><td>';
            echo '                <form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="post">';
            echo '                  <input type="hidden" name="booking_id" value="' . $booking['booking_id'] . '">';
            echo '                  <select name="booking_status" onchange="this.form.submit()">'; // drop-down menu for changing the status of the booking
            echo '                    <option value="neu"' . ($booking['status'] == 'neu' ? ' selected' : '') . '>neu</option>';
            echo '                    <option value="bestätigt"' . ($booking['status'] == 'bestätigt' ? ' selected' : '') . '>bestätigt</option>';
            echo '                    <option value="storniert"' . ($booking['status'] == 'storniert' ? ' selected' : '') . '>storniert</option>';
            echo '                  </select>';
            echo '                </form>';
            echo '              </td></tr>';
            echo '            </tbody>';
            echo '          </table>';
            echo '        </div>';
            echo '      </div>';
            echo '    </div>';
            echo '  </div>';
            echo '</div>';
        }
    } else {
        $noBookingsError = "Keine Buchungen unter dieser Kategorie vorhanden!";
    }
  ?>
  <div class ="noBookingsError"><?php echo $noBookingsError;?></div>
