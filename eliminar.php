<?php
require 'conexion.php';
$id = $_GET['id'];
$sql = 'DELETE FROM Persona WHERE id=:id';
$statement = $tmp->prepare($sql);
if ($statement->execute([':id' => $id])) {
  header("Location: /");
}
