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
    <br><br>
    <div class="contato">
            <div class="titulocontato"><center>Consultar planos do cliente</center></div>
        <br>
        <div class="caixatextocontato" id="form">
            <form action="consultaBackPlanoDoCliente.php" method="POST" name="registration" class="register">
                <fieldset>
                    <label for="CPF" class="labelcadastrologin">CPF do cliente:</label>
                    <input name="cpf" id="cpf" type="text" placeholder="CPF do cliente" class="inputcadastrologin" />
                    <input name="cadastrar" type="submit" class="inputcadastrologinbutton" value="Pesquisar" id="cadastrar"/>
                </fieldset>
            </form>
        </div>
    </div>
    <br>


</body>
</html>