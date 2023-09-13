## Parsers

Парсеры товаров с маркетплейсов. 

## Разворот

1. `git clone https://github.com/ilyazenQ/parsers.git` <br>
2. `cd parsers`
3. `cp docker/.env.dist docker/.env`<br>
4. `make dc_build`<br>
5. `make dc_up` <br>
6. `make app_bash`<br>
7. `composer install` <br>
8. `bin/console doctrine:migrations:migrate`<br>
9. `exit`<br>

## *Описание

Swagger: доступен по url - /api. (CRUD) <br>
<img src="/image/swagger.png">
Index(листинг товаров с фильтрами): доступен по url - /product <br>
<img src="/image/index.png">
Запуск парсеров (на примере Wb) -  <br>
`bin/console parser:wb --cat={cat_id}`<br>
cat_id* - Id категории, для которой запускается парсер.<br>
Конфигурация параметров синхронизации в файле ParserService/WBconfig.php<br>




