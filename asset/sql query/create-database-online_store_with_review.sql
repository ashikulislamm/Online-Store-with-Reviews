create database online_store_with_review;

use online_store_with_review;
create table user(
    user_id int not null auto_increment primary key,
    user_name varchar(50),
    user_number varchar(20),
    email varchar(50),
    user_password varchar(200),
    user_address varchar(200),
    active_orders int
);


use online_store_with_review;
insert into user(user_name,user_number,email,user_password,user_address,active_orders) values("Ashik","01711623102","ashik@gmail.com","19102joa","Khilgaon,road-2,Building no-12,Dhaka",3);
insert into user (user_name,user_number,email,user_password,user_address,active_orders)values("Dona","01811332332","dona@gmail.com","helloworld","Baridhara, road-11,House-22,Dhaka",2);
insert into user (user_name,user_number,email,user_password,user_address,active_orders)values("Zenun","01538120375","zenun@gmail.com","GGEZ","Shyamoli,road-2,Building no-13",1);


use online_store_with_review;
select * from user;


use online_store_with_review;
create table products(
    product_id int primary key not null,
    catagory varchar(50),
    brand varchar(50),
    product_name varchar(100),
    product_descr varchar(400),
    price int ,
    stock_status int,
    product_photo varchar(100),
);

use online_store_with_review;
insert into products(product_id,catagory,brand,product_name,product_descr,price,stock_status,product_photo) values(1006,"Smartwatch"," Zeblaze","Zeblaze Stratos 2","Zeblaze Stratos 2 GPS Smart Watch AMOLED Display has 1.3″ Always-on AMOLED Display, Accurate Built-in GPS, 24H Health Management and Water Resistant 5 ATM. Get free shipping on orders over 2500 BDT from Vibe Gaming.",8750,29,"Zeblaze-Stratos-2.png");


use online_store_with_review;
Alter table products
add column added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP;


use online_store_with_review;
select * from products where catagory="Smartwatch";


use online_store_with_review;
create table orders(
    order_id int not null auto_increment primary key,
    amount int ,
    users_id int not null ,
    foreign key(users_id) references user(user_id),
    receiver_name varchar(50),
    dil_address varchar(200),
    receiver_phone varchar(20),
    receiver_email varchar(50),
    order_date date,
    order_status varchar(50),
    payment_status varchar(50)
);

use online_store_with_review;
insert into orders(amount,users_id,receiver_name,dil_address,receiver_phone,receiver_email,order_date,order_status,payment_status) values(5,1,"Ashik","khilgaon,Dhaka","0153812766","ashik@gmail.com",'2023-12-1',"In warehouse","paid");
insert into orders(amount,users_id,receiver_name,dil_address,receiver_phone,receiver_email,order_date,order_status,payment_status) values(5,3,"Zenun","khilgaon,Dhaka","01753812766","zenun@gmail.com",'2023-12-1',"In warehouse","paid");
insert into orders(amount,users_id,receiver_name,dil_address,receiver_phone,receiver_email,order_date,order_status,payment_status) values(5,2,"Dona","khilgaon,Dhaka","0183812766","dona@gmail.com",'2023-12-1',"In warehouse","paid");

use online_store_with_review;
select * from orders;

use online_store_with_review;
create table order_details(

    order_id int not null ,
    foreign key(order_id) references orders(order_id),
    product_id int not null,
    foreign key(product_id) references products(product_id),
    quantity int
    
);

use online_store_with_review;
insert into order_details(order_id,product_id,quantity) values(1,2001,2);

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
insert into wishlist(user_id,products_id) values(1,2001);

use online_store_with_review;
select * from wishlist;



use online_store_with_review;
create table review(
    review_id int not null auto_increment primary key,
    product_id int not null,
    foreign key (product_id) references products(product_id),
     users_id int ,
    foreign key(users_id) references user(user_id),
    descript varchar(400)

);

use online_store_with_review;
insert into review(product_id,users_id,descript) values(2001,3,"Nice product but less available");

use online_store_with_review;
select* from review;


