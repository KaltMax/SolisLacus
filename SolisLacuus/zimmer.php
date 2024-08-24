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
    <title>Zimmer</title>
  </head>

  <body>
    <header>
        <?php
            $currentPage = 'zimmer';
            include_once "inc/navbar.php";
            include_once "inc/booking_button.php";
            ?>
    </header>

    <main>
      <h1>Zimmerauswahl</h1>

      <!-- Grid-container to display the room-pictures and informations -->
      <h2 id="einzelzimmer">Einzelzimmer</h2>
      <div class="roompictures-gridcontainer" id="einzelzimmer">
        <div class="grid-item roompictures-text"> Mehr Platz zum Wohlfühlen, im Zimmer als auch im Bad, lichtdurchflutet, mit modernen hellen Möbel ausgestattet. So lassen Sie sich Ihren Aufenthalt genießen. </div>
        <div class="grid-item"><img class="roompicture" src="res/img/zimmer/bedroom2.jpg" alt="Einzelzimmer Foto"></div>
        <div class="grid-item"><img class="roompicture" src="res/img/zimmer/bedroom3.jpg" alt="Einzelzimmer Foto"></div>
      </div>
      <h2 id="doppelzimmer">Doppelzimmer</h2>
      <div class="roompictures-gridcontainer" id="doppelzimmer">
        <div class="grid-item"><img class="roompicture" src="res/img/zimmer/bedroom5.jpg" alt="Doppelzimmer Foto"></div>
        <div class="grid-item roompictures-text">Damit auch der kleinste Wunsch nicht unerfüllt bleibt, finden unsere Gäste in unseren Doppelzimmern superbequeme Betten, Allergikerbettwäsche, ergonomische TEMPUR-Kissen begehbare Dusche und vieles mehr. </div>
        <div class="grid-item"><img class="roompicture" src="res/img/zimmer/bedroom6.jpg" alt="Doppelzimmer Foto"></div>
      </div>
      <h2 id="luxuszimmer">Luxus-Doppelzimmer</h2>
      <div class="roompictures-gridcontainer" id="luxuszimmer">
        <div class="grid-item"><img class="roompicture" src="res/img/zimmer/bedroom7.jpg" alt="Luxus-Doppelzimmer Foto"></div>
        <div class="grid-item"><img class="roompicture" src="res/img/zimmer/bedroom9.jpg" alt="Luxus-Doppelzimmer Foto"></div>
        <div class="grid-item roompictures-text">Mit ihren individuellen Grundrissen sind die Luxuszimmer die perfekten Rückzugsorte.Nach einem langen und ereignisreichen Tag beim Wandern, lässt es sich hier entspannen und neue Kraft sammeln. </div>
      </div>
    </main>

    <footer>
      <?php include_once "inc/footer.php"?>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
