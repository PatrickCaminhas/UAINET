<?php
//pagina para conexão com o banco de dados
$host = "localhost";
$user = "root"; 
$password = "";
$dbname = "uainet";

$conexao = mysqli_connect('localhost','root',"","uainet") or die('Não foi possivel conectar');


$mysqli = new mysqli($host,$user,$password,$dbname);

?>