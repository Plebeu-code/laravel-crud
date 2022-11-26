# Sistema CRUD Laravel + VUE3

Sistema CRUD feito em Laravel + VUE3 

## Variáveis de Ambiente VUE

Para rodar esse projeto, você vai precisar adicionar as seguintes variáveis de ambiente no seu .env

`VITE_URL_API`
`VITE_PORT_API`

## Variáveis de Ambiente LARAVEL

Para rodar esse projeto, você vai precisar adicionar as seguintes variáveis de ambiente no seu .env

`DB_CONNECTION`
`DB_HOST`
`DB_PORT`
`DB_DATABASE`
`DB_USERNAME`
`DB_PASSWORD`


## 🕹️ Como Utilizar
Para rodar estas aplicações será necessário, primeiramente escolher a que deseja, entre elas:

- BACK-END (VUE-CRUD)
- FRONT-END (VUE3-CONTROL-LIST)

Inicializando o back-end
### Servidor
```bash
  - composer install
  - npm install
  - php artisan migrate
  - php artisan db:seed --class=UserProfile
  - php artisan serve
```

Inicializando o front-end
### Web
```bash 
  - npm i
  - npm run dev
```

## Documentação da API

### HTTP methods 
- GET = Buscar
- POST = Criar
- PUT = Editar uma entidade
- PATCH = Editar uma informação específica
- DELETE = Deletar/Apagar


```http
  /users
```


| Parâmetro   | Tipo       | METHOD | Descrição                           |
| :---------- | :--------- |:-------- :---------------------------------- |
| `---` | `JSON` |`GET`| Buscando todos os usuários

Retorna um código de erro 404 para sucesso 200.

```http
  /users
```

| Parâmetro   | Tipo       | METHOD | Descrição                           |
| :---------- | :--------- |:-------- :---------------------------------- |
| `{name, email, cpf, addresses.cep, addresses.logradouro` | `JSON` |`POST`| Criando um usuário

Retorna um código de erro 409 para sucesso 201.


```http
  /users/{id}
```

| Parâmetro   | Tipo       | METHOD | Descrição                           |
| :---------- | :--------- |:-------- :---------------------------------- |
| `---` | `JSON` |`GET`| Retornando um usuário a partir do ID

Retorna um código de erro 404 para sucesso 200.


```http
  /users{id}/delete
```

| Parâmetro   | Tipo       | METHOD | Descrição                           |
| :---------- | :--------- |:-------- :---------------------------------- |
| `{id}` | `JSON` |`POST`| Deletando um usuário a partir do ID

Retorna um código de erro 404 para sucesso 200.

```http
  /user/{id}/update
```

| Parâmetro   | Tipo       | METHOD | Descrição                           |
| :---------- | :--------- |:-------- :---------------------------------- |
| `{id}` | `JSON` |`PUT`| Editar informações de um usuário especifico a partir do ID

Retorna um código de erro 404 para sucesso 200.


```http
  /address/{id}/delete
```

| Parâmetro   | Tipo       | METHOD | Descrição                           |
| :---------- | :--------- |:-------- :---------------------------------- |
| `{id}` | `JSON` |`POST`| Deletar um endereço a partir do ID

Retorna um código de erro 404 para sucesso 200.

```http
  /user/{id}/address
```

| Parâmetro   | Tipo       | METHOD | Descrição                           |
| :---------- | :--------- |:-------- :---------------------------------- |
| `{id}` | `JSON` |`POST`| Criar um endereço para um usuário especifico a partir do ID

Retorna um código de erro 404 para sucesso 201.
