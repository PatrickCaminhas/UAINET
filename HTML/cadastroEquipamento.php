<!DOCTYPE html>

<?php include("head.php");?>

<body id="body">
    <div class="titleall">
        <div class="title"> <<a href="painelAdm.php"> <img class="titleimg" src="..\IMAGENS\logo3.png"> </a>
            <ul>
                <li><a href="painelAdm.php">Inicio</a></li>

            </ul>
        </div>
    </div>
    <br><br>
    <div class="contato">
            <div class="titulocontato"><center>Cadastro de Equipamentos</center></div>
        <br>
        <div class="caixatextocontato" id="form">
            <form action="cadastrarEquipamento.php" method="POST" name="registration" class="register">
                <fieldset>
                    <label for="num_serie" class="labelcadastrologin">Serial:</label>
                    <input name="num_serie" id="num_serie" type="text" placeholder="Número de série do equipamento" class="inputcadastrologin" />
                    <label for="modelo" class="labelcadastrologin">Modelo:</label>
                    <input name="modelo" id="modelo" type="text" placeholder="Modelo do equipamento" class="inputcadastrologin" />
                    <label for="marca" class="labelcadastrologin">Marca:</label>
                    <input name="marca" id="marca" type="text" placeholder="Marca do equipamento" class="inputcadastrologin" />
                    <label for="valor" class="labelcadastrologin">Valor:</label>
                    <input name="valor" id="valor" type="text" placeholder="Valor do equipamento" class="inputcadastrologin" />
                    <label for="Equipamento" class="labelcadastrologin">Equipamento:</label>
                    <select name="antenas" id="antenas" class="inputcadastrologin">
                        <option value="1">1 Antena</option>
                        <option value="2">2 Antenas</option>
                        <option value="3">3 Antenas</option>
                        <option value="4">4 Antenas</option>
                    </select>
                    <input name="cadastrar" type="submit" class="inputcadastrologinbutton" value="Cadastrar" id="cadastrar"/>
                    
                </fieldset>
            </form>
        </div>
    </div>
    <br>


</body>
</html>