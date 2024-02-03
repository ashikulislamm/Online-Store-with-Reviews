<?php
   //include 'config.php';
   
   $connect = new PDO("mysql:host=localhost;dbname=online_store_with_review", "root", "");
   
   if(isset($_POST["product_id"]))
   {
   
       $data = array(
           ':product_id'	=>	$_POST["product_id"],
           ':user_name'		=>	$_POST["user_name"],
           ':rating'		=>	$_POST["rating"],
           ':descript'		=>	$_POST["descript"],
           ':datetime'			=>	time()
       );
   
       $query = "
       INSERT INTO review
       (product_id, user_name, rating, descript, datetime) 
       VALUES (:product_id, :user_name, :rating, :descript, :datetime)
       ";
   
       $statement = $connect->prepare($query);
   
       $statement->execute($data);
   
       echo "Your Review & Rating Successfully Submitted";
   
   }
?>