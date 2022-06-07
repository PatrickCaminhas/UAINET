<?php

//variaveis para o host ou o hospedeiro, para o usuario do SGBD, senha do SGBD e o BD, usei de teste para metodo PDO
$host = "localhost";
$user = "root"; 
$password = "";
$dbname = "uainet";

//Variaveis que pegam os atributos da pagina de cadastro, as tags em '' são os nomes dos campos de texto
$cpf = trim($_POST['cpf']);
$equipamento = trim($_POST['ecod']);
$plano = trim(($_POST['pcod']));
$data_inicio = date('Y/m/d');
$data_fim = date('Y/m/d',strtotime('+1 year'));
$logradouro = trim($_POST['logradouro']);
$numero = trim($_POST['numero']);
$bairro = trim($_POST['bairro']);
$cidade = trim($_POST['cidade']);
$estado = trim($_POST['estado']);
$cep = trim($_POST['cep']);

if (!(str_contains($logradouro, "Rua"))){
  $logradouro = "Rua ".$logradouro;
}

$endereco = $logradouro . ", " . $numero . ", ". ucfirst($bairro).", ". $cidade.", ". $estado.", ". $cep;

// Tratamento de Tamanhos
if (str_contains($cpf, " ") or strlen($cpf) > 14){
    echo"<script language='javascript' type='text/javascript'>alert('CPF INVALIDO! Preecha o campo CPF ja formatado(ex: 999.999.999-99) ou apenas numeros!');window.location.href='cadastroContrato2.php';</script>";
    die();
}
// Tratamento de Formato
if (!(str_contains($cpf, ".") and str_contains($cpf, "-"))){
    $cpf = sprintf("%s.%s.%s-%s",
                            substr($cpf, 0, 3),
                            substr($cpf, 3, 3),
                            substr($cpf, 6, 3),
                            substr($cpf, 9));
}

//modo de conexão com banco de dados é o mysqli, os atributos para conexão são o host, usuario, senha e BD
$connect = mysqli_connect('localhost','root',"","uainet");

//se não conectar, mata o script e exibe o erro
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully";

//consulta, vai pegar os dados da tabela Contrato onde é igual aos dados inseridos
$query_select_cpf = "SELECT cpf FROM cliente WHERE cpf = '$cpf'";
$query_select_equipamento = "SELECT num_serie FROM equipamento WHERE num_serie = '$equipamento'";
$query_select_plano = "SELECT pcodigo FROM plano WHERE pcodigo = '$plano'";
$query_select_ecod = "SELECT ecod FROM contrato WHERE ecod = '$equipamento'";
// consulta, vai pegar o connect com todas as variaveis pra poder conectar e a consulta
$select_cpf = mysqli_query($connect,$query_select_cpf);
$select_equipamento = mysqli_query($connect,$query_select_equipamento);
$select_plano = mysqli_query($connect,$query_select_plano);
$select_ecod = mysqli_query($connect,$query_select_ecod);

$array_cpf = mysqli_fetch_array($select_cpf);
$array_equipamento = mysqli_fetch_array($select_equipamento);
$array_plano = mysqli_fetch_array($select_plano);
$array_ecod = mysqli_fetch_array($select_ecod);

$logarray_cpf = $array_cpf['cpf'];
$logarray_equipamento = $array_equipamento['num_serie'];
$logarray_plano = $array_plano['pcodigo'];
$logarray_ecod = $array_ecod['ecod']; 

  //Se algum dado inserido é vazio ou nulo ele vai usar javascript para abrir uma caixa dizendo que os campos devem ser preenchidos e vai retornar para cadastroContrato.
  if($cpf == "" || $equipamento == "" || $plano == "" || $logradouro == "" || $numero == "" || $bairro == "" || $cidade == "" || $estado == "" || $cep == "")
  {

    echo"<script language='javascript' type='text/javascript'>alert('Todos os campos devem ser preenchidos!');window.location.href='cadastroContrato2.php';</script>";

  }
  else
  {
    //logarry recebe se tinha algum valor igual ao digitado no banco de dados e compara com os valores inseridos, se tiver ele abre uma caixa dizendo
    if($logarray_cpf != $cpf || $logarray_equipamento != $equipamento || $logarray_plano != $plano)
    {
      echo"<script language='javascript' type='text/javascript'>alert('Usuario, equipamento ou plano não existe!');window.location.href='cadastroContrato2.php';</script>";

      die();
    }
    if($logarray_ecod == $equipamento){
      echo"<script language='javascript' type='text/javascript'>alert('Ja existe um usuário utilizando o equipamento com este número de série!');window.location.href='cadastroContrato2.php';</script>";

      die();
    }
    else
    {
      //Querry para inserção dos dados no banco de dados
    $query = "INSERT INTO contrato (endereco,data_inicio,data_fim,ccpf,pcod,ecod) VALUES ('$endereco','$data_inicio','$data_fim','$cpf','$plano','$equipamento')";

    $insert = mysqli_query($connect,$query);

    //verifica se foi inserido, se foi ele exibe caixa dizendo que foi inserido com sucesso, se não avisa que não pode cadastra-lo.
    if($insert)
    {

      echo"<script language='javascript' type='text/javascript'>alert('Contrato cadastrado com sucesso!');window.location.href='cadastroContrato2.php'</script>";

    }
    else
    {

      echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='cadastroContrato2.php'</script>";

    }

  }

  }
