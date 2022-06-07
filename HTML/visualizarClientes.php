<?php
include('conexao.php');
$consulta = "SELECT * FROM cliente ORDER BY Nome ASC";

$con = $mysqli->query($consulta) or die($mysqli->error);

?>
<!DOCTYPE html>

<?php include("head.php");?>

<body id="body">

    <div class="titleall">
        <div class="title"> <a href="painelAdm.php"> <img class="titleimg" src="..\IMAGENS\logo3.png"> </a>
            <ul>
                <li><a href="relatorios.php">Voltar</a></li>
            </ul>
        </div>
    </div>
    <br>
    <br>
    <div class="contato">
    <div class="titulocontato"><center>Todos os clientes</center></div>

        <div class="textocaixa">
            <table border="1">
                <tr>
                    <th>CPF</th>
                    <th>NOME COMPLETO</th>
                    <th>TELEFONE</th>
                    <th>ENDEREÇO</th>
                </tr>
                <?php
                
                while ($dado  = $con->fetch_array()) {
                ?>
                    <tr>
                        <td><?php echo $dado["Cpf"]; ?></td>
                        <td><?php echo $dado["Nome"]." ". $dado["Sobrenome"] ; ?></td>
                        <td><?php echo  $dado["Telefone"]; ?></td>
                        <td><?php echo $dado["Endereco"]; ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>

        </div>
    </div>

</body>

</html>