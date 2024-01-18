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
    product_photo varchar(100)
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

use online_store_with_review;
insert into products(product_id,catagory,brand,product_name,product_descr,price,stock_status,product_photo) values(1001,"Smartwatch","Zeblaze","ZEBLAZE VIBE 7 ","Zeblaze VIBE 7 Bluetooth Calling Smartwatch has Large 1.39″ HD Color Display, Voice Calling via Bluetooth®, Easy 24/7 Health Management, 100+ Built-in Workout Modes and Up to 25 days of Battery Life. Get free shipping on orders over 2500 BDT from Vibe Gaming.",3450,25,"zeblaze_vibe_7.png");
insert into products(product_id,catagory,brand,product_name,product_descr,price,stock_status,product_photo) values(1002,"Smartwatch","Amazfit","Amazfit T-Rex","Amazfit T-Rex, Unleash Your Instinct with 12 Military Certifications and Rugged Body which has 20-day Battery Life and AMOLED Display.",10790,15,"amazfit_t_rex.png");
insert into products(product_id,catagory,brand,product_name,product_descr,price,stock_status,product_photo) values(1003,"Smartwatch","Amazfit","Amazfit Bip U Pro"," Amazfit Bip U Pro Smart Watch is your first into smart fitness. It’s the perfect combination of classic design and modern features",5290,22,"amazfit_bip_u_pro.png");
insert into products(product_id,catagory,brand,product_name,product_descr,price,stock_status,product_photo) values(1004,"Smartwatch","Xiaomi","Xiaomi Haylou RS3 LS04","Xiaomi Haylou RS3 LS04 Smartwatch has SpO2 tracking, Waterproof grade: 5 ATM, Display screen: 1.2″ AMOLED display, Battery life: About 12 days (24 hours of heart rate monitoring).",3999,20,"xiaomi_haylou_rs3_ls04.png");
insert into products(product_id,catagory,brand,product_name,product_descr,price,stock_status,product_photo) values(1005,"Smartwatch","Fitbit","Fitbit Sense Smartwatch","Fitbit Sense Smartwatch – Carbon/Graphite Stainless Steel has EDA Scan app, Battery lasts 6 plus days plus, built-in GPS, built-in Google Assistant or Amazon Alexa.",29999,12,"fitbit_sense_smartwatch.png");

use online_store_with_review;
insert into products(product_id,catagory,brand,product_name,product_descr,price,stock_status,product_photo) values(2001,"Earbuds","QCY","QCY M10 TWS","QCY M10 TWS Wireless In Ear Earphones are stylish and compact earbuds at an incredibly affordable price.",1250,32,"qcy_m10_tws.png");
insert into products(product_id,catagory,brand,product_name,product_descr,price,stock_status,product_photo) values(2002,"Earbuds","Realme","Realme Buds Q2 TWS","Realme Buds Q2 TWS Bluetooth earbuds – Black offers clear, noise free sound with its 10mm large driver, ENC algorithm, 88ms latency featuring game mode, IPX4 water resistance and long lasting battery.",1850,32,"realmebuds_q2_tws.png");
insert into products(product_id,catagory,brand,product_name,product_descr,price,stock_status,product_photo) values(2003,"Earbuds","JBL","JBL LIVE FREE NC+","JBL LIVE FREE NC+ True Wireless Earbuds has Up to 21 hours of combined playback, Frequency Response: 20Hz â€“ 20kHz, 6.8mm/0.27″ Dynamic Driver, Sweat & Water Proof. ",15550,29,"jbl_live_free_nc+.png");
insert into products(product_id,catagory,brand,product_name,product_descr,price,stock_status,product_photo) values(2004,"Earbuds","Edifier","Edifier Uni-Buds TWS","Edifier Uni-Buds TWS Dual Earbuds has 6mm biological diaphragm, CVC 8.0 Noise Cancellation Technology, IP65 Water and Dust Resistant and Smart Display Screen. ",5450,23,"edifier_unibuds_tws.png");
insert into products(product_id,catagory,brand,product_name,product_descr,price,stock_status,product_photo) values(2005,"Earbuds","Edifier","EDIFIER NB2 Pro","The Edifier TWS NB2 Pro features -38dB hybrid active noise-cancellation with the internal and external 2-way Mics precisely capture and reverse the noise, keeping away any disturbance from the outside.",7500,21,"edifier_nb2_pro.png");


use online_store_with_review;
insert into products(product_id,catagory,brand,product_name,product_descr,price,stock_status,product_photo) values(3001,"PowerBank","Realme","Realme 10000mAh 2i Power Bank","Realme 10000mAh 2i Power Bank – Black offers 12W Two-Way fast charge and recharge, dual output & input ports and low current mode for mobile accessories. ",1390,19,"realme_10000mah_2i.png");
insert into products(product_id,catagory,brand,product_name,product_descr,price,stock_status,product_photo) values(3002,"PowerBank","Mi","Mi 10000mAh Power Bank V3","Mi 10000mAh Power Bank V3 USB-C Fast charge 18W – Silver offers fast charging with its dual port inlet/ outlet,  Lithium Ion polymer battery, 18W fast charge along with the stylish sleek outlook. ",1450,21,"mi_10000mah_powerbank_v3.png");
insert into products(product_id,catagory,brand,product_name,product_descr,price,stock_status,product_photo) values(3003,"PowerBank","Joyroom","Joyroom JR-W050 20W 10000mah","Joyroom's JR-W050 power bank has a ring holder and a 20W 10000mah battery. It can simultaneously charge three devices and supports both conventional and wireless charging. It provides power for game consoles, watches, tablets, mobile phones, and e-readers. The PD3.0, QC3.0, and AFC fast charge protocols are supported. Magnetic charging at 5W, 7.5W, 10W, and 15W is compatible ",2375,21,"joyroom_jr-w050_20W_10000mah.png");
insert into products(product_id,catagory,brand,product_name,product_descr,price,stock_status,product_photo) values(3004,"PowerBank","Baseus","Baseus PPXJ30 Star Lord Digital Display 22.5W 30000mAh Fast Charge Power Bank","  The Baseus PPXJ30 Star Lord Digital Display 22.5W 30000mAh Fast Charge Power Bank – a must-have gadget that combines convenience and efficiency in one powerful package. With its 20W Power Delivery (PD) fast charging capability, this power bank can supercharge your devices, such as the Apple iPhone 13, to 50% battery in just 30 minutes, ensuring you're always connected and on the move. ",3250,21,"baseus_ppxj30_start_lord_digital_display_22.5w_30000mah_fast_charge.png");
insert into products(product_id,catagory,brand,product_name,product_descr,price,stock_status,product_photo) values(3005,"PowerBank","Havit","Havit PB90 10000mAh Power Bank"," he Havit PB90 10000mAh Power Bank is a portable charging device that provides a convenient solution for charging your electronic devices on the go. With a capacity of 10000mAh, it offers a substantial amount of power to keep your devices charged throughout the day. The power bank features multiple input and output options for versatile charging capabilities. It supports MicroUSB and Type-C input voltages, allowing you to recharge the power bank using either of these connectors. The MicroUSB input supports DC5V/2.0A, 9V/2.0A, and 12V/1.5A (18W) charging options, while the Type-C input supports DC5V/2.0A, 9V/2.0A, and 12V/1.5A (18W) charging options as well",1350,20,"havit_pb90_10000mah.png");

