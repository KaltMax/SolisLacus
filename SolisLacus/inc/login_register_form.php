<!-- Login Form -->
<div class="login-forms">
  <div class="login-wrap">
    <div class="login-html">
      <input id="tab-1" type="radio" name="tab" class="sign-in" checked>
      <label for="tab-1" class="tab">Login</label>
      <input id="tab-2" type="radio" name="tab" class="sign-up">
      <label for="tab-2" class="tab">Registrierung</label>
      <div class="login-form">
        <div class="sign-in-htm">
          <form method="post" action="
								<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="group">
              <label for="user" class="label">Username</label>
              <input id="user" name="user" type="text" class="input" required>
              <span class="error"> <?php echo $userErr;?> </span>
            </div>
            <div class="group">
              <label for="password" class="label">Passwort</label>
              <input id="password" name="password" type="password" class="input" data-type="password" required>
              <span class="error"> <?php echo $passwordErr;?> </span>
            </div>
            <br>
            <div class="group">
              <input type="submit" class="button" name="login" value="Login">
            </div>
          </form>
          <div class="hr"></div>
        </div>
        <!-- Register Form -->
        <div class="sign-up-htm">
          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="group">
              <label for="anrede" class="label">Anrede</label>
              <br>
              <select name="anrede" id="anrede" required>
                <option value="" class="select"></option>
                <option value="herr" class="select">Herr</option>
                <option value="frau" class="select">Frau</option>
              </select>
            </div>
            <span class="error"> <?php echo $anredeErr;?> </span>
            <div class="group">
              <label for="fname" class="label">Vorname</label>
              <input id="fname" name="fname" type="text" class="input" required>
              <span class="error"> <?php echo $fnameErr;?> </span>
            </div>
            <div class="group">
              <label for="lname" class="label">Nachname</label>
              <input id="lname" name="lname" type="text" class="input" required>
              <span class="error"> <?php echo $lnameErr;?> </span>
            </div>
            <div class="group">
              <label for="email" class="label">E-Mail Adresse</label>
              <input id="email" name="email" type="email" class="input" required>
              <span class="error"> <?php echo $emailErr;?> </span>
            </div>
            <div class="group">
              <label for="username" class="label">Username</label>
              <input id="username" name="username" type="text" class="input" required>
              <span class="error"> <?php echo $usernameErr;?> </span>
            </div>
            <div class="group">
              <label for="password1" class="label">Passwort</label>
              <input id="password1" name="password1" type="password" class="input" data-type="password" required>
              <span class="error"> <?php echo $password1Err;?> </span>
            </div>
            <div class="group">
              <label for="password2" class="label">Passwort wiederholen</label>
              <input id="password2" name="password2" type="password" class="input" data-type="password" required>
              <span class="error"> <?php echo $password2Err;?> </span>
            </div>
            <div class="group">
              <input type="submit" class="button" name="register" value="Register">
            </div>
          </form>
          <div class="hr"></div>
        </div>
      </div>
    </div>
  </div>
</div>
