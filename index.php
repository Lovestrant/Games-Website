<?php
include_once('db.php');
$errors = array("ConnectionErr" => "", "success" => "", "phonenumberErr" => "");
$phonenumber =$password = '';

if(isset($_POST['submit'])){

    // Check connection
    if ($con->connect_error || !$con) {
        // die("Connection failed: " . $conn->connect_error);
        $errors['ConnectionErr'] = "Connection Failed";
    }else {
    
        $errors['success'] = "Connected successfully";
    } 
    
}


//Code to Authenticate User Before viewing more Actions

if(isset($_POST['viewMoreActions'])){

 
    $phonenumber = mysqli_real_escape_string($con, $_POST['phonenumber']);
    $password =  mysqli_real_escape_string($con, $_POST['password']);
    
    if($phonenumber=="" || $password == "") {
        $errors['phonenumberErr'] = "Empty input fields not allowed";

    }else {

        $sql1="SELECT * FROM auth where  phonenumber = '$phonenumber' and password= '$password' LIMIT 1";
  
        $result= mysqli_query($con,$sql1);
        $queryResults= mysqli_num_rows($result);
        
        if($queryResults) {
    
            while($row = mysqli_fetch_assoc($result)) {
      
    
            //taking user to Dashboard page
        
            echo "<script>location.replace('dashboard.php');</script>";    
            
    
           
            }
        }else{
            $errors['phonenumberErr'] = "Wrong combinations. Fill your details correctly.";
           
        }
    }

    
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB-Based Assignment</title>

    <!--Bootstrap css Links -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!--Bootstrap JS Links -->
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<?php include_once('header1.php'); ?>
<body>
    <div class="container-fluid">

        <div class="container">
           <br><br> <br><br>
            <p>Hello, Welcome to The Database Driven Web:</p>
        
            <form action="index.php" method="post">
                <button type= "submit" name="submit">Check Mysql Connection</button>
            </form>

        <!--Error display-->
        <div><h5 style="color: red;"><?php echo $errors['ConnectionErr']; ?></h5></div>
        <div><h5 style="color: green;"><?php echo $errors['success']; ?></h5></div>

            <div>
                <form action="index.php" method="post">
                    <br><br> <br><br>
                    <h4>Input the following details to view more actions:</h4>
                <input class="reginput" type="number" name ="phonenumber" placeholder="Enter your Phone Number" value="<?php echo $regNo;?>"><br><br>
                <input  class="passinput" type="password" name = "password" placeholder ="Enter password" value="<?php echo $password;?>"> <br><br>
                <div><h5 style="color: red;"><?php echo $errors['phonenumberErr']; ?></h5></div>
            
                
                <button style="color:green;" name="viewMoreActions">View more actions</button>
                </form>
          
            </div>

        </div>
    </div>
</body>
</html>


