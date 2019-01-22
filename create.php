<?php
require 'conexion.php';
$message = '';
if (isset ($_POST['nombre'])  && isset($_POST['apellido']) && isset($_POST['sexo']) && isset($_POST['edad']) && isset($_POST['direccion'])) {
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $sexo = $_POST['sexo'];
  $edad = $_POST['edad'];
  $direccion = $_POST['direccion'];

  $sql = 'INSERT INTO Persona(nombre, apellido, sexo, edad, direccion) VALUES(:nombre, :apellido, :sexo, :edad, :direccion )';
  $statement = $tmp->prepare($sql);
  if ($statement->execute([':nombre' => $nombre, ':apellido' => $apellido, ':sexo' => $sexo, ':edad' => $edad, ':direccion' => $direccion])) {
    $message = 'data inserted successfully';
  }
}
 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Create a person</h2>
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
          <input type="text" name="nombre" id="nombre" class="form-control">
        </div>
        <div class="form-group">
          <label for="apellido">Apellido</label>
          <input type="text" name="apellido" id="apellido" class="form-control">
        </div>
        <div class="form-group">
          <label for="sexo">Sexo</label><br>
          <input type="radio" name="sexo" id="sexo"  value="1" checked> Hombre<br> 
          <input type="radio" name="sexo" id="sexo"  value="0" > Mujer <br>
        </div>
        <div class="form-group">
          <label for="edad">Edad</label> <br>
          <input type="number" name="edad" id="edad" class="form-control">
        </div>
        <div class="form-group">
          <label for="apellido">Direccion</label>
          <input type="text" name="direccion" id="direccion" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Create a person</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>