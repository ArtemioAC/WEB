<?php
require 'conexion.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM Persona WHERE id=:id';
$statement = $tmp->prepare($sql);
$statement->execute([':id' => $id ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['nombre'])  && isset($_POST['apellido']) && isset($_POST['sexo'])
    && isset($_POST['edad']) && isset($_POST['direccion'])) {
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $sexo = $_POST['sexo'];
  $edad = $_POST['edad'];
  $direccion = $_POST['direccion'];
  
  $sql = 'UPDATE Persona SET nombre=:nombre, apellido=:apellido, sexo=:sexo, edad=:edad,
            direccion=:direccion WHERE id=:id';
  $statement = $tmp->prepare($sql);
  if ($statement->execute([':nombre' => $nombre, ':apellido' => $apellido, ':sexo' => $sexo, 
    ':edad' => $edad, ':direccion' => $direccion, ':id' => $id])) {
    header("Location: /");
  }
}
 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Actualizar persona</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input value="<?= $person->nombre; ?>" type="text" name="nombre" id="nombre" class="form-control">
        </div>
        <div class="form-group">
          <label for="apellido">Apellido</label>
          <input type="text" value="<?= $person->apellido; ?>" name="apellido" id="apellido" class="form-control">
        </div>
        <?php if ($person->sexo == 0 ) 
                    $tipo = "Mujer";
                    else $tipo = "Hombre"?>
        <div class="form-group">
          <label for="sexo">Sexo</label> <br>
          <input type="radio" value="<?= $tipo; ?>" name="sexo" id="sexo" value="1" checked> Hombre<br>
          <input type="radio" value="<?= $tipo; ?>" name="sexo" id="sexo" value="0" checked> Mujer<br>
        </div>
        <div class="form-group">
          <label for="edad">Edad</label>
          <input type="number" value="<?= $person->edad; ?>" name="edad" id="edad" class="form-control">
        </div>
        <div class="form-group">
          <label for="direccion">Direccion</label>
          <input type="text" value="<?= $person->direccion; ?>" name="direccion" id="direccion" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Update person</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>