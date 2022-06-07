<?php

//variaveis para o host ou o hospedeiro, para o usuario do SGBD, senha do SGBD e o BD, usei de teste para metodo PDO
$host = "localhost";
$user = "root"; 
$password = "";
$dbname = "uainet";

//Variaveis que pegam os atributos da pagina de cadastro, as tags em '' são os nomes dos campos de texto
$nome = trim($_POST['nome']);
$sobrenome = trim($_POST['sobrenome']);
$cpf = trim($_POST['cpf']);
$telefone = trim($_POST['telefone']);
$logradouro = trim($_POST['logradouro']);
$numero = trim($_POST['numero']);
$bairro = trim($_POST['bairro']);
$cidade = trim($_POST['cidade']);
$estado = trim($_POST['estado']);
$cep = trim($_POST['cep']);
$endereco = $logradouro . ", " . $numero . ", ". $bairro.", ". $cidade.", ". $estado.", ". $cep;

// Tratamento de Tamanhos
if (strlen($nome) > 15){
  echo"<script language='javascript' type='text/javascript'>alert('Nome Deve ter no máximo 15 carcteres!');window.location.href='cadastroCliente.php';</script>";
  die();
}
if (strlen($sobrenome) > 15){
  echo"<script language='javascript' type='text/javascript'>alert('Sobrenome Deve ter no máximo 15 carcteres!');window.location.href='cadastroCliente.php';</script>";
  die();
}
if (strlen($cpf) > 11){
  echo"<script language='javascript' type='text/javascript'>alert('CPF Deve ter no máximo 11 carcteres!');window.location.href='cadastroCliente.php';</script>";
  die();
}
if (strlen($telefone) > 11){
  echo"<script language='javascript' type='text/javascript'>alert('Telefone Deve ter no máximo 11 carcteres!');window.location.href='cadastroCliente.php';</script>";
  die();
}

// Tratamento formato CPF
if (!(str_contains($cpf, ".") or str_contains($cpf, "-") or str_contains($cpf, " "))){
  $cpf = sprintf("%s.%s.%s-%s",
                          substr($cpf, 0, 3),
                          substr($cpf, 3, 3),
                          substr($cpf, 6, 3),
                          substr($cpf, 9));
} else {
  echo"<script language='javascript' type='text/javascript'>alert('Campo CPF deve conter apenas números sem espaços!');window.location.href='cadastroCliente.php';</script>";
  die();
}
// Tratamento formato Telefone
if (!(str_contains($telefone, "(") or str_contains($telefone, ")") or
      str_contains($telefone, " - ") or str_contains($telefone, " "))){
  $telefone = sprintf("(%s) %s-%s",
                          substr($telefone, 0, 2),
                          substr($telefone, 3, 5),
                          substr($telefone, 7));
} else {
  echo"<script language='javascript' type='text/javascript'>alert('Campo Telefone deve conter apenas números sem espaços!');window.location.href='cadastroCliente.php';</script>";
  die();
}

//modo de conexão com banco de dados é o mysqli, os atributos para conexão são o host, usuario, senha e BD
$connect = mysqli_connect('localhost','root',"","uainet");

//se não conectar, mata o script e exibe o erro
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully";

//consulta, vai pegar os dados da tabela cliente onde sao iguais aos dados inseridos
$query_select_cpf = "SELECT cpf FROM cliente WHERE cpf = '$cpf'";
$query_select_telefone = "SELECT telefone FROM cliente WHERE telefone = '$telefone'";
// consulta, vai pegar o connect com todas as variaveis pra poder conectar e a consulta
$select_cpf = mysqli_query($connect,$query_select_cpf);
$select_telefone = mysqli_query($connect,$query_select_telefone);

$array_cpf = mysqli_fetch_array($select_cpf);
$array_telefone = mysqli_fetch_array($select_telefone);

$logarray_cpf = $array_cpf['cpf'];
$logarray_telefone = $array_telefone['telefone'];

 
  //Se algum dados inserido é vazio ou nulo ele vai usar javascript para abrir uma caixa dizendo que os campos devem preenchidos e vai retornar para cadastroCliente.
  if($cpf == "" || $cpf == NULL || $nome == "" || $nome == NULL || $sobrenome == "" || $sobrenome == NULL || $telefone == "" ||
   $telefone == NULL || $logradouro == "" || $logradouro == NULL || $numero == "" || $numero == NULL || $bairro == "" || $bairro == NULL 
   || $cidade == "" || $cidade == NULL || $estado == "" || $estado == NULL || $cep == "" || $cep == NULL )
  {
    echo"<script language='javascript' type='text/javascript'>alert('Todos os campos devem ser preenchidos!');window.location.href='cadastroCliente.php';</script>";
  
  }
  else
  {
    //logarry recebe se tinha algum valor igual ao digitado no banco de dados e compara com os valores inseridos, se tiver ele abre uma caixa dizendo
    if($logarray_cpf == $cpf || $logarray_telefone == $telefone )
    {
      if($logarray_cpf == $cpf && $logarray_telefone == $telefone )
      {
      echo"<script language='javascript' type='text/javascript'>alert('Já existe um usuario com este CPF e este telefone!');window.location.href='cadastroCliente.php';</script>";
      }
      if($logarray_cpf == $cpf && $logarray_telefone != $telefone)
      {
      echo"<script language='javascript' type='text/javascript'>alert('Já existe um usuario com este CPF!');window.location.href='cadastroCliente.php';</script>";
      }
      if($logarray_telefone == $telefone && $logarray_cpf != $cpf)
      {
      echo"<script language='javascript' type='text/javascript'>alert('Já existe um usuario com este Telefone!');window.location.href='cadastroCliente.php';</script>";
      }
      die();

    }
    else
    {
      //Querry para inserção dos dados no banco de dados
    $query = "INSERT INTO cliente (cpf,nome,sobrenome,telefone,endereco) VALUES ('$cpf','$nome','$sobrenome','$telefone','$endereco')";

    $insert = mysqli_query($connect,$query);

    //verifica se foi inserido, se foi ele exibe caixa dizendo que foi inserido com sucesso, se não avisa que não pode cadastra-lo.
    if($insert)
    {

      echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='cadastroCliente.php'</script>";

    }
    else
    {

      echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='cadastroCliente.php'</script>";

    }

  }

  }
