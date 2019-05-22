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
* Execute comandos dentro do container: `docker-compose exec SERVICE_NAME COMMAND` onde `COMMAND` é o que deseja executar. Exemplos:
    * Acessar o mode shell do webserver, `docker-compose exec php-fpm bash`
    * Executar o modo console (symfony console), `docker-compose exec php-fpm bin/console`
    * Acessar em mode bash o mysql, `docker-compose exec mysql mysql -uroot -pCHOSEN_ROOT_PASSWORD`

