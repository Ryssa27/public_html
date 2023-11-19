<?php

require_once "./../../server/config.php";
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql_query = "DELETE FROM annonce WHERE id=$id";
    $result = mysqli_query($con,$sql_query);
}
header("location: ./../profil.php");
exit;

?>