<?php

require_once "./../../server/config.php";   

$errormessage = "";
$successmessage = "";

if(isset($_POST['but_submit_user'])){

    $uname = mysqli_real_escape_string($con,$_POST['txt_uname']);
    $firstname = mysqli_real_escape_string($con,$_POST['txt_firstname']);
    $lastname = mysqli_real_escape_string($con,$_POST['txt_lastname']);

    if (empty($uname) || empty($firstname) || empty($lastname)) {
        $errormessage= "Tout les champs doivent être renseignés";
        exit;
    }
    $pass=sha1($uname);
    $sql="INSERT INTO users (userid, password, lastname, firstname, access) "   
        ."VALUES ('$uname','$pass','$lastname','$firstname','employe')";
        
    $result = mysqli_query($con,$sql);
    if (!$result) {
        $errormessage= "Requete invalide";
        exit;
    }
    $successmessage="Utilisateur ajouté avec succès";

    header("location: ./../profil.php");
    exit;

}  

?>