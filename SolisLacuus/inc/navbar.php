<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container">
    <a class="navbar-brand" href="index.php">
      <div class="logofont">
      <img class="logo" src="res/img/logo.svg" alt="Solis Lacus Logo"> Solis Lacus
      </div>
    </a>



    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link
      <?php if ($currentPage === 'index') { echo 'active'; } ?>" aria-current="page" href="index.php">Home </a>
        </li>
        <li class="nav-item">
          <a class="nav-link
      <?php if ($currentPage === 'news') { echo 'active'; } ?>" href="news.php">News </a>
        </li>
        <li class="nav-item dropdown">
        <button
          class="nav-link dropdown-toggle <?php if ($currentPage === 'zimmer') { echo 'active'; } ?>"
          type="button"
          data-bs-toggle="dropdown"
          aria-expanded="false"
          onkeydown="if(event.key === 'Enter' || event.key === ' ') { this.click(); }"
        >
          Zimmer
        </button>
          <ul class="dropdown-menu">
            <li>
              <a class="dropdown-item" href="zimmer.php#einzelzimmer">Einzelzimmer</a>
            </li>
            <li>
              <a class="dropdown-item" href="zimmer.php#doppelzimmer">Doppelzimmer</a>
            </li>
            <li>
              <a class="dropdown-item" href="zimmer.php#luxuszimmer">Luxus-Doppelzimmer</a>
            </li>
          </ul>
        <li class="nav-item">
          <a class="nav-link
        <?php if ($currentPage === 'infos') { echo 'active'; } ?>" href="faqs.php">Infos </a>
        </li>
        <li class="nav-item">
          <a class="nav-link
        <?php if ($currentPage === 'account') { echo 'active'; } ?>" href="account.php">Mein Account </a>
        </li>
        <li class="nav-item">
          <a class="nav-link
        <?php if ($currentPage === 'buchen') { echo 'active'; } ?>" href="buchen.php">Zimmer buchen </a>
        </li>
        <?php
          if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) { // display a logout item in the navbar, if logged in
            echo '
              <li class="nav-item">
              <a class="nav-link active" href="inc/logout.php">Logout</a>
            ';
          }
        ?>
    </div>
  </div>
</nav>
