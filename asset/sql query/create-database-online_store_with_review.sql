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

use online_store_with_review;
insert into products(product_id,catagory,brand,product_name,product_descr,price,stock_status,product_photo) values (4003,"Neckband","Baseus","Baseus Bowie P1 Half-In-ear Neckband Wireless Earphone","The Baseus Bowie P1 Half-In-Ear Neckband Wireless Earphone features a 14mm PET diaphragm coil for excellent sound quality. The neckband earphone has a Bluetooth 5.2 wireless chip for connecting your device up to 10 meters. It gives a 0.06 s low latency rate and a more stable connection for better synchronization of video, audio, and gaming. The Baseus Bowie P1 Neckband Wireless Earphone comes with a 170 mAh large battery. The 170 mAh battery provides up to 25 hours of playtime on a full charge. In 1.5 hours, the battery will be fully charged. The Baseus Bowie P1 Neckband Wireless Earphone also splashes water. rain- and sweat-resistant You can use them while jogging, walking, working out at the gym, and so on.",1800,12,"bowie_p1.png");

use online_store_with_review;
create table pre_booking(
    users_id int not null ,
    foreign key(users_id) references user(user_id),
    user_name varchar(100),
    email varchar(100),
    phone_num varchar(11),
    product_id varchar(10)
);

use online_store_with_review;
create table upcoming(
    product_id int not null primary key,
    product_name varchar(500),
    product_photo varchar(100),
    brand varchar(100),
    catagory varchar(100),
    product_descr varchar(500)
);

use online_store_with_review;
insert into upcoming  (product_id,product_name,product_photo,brand,catagory,product_descr) values (4001,"Yison E18 Wireless In Ear Neckband","yison_e18.png","Yison","Neckband","The Yison E18 Wireless In Ear Neckband are the ideal earphones for music lovers who want to enjoy wireless freedom and high-quality sound. These Neckband use Bluetooth 5.0 technology to connect with your devices and support AAC codecs, which deliver rich and detailed sound. The Yison E18 Wireless In Ear Neckband are also , which means they can withstand any weather conditions and intense workouts. The earphones have a 130mAh battery that offers up to 8 hours of music time and 250 hours of standby time on a single charge. The earphones also have a stylish and ergonomic neckband that fits comfortably around your neck and prevents the earbuds from falling off. The Yison E18 Wireless In Ear Neckband are the perfect earphones for anyone who values sound quality and durability.");
insert into upcoming  (product_id,product_name,product_photo,brand,catagory,product_descr) values (4002,"Oraimo Bow OEB-E58D Neckband Wireless Earphone","oraimo_bow.png","Oraimo","Neckband","The Oraimo Bow OEB-E58D Neckband Wireless Earphone has been designed to revolutionize your workouts. Its dynamic sound technology provides powerful and balanced sound. Oraimo Bow OEB-E58D can withstand strenuous training sessions thanks to its sweat-proof design, and the secure fit ensures a comfortable and personalized in-ear experience. Benefit from a long-lasting battery that provides up to 160 hours of standby or 10 hours of music play and talk time, as well as easy control with the in-line microphone and remote. The Oraimo Bow earphone, your ultimate fitness companion, will take your workouts to the next level.");


use online_store_with_review;
insert into upcoming  (product_id,product_name,product_photo,brand,catagory,product_descr) values (5001,"TX3 Mini-A Android 7.1 2GB RAM 16GB ROM TV Box","tx3_mini.png","Non-Brand","Tv Box","TX3 Mini-A Android 7.1 TV Box is built in Wifi,802.1.1b/g/n, RJ45 Ethernet port. This TV Box has 2GB DDR3 RAM and 16GB ROM, DC 5V/2A, Mail-450 penta-core,up to 750MHz+(DVFS) GPU, Amlogic S905W up to 2.0GHz,Quad core ARM Cortex-A53 CPU, 2 High speed USB 2.0,support U DISK and USB HDD with TF Card Reader. The AV(3 in 1)port also available in this TV Box. This TV Box supports TV, Projectors, and Monitors as well as USB webcams, USB Mouse and also Wireless Mouse and Gyroscopic Mouse Keyboard. HDMI ,AV, Optical, USB x 2, Ethernet/ LAN port, DC 5V Power Input, SD/ MMC Card Slot are also available in this TV Box. It has no warranty");
insert into upcoming  (product_id,product_name,product_photo,brand,catagory,product_descr) values (5002,"Xiaomi TV Box S (2nd Gen) 4K Ultra HD Streaming with Google TV","xiaomi_tv_box-s_2nd_gen.png","Xiaomi","Tv Box","Xiaomi TV Box S (2nd Gen) comes with a quad-core CPU that delivers efficient performance. It is equipped with a high-performance ARM Mali G31 MP2 GPU. It comes with a 2GB RAM + 8GB ROM combo offering a smoother viewing experience. It offers 4K Ultra HD resolution, Dolby Vision & HDR10+, Dolby Atmos & DTS-HD, Google TV, 360° Bluetooth & IR remote control, Chromecast Built-in, and mainstream ports for easy expansion.");


use online_store_with_review;
insert into upcoming  (product_id,product_name,product_photo,brand,catagory,product_descr) values (6001,"BOYA BY-M1S Universal Lavalier Microphone","by_m1s.png","Boya","Microphone","The BOYA BY-M1S Universal Lavalier Microphone is a clip-on microphone suitable for use with computers, smartphones, cameras, camcorders, audio recorders, and other audio/video recording equipment. BOYA BY-M1S is the best condenser microphone for recording audio and video. It offers an omnidirectional pick-up pattern. The BOYA BY-M1S Universal Lavalier Microphone requires no batteries as it is powered by connected devices. It also features low-handling noise.");
insert into upcoming  (product_id,product_name,product_photo,brand,catagory,product_descr) values (6002,"Redragon GM99 STIX USB Microphone","gm99_stix_2.png","Redragon","Microphone","Redragon GM99 STIX USB Microphone features smooth recording and clear voice. It is suitable for podcasting, chatting, recording vocals, podcasting, YouTube, Twitch, Skype, FaceTime, games, MSN, etc. It comes with RGB backlighting from the stand. it has a compact size and is very easy to carry. It is portable and durable. It features a flexible soft tube design, The neck can be adjusted 360 degrees. It supports a built-in sound card in your computer, no need to install drivers, easy to install, compatible with Windows (7, 8, and 10). it has a 1-year warranty.");
insert into upcoming  (product_id,product_name,product_photo,brand,catagory,product_descr) values (7001,"Lenovo Thinkplus K3 Mini Bluetooth Speaker","lenovo_k3_mini.png","Lenovo","Speaker","The Lenovo K3 Mini Wireless Speaker comes with upgraded BT5.0 chip, low latency, stable and fast transmission, wide compatibility. It also equipped with metal composite diaphragm, omnidirectional sound technology ensures the balanced diffusion of sound, bright treble, full midrange and powerful bass, HiFi sound quality. The Lenovo K3 comes with a lanyard, easy to carry and use whenever you want. It has built-in microphone, intelligent noise reduction, clear and bright sound without delay and it also has silicone buttons, comfortable feel, sensitive response, easy to operate. The Lenovo K3 Mini Wireless Speaker has no warranty.");
insert into upcoming  (product_id,product_name,product_photo,brand,catagory,product_descr) values (7002,"JOYROOM JR-ML03 Transparent RGB Bluetooth Wireless Speaker","jr_ml03.png","Joyroom","Speaker","The JOYROOM JR-ML03 is a Transparent luminous Bluetooth speaker. It is equipped with a 52mm driver unit and can deliver a power output of up to 5 watts. This Bluetooth speaker comes with Bluetooth version 5.1 and has a communication range of 12 meters. It has a frequency response of 50HZ-12khz and a horn sensitivity of -38±2dB. It is supported with HSP/HFP/A2DP/AVRCP protocols and SBC/MP3/WMA/FLAC/ MP4/M4A audio decoding. The JOYROOM JR-ML03 is powered by a 600mAh and comes with a Type-C charging interface. It takes 1.5 hours to be fully charged. It can deliver music time of about 6 hours with 70% volume and talk time of up to 7 hours with 70% volume. It has a connection standby time of 48 hours. The JOYROOM JR-ML03 comes with no warranty.");




use online_store_with_review;
select * from upcoming;



use online_store_with_review;
create table on_sale(
    product_id int not null primary key,
    product_name varchar(500),
    product_photo varchar(100),
    brand varchar(100),
    catagory varchar(100),
    product_descr varchar(500),
    old_price int ,
    new_price int,
    stock_status int
);