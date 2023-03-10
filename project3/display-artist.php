<?php

$page = $_SERVER['PHP_SELF'];

$dbhost = 'localhost';
$dbname = 'Web3_A4_E3';
$dbuser = 'postgres';
$dbpass = 'David910139';
$conn = new PDO("pgsql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);

$artists = $conn->query('SELECT * FROM artists WHERE artist_id=1');
$artist = $artists->fetch(PDO::FETCH_ASSOC);




?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chapter 11</title>

    <!-- Bootstrap core CSS  -->    
    <link href="bootstrap3_defaultTheme/dist/css/bootstrap.css" rel="stylesheet"> 
    <!-- Custom styles for this template -->
    <link href="bootstrap3_defaultTheme/theme.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

<?php include 'includes/art-header.inc.php'; ?>

<div class="container">
   <div class="row">

      <div class="col-md-10">
         <h2><?php echo $artist['first_name'];  ?>  <?php echo $artist['last_name'];  ?></h2>
         <div class="row">
            <div class="col-md-5">
               <img src="images/art/artists/medium/<?php echo $artist['image_filename'];  ?>" class="img-thumbnail img-responsive" alt="" title=""/>
               
            </div>
            <div class="col-md-7">
               <p>
               <?php echo $artist[''];  ?>
               </p>
               <div class="btn-group btn-group-lg">
                 <button type="button" class="btn btn-default">
                     <a href="#"><span class="glyphicon glyphicon-heart"></span> Add to Favorites List</a>  
                 </button>
               </div>               
               <p>&nbsp;</p>
               <div class="panel panel-default">
                 <div class="panel-heading"><h4>Artist Details</h4></div>
                 <table class="table">
                   <tr>
                     <th>Date:</th>
                     <td><?php echo $artist['birth_year'];  ?> - <?php echo $artist['death_year'];  ?></td>
                   </tr>
                   <tr>
                     <th>Nationality:</th>
                     <td><?php echo $artist['nationality'];  ?></td>
                   </tr>  
                   <tr>
                     <th>More Info:</th>
                     <td><?php echo $artist['artist_link'];  ?></td>
                   </tr>    
                 </table>
               </div>                              
               
            </div>  <!-- end col-md-7 -->
         </div>  <!-- end row (product info) -->
         
         <p>&nbsp;</p>
 
         <?php include 'includes/art-artist-works.inc.php'; ?>
         

      </div>  <!-- end col-md-10 (main content) -->
      
      <div class="col-md-2">      
         <?php include 'includes/art-right-nav.inc.php'; ?>
      </div> <!-- end col-md-2 (right navigation) -->           
   </div>  <!-- end main row --> 
</div>  <!-- end container -->

<?php include 'includes/art-footer.inc.php'; ?>




    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="bootstrap-3.0.0/assets/js/jquery.js"></script>
    <script src="bootstrap-3.0.0/dist/js/bootstrap.min.js"></script>    
  </body>
</html>
