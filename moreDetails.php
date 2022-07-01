



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
                     <h2 style='color: red;'>More Details About the record:</h2>
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
                                <img src='files/screenshots/screenshots".$row['screenshot']."' style = 'width: 60%; height:auto;'><br><br>
                                <p style='color: black;font-size:20px; '>".$row['genre']."</p>  
                                <p style='color: green;text-decoration:bold;font-size:20px; '>Year: ".$row['year']."</p> 
                                <p style='color: green;text-decoration:bold;font-size:20px; '>Publisher: ".$row['publisher']."</p>  <br> 
        
                                <a href='editpage.php?postId=".$row['id']."'><button style='color: purple;'>Edit</button></a>
                                <a href='delete.php?postId=".$row['id']."'><button style='color: red;'>Delete</button></a>
                                <hr>
                                </div>
        
                              ";
                            }
                        }
       

                              
    ?>
                    
                 </div>
             </div>
         </div>


</div>



</body>
</html>