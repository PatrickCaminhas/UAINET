<?php
//faz a conexão com o SGBD e BD
include('conexao.php');
$cpf= trim($_POST['cpf']);

// Tratamento Campo CPF
if (str_contains($cpf, " ") or strlen($cpf) > 14){
    echo"<script language='javascript' type='text/javascript'>alert('CPF INVALIDO! Preecha o campo CPF ja formatado(ex: 999.999.999-99) ou apenas numeros!');window.location.href='consultaFrontPlanoDoCliente.php';</script>";
    die();
}
if (!(str_contains($cpf, ".") and str_contains($cpf, "-"))){
    $cpf = sprintf("%s.%s.%s-%s",
                            substr($cpf, 0, 3),
                            substr($cpf, 3, 3),
                            substr($cpf, 6, 3),
                            substr($cpf, 9));
}

$consulta = "SELECT	c.nome, c.sobrenome, p.nome as PNome, ct.endereco as CEndereco
            FROM	cliente as c, contrato as ct, plano as p 
            WHERE	c.cpf = ct.ccpf and ct.pcod = p.pcodigo and ct.ccpf='$cpf'";

$con = $mysqli->query($consulta) or die($mysqli->error);

?>
<!DOCTYPE html>

<?php include("head.php");?>

<body id="body">

    <div class="titleall">
        <div class="title"> <a href="painelAdm.php"> <img class="titleimg" src="..\IMAGENS\logo3.png"> </a>
        <ul>
                <li><a href="consultaFrontPlanoDoCliente.php">Pesquisar de novo</a></li>
                <li><a href="relatorios.php">Voltar</a></li>
            </ul>

        </div>
    </div>
    <br>
    <br>
    <div class="contato">
    <div class="titulocontato"><center>Planos do cliente</center></div>

        <div class="textocaixa">

            <table border="1">
                <tr>
                    <th>CPF</th>
                    <th>NOME COMPLETO</th>
                    <th>NOME DO PLANO</th>
                    <th>ENDERECO DE INSTALACÃO</th>
                </tr>
                <?php
                
                while ($dado  = $con->fetch_array()) {          
                ?>
                    <tr>
                        <td><?php echo $cpf ?></td>
                        <td><?php echo $dado["nome"]." ". $dado["sobrenome"] ; ?></td>
                        <td><?php echo $dado["PNome"]; ?></td>
                        <td><?php echo $dado["CEndereco"]; ?></td>

                    </tr>
                <?php
                }
                ?>
            </table>

        </div>

    </div>

</body>

</html>