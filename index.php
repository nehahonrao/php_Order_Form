<?php

session_start();
// $_SESSION['username']="name";
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <link rel="stylesheet" href="index.css">
    <title>Form validation</title>
  </head>
  <body>



  <?php

         // define variables and set to empty values
         $nameErr= $lastnameErr = $emailErr = $genderErr = $websiteErr =$addressErr=$cityErr= $streetnumberErr=$streetnameErr= $zipcodeErr = $productErr=$colddrinkErr= "";
         $name= $lastname = $email = $gender = $product = $address=$city= $streetnumber =$streetname= $zipcode =$colddrink="";
        //  $abc=$_SESSION['name'];
         if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (empty($_POST["name"])) {
               $nameErr= "Name is required";
            }else {
              $_SESSION['name']=$_POST["name"];
               $name = test_input($_POST["name"]);
               
                // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $nameErr = "Only letters and white space allowed";
             
            }else if(strlen($name)<4){
                 $nameErr="Name should be minimun 4 characters";
             }
            
            }

            if (empty($_POST["lastname"])) {
              $lastnameErr = "Name is required";
           }else {
              $_SESSION['lastname'] = $_POST["lastname"];
              $lastname = test_input($_POST["lastname"]);
              
               // check if name only contains letters and whitespace
           if (!preg_match("/^[a-zA-Z-' ]*$/",$lastname)) {
           $lastnameErr = "Only letters and white space allowed";
           }
          }

          if (empty($_POST["gender"])) {
            $genderErr = "Select Gender";
         }else {
           $_SESSION['gender']=$_POST["gender"];
         }
            
            if (empty($_POST["email"])) {
               $emailErr = "Email is required";
            }else {
              $_SESSION['email'] = $_POST["email"];
               $email = test_input($_POST["email"]);
               
               // check if e-mail address is well-formed
               if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  $emailErr = "Invalid email format"; 
               }
            }
            
            
            if (empty($_POST["address"])) {
               $addressErr = "Address is required";
            }else {
              $_SESSION['address'] = $_POST["address"];
               $address = test_input($_POST["address"]);
              
            }

            if (empty($_POST["city"])) {
              $cityErr = "City Name is required";
           }else {
            $_SESSION['city']=$_POST["city"];
              $city = test_input($_POST["city"]);
             
           }
            
            if (empty($_POST["streetname"])) {
               $streetnameErr = "Address is required";
            }else {
              $_SESSION['streetname']=$_POST["streetname"];
               $streetname = test_input($_POST["streetname"]);
              
            }
            
             if (empty($_POST["streetnumber"])) {
               $streetnumberErr = "StreetNumber is required";
            }else {
              $_SESSION['streetnumber']=$_POST["streetnumber"];
               $streetnumber = test_input($_POST["streetnumber"]);
               if(!is_numeric($streetnumber))
               {
                   $streetnumberErr = "Data Enter was not Numbers";
               }
            }
            
             if (empty($_POST["zipcode"])) {
               $zipcodeErr = "StreetNumber is required";
            }else {
              $_SESSION['zipcode']=$_POST["zipcode"];
               $zipcode = test_input($_POST["zipcode"]);
               if(!is_numeric($zipcode))
               {
                   $zipcodeErr = "Only Enter Numbers";
               }
            }
            
            if (empty($_POST["gender"])) {
               $genderErr = "Gender is required";
            }else {
              $_SESSION['gender']=$_POST["gender"];
               $gender = test_input($_POST["gender"]);
            }
            
            if (empty($_POST["product"])) {
               $productErr = "You must select 1 or more sandwich";
            }else {
              $_SESSION['product']=$_POST["product"];
               $product = $_POST["product"];	
            }

            if (empty($_POST["colddrink"])) {
              $colddrinkErr = "You must select 1 or more Cold-Drink";
           }else {
            $_SESSION['colddrink']=$_POST["colddrink"];
              $colddrink = $_POST["colddrink"];	
           }

         }
         
         function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
         
//          $product = [
//     ['name' => 'Club Ham', 'price' => 3.20],
//     ['name' => 'Club Cheese', 'price' => 3],
//     ['name' => 'Club Cheese & Ham', 'price' => 4],
//     ['name' => 'Club Chicken', 'price' => 4],
//     ['name' => 'Club Salmon', 'price' => 5]
// ];
      ?>

<<div class="d-grid gap-6 d-md-flex justify-content-md-end">
  <button class="btn btn-outline-secondary "type="button">FOOD</button>
  <button class="btn btn-outline-secondary"type="button">DRINK</button>
</div>

    <h3>Welcome to Sandwich King!</h3>
   
    <form method = "POST" class="info" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <div class="row">
  <div class="col-md-6">
    <label for="firstname" class="bright">First Name</label>
    <input type="text" class="form-control" name="name" placeholder="First name" id="firstname"  value="<?php echo $_SESSION['name'];
     ?>">
     <span class = "error"> <?php echo $nameErr;?></span> 
      
  </div>
  <div class="col-md-6">
  <label for="lastname" class="bright">Last Name</label>
  <input type="text" class="form-control" name="lastname" placeholder="Last name" id="lastname"  value="<?php echo $_SESSION['lastname'];
     ?>">
  <span class = "error"> <?php echo $lastnameErr;?></span>    
 </div>
 </div>

 <!-- <div class ="row"> -->
<div class="col-md-6"> 
<label for="gender" class="bright">Gender</label>
<input type = "radio" name = "gender" value = "female" <?php 
if($_SESSION['gender']=='female'){
 echo 'checked';
}
?>>Female
 
 <input type = "radio" name = "gender" value = "male" <?php 
 if($_SESSION['gender']=='male'){
  echo 'checked';
 }
 ?>>Male

<input type = "radio" name = "gender" value = "other" <?php 
if($_SESSION['gender']=='other'){
echo 'checked';
}
?>>Other
<span class = "error"> <?php echo $genderErr;?></span>
</div>
<!-- </div> -->
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4" class="bright">Email</label>
      <input type="email" class="form-control" name="email" id="inputEmail4" placeholder=" Enter your Email" value="<?php echo $_SESSION['email']; ?>">
      <span class = "error"> <?php echo $emailErr;?></span>
    </div>
   
  <div class="form-group col-md-6">
    <label for="inputAddress" class="bright" >Address</label>
    <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Enter your Street Name" value="<?php echo $_SESSION['address'];
     ?>">
    <span class = "error"><?php echo $addressErr;?></span>
  </div>
</div>
 
  <div class="form-row">
    <div class="form-group col-md-6">

    <label for="inputState" class="bright" name="city">City</label>
      <select id="inputState" class="form-control" name="city" 
      >
        <option selected>Choose your City</option>
        <option <?php if($_SESSION['city']=='Antwerp'){
        echo 'selected';
      }?> >Antwerp</option>
        <option <?php if($_SESSION['city']=='Brussels'){
        echo 'selected';
      }?>>Brussels</option>
        <option <?php if($_SESSION['city']=='Brugge'){
        echo 'selected';
      }?>>Brugge</option>
        <option <?php if($_SESSION['city']=='Namur'){
        echo 'selected';
      }?>>Namur</option>
      </select> 
      <span class = "error"><?php echo $cityErr;?></span> 
    </div>
    <div class="form-group col-md-4">
    <label for="inputCity" class="bright" >Street Number</label>
      <input type="text" class="form-control" id="inputCity" name="streetnumber" value="<?php echo $_SESSION['streetnumber'];  ?>">
      <span class = "error"><?php echo $streetnumberErr;?></span>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip" class="bright" >ZipCode</label>
      <input type="text" class="form-control" id="inputZip" name="zipcode" value="<?php echo $_SESSION['zipcode'];?>">
      <span class = "error"><?php echo $zipcodeErr;?></span>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
    <label for="inputState" class="bright" >Food to Eat:</label>
      <select id="inputState" class="form-control" name="product">
        <option selected>Select Sandwich</option>
        <option  <?php if($_SESSION['product']=='Club Ham,€ 3.20'){
        echo 'selected';
      }?>>Club Ham,€ 3.20</option>
        <option <?php if($_SESSION['product']=='Club Cheese,€ 3'){
        echo 'selected';
      }?>>Club Cheese,€ 3</option>
        <option <?php if($_SESSION['product']=='Club Cheese & Ham,€ 4'){
        echo 'selected';
      }?>>Club Cheese & Ham,€ 4</option>
        <option <?php if($_SESSION['product']=='Club Chicken, € 4'){
        echo 'selected';
      }?>>Club Chicken, € 4</option>
        <option <?php if($_SESSION['product']=='Club Salmon, € 5'){
        echo 'selected';
      }?>>Club Salmon, € 5</option>
      </select>  
      <span class = "error"> <?php echo $productErr;?></span>
    </div>

    <div class="form-group col-md-6">
    <label for="inputState" class="bright" >Cold Drink:</label>
      <select id="inputState" class="form-control" name="colddrink">
        <option selected>Select Cold-Drink</option>
        <option <?php if($_SESSION['colddrink']=='Cola,€2'){
        echo 'selected';
      }?>>Cola,€2</option>
        <option <?php if($_SESSION['colddrink']=='Fanta,€2.5'){
        echo 'selected';
      }?>>Fanta, €2.5</option>
        <option <?php if($_SESSION['colddrink']=='Sprite, €1.5'){
        echo 'selected';
      }?>>Sprite, €1.5</option>
        <option <?php if($_SESSION['colddrink']=='Ice Tea, €1'){
        echo 'selected';
      }?>>Ice Tea, €1</option>
        <option <?php if($_SESSION['colddrink']=='Coffe, €2'){
        echo 'selected';
      }?>>Coffe, €2</option>
      </select>  
      <span class = "error"> <?php echo $colddrinkErr;?></span>
 </div>
</div>


  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck" name="checked" required>
      <label class="form-check-label" for="gridCheck">
        Agree with Terms and Conditions
      </label>
      <?php if(!isset($_POST['checked'])){ ?>
               <span class = "error"><?php echo "You must agree to terms";?></span>
               <?php } ?> 
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php

  if(isset($name) && ($lastname) && ($email) && ($address)  && ($city) && ($streetnumber) && ($product) && ($zipcode) && ($colddrink) && ($gender)){
   
    // <div class="alert alert-success" role="alert">
    //  echo "Your Order Submitted Successfully";
    // </div>
    echo "Your Order Submitted Successfully";
    
}else{
//   <div class="alert alert-danger" role="alert">
//   echo "Server problem, Try after sometime";
// </div>
echo "Server problem, Try after sometime";
}
?>

<?php   
        echo "<h3>Your given values are as :</h3>";
         echo ("<p>Your name is $name</p>");
         echo ("<p>Your name is $lastname</p>");
         echo ("<p> your email address is $email</p>");
         echo ("<p> your address is $address</p>");
         echo ("<p> your streetname  is $streetname</p>");
         echo ("<p> your streetnumber is $streetnumber</p>");
         echo ("<p> your zipcode is $zipcode</p>");
         echo ("<p>your gender is $gender</p>");
        
      ?>
  </body>
  
</html>