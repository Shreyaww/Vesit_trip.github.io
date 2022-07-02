<?php
$insert = false;
if(isset($_POST['name'])){
    $server = "localhost:3308";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("Connection failed due to ". mysqli_connect_error());
    }

  //  else
    //    echo "Connection Successful"

    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $mail = $_POST['mail'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    
    $sql = "INSERT INTO `vesit_trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$mail', '$phone', '$desc', current_timestamp());";

    //echo $sql;

    if($con -> query($sql) == true){
       // echo "Successfully Inserted!";
       $insert = true;
    }
    else{
        echo "ERROR";
    }

    $con -> close();

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Sriracha&display=swap" rel="stylesheet">
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <img class="vesit" src="vesit.jpg" alt="vesit image">
    <div class="container">
        <h1>Welcome to VESIT Trip Form</h1>
        <p>Enter your details and submit the form to confirm your participation in the trip</p>

        <?php
        if($insert == true)
        {
            echo "<p class='submitmsg'>Thanks for submitting your form. We are happy to see you joining us for the trip</p>";
        }
        ?>

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="mail" id="mail" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone number">
            <textarea name="desc" id="desc" cols="30" rows="7" placeholder="Enter any other information"></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
  
</body>
</html>