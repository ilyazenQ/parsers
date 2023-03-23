## Parsers

Парсеры товаров с маркетплейсов. 

## Разворот

1. `git clone https://github.com/ilyazenQ/parsers.git
   <new-repo-name>`
2. `make dc_up`<br>
3. `make app_bash`<br>
4. `bin/console doctrine:migrations:migrate`<br>

## *Описание

Swagger: доступен по url - /api. (CRUD) <br>
<img src="/image/swagger.png">
Index(листинг товаров с фильтрами): доступен по url - /product <br>
<img src="/image/index.png">
Запуск парсеров (на примере Wb) -  <br>
`bin/console parser:wb --cat={cat_id}`<br>
cat_id* - Id категории, для которой запускается парсер.<br>
Конфигурация параметров синхронизации в файле ParserService/WBconfig.php<br>




