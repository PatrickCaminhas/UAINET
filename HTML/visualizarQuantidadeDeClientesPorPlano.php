<?php
include('conexao.php');
$consulta = "SELECT  p.pcodigo,p.nome, COUNT(*) 
            FROM    contrato as  ct, plano as p 
            WHERE   ct.pcod = p.pcodigo 
            GROUP BY p.nome 
            ORDER BY p.pcodigo ASC";


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
    <div class="titulocontato"><center>Quantidade de clientes por plano</center></div>

        <div class="textocaixa">
        <br>
            <table border="1">
                <tr>
                    <th>CODIGO DO PLANO</th>
                    <th>NOME DO PLANO</th>
                    <th>QUANTIDADE DE CLIENTES</th>

                </tr>
                <?php
                
                while ($dado  = $con->fetch_array()) {
                ?>
                    <tr>
                        <td><?php echo $dado["pcodigo"]; ?></td>
                        <td><?php echo $dado["nome"]; ?></td>
                        <td><?php echo $dado["COUNT(*)"]; ?></td>

                    </tr>
                <?php
                }
                ?>
            </table>
        </div>

    </div>

</body>

</html>