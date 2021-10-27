<?php

declare(strict_types=1);





// function clearfield(){
//     $_SESSION['email'] = "";
// }
// if (empty($_SESSION['email'])) {
//     $_SESSION['email'] = "";
// }
// if (empty($_SESSION['street'])) {
//     $_SESSION['street'] = "";
// }
// if (empty($_SESSION['streetNumber'])) {
//     $_SESSION['streetNumber'] = "";
// }
// if (empty($_SESSION['city'])) {
//     $_SESSION['city'] = "";
// }
// if (empty($_SESSION['zipcode'])) {
//     $_SESSION['zipcode'] = "";
// }
// $total = 0;
// if (isset($_COOKIE['total'])) {
// $total = ($_COOKIE['total']);
// }



$emailErr = $streetErr = $streetnumberErr = $cityErr = $itemsErr = $zipcodeErr = "";
$email = $street = $streetnumber = $city = $zipcode =$items= "";



$products1= [
  ['name' => 'Club Ham', 'price' => 3.20],
  ['name' => 'Club Cheese', 'price' =>  3],
  ['name' => 'Club Cheese & Ham', 'price' => 4],
  ['name' => 'Club Chicken', 'price' => 4],
  ['name' => 'Club Salmon', 'price' => 5]
];

$products2 = [
  ['name' => 'Cola', 'price' => 2],
  ['name' => 'Fanta', 'price' =>2],
  ['name' => 'Sprite', 'price' => 2],
  ['name' => 'Ice-tea', 'price' => 3],
];
$foods = $products1;
// $totalValue = 0;
session_start();
// $_SESSION['username']="name";
$type = 'food';
if(isset($_GET['food'])) {
  $type = $_GET['food'];
}
if($type == 'drink') {
  $foods = $products2;
}
// counting total price



if(isset($_POST['express_delivery'])){
    
    $deliveryTime = "15 Minutes";
}
else{
    $deliveryTime = "45 minutes";
}

if(isset($_POST['reset'])){
    $_SESSION['email']=" ";
    $_SESSION['street']=" ";
    $_SESSION['streetnumber']=" ";
    $_SESSION['city']=" ";
    $_SESSION['zipcode']=" ";
    $_SESSION['items']=" ";
    $_SESSION['cost']=" ";
    
}
if(isset($_POST['order'])){

    
    if (isset($_POST["email"])) {
        // var_dump($_POST["email"]);
        $_SESSION['email'] = $_POST["email"];

        if($_POST["email"] == '') {
            $emailErr = "Email is required";
        }
        else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format"; 
         }
     }


    if (empty($_POST["street"])) {
        $streetErr = "Street name is required";
    } else {
        $_SESSION['street'] = $_POST["street"];;
    }

    if (empty($_POST["streetnumber"])) {
        $streetnumberErr = "StreetNumber is required";
     }else {
       $_SESSION['streetnumber']=$_POST["streetnumber"];
        
        if(!is_numeric( $_SESSION['streetnumber']))
        {
            $streetnumberErr = "Data Enter was not Numbers";
        }
     }

    if (empty($_POST["city"])){
        $cityErr = "City name is required";
    } else {
        $_SESSION['city']=$_POST["city"];
        // $city = ($_POST["city"]);
    }

    if (empty($_POST["zipcode"])) {
        $zipcodeErr = "zipcode is required";
     }else {
       $_SESSION['zipcode']=$_POST["zipcode"];
       
        if(!is_numeric($_SESSION['zipcode']))
        {
            $zipcodeErr = "Only Enter Numbers";
        }
     }

    if (empty($_POST["items"])){
        $itemsErr = "select items";
    } else {
        $_SESSION['items']=$_POST['items'];
        
    }

    $totalValue = 0;
    $deliverycost=5;
if(!$emailErr && ! $streetErr && !$streetnumberErr && !$cityErr && !$zipcodeErr){
    if(isset($_SESSION['cost'])) {
        $totalValue = $_SESSION['cost'];
    }
    if(isset($_POST['items'])&& isset($_POST['express_delivery'])){
        foreach ($_POST['items'] as $food) {
            $totalValue =intval( $totalValue) + intval($food) +$deliverycost;}
        }else if(isset($_POST['items'])){
        foreach ($_POST['items'] as $food) { 
                $totalValue = intval($totalValue) +intval($food);
        }
        }
        // var_dump($totalValue);
     
     $_SESSION['cost']=$totalValue;
}
    
?>
    <?php
    if ($emailErr == "" && $streetErr == "" && $streetnumberErr == "" && $cityErr == "" && $zipcodeErr == "") {
    ?>
    <?php
    if(isset($_SESSION['email'])&& isset($_SESSION['city'])&& isset($_SESSION['streetnumber'])&& isset($_SESSION['street'])&& isset($_SESSION['zipcode'])&& isset($_SESSION['cost'])&& isset($_SESSION['items'])){
    ?>
   <div class="alert alert-primary" role="alert"><?php echo "Your order will arrive at $deliveryTime";?></div>
   <?php   }
    }
}

?>


<?php require 'form-view.php';?>

