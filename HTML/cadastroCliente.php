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
            <div class="titulocontato"><center>Cadastrar de Clientes</center></div>
        <br>
        <div class="caixatextocontato" id="form">
            <form action="cadastrarCliente.php" method="POST" name="registration" class="register">
                <fieldset>
                    <label for="Nome" class="labelcadastrologin">Nome:</label>
                    <input name="nome" id="nome" type="text" placeholder="Nome do cliente" class="inputcadastrologin" />
                    <label for="Sobreome" class="labelcadastrologin">Sobrenome:</label>
                    <input name="sobrenome" id="sobrenome" type="text" placeholder="Sobrenome do cliente" class="inputcadastrologin" />
                    <label for="CPF" class="labelcadastrologin">CPF:</label>
                    <input name="cpf" id="cpf" type="text" placeholder="Apenas numeros do CPF" class="inputcadastrologin" />
                    <label for="Telefone" class="labelcadastrologin">Telefone:</label>
                    <input name="telefone" id="telefone" type="text" placeholder="Apenas numeros do Telefone" class="inputcadastrologin" />
                    <label for="Endereco" class="labelcadastrologin">Endereço</label><br>
                    <label for="Enderecologradouro" class="labelcadastrologin">Logradouro:</label>
                    <input name="logradouro" id="logradouro" type="text" placeholder="Rua/Avenida" class="inputcadastrologin"/>
                    <label for="Enderecologradouro" class="labelcadastrologin">Numero:</label>
                    <input name="numero" id="numero" type="text" placeholder="Numero" class="inputcadastrologin"/>
                    <label for="Enderecologradouro" class="labelcadastrologin">Bairro:</label>
                    <input name="bairro" id="bairro" type="text" placeholder="Bairro" class="inputcadastrologin"/>
                    <label for="Enderecologradouro" class="labelcadastrologin">Cidade:</label>
                    <input name="cidade" id="cidade" type="text" placeholder="Cidade" class="inputcadastrologin"/>
                    <label for="Enderecologradouro" class="labelcadastrologin">Estado:</label>
                    <input name="estado" id="estado" type="text" placeholder="Estado" class="inputcadastrologin"/>
                    <label for="Enderecologradouro" class="labelcadastrologin">CEP:</label>
                    <input name="cep" id="cep" type="text" placeholder="CEP" class="inputcadastrologin"/>
                    <input name="cadastrar" type="submit" class="inputcadastrologinbutton" value="Cadastrar" id="cadastrar"/>
                    
                </fieldset>
            </form>
        </div>
    </div>
    <br>

</body>
</html>