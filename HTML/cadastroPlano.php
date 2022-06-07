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
        <div class="titulocontato">
            <center>Cadastro de Planos</center>
        </div>
        <br>
        <div class="caixatextocontato" id="form">
            <form action="cadastrarPlano.php" method="POST" name="registration" class="register">
                <fieldset>
                    <label for="Nome" class="labelcadastrologin">Nome:</label>
                    <input name="nome" id="nome" type="text" placeholder="Nome do plano" class="inputcadastrologin" />
                    <label for="Velocidade" class="labelcadastrologin">Velocidade:</label>
                    <input name="velocidade" id="velocidade" type="text" placeholder="Velocidade do plano" class="inputcadastrologin" />
                    <label for="Valor" class="labelcadastrologin">Valor:</label>
                    <input name="valor" id="valor" type="text" placeholder="Valor do Plano" class="inputcadastrologin" />
                    <label for="Equipamento" class="labelcadastrologin">Equipamento:</label>
                    <select name="equipamento" id="equipamento" class="inputcadastrologin">
                        <option value="1">1 Antena</option>
                        <option value="2">2 Antenas</option>
                        <option value="3">3 Antenas</option>
                        <option value="4">4 Antenas</option>
                    </select>
                    <input name="cadastrar" type="submit" class="inputcadastrologinbutton" value="Cadastrar" id="cadastrar" />

                </fieldset>
            </form>
        </div>
    </div>
    <br>


</body>

</html>