<?php
  // Scripts for updating the userdata and the status of the bookings
  include_once "inc/admin_userdata_update.php";
  include_once "inc/admin_status_bookings.php";
?>
<!-- Success and Error messages -->
<div class ="updateSuccess"><?php echo $updateSuccess;?></div>
<div class ="updateFail"><?php echo $updateFail;?></div>
<div class ="statusSuccess"><?php echo $statusSuccess;?></div>
<div class ="statusError"><?php echo $statusError;?></div>

<!-- Übersicht über alle Buchungen auf der Website -->
<h2>Buchungsübersicht</h2>
      <p>Hier werden alle Buchungen aufgelistet. Die Buchungen können nach Status gefiltert werden.</p>
      <p><?php echo "Wählen Sie den Status aus, nach dem gefiltert werden soll:"; ?></p>
      
      <!-- Filter by status form -->
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <select name="status_filter" onchange="this.form.submit()">
              <option value="alle"<?php if ($filter == 'alle') { echo ' selected'; } ?>>alle</option>
              <option value="neu"<?php if ($filter == 'neu') { echo ' selected'; } ?>>neu</option>
              <option value="bestätigt"<?php if ($filter == 'bestätigt') { echo ' selected'; } ?>>bestätigt</option>
              <option value="storniert"<?php if ($filter == 'storniert') { echo ' selected'; } ?>>storniert</option>
          </select>
      </form><br>

<?php
  // Script for displaying the bookings
  include_once "inc/admin_display_bookings.php";
?>

<h2>Userübersicht</h2>
    <p>Hier finden Sie eine Übersicht über alle registrierten User und können die Benutzerdaten bearbeiten.</p>
    
  <?php
    // Script for displaying all users
    include_once "inc/admin_display_users.php";
  ?>
