

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
<?php include_once('header1.php'); ?>
<body>
<div class="container-fluid">
<div class="col-sm-12">
      
</div>


<div class="container">


    <h2>Search Details With Hyperlinks:</h2>
 

<div class="Thediv">


<?php

            include('db.php');
            if(isset($_POST['searchbtn'])) {
                if(!empty($_POST['searchinput'])){

                $search = mysqli_real_escape_string($con, $_POST['searchinput']);
                $sql = "SELECT * FROM gamesdetails WHERE gameTittle LIKE '%$search%'";
                $result = mysqli_query($con, $sql);
                $queryResult = mysqli_num_rows($result);

           

                if($queryResult > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "  
                        <div>
                        <a href='moreDetails.php?postId=".$row['id']."'> <h3 style='color: green;'>".$row['gameTittle']."</h3></a>
                            
                        </div>

                      ";

                     }

                    }else{
                        echo"<script>alert('No results matching your search.');</script>";
                        echo "<script>location.replace('dashboard.php');</script>";
                    }

            }else{
                echo "<script>alert('Type something to search.')</script>";
                echo "<script>location.replace('dashboard.php')</script>";
            }
            }
		?>


</div>

    </div>
</div>

</body>
</html>