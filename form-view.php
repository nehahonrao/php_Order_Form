<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css"
          rel="stylesheet"/>
    <title>Order food & drinks</title>
</head>
<body>
<div class="container">
    <br>
    <h1><b>Order food in restaurant "the Personal Ham Processors"</b></h1>
    <nav>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link active" href="?food=food">FOOD</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?food=drink">DRINK</a>
            </li>
        </ul>
    </nav>
    <form method="post" class="information" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="email">E-mail:</label>
                <input type="text" id="email" name="email" class="form-control" value="<?php 
                 if(isset($_SESSION['email'])){
                      echo  $_SESSION['email'];
                    }else{
                     echo $_SESSION['email']=""; }?>">
                <span class="bg-danger text-white"><?php echo $emailErr;?></span>
            </div>
            <!-- <div>
                <h3>Order status:</h3>
                <span class="confirmation"></span>
            </div> -->
        </div>

        <fieldset>
            <legend>Address</legend>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="street">Street:</label>
                    <input type="text" name="street" id="street" class="form-control" value="<?php  if(isset($_SESSION['street'])){ echo  $_SESSION['street'];}?>">
                    <span class="bg-danger text-white"><?php echo $streetErr;?></span>
                </div>
                <div class="form-group col-md-6">
                    <label for="streetNumber">Street number:</label>
                    <input type="text" id="streetNumber" name="streetnumber" class="form-control" value="<?php  if(isset($_SESSION['streetnumber'])){ echo  $_SESSION['streetnumber'];}?>">
                    <span class="bg-danger text-white"><?php echo $streetnumberErr;?></span>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="city">City:</label>
                    <input type="text" id="city" name="city" class="form-control" value="<?php  if(isset($_SESSION['city'])){ echo  $_SESSION['city'];}?>">
                    <span class="bg-danger text-white"><?php echo $cityErr;?></span>

                </div>
                <div class="form-group col-md-6">
                    <label for="zipcode">Zipcode:</label>
                    <input type="text" id="zipcode" name="zipcode" class="form-control" value="<?php  if(isset($_SESSION['zipcode'])){ echo  $_SESSION['zipcode'];}?>">
                    <span class="bg-danger text-white"><?php echo $zipcodeErr;?></span>

                </div>
            </div>
        </fieldset>

        <fieldset>
            <legend>products</legend>
            <?php foreach ($foods as $food): ?>
                <label>
                    <input name = "items[]" type="checkbox" value="<?php echo $food['price']; ?>" name="foods[]"/> <?php echo $food['name'] ?> -
                    &euro; <?php echo number_format($food['price'], 2) ?></label><br />
            <?php endforeach; ?>
            <span class="bg-danger text-white"><?php echo $itemsErr;?></span>
        </fieldset>
    
        <label>
            <input type="checkbox" name="express_delivery" value="5" /> 
            Express delivery (+ 5 EUR) 
        </label>
            
        <button type="submit" class="btn btn-primary" name="order">Order!</button>
        <button type="submit" class="btn btn-primary" name="reset">Reset</button>
    </form>

    <footer>You already ordered <strong>&euro; <?php if(isset( $_SESSION['cost'])){echo $_SESSION['cost'];} ?></strong> in food and drinks.</footer>
</div>

<style>
    footer {
        text-align: center;
    }
    .information{
        border: 2px solid black;
        
    }
</style>

  
        <h3>Your given information as:</h3>
        <p> your email address: <?php echo $_SESSION['email'];?></p>
        <p> your streetname:<?php echo $_SESSION['street'];?></p>
        <p> your city: <?php echo $_SESSION['city'];?></p>
        <p> your streetnumber: <?php echo $_SESSION['streetnumber'];?></p>
        <p> your zipcode: <?php echo $_SESSION['zipcode'];?></p>
        <p> Delivery Time: <?php echo $deliveryTime;?></p>
        <p> your order: <?php echo implode("''",$_SESSION['items']);?></p>
        <p> Total amount to pay: <?php echo $_SESSION['cost'];?></p>

        
    
</body>
</html>