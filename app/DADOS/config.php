<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "acai_bd";

$conexao = new mysqli($host, $user, $pass, $dbname);

if($conexao->connect_errno){
  echo "falha ao conectar: (" . $conexao->connect_errno . ")" . $conexao->connect_errno;
}else{
  echo "conectado com sucesso";
}
?>