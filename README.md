<h1 align="center">noticiasNews</h1>
<p align="center">Abaixo estão as instruções para verificação do projeto:</p>

<u>
    <li><b>Clone:</b> execute o clone do meu repositório, ou baixe como .ZIP e extraia em sua máquina.</li>
    <li><b>Composer install:</b> acesse a pasta raiz do projeto e execute o comando <code>composer install</code>. O arquivo composer.lock está no versionamento para garantirmos as mesmas dependências.</li>
    <li><b>Arquivo .ENV:</b> na raiz do projeto está o arquivo <code>.env.example</code>. Copie o conteúdo dele e crie um novo arquivo <code>.env</code>. <b>ATENÇÃO:</b> na configuração de banco de dados no arquivo .env, defina o nome do banco como <b>bd_noticias</b>.</li>
    <li><b>Geração da chave:</b> na raiz do projeto execute o comando <code>php artisan key:generate</code> para criar a chave da aplicação ramificada em sua máquina.</li>
    <li><b>Criação do BD:</b> na raiz do projeto segue um arquivo SQL <code>noticias.sql</code>. Ele contém em si os comandos de criar o esquema de armazenamento e os dados gerados durante o desenvolvimento. <b>Importe</b> esse arquivo em seu SGBD criando o mesmo esquema que usei.</li>
    <li><b>Start do servidor:</b> inicie o servidor para o banco de dados (imprescindível) e execute o comando <code>php artisan serve</code> para iniciar o suporte à aplicação.</li>
</u>
    
