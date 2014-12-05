<?php
require ('usuario.php');
require('archivobd.php');
require('header.php');
$usuario=new Usuario();
//$usuario->createUsuario('Arturo','Tovar','Arana','1');
//$usuario->readUsuarioG();
//$usuario->readUsuarioS(3);
//$usuario->updateUsuario(3,'Dulce','Reyna','Ortiz','3');
//$usuario->deleteUsuario(10);
if(isset($_POST['submit'])){
switch($_POST['submit']){
case "Alta":
echo "<div class=\"alert alert-success\" role='alert'>";
echo "<br><h4> <center>Exito,el registro se ha insertado correctamente</h3>";
echo"</div>";
$usuario->createUsuario("$_POST[nombre]","$_POST[apaterno]","$_POST[amaterno]",$_POST['nivel']);
echo"<meta http-equiv='refresh' content='1' url='proyecto/TestUsuario.php' >";
break;
case "Modificar";
echo "<div class=\"alert alert-warning\" role='alert'>";
echo "<br><h4><center>El registro se modifico correctamente</center></h4>";
echo"</div>";
$usuario->updateUsuario($_POST['idm'],"$_POST[nombre]","$_POST[apaterno]","$_POST[amaterno]",$_POST['nivel']);
echo"<meta http-equiv='refresh' content='1' url='proyecto/TestUsuario.php'>";
break;
case "Borrar":
echo "<div class=\"alert alert-danger\" role='alert'>";
echo "<br><h4><center>El registro ha sido eliminado</center></h4>";
echo"</div>";
$usuario->deleteUsuario($_POST['ide']);
echo"<meta http-equiv='refresh' content='1' url='proyecto/TestUsuario.php'>";
break;
case "Buscar":
echo "<div class=\"alert alert-info\" role='alert'>";
echo "<br><h4><center>B&uacutesqueda de Usuarios</center></h4>";
echo"</div>";
$usuario->readUsuarioS($_POST['idb']);
break;
}
}
echo"<form name='alumno' action='TestUsuario.php' method='POST' class='form' id='form'>
<div class='form-group'>
<table border=0 align=center>
<tr><td colspan='3'><h4><font color='#086A87'><center>FORMULARIO DE USUARIOS </center></font></h4></td></tr>
<tr>
<td colspan='2'>Nombre(s):</td>
<td><input type='text' name='nombre' class='form-control'></td></tr>
<tr><td colspan='2'>Apellido Paterno:</td>
<td><input type='text' name='apaterno' class='form-control'></td></tr>
<tr><td colspan='2'>Apellido Materno:</td>
<td><input type='text' name='amaterno' class='form-control'></td>
</tr>
<tr><td colspan='2'>Nivel:</td>
<td><select class='form-control' name='nivel'>
<option value='1'>Administrador</option>
<option value='2'>Maestro</option>
<option value='3'>Alumno</option>
</select>
</td></tr>
<tr><td colspan='3' align='right'><br><input name='submit' type='submit' value='Alta' class='btn btn-success '></td>
</tr>
<tr><td><br></td></tr>
<tr><td>Clave : </td>
<td> <input type='text' name='idm' class='form-control'></td>
<td align='right'><input type='submit' name='submit' value='Modificar' class='btn btn-warning ' ></td></tr>
<tr><td><br></td><tr>
<tr>
<td>Clave:</td>
<td> <input type='text' name='ide' class='form-control'></td>
<td align='right'><input type='submit' value='Borrar' name='submit' class='btn btn-danger' ></td></tr>
<tr><td><br></td></tr>
<td>Clave de b&uacute;squeda: </td>
<td>
<input type='text' name='idb' class='form-control'>
</td>
<td align='right'><input type='submit' name='submit' value='Buscar' class='btn btn-info'></td></tr>";
echo"</div></table>";
echo"</form><br>";
$usuario->readUsuarioG();
require('footer.php');
?>