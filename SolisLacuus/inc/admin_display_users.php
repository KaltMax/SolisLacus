<div class="accordion" id="accordionUserOverview">
  <?php
    $noUsersError = '';
    
    // Fetch the userdata from the database and display it within an accordion using a while-loop for every user
    $sql = "SELECT user_id, username, email, anrede, fname, lname, role, user_status FROM user";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<div class="accordion-item">';
            echo '  <h2 class="accordion-header" id="headingUser' . $row['user_id'] . '">';
            echo '    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseUser' . $row['user_id'] . '" aria-expanded="false" aria-controls="collapseUser' . $row['user_id'] . '">' . $row['username'] . '</button>';
            echo '  </h2>';
            echo '  <div id="collapseUser' . $row['user_id'] . '" class="accordion-collapse collapse" aria-labelledby="headingUser' . $row['user_id'] . '" data-bs-parent="#accordionUserOverview">';
            echo '    <div class="accordion-body">';
            echo '      <form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">';
            echo '        <div class="row justify-content-center">';
            echo '          <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-4">';
            echo '            <input type="hidden" name="user_id" value="' . $row['user_id'] . '">';
            echo '            <div class="form-group mb-3">';
            echo '              <label for="username' . $row['user_id'] . '">Username</label>';
            echo '              <input id="username' . $row['user_id'] . '" type="text" name="username" class="form-control" value="' . $row['username'] . '">';
            echo '            </div>';
            echo '            <div class="form-group mb-3">';
            echo '              <label for="email' . $row['user_id'] . '">E-Mail</label>';
            echo '              <input id="email' . $row['user_id'] . '" type="email" name="email" class="form-control" value="' . $row['email'] . '">';
            echo '            </div>';
            echo '            <div class="form-group mb-3">';
            echo '              <label for="anrede' . $row['user_id'] . '">Anrede</label>';
            echo '              <select id="anrede' . $row['user_id'] . '" name="anrede" class="form-control">';
            echo '                <option value="Herr"' . ($row['anrede'] == 'Herr' ? ' selected' : '') . '>Herr</option>';
            echo '                <option value="Frau"' . ($row['anrede'] == 'Frau' ? ' selected' : '') . '>Frau</option>';
            echo '              </select>';
            echo '            </div>';
            echo '            <div class="form-group mb-3">';
            echo '              <label for="fname' . $row['user_id'] . '">Vorname</label>';
            echo '              <input id="fname' . $row['user_id'] . '" type="text" name="fname" class="form-control" value="' . $row['fname'] . '">';
            echo '            </div>';
            echo '            <div class="form-group mb-3">';
            echo '              <label for="lname' . $row['user_id'] . '">Nachname</label>';
            echo '              <input id="lname' . $row['user_id'] . '" type="text" name="lname" class="form-control" value="' . $row['lname'] . '">';
            echo '            </div>';
            echo '            <div class="form-group mb-3">';
            echo '              <label for="role' . $row['user_id'] . '">Rolle</label>';
            echo '              <select id="role' . $row['user_id'] . '" name="role" class="form-control">';
            echo '                <option value="guest"' . ($row['role'] == 'guest' ? ' selected' : '') . '>guest</option>';
            echo '                <option value="user"' . ($row['role'] == 'user' ? ' selected' : '') . '>user</option>';
            echo '                <option value="admin"' . ($row['role'] == 'admin' ? ' selected' : '') . '>admin</option>';
            echo '              </select>';
            echo '            </div>';
            echo '            <div class="form-group mb-3">';
            echo '              <label for="userStatus' . $row['user_id'] . '">Benutzerstatus</label>';
            echo '              <select id="userStatus' . $row['user_id'] . '" name="user_status" class="form-control">';
            echo '                <option value="active"' . ($row['user_status'] == 'active' ? ' selected' : '') . '>active</option>';
            echo '                <option value="inactive"' . ($row['user_status'] == 'inactive' ? ' selected' : '') . '>inactive</option>';
            echo '              </select>';
            echo '            </div>';
            echo '            <div class="form-group mb-3">';
            echo '              <label for="newPassword' . $row['user_id'] . '">Neues Passwort (leer lassen, um nicht zu ändern)</label>';
            echo '              <input id="newPassword' . $row['user_id'] . '" type="password" name="new_password" class="form-control">';
            echo '            </div>';
            echo '            <div class="text-center">';
            echo '              <button type="submit" class="btn btn-primary update-button-admin" >Update</button>';
            echo '            </div>';
            echo '          </div>';
            echo '        </div>';
            echo '      </form>';
            echo '    </div>';
            echo '  </div>';
            echo '</div>';
        }
    } else {
        $noUsersError = 'Es gibt noch keine registrierten User.';
    }
  ?>

  <div class ="noUsersError"><?php echo $noUsersError;?></div>
