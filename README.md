# UAINET
Um sistema pensado e elaborado para a disciplina de Banco de Dados I com o objetivo de armazenar os dados de uma provedora de internet. 
O sistema armazena então os seus clientes, os planos disponíveis, todos os equipamentos e os contratos realizados.

# Como executar
Nesse sistema estamos usando o **XAMPP** para iniciar o servidor e comunicar o banco de dados com o php. 
Para utilizar então o sistema:
* Baixe os arquivos deste repositório
* Faça o download do [XAMPP](https://www.apachefriends.org/pt_br/index.html)

Faça a instalação  do XAMPP e em seguida:

* Vá até o local de sua instalação
* Acesse a pasta **htdocs**
* Coloque os arquivos deste repositório dentro da pasta

Para o meu caso, no final tive algo assim: *Disco Local (C:) > xampp > htdocs > UAINET*

Agora com o painel de controle do XAMPP aberto (xampp-control.exe), clique em *start* no **Apache** e no **MySql**.

Ainda no painel clique em *admin* do MySql e então na página que irá abrir:
* Crie um banco chamado "uainet"
* Acesse o banco e acesse a aba **SQL**
* Insira o script que se encontra em `/Scripts_Sql/Uainet_Script.txt` ou clique [aqui](https://github.com/PatrickCaminhas/UAINET/blob/main/Scripts_Sql/Uainet_Script.txt)
* Insira o script que se encontra em `/Scripts_Sql/Insercoes_Uainet.txt` ou clique [aqui](https://github.com/PatrickCaminhas/UAINET/blob/main/Scripts_Sql/Insercoes_Uainet.txt)

Agora basta inserir *http://localhost/uainet/HTML/painelAdm.php* na barra de endereço do seu navegador e começar a usar!
