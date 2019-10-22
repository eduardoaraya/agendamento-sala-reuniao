## Introdução

Após baixar o projeto execute a sequência a seguir de comandos:
    * <code>composer install</code>
    * <code>php aritsan migrate</code> ou poderá utilizar o arquivo ***data.sql*** para executar diretamente no banco de dados

### Documentação API

URL base da aplicação: http://localhost:8000/api

***GET /schedule*** 
    Rota para listar os agendamentos,
    resposta:
 ```
    {
        schedules:[
           {
                "id": 1,
                "room_id": 5,
                "email": "eduardojezine@gmail.com",
                "start_time": "2019-11-22 09:00:00",
                "end_time": "2019-11-22 10:00:00",
                "status": "active",
                "description": "teste",
                "created_at": "2019-10-22 18:17:17",
                "updated_at": "2019-10-22 18:17:17"
            }
        ]
    }
```


***POST /schedule*** 
***PUT /schedule/{id}/cancel*** 


## Documentação do lumen

Documentation for the framework can be found on the [Lumen website](https://lumen.laravel.com/docs).
