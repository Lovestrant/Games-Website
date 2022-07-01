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
      $postid = $_POST['hiddenid'];

        if(!empty($title) && !empty($genre) && !empty($year)&& !empty($publisher)) {

            

            $picurl = $_FILES['file']['name'];
            $tmp = $_FILES['file']['tmp_name'];
            move_uploaded_file($tmp,"files/screenshots/screenshots".$picurl);


            $sql = "UPDATE gamesdetails set gameTittle = '$title', genre='$genre',year='$year',publisher='$publisher',screenshot='$picurl' where id='$postid'";
        
            $res = mysqli_query($con,$sql);
            
        
            if($res ==1){
        
        
             echo "<script>alert('Adit Success.')</script>"; 
             echo "<script>location.replace('editpage.php?postId=$postid');</script>"; 
         
            }
         
        }else{
           // $errors['error'] ="Fill all required fields and choose a ad picture.";
            echo "<script>alert('Fill all required fields and choose Screenshot.')</script>"; 
            echo "<script>location.replace('editpage.php?postId=$postid');</script>"; 
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
                <h2 style='color: blue;'>Croll down to get the Edit form:</h2>
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
                                <p style='color: black;font-size:20px; '>".$row['genre']."</p>  
                                <p style='color: green;text-decoration:bold;font-size:20px; '>Year: ".$row['year']."</p> 
                                <p style='color: green;text-decoration:bold;font-size:20px; '>Publisher: ".$row['publisher']."</p>  

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
     <h3>Fill the form to edit; Change where necessary</h3>
    <form action = "editpage.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name= "hiddenid" value=<?php $id= $_GET['postId']; echo $id; ?>> <!-- Hidden input-->
 
    <input class="passinput" type ="text" name="title" placeholder="Enter game title" value="<?php echo $title; ?>"><br><br>
            <input class="passinput" type="text" name="genre" placeholder="Enter game genre"  value="<?php echo $genre;?>"> <br><br>
            <input class="passinput" type="text" name="year" placeholder="Enter year" value="<?php echo $year; ?>"><br><br>
            <input class="passinput" type="text" name="publisher" placeholder="Enter publisher" value="<?php echo $publisher; ?>"><br><br>


    <input type="file" name="file" accept="image/*" ><br><br>


    <button name="editbtn" style="background-color: red;color:white;">Edit Post</button>
    </form>
    <br><br>

    <div><h5 style="color: red;"><?php echo $errors['error']; ?></h5></div>
    <div><h5 style="color: green;"><?php echo $errors['success']; ?></h5></div>

 </div> 

 </div>

 </div>

</div>



</body>
</html>
