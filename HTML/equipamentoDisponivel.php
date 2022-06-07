<?php
include('conexao.php');
$consulta = "SELECT  *
            FROM 	equipamento as E
            WHERE	E.num_serie NOT IN (SELECT Ecod	
                                        From	contrato
                                        WHERE	num_serie = Ecod)";

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

    <div class="titulocontato"><center>Equipamentos disponíveis para novos contratos</center></div>
       <div class="textocaixa">

            <table border="1">
                <tr>
                    <th>NUMERO DE SERIE</th>
                    <th>MODELO</th>
                    <th>MARCA</th>
                    <th>NUM_ANTENAS</th>
                    <th>VALOR</th>
                </tr>
                <?php
                
                while ($dado  = $con->fetch_array()) {
                ?>
                    <tr>
                        <td><?php echo $dado["Num_Serie"]; ?></td>
                        <td><?php echo $dado["Modelo"]; ?></td>
                        <td><?php echo $dado["Marca"]; ?></td>
                        <td><?php echo $dado["Num_Antenas"]; ?></td>
                        <td><?php echo "R$ ".number_format($dado["Preco"], 2, ",", "."); ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>

        </div>
    </div>
    
</body>

</html>