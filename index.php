<?php
require 'conexion.php';
$sql = 'SELECT * FROM Persona';
$statement = $tmp->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
<?php require 'encabezado.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Todas las Personas</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Sexo</th>
          <th>Edad</th>
          <th>Direccion</th>
        </tr>
        <?php foreach($people as $person): ?>
          <tr>
            <td><?= $person->id; ?></td>
            <td><?= $person->nombre; ?></td>
            <td><?= $person->apellido; ?></td>
            <?php if ($person->sexo == 0 ) 
                    $tipo = "Mujer";
                    else $tipo = "Hombre"?>
            <td><?= $tipo ?></td>
            <td><?= $person->edad; ?></td>
            <td><?= $person->direccion; ?></td>
            <td>
              <a href="modificar.php?id=<?= $person->id ?>" class="btn btn-info">Editar</a>
              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="eliminar.php?id=<?= $person->id ?>" class='btn btn-danger'>Borrar</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
