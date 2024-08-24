<?php
  // Script for updating the userdata
  include_once "inc/user_userdata_update.php";
?>

<!--Success and error messages -->
<div class ="updateSuccess"><?php echo $updateSuccess;?></div>
<div class ="updateFail"><?php echo $updateFail;?></div>

<h2>Meine Buchungen</h2>
  <p>Hier haben Sie einen Überblick über ihre Buchungen.</p>

<?php
  // Script for displaying the bookings of the logged-in user
  include_once "inc/user_display_bookings.php";
?>

<h2>Meine Benutzerdaten</h2>
  <p>Hier können Sie ihre Benutzerdaten einsehen und ändern.</p><br>

<?php
  // Script for displaying the userdata
  include_once "inc/user_display_userdata.php";
?>
