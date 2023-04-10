Postman

Add article
url:http://localhost/restful/insert.php
method:POST
Body -> raw -> JSON
{
    "name":"Bandage",
    "price":67.76,
    "backup":true,
    "depot":2
}

Update article
url:http://localhost/rest/update.php
method:PUT
Body -> raw -> JSON
{
    "id":4,
    "name":"Bandage",
    "price":67.76,
    "backup":true,
    "depot":2
}

Get articles
url: http://localhost/restful/select.php


Delete article
url:http://localhost/rest/delete.php
method:DELETE
Body -> raw -> JSON
{
    "id":4
}