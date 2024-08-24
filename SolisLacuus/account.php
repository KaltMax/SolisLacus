<?php include_once "inc/session.php"?>

<!DOCTYPE html>
<html lang="de">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
      <link href="res/css/style.css" rel="stylesheet" type="text/css">
      <title>Account</title>
  </head>

  <body>
    <header>
      <?php
        $currentPage = 'account';
        include_once  "config/dbconnection.php";
        include_once "inc/login_register_script.php";
        include_once "inc/navbar.php";
        include_once "inc/booking_button.php";
      ?>
    </header>

    <main>
      <h1>Mein Account</h1>

      <!-- Success and error messages -->
      <div class ="regsuccess"><?php echo $registrationSuccess;?></div>
      <div class ="loginsuccess"><?php echo $loginSuccess;?></div>
      <div class ="registrationfail"><?php echo $registrationFail;?></div>
      <div class ="invalidErr"><?php echo $invalidErr;?></div>

      <!-- Display the corresponding "Mein Account" page depending on the user-role -->
      <?php
        if ($_SESSION['loggedin'] === false && $_SESSION['role'] === 'guest'){
          include_once "inc/login_register_form.php";
        }
      ?>
      <?php
      if ($_SESSION['loggedin'] === true && $_SESSION['role'] === 'user') {
          include_once "inc/account_user.php";
      }
      ?>
    <?php
      if ($_SESSION['loggedin'] === true && $_SESSION['role'] === 'admin') {
          include_once "inc/account_admin.php";
      }
      ?>

    <?php
      $conn->close();
    ?>
    </main>

    <footer>
      <?php include_once "inc/footer.php"?>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
