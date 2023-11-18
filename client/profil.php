<?php

require_once "./../server/config.php";

session_start();
if (isset($_SESSION["user_id"])) {
    //$mysqli = require __DIR__."./../server/config.php";
    $sql_query =sprintf("SELECT * FROM users WHERE id={$_SESSION["user_id"]}");
    //$sql = "SELECT * FROM users WHERE id = {$_SESSION["user_id"]}";
    $result = mysqli_query($con,$sql_query);
    //$result = $mysqli->query($sql);
    $user = $result-> fetch_assoc();   
    if ($user["access"]=='admin') {
        $sql_query_users =sprintf("SELECT * FROM users WHERE access='employe'");
        $listusers = mysqli_query($con,$sql_query_users);

        $sql_query_horaire =sprintf("SELECT * FROM schedule");
        $horaires = mysqli_query($con,$sql_query_horaire);
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
        <title>Profil page</title>
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
        <header class="header_section">
            <div class="header_top">
                <div class="container-fluid">
                <div class="top_nav_container">
                    <div class="user_option_box">
                    <a href="/client/functions/logout.php">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span>
                        Se deconnecter
                        </span>
                    </a>
                    </div>
                </div>

                </div>
            </div>
            <div class="header_bottom">
                <div class="container-fluid">
                <nav class="navbar navbar-expand-lg custom_nav-container ">
                    <a class="navbar-brand" href="index.html">
                    <span>
                        Mygarage
                    </span>
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class=""> </span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ">
                        <li class="nav-item active">
                        <a class="nav-link" href="index.php">Accueil<span class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                    </div>
                </nav>
                </div>
            </div>
        </header>
        <!-- end header section -->

        <!-- Management section -->
        
            <?php if (!isset($_SESSION["user_id"]))
            {
                echo "Problème lors de l'identification";
            } else {
                if ($user["access"]=='admin') 
                { 
                    // Table gestion utilisateur
                    echo"
                    <div class='container px-3 py-5'> 
                        <div class='py-5'>
                            <div class='card-header py-3'>
                                <h3 class='text-center'>Tableau de gestion des employés</h3>
                            </div>
                            <div class='card-body'>
                                <table class='table table-border text-center'>
                                        <tr class='bg-light'>
                                            <th> Email </th>
                                            <th> Prénom</th>
                                            <th> Nom </th>
                                            <th> Action </th>
                                        </tr>
                                        <tr>";
                        while($row = mysqli_fetch_array($listusers)) 
                        {
                        echo "
                                    <tr>
                                        <td>$row[userid]</td>
                                        <td>$row[firstname]</td>
                                        <td>$row[lastname]</td>
                                        <td><a href='./functions/deleteuser.php?id=$row[id]' class='btn btn-danger'>Supprimer</a></td>
                                    </tr>
                        ";
                        }
                        echo "
                                    <form method='post' action='./functions/createuser.php'>
                                        <tr class='bg-light'>
                                            <td><input type='email' name='txt_uname' placeholder='Email' required /></td>
                                            <td><input type='text' name='txt_firstname' placeholder='Prénom' required /></td>
                                            <td><input type='text' name='txt_lastname' placeholder='Nom' required /></td>
                                            <td><input class='btn btn-info' type='submit' value='Créer' name='but_submit_user' id='but_submit_user'/></td>
                                        </tr>
                                    </form>
                                </table>
                            </div>
                        </div>    
                    ";
                    
                    
                    // Table gestion horaires
                    echo"
                        <div class='py-5'>
                                <div class='card-header py-3'>
                                    <h3 class='text-center'>Tableau de gestion des horaires</h3>
                                </div>
                            <div class='card-body'>
                                    <table class='table table-border text-center'>
                                        <tr class='bg-light'>
                                            <th style='width:10%;'> Jour </th>
                                            <th style='width:5%;'> Etat </th>
                                            <th style='width:15%;'> Ouverture matin </th>
                                            <th style='width:15%;'> Fermeture matin </th>
                                            <th style='width:15%;'> Ouverture après-midi </th>
                                            <th style='width:15%;'> Fermeture après-midi </th>
                                            <th style='width:15%;'> Action </th>
                                        </tr>
                        ";                                                          
                        while($row = mysqli_fetch_array($horaires)) 
                        {
                            echo "
                                            
                                            <tr class='bg-light'>
                                                <form method='post' action='./functions/updatehours.php'>
                                                    <td hidden><input name='txt_day' value=$row[day] required ></td>
                                                    <td>$row[day]</td>
                                                    <td><select name='txt_status' id='status'>
                            ";
                                                    if ($row["status"] == 'Ouvert') {
                                                        echo"<option value='Ouvert' Selected>Ouvert</option>";
                                                        echo"<option value='Fermé'>Fermé</option>";
                                                    } else {
                                                        echo"<option value='Ouvert'>Ouvert</option>";
                                                        echo"<option value='Fermé' Selected>Fermé</option>";
                                                    }
                            echo "
                                                    <td><input class='text-center' type='text' name='txt_time_open_am' value=$row[time_open_am]  ></td>
                                                    <td><input class='text-center' type='text' name='txt_time_close_am' value=$row[time_close_am]  ></td>
                                                    <td><input class='text-center' type='text' name='txt_time_open_pm' value=$row[time_open_pm]  ></td>
                                                    <td><input class='text-center' type='text' name='txt_time_close_pm' value=$row[time_close_pm]  ></td>
                                                    <td><input class='btn btn-info' type='submit' value='Sauver' name='but_submit_schedule' id='but_submit_schedule'/></td>
                                                </form>
                                            </tr>
                                            

                            ";
                        }
                        echo "
                                    </table>                            
                                </div>
                            </div>
                        
                        ";
                }
            }
            ?>
        
        <!-- End Management section -->
        <?php include ("footer.php"); ?>
    </body>
</html>