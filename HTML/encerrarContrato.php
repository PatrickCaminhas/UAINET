<!DOCTYPE html>

<?php include("head.php");?>

<body id="body">
    <div class="titleall">
        <div class="title"> <a href="painelAdm.php"> <img class="titleimg" src="..\IMAGENS\logo3.png"> </a>
            <ul>
                <li><a href="painelAdm.php">Inicio</a></li>

            </ul>
        </div>
    </div>
    <br><br>
    <div class="contato">
            <div class="titulocontato"><center>Encerrar Contratos</center></div>
        <br>
        <div class="caixatextocontato" id="form">
            <form action="encerramentoDeContrato.php" method="POST" name="registration" class="register">
                <fieldset>
                    <label for="numeroContrato" class="labelcadastrologin">Numero do contrato:</label>
                    <input name="contrato" id="contrato" type="text" placeholder="Numero do Contrato" class="inputcadastrologin" />
                    <input name="cadastrar" type="submit" class="inputcadastrologinbutton" value="Encerrar" id="cadastrar"/>
                    
                </fieldset>
            </form>
        </div>
    </div>
    <br>


</body>
</html>