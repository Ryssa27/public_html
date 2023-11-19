
<?php

require_once "./../server/config.php";


if(isset($_POST['but_submit'])){
    $is_known=false;
    $is_success=false;
    $uname = mysqli_real_escape_string($con,$_POST['txt_uname']);
    $password = sha1(mysqli_real_escape_string($con,$_POST['txt_pwd']));
    $firstname = mysqli_real_escape_string($con,$_POST['txt_firstname']);
    $lastname = mysqli_real_escape_string($con,$_POST['txt_lastname']);

    $sql_query_exist =sprintf("SELECT * from users WHERE userid='".$uname."'");
    $result = mysqli_query($con,$sql_query_exist);
    $user = $result->fetch_assoc();
    if (!$user){
            $sql_query =sprintf("INSERT INTO users (userid,password, lastname, firstname, access) 
            VALUES ('$uname','$password','$firstname','$lastname','client')");
            $result = mysqli_query($con,$sql_query);
            $is_success=true;
    }else{
            $is_known=true;
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
        <title>Signup Page</title>
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
                        <div class="py-3" id="div_login">
                            <h1 class="py-3">Créer un compte</h1>
                            <?php if ($is_known): ?>
                                <div class="py-2">
                                    <em>Utilisateur déjà enregistré</em>
                                </div>
                            <?php endif; ?>
                            <?php if ($is_success): ?>
                                <div class="py-2">
                                    <em >Utilisateur créé, vous pouvez vous connecter</em>
                                    <a href="login.php">Se connecter</a>
                                </div>
                            <?php endif; ?>
                            <div class="form-group mb-3">
                                <input type="email" class="form-control" id="txt_uname" name="txt_uname" placeholder="email"/>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" id="txt_firstname" name="txt_firstname" placeholder="Prénom" required/>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" id="txt_lastname" name="txt_lastname" placeholder="Nom" required/>
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" class="form-control" id="txt_pwd" name="txt_pwd" placeholder="Mot de passe" required/>
                            </div>
                            <div class="py-3">
                                <input type="submit" value="S'inscrire" name="but_submit" id="but_submit" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>  
    </body>
</html>

