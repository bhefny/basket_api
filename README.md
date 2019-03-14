# Purpose:

Sample of Basket API using only show() and update()

Using Slim Framework for simplicity. code can be reviewed at located at src/Api/..
User authentication is simplified and only depending on access token being present in a cookie

## Steps

1. Clone basket repository form github, we are now on `master` branch

```
git clone git@github.com:bhefny/basket_API.git
cd basket_API
```

2. Assuming docker & docker-compose are already installed

```
docker-compose up
```

3. List all user tokens

```
docker exec -it basket_api_mariadb_1 mysql -sN -u root shop_development -e 'SELECT token FROM users'
```

4. userstory1: "as a customer, I want to add an item into the basket"

```
curl -iX PUT http://localhost/api/basket --cookie "my_basket_token=<USER_TOKEN>" -d product_id=1
```

5. userstory2: "as a customer, I want to view all my items in my basket"

```
curl -iX GET http://localhost/api/basket/1 --cookie "my_basket_token=<USER_TOKEN>"
```

6. userstory2: "as a customer, I want to view all my items in my basket" (optional)

```
curl -iX GET http://localhost/api/basket --cookie "my_basket_token=<USER_TOKEN>"
```
