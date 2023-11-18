
<?php

require_once "./../server/config.php";

$is_invalid=false;
if(isset($_POST['but_submit'])){

    $uname = mysqli_real_escape_string($con,$_POST['txt_uname']);
    $password = mysqli_real_escape_string($con,$_POST['txt_pwd']);

    if ($uname != ""){

        //$sql_query = "select count(*) as cntUser from users where username='".$uname."' and password='".$password."'";
        $sql_query =sprintf("SELECT * FROM users WHERE userid='".$uname."'");
        $result = mysqli_query($con,$sql_query);
        $user = $result->fetch_assoc();
        if ($user) {
           if ($_POST['txt_pwd']===$user["password"]){
                $is_invalid=false;
        
                session_start();
                session_regenerate_id();
                $_SESSION['user_id'] = $user["id"];
                header('Location: profil.php');
                exit;
            }else{    
                $is_invalid=true;
            }
        }else{
            $is_invalid=true;
        }
    }

}
?>
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
        <title>Login Page</title>
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
    <body>
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
    <div class="container">
        <div class="heading_container heading_center px-3 py-5">
            <form method="post" action="">
                <div id="div_login">
                    <h1>Login</h1>
                    <?php if ($is_invalid): ?>
                        <em>Invalid login or password</em>
                    <?php endif; ?>
                    <div class="form-group mb-3">
                        <input type="email" class="form-control" id="txt_uname" name="txt_uname" placeholder="Username" value="<?= htmlspecialchars($_POST["txt_uname"] ?? "") ?>" />
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" class="form-control" id="txt_pwd" name="txt_pwd" placeholder="Password"/>
                    </div>
                    <div>
                        <input type="submit" value="Submit" name="but_submit" id="but_submit" />
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php include ("footer.php"); ?>  
    </div>  
    </body>
</html>

