  
<?php
require_once "./../server/config.php";

//session_start();
$sql_query_horaire =sprintf("SELECT * FROM schedule");
$horaires = mysqli_query($con,$sql_query_horaire);

?>

  <!-- info section -->
  <section class="info_section ">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="info_contact">
            <h5>
              <a href="" class="navbar-brand">
                <span>
                  MyGarage
                </span>
              </a>
            </h5>
            <p>
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              15 rue des petits champs
              91450 LAVILLE
            </p>
            <p>
              <i class="fa fa-phone" aria-hidden="true"></i>
              +01 1234567890
            </p>
            <p>
              <i class="fa fa-envelope" aria-hidden="true"></i>
              MyGarage@gmail.com
            </p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="info_info">
            <h5>
              Horaires d'ouverture
            </h5>
                                     
            <?php while($row = mysqli_fetch_array($horaires)) 
            {
              $message1 = "";
              $message2 = "";
              $inter = "";
              if ($row['status']== "Ouvert"){
                if ($row['time_open_am'] || $row['time_close_am']) {
                  $message1 = $row['time_open_am']." - ".$row['time_close_am'];
                };
                if ($row['time_open_pm'] || $row['time_close_pm']) {
                  $message2 = $row['time_open_pm']." - ".$row['time_close_pm'];
                };
                if ($message2 && $message2) { $inter= "  /  ";}
                echo "<p> $row[day] : $message1 $inter $message2</p>";
              }else{
                echo "<p> $row[day] : Fermé </p>";
              }
            
            }
            ?>

          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end info_section -->


  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By
        <a href="https://html.design/">Free Html Templates</a>
      </p>
    </div>
  </footer>
  <!-- footer section -->