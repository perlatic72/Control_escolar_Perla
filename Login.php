<?php
class Login{
private $usuario;
private $contasena;
public function Valida($usuario,$contasena){
//echo "El usuario yy contasena son $usuario, $contasena";
$sql1="SELECT Nivel FROM usuario WHERE Usuario='$usuario' AND contasena='$contasena'";
$res=mysql_query($sql1) or die("Error en consulta de nivel usuario".mysql_error());
while($field=mysql_fetch_array($res)){
$nivel=$field['Nivel'];
if($nivel==1){
print"<meta http-equiv='refresh'
content='0;
url=bienvenida.php'>";
exit;
}
if($nivel==2){
print"<meta http-equiv='refresh'
content='0;
url=bienvenida2.php'>";
exit;
}
}
}
}
?>