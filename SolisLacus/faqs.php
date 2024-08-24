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
    <title>FAQs</title>
  </head>
  
  <body>
    <header>
        <?php
          $currentPage = 'infos';
          include_once "inc/navbar.php";
          include_once "inc/booking_button.php";
        ?>
    </header>
    
    <main>
      <h1>Häufig gestellte Fragen</h1>
      <h2>Hier finden Sie wichtige Informationen rund um Ihren Urlaub im Solis Lacus in Seedorf.</h2>
        
      <!-- Accordion for displaying the FAQs -->
      <div class="accordion" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
              Muss man eine Anzahlung zur Sicherstellung der Buchung leisten? Welche Zahlungsmittel sind erlaubt?
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                Zur Sicherstellung der Buchung genügt die Hintelegung der Kreditkarte, eine Anzahlung ist nicht notwendig.
                Weiters erlauben wir die Zahlung in bar, Bankomat, Visa, Eurocard, American Express, Diners Club und JCB.
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              Wie sind die Check-in und Check-Out Zeiten?
            </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              Check-out ist bis 11.00 Uhr und Check-in ab 14.00 Uhr möglich.
              Selbstverständlich nehmen wir Ihr Gepäck außerhalb dieser Zeiten an und bewahren es kostenfrei für Sie auf.
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              Wie sind die Frühstückszeiten?
            </button>
          </h2>
          <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              Unser Frühstücksbuffet steht Ihnen täglich von 6:00 Uhr bis 10:00 Uhr zu Verfügung.
              Teilen Sie uns gerne Ihre individuellen Wünsche mit, wir sind stets bemüht, Ihren Aufenthalt zu einem unvergesslichen Erlebnis zu machen!
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
              Sind Haustiere erlaubt?
            </button>
          </h2>
          <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              Haustiere sind in unserem Hotel gegen eine Gebühr von 30€ pro Nacht willkommmen, auf Anfrage bieten wir auch die Möglichkeit eines Tagessitters an.
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
              Gibt es Parkmöglichkeiten?
            </button>
          </h2>
          <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              Für unsere Gäste können wir 20 PKW Parkplätze anbieten. Sollten Sie mit einem größeren Vehikel (Wohnwagen etc.) anreisen, bitten wir Sie, uns Bescheid zu geben,
              damit wir uns um einen Parkplatz kümmen können.
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
              Wie komme ich zum Hotel Solis Lacus?
            </button>
          </h2>
          <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              Das Hotel Solis Lacus befindet sich 20 Gehminuten vom Bahnhof Seedorf entfernt. Auf Wunsch holen wir Sie selbstverständlich mit unserem Shuttle ab.<br>
              Reisen Sie mit dem Auto an? Bitte benutzen sie <a class="impressumlink" href="https://google.at/maps">Google Maps</a> für Ihre Routenplanung.
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
              Registrierung
            </button>
          </h2>
          <div id="collapseSeven" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              Die <a href="login.php">Registrierung</a> ermöglicht eine personalisierte Buchungserfahrung, sichere Anmeldung und effiziente Kommunikation über Ihre Buchungen. Ihre Daten werden geschützt und gemäß den Datenschutzbestimmungen behandelt.
              Die Registrierung hilft uns, Ihnen einen qualitativ hochwertigen Service anzubieten.
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
              Aktuelles & Newsletter
            </button>
          </h2>
          <div id="collapseEight" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              Auf unserer Seite für <a href="news.php">Aktuelles</a> finden Sie alle Neuigkeiten, Angebote und Gewinnspiele.
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseEight">
              Ich habe meine Zugangsdaten vergessen! Was soll ich tun?
            </button>
          </h2>
          <div id="collapseNine" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              Keine Sorge! Falls Sie Ihre Zugangsdaten vergessen haben, schreiben Sie dem Administrator eine Nachricht per <a class="impressumlink" href="mailto:sonne@solislacus.at">E-mail</a>. Dieser wird sich zeitnah darum kümmern.
              Bei weiteren Problemen stehen wir Ihnen gerne zur Unterstützung zur Verfügung.
            </div>
          </div>
        </div>
      </div>
    </main>
    
    <footer>
          <?php include_once "inc/footer.php";?>
    </footer>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
