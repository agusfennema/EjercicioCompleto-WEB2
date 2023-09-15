<?php
require_once './app/db.php';

function showPets() {
    require 'templates/header.php';

    // obtengo las tareas
    $pets = getPets();

    require 'templates/form_alta.php';
    ?>

    <ul class="list-group">
    <?php foreach($pets as $pet) { ?>
        <li class="list-group-item item-task <?php if($pet->finalizada) echo 'finalizada' ?>">
            <div>
                <b><?php echo $pet->nombre ?></b> | (Prioridad <?php echo $pet->prioridad ?>)
            </div>
            <div class="actions">
                <?php if(!$pet->finalizada) { ?> <a href="finalizar/<?php echo $pet->id ?>" type="button" class='btn btn-success ml-auto'>Finalizar</a> <?php } ?>
                <a href="eliminar/<?php echo $pet->id ?>" type="button" class='btn btn-danger ml-auto'>Borrar</a>
            </div>
        </li>
    <?php } ?>
    </ul>

    <?php
    require 'templates/footer.php';
}

function addPet() {
    // TODO: validacion de datos

    // obtengo los datos del usuario
    $name = $_POST['name'];
    $description = $_POST['description'];
    $priority = $_POST['priority'];

    // inserto en la DB
    $id = insertPet($name, $description, $priority);

    if ($id) {
        // redirigo la usuario a la pantalla principal
        header('Location: ' . BASE_URL);
    } else {
        echo "Error al insertar la mascota";
    }
}

function removePet($id) {
    deletePet($id);
    header('Location: ' . BASE_URL);
}

function finishPet($id) {
    updatePet($id);
    header('Location: ' . BASE_URL);
}