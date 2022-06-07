<?php

//variaveis para o host ou o hospedeiro, para o usuario do SGBD, senha do SGBD e o BD, usei de teste para metodo PDO
$host = "localhost";
$user = "root"; 
$password = "";
$dbname = "uainet";

//Variaveis que pegam os atributos da pagina de cadastro, as tags em '' são os nomes dos campos de texto
$nome = strtoupper(trim($_POST['nome']));
$velocidade = trim($_POST['velocidade']);
$valor = trim($_POST['valor']);
$equipamento = $_POST['equipamento'];

// Tratamento de Tamanhos
if (strlen($nome) > 40){
  echo"<script language='javascript' type='text/javascript'>alert('Campo Nome deve ter no máximo 40 carcteres!');window.location.href='cadastroPlano.php';</script>";
  die();
}

// Tratamento de Formatações
if (!(str_contains(strtoupper($velocidade), 'GB') and str_contains(strtoupper($velocidade), 'MB'))){
  if (strlen($velocidade) > 3){
    echo"<script language='javascript' type='text/javascript'>alert('Campo Velocidade deve possuir no máximo 1 centena (ex: 999)! seguido de 'mb' ou não ');window.location.href='cadastroPlano.php';</script>";
  die();
  }
  $velocidade = $velocidade.'mb';
}
if (str_contains($velocidade, ' ')){
  echo"<script language='javascript' type='text/javascript'>alert('Campo Velocidade não deve ter espaços!');window.location.href='cadastroPlano.php';</script>";
  die();
}
if (str_contains($valor, ' ')){
  echo"<script language='javascript' type='text/javascript'>alert('Campo Valor não deve ter espaços!');window.location.href='cadastroPlano.php';</script>";
  die();
}

//modo de conexão com banco de dados é o mysqli, os atributos para conexão são o host, usuario, senha e BD
$connect = mysqli_connect('localhost','root',"","uainet");

//se não conectar, mata o script e exibe o erro
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully";

//consulta, vai pegar o dado da tabela plano onde o valor é igual ao inserido
$query_select = "SELECT nome FROM plano WHERE nome = '$nome'";

// consulta, vai pegar o connect com todas as variaveis pra poder conectar e a consulta
$select = mysqli_query($connect,$query_select);


$array = mysqli_fetch_array($select);

$logarray = $array['nome'];

 
  //Se algum dado inserido é vazio ou nulo ele vai usar javascript para abrir uma caixa dizendo que os campos devem ser preenchidos e vai retornar para cadastroPlano.
  if($nome == "" || $nome == NULL || $velocidade == "" || $velocidade == NULL || $valor == "" || $valor == NULL || $equipamento == "" || $equipamento == NULL )
  {

    echo"<script language='javascript' type='text/javascript'>alert('Todos os campos devem ser preenchidos');window.location.href='cadastroPlano.php';</script>";

  }
  else
  {
    //logarry recebe se tinha algum valor igual ao digitado no banco de dados e compara com o valor digitado, se tiver ele abre uma caixa dizendo
    if($logarray == $nome)
    {

      echo"<script language='javascript' type='text/javascript'>alert('Já existe um plano com este nome!');window.location.href='cadastroPlano.php';</script>";

      die();

    }
    else
    {
      //Querry para inserção dos dados no banco de dados
    $query = "INSERT INTO plano (nome,velocidade,valor,antenas_equip) VALUES ('$nome','$velocidade','$valor','$equipamento')";

    $insert = mysqli_query($connect,$query);

    //verifica se foi inserido, se foi ele exibe caixa dizendo que foi inserido com sucesso, se não avisa que não pode cadastra-lo.
    if($insert)
    {

      echo"<script language='javascript' type='text/javascript'>alert('Plano cadastrado com sucesso!');window.location.href='cadastroPlano.php'</script>";

    }
    else
    {

      echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='cadastroPlano.php'</script>";

    }

  }

  }
