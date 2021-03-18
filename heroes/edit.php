<?php
include '../layout/layout.php';
include '../helpers/utilities.php';
include 'serviceSession.php';

$hero = null;
if (isset($_GET["id"])) {

    $hero = GetById($_GET["id"]);

    if(isset($_POST["HeroName"]) && isset($_POST["HeroDescription"]) && isset($_POST["CompanyId"])){
        $hero = ["id"=> $_GET["id"], "name" => $_POST["HeroName"],"description"=>$_POST["HeroDescription"],"companyId"=>$_POST["CompanyId"]];
       
        Edit($hero);

        header("Location: ../index.php");
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>

<body>

    <?php echo printHeader() ?>

    <?php if ($hero == null && count($hero) == 0) : ?>
        <h2>No existe este heroe</h2>
    <?php else : ?>

        <form action="edit.php?id=<?= $hero["id"]?>" method="POST">
            <div class="mb-3">
                <label for="hero-name" class="form-label">Nombre del heroe</label>
                <input name="HeroName" value="<?php echo $hero["name"]?>" type="text" class="form-control" id="hero-name">

            </div>
            <div class="mb-3">
                <label for="hero-description" class="form-label">Descripcion</label>
                <input name="HeroDescription" value="<?php echo $hero["description"]?>" type="text" class="form-control" id="hero-description">
            </div>
            <div class="mb-3">
                <label for="hero-company" class="form-label">Compañia</label>
                <select name="CompanyId" class="form-select" id="hero-company">
                    <option value="">Seleccione una opcion</option>
                    <?php foreach ($companies as $value => $text) : ?>

                        <?php if($value == $hero["companyId"]):?>
                            <option selected value="<?php echo $value; ?>"> <?= $text ?> </option>
                         <?php else :?>
                            <option value="<?php echo $value; ?>"> <?= $text ?> </option>
                        <?php endif;?>   

                        

                    <?php endforeach; ?>
                </select>
            </div>
            <a href="../index.php" class="btn btn-warning">Volver atras </a>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

    <?php endif; ?>




    <?php echo printFooter() ?>

</body>

</html>