# Requirements: #
PHP 7.2<br>
Lumen 5.5<br>
Servidor Docker com Banco de Dados MySql<br>

# Serviços: #
Nome|Endereço do container
------|---------|-----------
Webserver|**host:** `localhost`;**port:** `8000`(http://localhost:8000)
MySQL|**host:** `localhost`; **port:** `8002`

# Atalhos Docker Compose #
**Nota:** primeiro você precisa estar dentro da pasta do projeto, onde contém o arquivo `docker-compose.yml`.
* Iniciar o container: `docker-compose up -d` 
* Iniciar o container e ver os logs: `docker-compose up`. Você verá todos os logs por dentro da aplicação.
* Parar o container: `docker-compose stop`
* Matar container: `docker-compose kill`
* Ver os logs do container: `docker-compose logs`
* Execute comandos dentro do container: `docker-compose exec SERVICE_NAME COMMAND` onde `COMMAND` é o que deseja 
executar. Exemplos:
    * Acessar o mode shell do webserver, `docker-compose exec php-fpm bash`
    * Executar o modo console (symfony console), `docker-compose exec php-fpm bin/console`
    * Acessar em mode bash o mysql, `docker-compose exec mysql mysql -uroot -pCHOSEN_ROOT_PASSWORD`

# Install #
1. Acessar o bash do container através do comando `docker-compose exec php-fpm bash`
2. Executar o comando `composer install`
3. Executar o comando `cp .env.example .env`
4. Executar o comando `chmod 777 -R storage` e `chmod 777 .env`
5. Editar o '.env' e configurar as credencias de acesso ao banco de dados que estão descritos no arquivo 
`docker-compose.yml` na seção mysql. Lembrando que no docker o host pode ser o proprio nome do nó do aquirvo 
`docker-compose.yml`
6. Executar o comando `php artisan migrate`
7. Executar o comando `php artisan db:seed`

** Os passos 6 e 7 criam as tabelas na base usando migrations e popula as mesmas com dados iniciais.

# Link para verificar o funcionamento do API #
[Link do video do projeto em funcionamento](https://youtu.be/qBC0pTIRXh8)

# Análide e dúvidas do escopo #
Efetuei a analise do escopo proposto no projeto. Lenvantei algumas dúvidas que em conversas com o Sr. Vibbraneo, 
elas foram sanadas.

Estimativa em horas das atividades:
1. Criar Docker[1 hora]
2. Criação da estrutura da API[1 hora]
3. Autenticação - Endpoint e integração[8 horas] 
4. Registro de Tempo - Mapeamento da rota GET e desenvolvimento[4 horas]
5. Registro de Tempo - Mapeamento da rota POST e desenvolvimento[8 horas]
6. Registro de Tempo - Mapeamento da rota PUT e desenvolvimento[4 horas]
7. User - Mapeamento da rota GET e desenvolvimento[2 horas]
8. User - Mapeamento da rota POST e desenvolvimento[3 horas]
9. User - Mapeamento da rota PUT e desenvolvimento[3 horas]
10. Project - Mapeamento da rota GET e desenvolvimento[2 horas]
11. Project - Mapeamento da rota POST e desenvolvimento[4 horas]
12. Project - Mapeamento da rota PUT e desenvolvimento[3 horas]
13. Refactor e Readme[5 horas]

* **Estimativa de entrega** : 10 dias (5 horas trabalhadas) em dias úteis.


