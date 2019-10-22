## Introdução

Após baixar o projeto execute a sequência a seguir de comandos:
* <code>composer install</code>
* <code>php aritsan migrate</code> ou poderá utilizar o arquivo ***data.sql*** para executar diretamente no banco de dados

### Documentação API

URL base da aplicação: http://localhost:8000/api

#### GET /schedule 
    
Rota para listagem de agendamentos;

Response:
 ```
    {
        schedules:[
           {
                "id": 1,
                "room_id": 5,
                "email": "example@gmail.com",
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

#### POST /schedule
    
Rota para cadastrar um agendamento;

Request:
```
    {
        "email":"example@gmail.com",
        "start_time":"2019-11-01 06:00:00",
        "end_time":"2019-11-01 07:30:00",
        "description":"Teste",
        "room_id":"3",
    }
```

***Nota 1:*** Todos os campos são obrigatórios

***Nota 2:*** As datas precisam estar no formato correto; não serem menor que o dia/hora atual;
a data de início não pode ser maior que data de término. Será lançado um erro para cada uma das exceções.

***Nota 3:*** O campo "room_id" só aceita numeros de 1 á 5. Não poderá haver um agendamento com a mesma sala, data e hora. Será lançado um erro para cada uma das exceções.


#### PUT /schedule/{ID}/cancel 

Rota para cancelamento do agendamento. Alterar o <code>{ID}<code> para o ID do agendamento respectivo.

## Documentação lumen

Documentation for the framework can be found on the [Lumen website](https://lumen.laravel.com/docs).
