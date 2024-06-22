# Comando para instalar o pacote Reliese Laravel Model Generator
composer require reliese/laravel --dev

# Comando para gerar models baseado na estrutura do banco de dados
# Garanta que o pacote Reliese Laravel Model Generator esteja instalado e o banco de dados esteja devidamente configurado no arquivo '.env'
php artisan code:models

# Comando para criar Migrations
php artisan make:migration create_flights_table
# Crie o nome da tabela sabendo the ela sera analoga a uma colecao de modelos, neste exemplo tabela flights

# Comando para migrar
php artisan migrate

# Comando para ver status das migracoes 
php artisan migrate:status

# Comando para criar novo provedor de injecoes
php artisan make:provider RepositoriesProvider

# Comando para criar novo Controller
php artisan make:controller UserController

# Comando para gerar documentação Swagger
php artisan l5-swagger:generate

# Acesso ao swagger ui a partir de
http://192.168.1.9:8000/api/documentation

# Clear the Route Cache
php artisan route:clear

# Recompile the Route Cache:
php artisan route:cache
