<?php
  include_once "inc/session.php";
?>

<!doctype html>
<html lang="de">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="res/css/style.css" rel="stylesheet" type="text/css">
    <title>Buchen</title>
  </head>
  
  <body>
    <header>
        <?php
          $currentPage = 'buchen';
          include_once "config/dbconnection.php";
          include_once "inc/booking_script.php";
          include_once "inc/login_register_script.php";
          include_once "inc/navbar.php";
        ?>
    </header>
    
    <main>
      <h1>Buchen</h1>

      <!-- Success and error messages -->
      <div class ="regsuccess"><?php echo $registrationSuccess;?></div>
      <div class ="registrationfail"><?php echo $registrationFail;?></div>
      <div class ="loginsuccess"><?php echo $loginSuccess;?></div>
      <div class ="bookingFail"><?php echo $bookingFail;?></div>
      <div class ="bookingSuccess"><?php echo $bookingSuccess;?></div>
      <br>

      <?php
        // Check if the user is logged in. If not then display a prompt to log in
        if ($_SESSION['loggedin'] === false && $_SESSION['role'] === 'guest'){
          echo '<div class ="bookingFail">Bitte loggen Sie sich ein, um ein Zimmer zu buchen!</div>';
          include_once "inc/login_register_form.php";
        }
      ?>
      
      <?php
      // If the user is logged in, the booking form gets displayed
      if ($_SESSION['loggedin'] === true && ($_SESSION['role'] === 'user' || $_SESSION['role'] === 'admin')){
        echo '<div class ="bookingSuccess"><?php echo $bookingSuccess;?></div>';
        echo '<div class ="bookingFail"><?php echo $bookingFail;?></div>';
        include_once "inc/booking_form.php";
      }
      ?>
        <br>
        <h2>Preise</h2>

        <p>Das Solis Lacus bietet Ihnen eine Reihe an zusätzlichen Angeboten, welche Sie zu Ihrem Aufenthalt buchen können.
            Selbstverständlich können Sie auch während Ihres Aufenthalts aufbuchen.</p>

        <!-- Accordion Item for the prices -->
        <div class="accordion" id="accordionPreise"
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingPreise">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePreise" aria-expanded="false" aria-controls="collapsePreise">
                Preise anzeigen
              </button>
            </h2>
            <div id="collapsePreise" class="accordion-collapse collapse" aria-labelledby="headingPreise" data-bs-parent="#accordionPreise">
              <div class="accordion-body">
                <div class="container">
                  <div class="row justify-content-center">
                    <div class="col-auto">
                    <table class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th scope="col">Zimmer</th>
                          <th scope="col">Preise (pro Nacht)</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Einzelzimmer</td>
                          <td>80€</td>
                        </tr>
                        <tr>
                          <td>Doppelzimmer</td>
                          <td>120€</td>
                        </tr>
                        <tr>
                          <td>Luxuszimmer-Doppelzimmer</td>
                          <td>180€</td>
                        </tr>
                        <tr>
                          <td>Frühstück</td>
                          <td>15€ pro Person</td>
                        </tr>
                        <tr>
                          <td>Haustier</td>
                          <td>20€</td>
                        </tr>
                        <tr>
                          <td>Parkplatz</td>
                          <td>10€</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br>
    </main>

    <?php
      $conn->close();
    ?>

    <footer>
      <?php include_once "inc/footer.php"?>
    </footer>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
