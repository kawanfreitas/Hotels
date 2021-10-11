#  Buzzvel
Projeto em laravel para uma etapa do seletivo da empresa  Buzzvel
# Build
Para rodar a aplicação, siga os comandos abaixo:

``` sh
$ composer install
$ cp .env.example .env
$ php artisan key:generate
$ php artisan migrate && php artisan db:seed
$ php artisan serve 
```

>**Note**: Não esqueça de alterar os valores do arquivo .env para acessar o banco de dados.
