<?php
//faz a conexão com o SGBD e BD
include('conexao.php');
$bairro=$_POST['bairro'];

$consulta = "SELECT	COUNT(*) FROM contrato WHERE endereco LIKE '%$bairro%';";

$con = $mysqli->query($consulta) or die($mysqli->error);

?>
<!DOCTYPE html>

<?php include("head.php");?>

<body id="body">

    <div class="titleall">
        <div class="title"> <a href="painelAdm.php"> <img class="titleimg" src="..\IMAGENS\logo3.png"> </a>
            <ul>
                <li><a href="consultaFrontQuantidadePlanosPorBairro.php">Pesquisar de novo</a></li>
                <li><a href="relatorios.php">Voltar</a></li>
            </ul>

        </div>
    </div>
    <br>
    <br>
    <div class="contato">

    <div class="titulocontato"><center>Quantidade de planos por bairro</center></div>
        <div class="textocaixa">

            <table border="1">
                <tr>
                    <th>BAIRRO</th>
                    <th>QUANTIDADE DE CLIENTES</th>
                </tr>
                <?php
                
                while ($dado  = $con->fetch_array()) {          
                ?>
                    <tr>
                        <td><?php echo ucfirst($bairro) ?></td>
                        <td><?php echo $dado["COUNT(*)"]; ?></td>

                    </tr>
                <?php
                }
                ?>
            </table>
    </div>

</body>

</html>