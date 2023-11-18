<?php

require_once "./../server/config.php";
mb_internal_encoding("UTF-8");
mb_http_output("UTF-8");
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql_query = "SELECT * FROM service WHERE id=$id";
    $result = mysqli_query($con,$sql_query);
    $service = $result-> fetch_assoc();
}
?>

<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <link rel="icon" href="images/fevicon.png" type="image/gif" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Mygarage</title>


  <!-- bootstrap core css -->
  <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.css" /> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet"> <!-- range slider -->

  <!-- font awesome style -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<body class="sub_page">

  <div class="hero_area">
  <!-- header section --> 
  <header class="header_section">
    <?php include ("header.php"); ?>
    <div class="header_bottom">
        <div class="container-fluid">
          <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="index.php">
              <span>
                Mygarage
              </span>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ">
                <li class="nav-item">
                  <a class="nav-link" href="index.php">Accueil</a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
</header>
  <!-- end header section --> 
  <!-- product section -->
  <section class="product_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <div class="col-lg-9 col-lg-4">
          <div class="box">
            <div class="img-box">
              <img src="images/<?php echo $service["img"];?>" alt="">
            </div>
            <div class="detail-box">
              <h5>
              <?php echo $service["title"];?>
              </h5>
              <div class="product_info">
                <p>
                    <?php echo $service["descr_long"];?></p>
              </div>
            </div>
            <div class="btn_box">
                <a href="" class="view_more-link">
                Prendre Rendez-vous
                </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end product section -->
  <!-- footer section -->
  <?php include ("footer.php"); ?>
  <!-- end footer section -->
  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>


</body>

</html>