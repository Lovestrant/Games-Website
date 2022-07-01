
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
    <div class="col-sm-12">
     
    </div>
        <div class="container">
           <br>
            <h1>Dashboard:</h1>
            <a href='index.php'><button style='color: red;'>Exit System</button></a>

            <div>
                <form action="search.php" method="post">
                    <br><br>
  
                <input type="text" name ="searchinput" placeholder="Search games...">
                
                <button style="color:green;" name="searchbtn">Search</button>
                </form>
                <br><br>
                <a href='insert.php'><button style='color: blue;'>Insert New Data</button></a>
            </div>
            <br>
            <div>
            <h3>Data records from the database:</h3>
            <?php

            include_once('db.php');
                


            $sql="SELECT * FROM gamesdetails";


            $data2= mysqli_query($con,$sql);
            $queryResults2= mysqli_num_rows($data2);



            if($queryResults2 >0) {
                while($row = mysqli_fetch_assoc($data2)) {
           
                        echo " 
                    
                        <div>
                    
                            <h3 style='color: green;'>".$row['gameTittle']."</h3>
                            <a href='editpage.php?postId=".$row['id']."'><button style='color: purple;'>Edit</button></a>
                            <a href='delete.php?postId=".$row['id']."'><button style='color: red;'>Delete</button></a>
                        </div>  
                        <hr>  
       
                      ";


        
             }
                }
            
            ?>

            </div>
            
        </div>
    </div>
</body>
</html>
