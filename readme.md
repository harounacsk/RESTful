Postman
http://localhost/projets/restful/service.php

Add article
method:POST
Body -> raw -> JSON
{
    "name":"Bandage",
    "price":67.76,
    "backup":true
}

Update article
method:PUT
Body -> raw -> JSON
{
    "id":4,
    "name":"Bandage",
    "price":67.76,
    "backup":true
}

Get articles
method:GET


Delete article
method:DELETE
Body -> raw -> JSON
{
    "id":4
}