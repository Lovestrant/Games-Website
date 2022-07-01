<?php 


    //initializing values
    $title = $genre = $year =$publisher ="";

    include_once('db.php');
    //initializing errors array
    $errors = array("error" => "", "success" => "");

    if (isset($_POST['editbtn'])) {


      //getting variables
     
      $title = mysqli_real_escape_string($con, $_POST['title']);
      $genre = mysqli_real_escape_string($con, $_POST['genre']);
      $year = mysqli_real_escape_string($con, $_POST['year']);
      $publisher = mysqli_real_escape_string($con, $_POST['publisher']);
      $picurl = $_FILES['file']['name'];
   

        if(!empty($title) && !empty($genre) && !empty($year)&& !empty($publisher)) {

            

            $picurl = $_FILES['file']['name'];
            $tmp = $_FILES['file']['tmp_name'];
            move_uploaded_file($tmp,"files/screenshots/screenshots".$picurl);


        
            $sql = "INSERT INTO gamesdetails(gameTittle, genre, year,publisher,screenshot)
            values('$title', '$genre', '$year', '$publisher', '$picurl')"; 
            $res = mysqli_query($con,$sql);
            
        
            if($res ==1){
        
                $errors['success'] ="Post Success.";
           
            }
         
        }else{
            $errors['error'] ="Fill all required fields and choose a screenshot.";

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


<!--Css link-->
<link rel="stylesheet" type="text/css" href="index.css">

    <!--Bootstrap css Links -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!--Bootstrap JS Links -->
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

</head>



</head>
<?php include_once('header1.php'); ?>
<body>
<div class = "container-fluid">
    <div class = "row">
    
            
    
    </div>

    <div class="row">
<div class = "row" style="margin-left: 5%;text-align: centre;">

<div class="container">

<div class="row" style="margin: 3%;">
 <div class="col-sm-12">
     <h3>Insert Data to the Database</h3>
    <form action = "insert.php" method="post" enctype="multipart/form-data">
 
    <input class="passinput" type ="text" name="title" placeholder="Enter game title" value="<?php echo $title; ?>"><br><br>
            <input class="passinput" type="text" name="genre" placeholder="Enter game genre"  value="<?php echo $genre;?>"> <br><br>
            <input class="passinput" type="text" name="year" placeholder="Enter year" value="<?php echo $year; ?>"><br><br>
            <input class="passinput" type="text" name="publisher" placeholder="Enter publisher" value="<?php echo $publisher; ?>"><br><br>


    <input type="file" name="file" accept="image/*" ><br><br>

    <div><h5 style="color: red;"><?php echo $errors['error']; ?></h5></div>
    <div><h5 style="color: green;"><?php echo $errors['success']; ?></h5></div>

    <button name="editbtn" style="background-color: red;color:white;">Add Post</button>
    </form>
    

 </div> 

 </div>

 </div>

</div>



</body>
</html>
