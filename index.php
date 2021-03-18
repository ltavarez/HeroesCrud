<?php
include 'helpers/utilities.php';
include 'heroes/serviceSession.php';
include 'layout/layout.php';

$heroes = GetList();




?>

<?php echo printHeader(true); ?>

<div class="row">
    <div class="col-md-10"></div>
    <div class="col-md-2">

        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#nuevo-heroe-modal">
            Nuevo heroe
        </button>

    </div>
</div>

<div class="row">

    <?php if (count($heroes) == 0) : ?>

        <h2>No hay heroes registrados</h2>

    <?php else : ?>

        <?php foreach ($heroes as $key => $hero) : ?>

            <div class="col-md-3">

                <div class="card">

                    <div class="card-body">
                        <h5 class="card-title"><?= $hero['name'] ?></h5>
                        <p class="card-text"><?= $hero['description'] ?></p>
                        <p class="card-text"><?php echo $companies[$hero["companyId"]] ?></p>
                    </div>

                    <div class="card-body">
                        <a href="heroes/edit.php?id=<?= $hero['id']?>" class="btn btn-primary">Editar</a>
                        <a href="#" class="btn btn-danger">Eliminar</a>
                    </div>
                </div>

            </div>

        <?php endforeach; ?>



    <?php endif; ?>



</div>

<div class="modal fade" id="nuevo-heroe-modal" tabindex="-1" aria-labelledby="nuevoHeroeLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nuevoHeroeLabel">Nuevo heroe</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="heroes/add.php" method="POST">
                    <div class="mb-3">
                        <label for="hero-name" class="form-label">Nombre del heroe</label>
                        <input name="HeroName" type="text" class="form-control" id="hero-name">

                    </div>
                    <div class="mb-3">
                        <label for="hero-description" class="form-label">Descripcion</label>
                        <input name="HeroDescription" type="text" class="form-control" id="hero-description">
                    </div>
                    <div class="mb-3">
                        <label for="hero-company" class="form-label">Compañia</label>
                        <select name="CompanyId" class="form-select" id="hero-company">
                            <option value="">Seleccione una opcion</option>
                            <?php foreach ($companies as $value => $text) : ?>

                                <option value="<?php echo $value; ?>"> <?= $text ?> </option>

                            <?php endforeach; ?>
                        </select>
                    </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php echo printFooter(true); ?>

