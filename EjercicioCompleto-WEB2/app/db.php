<?php

function getConection() {
    return new PDO('mysql:host=localhost;dbname=db_mascotas;charset=utf8', 'root', '');
}

/**
 * Obtiene y devuelve de la base de datos todas las tareas.
 */
function getPets() {
    $db = getConection();

    $query = $db->prepare('SELECT * FROM mascotas');
    $query->execute();

    // $tasks es un arreglo de tareas
    $pets = $query->fetchAll(PDO::FETCH_OBJ);

    return $pets;
}

/**
 * Inserta la tarea en la base de datos
 */
function insertPet($name, $description, $priority) {
    $db = getConection();

    $query = $db->prepare('INSERT INTO mascotas (nombre, descripcion, prioridad) VALUES(?,?,?)');
    $query->execute([$name, $description, $priority]);

    return $db->lastInsertId();
}

function deletePet($id) {
    $db = getConection();

    $query = $db->prepare('DELETE FROM mascotas WHERE id = ?');
    $query->execute([$id]);
}

function updatePet($id) {
    $db = getConection();
    
    $query = $db->prepare('UPDATE mascotas SET finalizada = 1 WHERE id = ?');
    $query->execute([$id]);
}