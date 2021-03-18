<?php
include '../helpers/utilities.php';
include 'serviceSession.php';

    if(isset($_POST["HeroName"]) && isset($_POST["HeroDescription"]) && isset($_POST["CompanyId"])){

        $hero = ["name" => $_POST["HeroName"],"description"=>$_POST["HeroDescription"],"companyId"=>$_POST["CompanyId"]];
        Add($hero);

        header("Location: ../index.php");
    }

?>