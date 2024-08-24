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
      <title>News</title>
    </head>
    
    <body>
    <header>
        <?php
        $currentPage = 'news';
        include_once "inc/navbar.php";
        include_once "inc/booking_button.php";
        include_once "config/dbconnection.php";
        ?>
    </header>
    
    <main>
      <h1>News und Aktuelles</h1>

        <h2>Hier finden sie alle Neuigkeiten rund ums Solis Lacus.</h2><br><br>

        <!-- When logged in as admin -> display the menu for uploading pictures and blogposts -->
        <?php
          if(isset($_SESSION['loggedin']) && $_SESSION['role'] === 'admin'){
            include_once "inc/news_admin.php";
          }
        ?>

        <?php
          // Displaying the blogposts
          $sql = "SELECT * FROM blogposts ORDER BY upload_date DESC";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              // Output data of each row
              while($row = $result->fetch_assoc()) {
                  echo '<div class="news-body">';
                  echo '<p id="news-head">News-Beitrag vom: ' . date("d.m.Y H:i:s", strtotime($row["upload_date"])) . '</p>'; // Format the date and time properly
                  echo '<img id="news-thumbnail" src="' . $row["picturepath"] . '" alt="' . $row["picturename"] . '"><br>'; // echo the uploaded thumbnail
                  echo $row["content"] . '<br><br>'; // echo the text of the blogpost
                  echo '</div>';
              }
          } else {
              echo '<div class ="blogFail">Es sind noch keine Blog-Einträge vorhanden!</div>';
          }
          $conn->close();
        ?>
        <br><br><br><br>

    </main>
        
      <footer>
        <?php include_once "inc/footer.php"; ?>
      </footer>
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
    </html>
