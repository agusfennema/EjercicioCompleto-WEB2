<?php
require_once 'app/pets.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'listar'; // accion por defecto
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

// listar    ->    showPets();
// agregar   ->    addPet();
// eliminar/:ID  -> removePet($id); 
// finalizar/:ID  -> finishPet($id);

// parsea la accion para separar accion real de parametros
$params = explode('/', $action);

switch ($params[0]) {
    case 'listar':
        showPets();
        break;
    case 'agregar':
        addPet();
        break;
    case 'eliminar':
        removePet($params[1]);
        break;
    case 'finalizar':
        finishPet($params[1]);
        break;
    default: 
        echo "404 Page Not Found";
        break;
}
