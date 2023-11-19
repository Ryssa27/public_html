<?php

require_once "./../../server/config.php";

   if(isset($_POST["txt_day"])) {           
        $status = mysqli_real_escape_string($con,$_POST['txt_status']);
        $time_open_am = mysqli_real_escape_string($con,$_POST['txt_time_open_am']);
        $time_close_am = mysqli_real_escape_string($con,$_POST['txt_time_close_am']);
        $time_open_pm = mysqli_real_escape_string($con,$_POST['txt_time_open_pm']);
        $time_close_pm = mysqli_real_escape_string($con,$_POST['txt_time_close_pm']);
        $day = mysqli_real_escape_string($con,$_POST['txt_day']);

        if (empty($day) || empty($status)) {
            $errormessage= "Tout les champs doivent être renseignés";
            exit;
        }
        $sql="UPDATE schedule 
                SET status='$status', time_open_am='$time_open_am', time_close_am='$time_close_am', time_open_pm='$time_open_pm',time_close_pm='$time_close_pm' 
                WHERE day='$day'";
        $result = mysqli_query($con,$sql);
        if (!$result) {
            $errormessage= "Requete invalide";
            exit;
        }
        $successmessage="Horaire modifié avec succès";

    }   
header("location: ./../profil.php");
exit; 

?>
