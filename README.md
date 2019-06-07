# Smart Building

Projeto IoT de construção inteligente da disciplina de Programação Avançada para Internet. Esta aplicação em PHP será executada em intranet e tem como objetivo controlar sensores e equipamentos de uma construção inteligente.

## Getting Started

Essas instruções farão com que você tenha uma cópia do projeto em execução na sua máquina local para fins de desenvolvimento e teste. Veja a implantação de notas sobre como implantar o projeto em um sistema ativo.
### Prerequisites

Alguns pre-requisitos sera necessario para instalação:

##### Softwares

* PHP 7 e seus pre-requisitos
    * https://blog.schoolofnet.com/como-instalar-o-php-no-windows-do-jeito-certo-e-usar-o-servidor-embutido/
* Composer
    * https://getcomposer.org/

Reinicie verifique as variaies de ambiente e reinicie a maquina e em seguida realize a instalação das dependencias com o seguinte comando:
```
composer install
```

##### DataBase

O banco de dados utilizado será o MySQL faça a instalação padrão localmente com o XAMPP ou para facitar baixe o através do docker.

* Docker composer (MySQL e phpMyAdmin)
    * https://share.atelie.software/subindo-um-banco-de-dados-mysql-e-phpmyadmin-com-docker-642be41f7638
    

### Installing

Uma serie de passos de instalação e configuração do ambiente.

##### Configurando o ambiente

A configuração do ambiente será por meio de um arquivo .env da sua aplicação. Procure na raiz e atualize as seguites variaveis:

*  DB_HOST
    *   host do banco 
*   DB_DATABASE
    *   nome do banco
*   DB_USERNAME
    *   Usuario do banco
*   DB_PASSWORD
    *   Senha do usuario
        
##### Database

O banco de dados ultizado está versionado na aplicação para rodar a criação das tabelas execute o seguinte comando:
```
php artisan migrate
```

A aplicação também contém dados teste gerados automaticamente, para isso execute o seguinte comando:

```
php artisan db:seed
```

Com isso o esquema do banco de dados estará pronto e com dados 'faker' para testes.

## Executando a aplicação

Execute o seguinte comando para rodar o servidor interno do Lumen.

```
php artisan serve
```

Ou use o servidor imbutido do PHP:

```
php -S localhost:8000 -t public
```

## Utilizando a API

Para utulizar os recursos da aplicação acesse o link da ducumentação da API para mais informações.

*   https://app.swaggerhub.com/apis-docs/EvertonMacena/smart_building/1.0.0

#### User admin

*   Email: admin@admin
*   Password: 1234
