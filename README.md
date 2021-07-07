## Install
    - composer install
    - php artisan key:generate
    - The key will be written automatically in your .env file.
## Database
    - create database aluma_gubi
    - import datatabe aluma_gubi.sql
## Database Config
    - config/database.php
```
    edit .env
    
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=aluma_gubi
    DB_USERNAME=root
    DB_PASSWORD=
```
## vendor publish
    - php artisan vendor:publish
    - select 0 ([] Publish files from all providers and tags listed below)
## Dev
    - php artisan serve
## API
```http
    GET http://127.0.0.1:8000/api/v1/products
```
| Parameter | Type | Description |
| :--- | :--- | :--- |
| `search` | `string` | Search product title or category name |
| `category_id` | `integer` | filter products by category id |
| `page` | `integer` | page number |
| `limit` | `integer` | page line limit  |
### Responses
```javascript
{
   "success":true,
   "message":"",
   "data":[
      {
         "id":117781,
         "category_id":89,
         "title":"VIP80 Soldering BGA Net",
         "price":"2.70",
         "category":{
            "category_id":89,
            "name":"Repair Tools"
         }
      }
   ],
   "paginate":{
      "total":1,
      "currentPage":1,
      "lastPage":1,
      "hasMorePages":false,
      "perPage":25,
      "lastItem":1
   }
}
```

