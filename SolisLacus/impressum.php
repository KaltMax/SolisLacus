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
    <title>Home</title>
  </head>
    
  <body>
    <header>
        <?php
          include_once "inc/navbar.php";
          include_once "inc/booking_button.php";
        ?>
    </header>
      
    <main>
      <div id="impressumtext">
      <h1>Impressum</h1>

      <h2>Für den Inhalt verantwortlich</h2>
          <p>Hotel Solis Lacus<br>
              Sonnenstraße 42<br>
              4421 Seedorf | Austria</p>
          <p><strong>Kontaktdaten:</strong><br>
              Telefon: 0664/1234567<br>
              E-Mail: sonne@solislacus.at</p>
          <p><strong>UID-Nr:</strong> ATU12345678<br>
              Wirtschaftskammer OÖ</p>
      
      <h2>Bildnachweis</h2>
        <div class="listparent">
          <ul>
              <li><a class="impressumlink" href="https://pixabay.com/">Pixabay</a></li>
              <li>Solis Ideas GmbH</li>
          </ul>
        </div>
      
      <h2>Design und technische Umsetzung</h2>
          <p>Web-Ideas GmbH<br>
              Internet Werbeagentur<br>
              Stadtstraße 1<br>
              2233 Johannesdorf | Austria</p>

      <div id="impressum-pictures">
        <div class="image-container">
          <img src="res/img/maxportrait.jpeg" alt="Foto von Maximilian Kaltenreiner" width="150">
          <figcaption>Maximilian Kaltenreiner</figcaption>
        </div>
      </div>


      <h2>Streitbeilegung</h2>
        <p>Sie haben haben die Möglichkeit, Beschwerden an die Online-Streitbeilegungsplattform der EU zu richten: <a class="impressumlink" href="http://ec.europa.eu/odr">http://ec.europa.eu/odr</a>.
            Sie können allfällige Beschwerden auch an die oben angegebene E-Mail-Adresse richten.</p><br><br>
      </div>
    </main>
            
    <footer>
        <?php include_once "inc/footer.php";?>
    </footer>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
