<?php
session_start();
?>

<html>
<header class="header_section">
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg custom_nav-container">
        <a class="navbar-brand" href="index.php">
          <span>
            pelleClock
          </span>
        </a>
        <div class="" id="">
          <div class="custom_menu-btn">
            <button onclick="openNav()">
              <span class="s-1"> </span>
              <span class="s-2"> </span>
              <span class="s-3"> </span>
            </button>
            <div id="myNav" class="overlay">
              <div class="overlay-content">
                <a href="index.php">Home</a>
                <?php
                    $pippo = $_SESSION["loggato"];
                    
                if($_SESSION["loggato"]==false){  
                    echo "<a href='registrazione.php'>sign in</a>";
                    echo "<a href='login.php'>log in</a>";
                }else {                     //se sono loggato carrello / account
                    echo "<a href='pagCarrello.php'>carrello</a>";
                    echo "<a href='logout.php'>logout</a>";
                    
                }
                ?>
              </div>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </header>
</html>