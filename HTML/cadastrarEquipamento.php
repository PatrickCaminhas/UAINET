<?php

//variaveis para o host ou o hospedeiro, para o usuario do SGBD, senha do SGBD e o BD, usei de teste para metodo PDO
$host = "localhost";
$user = "root"; 
$password = "";
$dbname = "uainet";

//Variaveis que pegam os atributos da pagina de cadastro, as tags em '' são os nomes dos campos de texto
$serie = strtoupper(trim($_POST['num_serie']));
$modelo = strtoupper(trim($_POST['modelo']));
$marca = strtoupper(trim($_POST['marca']));
$valor = trim($_POST['valor']);
$antenas = ($_POST['antenas']);

// Tratamento de Tamanhos
if (strlen($serie) > 10){
  echo"<script language='javascript' type='text/javascript'>alert('Campo Serial Deve ter no máximo 10 carcteres!');window.location.href='cadastroEquipamento.php';</script>";
  die();
}
if (strlen($modelo) > 20){
  echo"<script language='javascript' type='text/javascript'>alert('Campo Modelo Deve ter no máximo 20 carcteres!');window.location.href='cadastroEquipamento.php';</script>";
  die();
}
if (strlen($marca) > 15){
  echo"<script language='javascript' type='text/javascript'>alert('Campo Marca Deve ter no máximo 15 carcteres!');window.location.href='cadastroEquipamento.php';</script>";
  die();
}
// Tratamento de Formatações
if (str_contains($valor, ' ')){
  echo"<script language='javascript' type='text/javascript'>alert('Campo Valor não deve ter espaços!');window.location.href='cadastroEquipamento.php';</script>";
  die();
}

//modo de conexão com banco de dados é o mysqli, os atributos para conexão são o host, usuario, senha e BD
$connect = mysqli_connect('localhost','root',"","uainet");

//se não conectar, mata o script e exibe o erro
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully";

//consulta, vai pegar o dado da tabela Equipamento onde os valores são iguais ao inserido
$query_select_serie= "SELECT num_serie FROM equipamento WHERE num_serie = '$serie'";

// consulta, vai pegar o connect com todas as variaveis pra poder conectar e a consulta
$select_serie = mysqli_query($connect,$query_select_serie);

$array_serie = mysqli_fetch_array($select_serie);

$logarray_serie = $array_serie['num_serie'];

 
  //Se algum dado digitado é vazio ou nulo ele vai usar javascript para abrir uma caixa dizendo que os campos devem ser preenchidos e vai retornar para cadastroEquipamento.
  if($serie == "" ||  $marca == "" ||  $modelo == "" || $valor == "")
  {

    echo"<script language='javascript' type='text/javascript'>alert('Todos os campos devem ser preenchidos!');window.location.href='cadastroEquipamento.php';</script>";

  }
  else
  {
    //logarry recebe se tinha algum valor igual ao digitado no banco de dados e compara com o valor digitado, se tiver ele abre uma caixa dizendo
    if($logarray_serie != NULL and $logarray_serie == $serie)
    {

      echo"<script language='javascript' type='text/javascript'>alert('Já existe um equipamento com este serial');window.location.href='cadastroEquipamento.php';</script>";

      die();

    }
    else
    {
      //Querry para inserção dos dados no banco de dados
    $query = "INSERT INTO equipamento (num_serie,modelo,marca,preco,num_antenas) VALUES ('$serie','$modelo','$marca','$valor', '$antenas')";

    $insert = mysqli_query($connect,$query);

    //verifica se foi inserido, se foi ele exibe caixa dizendo que foi inserido com sucesso, se não avisa que não pode cadastra-lo.
    if($insert)
    {

      echo"<script language='javascript' type='text/javascript'>alert('Equipamento cadastrado com sucesso!');window.location.href='cadastroEquipamento.php'</script>";

    }
    else
    {
      echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar o equipamento');window.location.href='cadastroEquipamento.php'</script>";

    }

  }

  }
