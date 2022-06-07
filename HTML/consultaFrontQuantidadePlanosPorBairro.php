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
            <div class="titulocontato"><center>Consultar quantidade de planos por bairro</center></div>
        <br>
        <div class="caixatextocontato" id="form">
            <form action="consultaBackQuantidadePlanosPorBairro.php" method="POST" name="registration" class="register">
                <fieldset>
                    <label for="CPF" class="labelcadastrologin">Bairro:</label>
                    <select name="bairro" id="equipamento" class="inputcadastrologin">
                        <option value="alvorada">Alvorada</option>
                        <option value="carneirinhos">Carneirinhos</option>
                        <option value="industrial">Industrial</option>
                        <option value="laranjeiras">Laranjeiras</option>
                        <option value="loanda">Loanda</option>
                        <option value="metalurgico">Metalurgico</option>
                        <option value="republica">Republica</option>
                    </select>
                    <input name="cadastrar" type="submit" class="inputcadastrologinbutton" value="Pesquisar" id="cadastrar"/>
                </fieldset>
            </form>
        </div>
    </div>
    <br>


</body>
</html>