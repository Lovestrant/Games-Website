<?php 

    //initializing errors array
    $errors = array("error" => "", "success" => "");



    if(isset($_POST['deletepost'])){
        include_once('db.php');

    $postid = $_POST['hiddenid'];
    $sql1="DELETE FROM gamesdetails where id = '$postid'";
    
    $data= mysqli_query($con,$sql1);
    if($data ==1) {
        //$errors['sucess'] ="Post Deleted successfully.";
        echo "<script>alert('Post Deleted successfully.')</script>";
        echo "<script>location.replace('dashboard.php')</script>";
    }else{
        echo "<script>alert('Deleation Failed.')</script>";
        echo "<script>location.replace('delete.php?postId=$postid')</script>";
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


    <div class="row">
<div class = "row" style="margin-left: 5%;text-align: centre;">

<div class="container">
             <div class="row">
                 <div class="col-sm-12" >
                     <h2 style='color: red;'>Be sure Before you delete:</h2>
     <?php 




        include_once('db.php');
          
        $postId = $_GET['postId'];
      
    
            $sql="SELECT * FROM gamesdetails where id = '$postId'";

 
                   $data2= mysqli_query($con,$sql);
                   $queryResults2= mysqli_num_rows($data2);
                   
         
                   
                    if($queryResults2 >0) {
                              while($row = mysqli_fetch_assoc($data2)) {
                           
                                echo "  
                                <div>
                                    <h3 style='color: green;'>".$row['gameTittle']."</h3>
                                    
                                </div>

                                <div style='margin-top: 3%; text-align:centre; margin-bottom: 5%;'>
                                <img src='files/screenshots/screenshots".$row['screenshot']."' style = 'width: 80%; height:auto;'><br><br>
                                <p style='color: black;font-size:20px; '>Genre: ".$row['genre']."</p>  
                                <p style='color: green;text-decoration:bold;font-size:20px; '>Year: ".$row['year']."</p> 
                                <p style='color: green;text-decoration:bold;font-size:20px; '>publisher: ".$row['publisher']."</p>  

                                <hr>
                                </div>

                               
                              ";
                              
                            }
                        }
       

                              
    ?>
                    
                 </div>
             </div>
         </div>

<div class="row" style="margin: 3%;">
 <div class="col-sm-12">
    <form action = "delete.php" method="post">
    <input type="hidden" name= "hiddenid" value=<?php $id= $_GET['postId']; echo $id; ?>> <!-- Hidden input-->

     <button name="deletepost" style="background-color: red;color:white;">Delete Above Post</button>
    </form>

    <div><h5 style="color: red;"><?php echo $errors['error']; ?></h5></div>
     <div><h5 style="color: green;"><?php echo $errors['success']; ?></h5></div>

 </div> 

 </div>

 </div>







</div>



</body>
</html>