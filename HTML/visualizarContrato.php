<?php
include('conexao.php');
$consulta = "SELECT *, c.Nome as Nome, p.Nome as PNome
            FROM    cliente as c, contrato as ct, plano as p
            WHERE   c.cpf = ct.ccpf and p.pcodigo = ct.pcod
            ORDER BY cnumero ASC";

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
    <div class="titulocontato"><center>Todos os contratos</center></div>

        <div class="textocaixa">

           <table border="1">
                <tr>
                    <th>CODIGO</th>
                    <th>INICIO</th>
                    <th>FINAL</th>
                    <th>CPF CLIENTE</th>
                    <th>NOME CLIENTE</th>
                    <th>PLANO</th>
                    <th>EQUIPAMENTO</th>
                    <th>ENDEREÇO</th>
                </tr>
                <?php
                
                while ($dado  = $con->fetch_array()) {
                ?>
                    <tr>
                        <td><?php echo $dado["CNumero"]; ?></td>
                        <?php
                            $data = $dado["Data_inicio"];
                            $data_inicio = sprintf("%s/%s/%s",
                            substr($data, 8, 2),
                            substr($data, 5, 2),
                            substr($data, 0, 4));
                        ?>
                        <td><?php echo $data_inicio; ?></td>
                        <?php
                            $data = $dado["Data_fim"];
                            $data_fim = sprintf("%s/%s/%s",
                            substr($data, 8, 2),
                            substr($data, 5, 2),
                            substr($data, 0, 4));
                        ?>
                        <td><?php echo $data_fim ; ?></td>
                        <td><?php echo $dado["CCpf"]; ?></td>
                        <td><?php echo $dado["Nome"]." ". $dado["Sobrenome"] ; ?></td>
                        <td><?php echo $dado["PNome"]; ?></td>
                        <td><?php echo $dado["ECod"]; ?></td>
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