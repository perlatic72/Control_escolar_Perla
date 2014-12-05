<?php
require('header2.php');
require('Login.php');
require('archivobd.php');
$login=new Login();
echo"<form action='TestLogin.php' name='login' id='login' method='POST'>";
echo"<table border=0 align='center' bagroung='#b0c4de'>
<tr><td>";
echo"<center><font face='Comic Sans MS' color='#191970'><h1>SISTEMA CONTROL ESCOLAR</h1></font></center>";
echo"<table border='0'' align='center'>
<tr><td rowspan=2><img src='images/Login.png' width='150px' height='150px'></td>
<td><h5>Usuario:</h5></td>
<td> <input type='text' name='usuario' id='usuario' class='form-control'></td></tr><br>
<td><h5>Password:</h5></td>
<td><input type='text' name='contasena' id='contasena' class='form-control'></td></tr>
<tr><td colspan='3' align='right'><input type='submit' value='Entrar' name='entrar' class='btn btn-primary' ></td></tr>
";
echo"</table></td></tr></table></form>";
if("$_POST[usuario]" and "$_POST[contasena]" !=""){
$login->Valida("$_POST[usuario]","$_POST[contasena]");
}
else{
echo"<center><h4><font color='red'>Los campos estan vacios</font></h4></center>";
}
require('footer.php');
?>
