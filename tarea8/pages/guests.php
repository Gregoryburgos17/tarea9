<?php

include('header.php');
include('../libs/utils.php');

Connection::testconnection();

if($_POST){

    foreach($_POST as &$value){
        $value = addslashes($value);
    }        
    
    extract($_POST);

    $sql = "insert into guests(nombre, apellido, pasaporte, correo, telefono, pais, firstdate, lastdate, room) values('{$nombre}','{$apellido}','{$pasaporte}','{$email}','{$telefono}','{$pais}','{$firstdate}','{$seconddate}',{$room})";
    Connection::execute($sql);
    header("Location:index.php");


}

?>

<section>
  <div class="jumbotron shadow-sm p-3 mb-5 bgcustomlgblue">
    <h1 class="display-4">Registrarse como huesped</h1>
    <hr class="my-4">
    <p>Completa los datos del formulario para registrarte como huesped</p>
  </div>
</section>

<div class="container" style="padding-bottom: 40px;">
    <form method="POST">
    <div class="form-group">
        <label for="nombrelabel">Nombre</label>
        <input required type="text" class="form-control" id="nombre" name="nombre">
    </div>
    <div class="form-group">
        <label for="apellidolabel">Apellido</label>
        <input required type="text" class="form-control" id="apellido" name="apellido">
    </div>
    <div class="form-group">
        <label for="pasaportelabel">Pasaporte</label>
        <input required type="text" class="form-control pasaporte" id="pasaporte" name="pasaporte" placeholder="RD0101010">
    </div>
    <div class="form-group">
        <label for="correolabel">Correo</label>
        <input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="name@example.com">
    </div>
    <div class="form-group">
        <label for="telefonolabel">Telefono</label>
        <input required type="text" class="form-control telefono" id="telefono" name="telefono" placeholder="8091231234">
    </div>
    <div class="form-group">
        <label for="paislabel">Pais de origen</label>
        <input required type="text" class="form-control" id="pais" name="pais" placeholder="Republica Dominicana">
    </div>
    <div class="form-group">
        <label for="firstdatelabel">Fecha de llegada</label>
        <input required type="date" class="form-control" id="firstdate" name="firstdate" min="<?php echo(date('Y-m-d')); ?>" onchange="DateInput();">
    </div>
    <div class="form-group">
        <label for="lastdatelabel">Fecha de salida</label>
        <input required type="date" class="form-control" id="seconddate" name="seconddate">
    </div>
    <div class="form-group">
        <label for="roomlabel">Numero de habitacion</label>
        <input required type="text" class="form-control room" id="room" name="room" placeholder="301">
    </div>
    <button type="submit" class="btn btn-primary">Registrar</button>
    </form>
</div>

<script>
    $(document).ready(function(){
        $('.pasaporte').mask('AA0000000');
        $('.room').mask('000');
        $('.telefono').mask('000000000000000');
    });
</script>
<script src="../assets/js/jquery.mask.min.js"></script>
<script src="../assets/js/guests.js"></script>

<?php include('footer.php');