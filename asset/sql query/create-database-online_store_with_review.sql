create database online_store_with_review;


use online_store_with_review;


use online_store_with_review;
create table products(
    product_id int auto_increment primary key ,
    catagory varchar(50),
    product_name varchar(100),
    product_descr varchar(400),
    price int ,
    stock_status int
);

use online_store_with_review;
insert into products(catagory,product_name,product_descr,price,stock_status) values("RAM","Corsair Vengence LPX ","Bus speed:3200 Mhz Memory:8GB",3200,25);
insert into products(catagory,product_name,product_descr,price,stock_status)values("CPU","Intel i5-12400","Genration:12th gen,Clock speed:3.2Ghz",22000,12);
insert into products(catagory,product_name,product_descr,price,stock_status)values("GPU","Galax RTX 4060 single fan","Memory:8GB,TDP:106Whr",35000,0);

use online_store_with_review;
select * from products;



use online_store_with_review;
create table orders(
    order_id int not null primary key auto_increment ,
    amount int ,
    order_date date,
    order_status varchar(50),
    product_id int not null,
    foreign key (product_id) references products(product_id),
    payment_status varchar(50)
);

use online_store_with_review;
insert into orders(amount,order_date,order_status,product_id,payment_status) values(5,'2023-12-1',"In warehouse",2,"paid");
insert into orders(amount,order_date,order_status,product_id,payment_status) values(15,'2023-11-3',"Dilevered",2,"paid");
insert into orders(amount,order_date,order_status,product_id,payment_status) values(19,'2023-11-23',"Handed over to deilvery man",2,"unpaid");

use online_store_with_review;
select * from orders;




use online_store_with_review;
create table user(
    user_id int not null auto_increment primary key,
    user_name varchar(50),
    age int check(age>14),
    email varchar(50),
    user_password varchar(50),
    user_address varchar(200),
    active_orders int
);


use online_store_with_review;
insert into user(user_name,age,email,user_password,user_address,active_orders) values("Ashik",22,"ashik@gmail.com","19102joa","Khilgaon,road-2,Building no-12,Dhaka",3);
insert into user (user_name,age,email,user_password,user_address,active_orders)values("Dona",22,"dona@gmail.com","helloworld","Baridhara, road-11,House-22,Dhaka",2);
insert into user (user_name,age,email,user_password,user_address,active_orders)values("Zenun",23,"zenun@gmail.com","GGEZ","Shyamoli,road-2,Building no-13",1);


use online_store_with_review;
select * from user;


use online_store_with_review;
create table payment(
    order_id int not null auto_increment,
    foreign key(order_id) references orders(order_id),
    payment_date date,
    payment_amount int,
    payment_method varchar(50),
    payment_details varchar(100)
);

use online_store_with_review;
alter table payment modify column order_id int not null auto_increment;


use online_store_with_review;
insert into payment(payment_date,payment_amount,payment_method,payment_details) values('2023-12-1',110000,"Cheque","Bank:One Bank, Account:1234393");
insert into payment(payment_date,payment_amount,payment_method,payment_details) values('2023-12-1',110000,"Bkash","Phone Number: 019********");
insert into payment(payment_date,payment_amount,payment_method,payment_details) values('2023-11-1',50000,"Nagad","Phone Number:015********");

use online_store_with_review;
select * from payment;




use online_store_with_review;
create table wishlist(
   user_id int not null,
   foreign key(user_id) references user(user_id),
   products_id int not null,
   foreign key(products_id) references products(product_id)
);

use online_store_with_review;
insert into wishlist(user_id,products_id) values(1,2);

use online_store_with_review;
select * from wishlist;