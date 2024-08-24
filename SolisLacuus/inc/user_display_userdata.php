<?php
    // Fetch data from the database
    $sql = "SELECT username, email, anrede, fname, lname FROM user WHERE username = '" . $_SESSION['username'] . "'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }
?>

<div class="accordion" id="accordionUserAndUpdates">
  <!-- Accordion Item for Displaying User Data -->
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingUserData">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseUserData" aria-expanded="false" aria-controls="collapseUserData"> Benutzerdaten anzeigen </button>
    </h2>
    <div id="collapseUserData" class="accordion-collapse collapse" aria-labelledby="headingUserData" data-bs-parent="#accordionUserAndUpdates">
      <div class="accordion-body">
        <div class="row justify-content-center">
          <div class="col-auto">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th id="username-header">Feld</th>
                <th id="info-header">Information</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th id="username" scope="row" style="font-weight: bold">Username</th>
                <td headers="username"><?php echo htmlspecialchars($row['username']); ?></td>
              </tr>
              <tr>
                <th id="email" scope="row" style="font-weight: bold">E-Mail</th>
                <td headers="email"><?php echo htmlspecialchars($row['email']); ?></td>
              </tr>
              <tr>
                <th id="anrede" scope="row" style="font-weight: bold">Anrede</th>
                <td headers="anrede"><?php echo htmlspecialchars($row['anrede']); ?></td>
              </tr>
              <tr>
                <th id="fname" scope="row" style="font-weight: bold">Vorname</th>
                <td headers="fname"><?php echo htmlspecialchars($row['fname']); ?></td>
              </tr>
              <tr>
                <th id="lname" scope="row" style="font-weight: bold">Nachname</th>
                <td headers="lname"><?php echo htmlspecialchars($row['lname']); ?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
  <!-- Accordion Item for Updating User Data -->
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingUpdateData">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseUpdateData" aria-expanded="false" aria-controls="collapseUpdateData"> Benutzerdaten ändern </button>
    </h2>
    <div id="collapseUpdateData" class="accordion-collapse collapse" aria-labelledby="headingUpdateData" data-bs-parent="#accordionUserAndUpdates">
      <div class="accordion-body">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-4">
                <h3 class="userdata-change-heading text-center mb-4">Benutzerdaten ändern</h3><br>
                <div class="form-group mb-3">
                  <label for="newUserName">Username ändern</label>
                  <input id="newUserName" type="text" name="username" class="form-control" placeholder="Neuer Username">
                </div>
                <div class="form-group mb-3">
                  <label for="newAnrede">Anrede ändern</label>
                  <select id="newAnrede" name="anrede" class="form-control">
                      <option value="">Neue Anrede</option>
                      <option value="Herr">Herr</option>
                      <option value="Frau">Frau</option>
                  </select>
                </div>
                <div class="form-group mb-3">
                  <label for="newFname">Vorname ändern</label>
                  <input id="newFname" type="text" name="fname" class="form-control" placeholder="Neuer Vorname">
                </div>
                <div class="form-group mb-3">
                  <label for="newLname">Nachname ändern</label>
                  <input id="newLname" type="text" name="lname" class="form-control" placeholder="Neuer Nachname">
                </div>
                <div class="form-group mb-3">
                  <label for="newEmail">Email ändern</label>
                  <input id="newEmail" type="email" name="email" class="form-control" placeholder="Neue Email">
                </div>
                <h3 class="userdata-change-heading text-center mb-4">Passwort ändern</h3>
                <div class="form-group mb-3">
                  <label for="oldPassword">Altes Passwort</label>
                  <input id="oldPassword" type="password" name="oldPassword" class="form-control" placeholder="Aktuelles Passwort">
                </div>
                <div class="form-group mb-3">
                  <label for="newPassword">Neues Passwort</label>
                  <input id="newPassword" type="password" name="newPassword" class="form-control" placeholder="Neues Passwort">
                </div>
                <div class="form-group mb-4">
                  <label for="confirmNewPassword">Neues Passwort bestätigen</label>
                  <input id="confirmNewPassword" type="password" name="confirmNewPassword" class="form-control" placeholder="Neues Passwort bestätigen">
                </div>
                <div class="text-center">
                  <button type="submit" name="update" value="Update" class="btn btn-primary" id="update-button-user">Updaten</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
