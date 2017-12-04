---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)
<!-- END_INFO -->

#general
<!-- START_7bfe45b0f6917821a2528187f9cde63f -->
## Update item of specified resource

> Example request:

```bash
curl -X PUT "http://localhost/api/category" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/category",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/category`


<!-- END_7bfe45b0f6917821a2528187f9cde63f -->

<!-- START_894ef06ce7a41cb47f9c434fcd778d9a -->
## Create new item of specified resource

> Example request:

```bash
curl -X POST "http://localhost/api/category" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/category",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/category`


<!-- END_894ef06ce7a41cb47f9c434fcd778d9a -->

<!-- START_22914fe6912f4d9035a8dd28ecc1b0c1 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET "http://localhost/api/category" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/category",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": [
        {
            "id": 2,
            "name": "Principal",
            "description": "Principais pratos da casa."
        },
        {
            "id": 3,
            "name": "Sobremesa",
            "description": "Pratos doces servidos após a refeição principal."
        },
        {
            "id": 4,
            "name": "Bebidas",
            "description": "Bebidas."
        },
        {
            "id": 5,
            "name": "Suco",
            "description": "Sucos naturais.",
            "parent": {
                "data": {
                    "id": 4,
                    "name": "Bebidas",
                    "description": "Bebidas."
                }
            }
        },
        {
            "id": 6,
            "name": "Refrigerante",
            "description": "Refrigerantes.",
            "parent": {
                "data": {
                    "id": 4,
                    "name": "Bebidas",
                    "description": "Bebidas."
                }
            }
        }
    ],
    "meta": {
        "pagination": {
            "total": 5,
            "count": 5,
            "per_page": 10,
            "current_page": 1,
            "total_pages": 1,
            "links": []
        }
    }
}
```

### HTTP Request
`GET api/category`

`HEAD api/category`


<!-- END_22914fe6912f4d9035a8dd28ecc1b0c1 -->

