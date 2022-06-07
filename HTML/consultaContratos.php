<?php
include('conexao.php');
$consulta = "SELECT  ct.cnumero, c.cpf, c.nome, c.sobrenome, ct.endereco, ct.ecod, p.pnome as pnome 
            From cliente as c, contrato as ct, plano as p 
            WHERE c.cpf = ct.CCpf and ct.PCod = p.PCodigo 
            ORDER BY ct.cnumero ASC";

$con = $mysqli->query($consulta) or die($mysqli->error);

?>
<!DOCTYPE html>

<?php include("head.php");?>

<body id="body">

    <div class="titleall">


        <div class="title"> <a href="index.html"> <img class="titleimg" src="..\IMAGENS\logo3.png"> </a>
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
                    <th>CPF DO CLIENTE</th>
                    <th>NOME COMPLETO</th>
                    <th>ENDEREÇO</th>
                    <th>PLANO</th>
                    <th>SERIAL DO EQUIPAMENTO</th>    
                </tr>
                <?php
                
                while ($dado  = $con->fetch_array()) {
                ?>
                    <tr>
                        <td><?php echo $dado["cnumero"]; ?></td>
                        <td><?php echo $dado["cpf"]; ?></td>
                        <td><?php echo $dado["nome"]. " " .$dado["sobrenome"]; ?></td>
                        <td><?php echo $dado["endereco"]; ?></td>
                        <td><?php echo $dado["pnome"]; ?></td>
                        
                        <td><?php echo $dado["ecod"]; ?></td>
                        
                    </tr>
                <?php
                }
                ?>
            </table></center>

        </div>
    </div>

</body>

</html>