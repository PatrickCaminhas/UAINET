<?php
include('conexao.php');
$consulta = "SELECT * FROM plano ORDER BY pcodigo ASC";

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
    <div class="titulocontato"><center>Todos os planos</center></div>

        <div class="textocaixa">

           <table border="1">
                <tr>
                    <th>CODIGO</th>
                    <th>NOME</th>
                    <th>VELOCIDADE</th>
                    <th>NUM_ANTENAS</th>
                    <th>VALOR</th>
                </tr>
                <?php
                
                while ($dado  = $con->fetch_array()) {
                ?>
                    <tr>
                        <td><?php echo $dado["PCodigo"]; ?></td>
                        <td><?php echo $dado["Nome"]; ?></td>
                        <td><?php echo $dado["Velocidade"]; ?></td>                     
                        <td><?php echo $dado["Antenas_Equip"]; ?></td>
                        <td><?php echo "R$ ".number_format($dado["Valor"], 2, ",", "."); ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>

        </div>

    </div>

</body>

</html>