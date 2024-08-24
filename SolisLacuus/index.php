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
        $currentPage = 'index';
        include_once "inc/navbar.php";
        include_once "inc/booking_button.php";
        ?>
    </header>
        
    <!-- Hero -->
    <div class="p-5 justify-content-end" id="hero" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('res/img/index/See_Schwäne.jpg'); height: 500px;">
      <div class="mask">
        <div class="d-flex justify-content-center align-items-center mt-5">
          <div class="hero-text">
            <h1 class="mb-3">Solis Lacus</h1> <br>
            <h4 class="mb-5">Wo die Sonne den See küsst...</h4> <br>
            <h4 class="mb-5">Seedorf | Austria</h4>
          </div>
        </div>
      </div>
    </div>

   <main>

      <h1>Zimmerauswahl</h1>

        <!-- Grid-container to display the available rooms -->
        <div class="roompictures-gridcontainer">
            <div class="grid-item"><a href="zimmer.php#einzelzimmer"><img class="roompicture" src="res/img/zimmer/bedroom1.jpg"  alt="Einzelzimmer Foto"></a></div>
            <div class="grid-item roompictures-text">Entspannen Sie sich in userem gemütlichen Einzelzimmer, einem Rückzugsort,
                der Luxus und Behaglichkeit vereint, während Sie einen unvergesslichen Aufenthalt in unserem Hotel genießen.</div>
            <div class="grid-item"><a href="zimmer.php#einzelzimmer"><img class="roompicture" src="res/img/zimmer/bedroom3.jpg" alt="Einzelzimmer Foto"></a></div>
        </div>

        <div class="roompictures-gridcontainer">
          <div class="grid-item roompictures-text">Unsere Doppelzimmer bieten den perfekten Raum für Paare,
                um sich in einem harmonischen Ambiente zurückzuziehen und gemeinsam unvergessliche Momente in unserem Hotel zu erleben.</div>
            <div class="grid-item"><a href="zimmer.php#doppelzimmer"><img class="roompicture" src="res/img/zimmer/bedroom5.jpg" alt="Doppelzimmer Foto"></a></div>
            <div class="grid-item roompictures-text">Genießen Sie die perfekte Harmonie von Komfort und Eleganz,
                wo gemeinsame Erlebnisse und unvergessliche Augenblicke in einem stilvollen Ambiente entstehen.</div>
        </div>

        <div class="roompictures-gridcontainer">
            <div class="grid-item"><a href="zimmer.php#luxuszimmer"><img class="roompicture" src="res/img/zimmer/bedroom7.jpg" alt="Luxus-Doppelzimmer Foto"></a></div>
            <div class="grid-item roompictures-text">Unsere Luxuszimmer setzen den Maßstab für raffinierten Komfort und exklusiven Genuss,
                wo Sie in einer Oase des Luxus und Stils einen unvergesslichen Aufenthalt erleben werden.</div>
            <div class="grid-item"><a href="zimmer.php#luxuszimmer"><img class="roompicture" src="res/img/zimmer/bedroom9.jpg" alt="Luxus-Doppelzimmer Foto"></a></div>
        </div>

      <!-- Grid-container to display information about the area of the hotel -->
      <h1>To Do in Seedorf</h1>

        <div class="roompictures-gridcontainer">
            <div class="grid-item"><a href="https://www.oberoesterreich.at/wandern.html"><img class="roompicture" src="res/img/index/Wandern_See.jpg" alt="Seewanderung"></a></div>
            <div class="grid-item roompictures-text">Erleben Sie die Wunder der Natur auf Schritt und Tritt.
                Wandern in unserer atemberaubenden Destination verbindet Abenteuer,
                Erholung und unvergessliche Ausblicke zu einem unvergleichlichen Outdoor-Erlebnis.
                <div class="listparent">
                <ul>
                  <li><a class="indexlink" href="https://www.oberoesterreich.at/wandern.html">Wandern in Oberösterreich</a></li>
                </ul>
                </div>
              </div>
            <div class="grid-item"><a href="https://www.oberoesterreich.at/wandern.html"><img class="roompicture" src="res/img/index/Wandern_Berg.jpg" alt="Bergwanderung"></a></div>
        </div>

        <div class="roompictures-gridcontainer">
          <div class="grid-item roompictures-text">Tauchen Sie ein in eine Welt des puren Genusses und der Entspannung,
            in unseren heilenden Thermen, wo warme Quellen und verwöhnende Anwendungen Ihre Sinne beleben und
            Ihnen einen unvergesslichen Aufenthalt bieten.</div>
            <div class="grid-item"><a href="https://thermen.at/"><img class="roompicture" src="res/img/index/Gleinberg_2.jpg" alt="Therme Gleinberg"></a></div>
            <div class="grid-item roompictures-text">
              <div>In unmittelbarer Nähe befinden sich folgende Thermen:
                <div class="listparent">
                <ul>
                  <li><a class="indexlink" href="https://www.therme-geinberg.at">Therme Gleinberg</a></li>
                  <li><a class="indexlink" href="https://www.europatherme.de/">Europatherme Bad Füssing</a></li>
                </ul>
                </div>
              </div>
            </div>
        </div>
        
      <div class="roompictures-gridcontainer">
        <div class="grid-item"><a href="https://www.hallstatt.net/ueber-hallstatt/?source=nav"><img class="roompicture" src="res/img//index/Hallstatt.jpg" alt="Seewanderung"></a></div>
        <div class="grid-item roompictures-text">Tagesausflüge sind wie Fenster in die Seele unserer bezaubernden Region, eine Gelegenheit,
          in nur wenigen Stunden faszinierende Höhepunkte und verborgene Schätze zu entdecken.
          <div class="listparent">
          <ul>
            <li><a class="indexlink" href="https://www.oberoesterreich.at/aktivitaeten.html">Region Oberösterreich</a></li>
            <li><a class="indexlink" href="https://www.salzburgerland.com/de/regionen/">Region Salzburg</a></li>
          </ul>
        </div>
        </div>
        <div class="grid-item"><a href="https://www.bergwelten.com/t/w/16727"><img class="roompicture" src="res/img/index/Nixenfall.jpg" alt="Bergwanderung"></a></div>
      </div>
    </div>
    </main>
    
    <footer>
      <?php include_once "inc/footer.php";?>
    </footer>
    
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
