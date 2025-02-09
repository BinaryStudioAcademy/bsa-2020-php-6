# Home task #
1. Clone [this](https://github.com/BinaryStudioAcademy/bsa-2020-php-6) repository
2. Install & run the project locally or in the container with [docker-compose](https://dotsandbrackets.com/quick-intro-to-docker-compose-ru/)
A few examples of how to execute common commands in docker-compose:
    - Install composer-package `docker-compose exec app composer require package/name`
    - Execute _php artisan_ commands `docker-compose exec app php artisan ...`
3. Create a database, run migrations and seed database with data.
4. Add the following Entities with relations and migrations:
    - Order `[id, date, orderItems, buyer]`
    - OrderItem `[id, order, product, quantity, price, discount (%), sum (price x discount x quantity)]`
    - Buyer `[id, name, surname, country, city, addressLine, phone, orders]`
    
    relations:
    - Order -> OrderItem(many), 
    - Buyer -> Orders(many)
    
    *all money values should be stored in cents - 5$ => 500 in db* 
5. Create factories for **Order, OrderDetail, Buyer** using Faker
6. Create order seeder which will create Order with new OrderItems, Buyer using factories and already existing in database Products 
7. Add CRUD endpoints (API routes and controller actions) for Order entity:
- create order shape:
```
POST: {
    buyerId: id,
    orderItems: [{
        productId: id.
        productQty: quantity,
        productDiscount: %,
    }, { 
        ...
    }]
}
```
- update order shape:
```
PUT: {
    orderId: id,
    orderItems: [{
        productId: id.
        productQty: quantity,
        productDiscount: %,
    }, { 
        ...
    }]
}
```

8. Create resource presenters and return Order by id in the following shape: 
```
{ 
    data: {
        orderId: id,
        orderDate: date,
        orderSum: sum, 
        orderItems: [{
            productName: name,
            productQty: quantity,
            productPrice: price,
            productDiscount: %,
            productSum
        }, { 
            ... 
        }], 
        buyer: {
            buyerFullName: name+surname, 
            buyerAddress: country+city+addressLine,
            buyerPhone: phone
        }
    }
}
```
