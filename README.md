VidFlex API Test
------------

### Requirements
* Laravel ^8.0
* PHP ^8.0

### Installation

[Install Laravel](https://laravel.com/docs/8.x/installation)


add composer package 

```bash
composer require sil2/vidflex

```

Configure DB connection in .env file

```bash
DB_CONNECTION=mysql
DB_HOST=
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

run to create tables:

```bash
php artisan migrate

```

run to seed test data

```bash
php artisan db:seed --class="Sil2\Vidflex\Database\Seeds\VidflexSeeder"

```

### API

## Auth Token
 
```bash
POST /token/create?email=test@test.comw&password=test

```

use test user or any valid user email & password to get the token

## API commands

All API requests must contains a valid Bearer token in the headers

Example:
```bash
curl --location --request GET 'http://vidflex.local/api/order/1' \
--header 'Authorization: Bearer #########'

```

To add products to the cart
```bash
POST /api/cart/products/{product-id}

```

To retrieve a list of products in the cart

```bash
GET /api/cart

```

To create an order from the cart

```bash
POST /api/order

```

To retrieve a list of products in the order

```bash
GET /api/order/{order-id}

```
