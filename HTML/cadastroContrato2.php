<!DOCTYPE html>

<?php include("head.php");?>

<body id="body">
    <div class="titleall">
        <div class="title"> <a href="painelAdm.php"> <img class="titleimg" src="..\IMAGENS\logo3.png"> </a>
            <ul>
                <li><a href="painelAdm.php">Voltar</a></li>

            </ul>
        </div>
    </div>
    <br><br>
    <div class="contato">
        <div class="titulocontato">
            <center>Cadastro de Contratos</center>
        </div>
        <br>
        <div class="caixatextocontato" id="form">
            <form action="cadastrarContrato.php" method="POST" name="registration" class="register">
                <fieldset>
                    <label for="CPF" class="labelcadastrologin">CPF do cliente:</label>
                    <input name="cpf" id="cpf" type="text" placeholder="Insira o CPF do Cliente" class="inputcadastrologin" />
                    <label for="CodigoPlano" class="labelcadastrologin">Código do plano:</label>
                    <input name="pcod" id="cep" type="text" placeholder="Codigo do plano" class="inputcadastrologin" />
                    <label for="CodigoEquipamento" class="labelcadastrologin">Código do equipamento:</label>
                    <input name="ecod" id="ecod" type="text" placeholder="Código do equipamento" class="inputcadastrologin" />
                    <label for="EnderecoLOG" class="labelcadastrologin">Endereco</label>
                    <label for="EnderecoLOG" class="labelcadastrologin">Logradouro:</label>
                    <input name="logradouro" id="logradouro" type="text" placeholder="Rua/Avenida" class="inputcadastrologin" />
                    <label for="EnderecoNUM" class="labelcadastrologin">Numero:</label>
                    <input name="numero" id="numero" type="text" placeholder="Numero" class="inputcadastrologin" />
                    <label for="EnderecoBAIR" class="labelcadastrologin">Bairro:</label>
                    <select name="bairro" id="equipamento" class="inputcadastrologin">
                        <option value="alvorada">Alvorada</option>
                        <option value="carneirinhos">Carneirinhos</option>
                        <option value="industrial">Industrial</option>
                        <option value="laranjeiras">Laranjeiras</option>
                        <option value="loanda">Loanda</option>
                        <option value="metalurgico">Metalurgico</option>
                        <option value="republica">Republica</option>
                    </select>
                    <label for="EnderecoCID" class="labelcadastrologin">Cidade:</label>
                    <select name="cidade" id="equipamento" class="inputcadastrologin">
                        <option value="João Monlevade">João Monlevade</option>
                    </select>
                    <label for="EnderecoEST" class="labelcadastrologin">Estado:</label>
                    <select name="estado" id="equipamento" class="inputcadastrologin">
                        <option value="MG">Minas Gerais</option>
                    </select>
                    <label for="EnderecoCEP" class="labelcadastrologin">CEP:</label>
                    <input name="cep" id="cep" type="text" placeholder="CEP" class="inputcadastrologin" />

                    <input name="cadastrar" type="submit" class="inputcadastrologinbutton" value="Cadastrar" id="cadastrar" />

                </fieldset>
            </form>
        </div>
    </div>
    <br>


</body>

</html>