<?php

//variaveis para o host ou o hospedeiro, para o usuario do SGBD, senha do SGBD e o BD, usei de teste para metodo PDO
$host = "localhost";
$user = "root"; 
$password = "";
$dbname = "uainet";

//Variaveis que pegam os atributos da pagina de encerramento, as tags em '' são os nomes dos campos de texto
$cnumero = $_POST['contrato'];

//modo de conexão com banco de dados é o mysqli, os atributos para conexão são o host, usuario, senha e BD
$connect = mysqli_connect('localhost','root',"","uainet");

//se não conectar, mata o script e exibe o erro
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully";

//consulta, vai pegar o codigo da tabela contrato aonde o Ccodigo é igual o codigo digitado
$query_select= "SELECT cnumero FROM contrato WHERE cnumero = '$cnumero'";

// consulta, vai pegar o connect com todas as variaveis pra poder conectar e a consulta
$select = mysqli_query($connect,$query_select);


$array= mysqli_fetch_array($select);


$logarray = $array['cnumero'];

 
  //Se o codigo digitado é vazio ou nulo ele vai usar javascript para abrir uma caixa dizendo que o codigo deve ser preenchido e vai retornar para encerramentoDeContrato.
  if($cnumero == "" || $cnumero == NULL)
  {

    echo"<script language='javascript' type='text/javascript'>alert('O campo do codigo do contrato está vazio!');window.location.href='encerramentoDeContrato.php';</script>";

  }
  else
  {
    //logarry recebe se tinha algum Codigo de contrato igual ao digitado no banco de dados e compara com o codigo digitado, se tiver ele abre uma caixa dizendo
    if($logarray != $cnumero )
    {
      echo"<script language='javascript' type='text/javascript'>alert('Contrato inexistente ou já encerrado!');window.location.href='cadastroContrato.php';</script>";
      die();

    }
    else
    {
      //Querry para remoção dos dados no banco de dados
    $query = "DELETE FROM contrato WHERE cnumero='$cnumero'";

    $insert = mysqli_query($connect,$query);

    //verifica se foi exlcuido, se foi ele exibe caixa dizendo que foi encerrado com sucesso, se não avisa que não pode encerra-lo.
    if($insert)
    {

      echo"<script language='javascript' type='text/javascript'>alert('Contrato encerrado com sucesso!');window.location.href='painelAdm.php'</script>";

    }
    else
    {

      echo"<script language='javascript' type='text/javascript'>alert('Não foi possível encerrar este usuario!');window.location.href='paineldm.php'</script>";

    }

  }

  }
