<?php

$page = $_SERVER['PHP_SELF'];

$dbhost = 'localhost';
$dbname = 'Web3_A4_E3';
$dbuser = 'postgres';
$dbpass = 'David910139';
$conn = new PDO("pgsql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);

$artworks = $conn->query('SELECT * FROM artworks WHERE id=1');
$artwork = $artworks->fetch(PDO::FETCH_ASSOC);




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
         <h2><?php echo $artwork['title'];  ?></h2>
         <p>By <a href="display-artist.php?id="></a></p>
         <div class="row">
            <div class="col-md-5">
               <img src="images/art/works/medium/<?php echo $artwork['image_filename'];  ?>" class="img-thumbnail img-responsive" alt="title here"/>
            </div>
            <div class="col-md-7">
               <p>
               <?php echo $artwork['description'];  ?>
               </p>
               <p class="price"><?php echo $artwork['price'];  ?></p>
               <div class="btn-group btn-group-lg">
                 <button type="button" class="btn btn-default">
                     <a href="#"><span class="glyphicon glyphicon-gift"></span> Add to Wish List</a>  
                 </button>
                 <button type="button" class="btn btn-default">
                  <a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Add to Shopping Cart</a>
                 </button>
               </div>               
               <p>&nbsp;</p>
               <div class="panel panel-default">
                 <div class="panel-heading"><h4>Product Details</h4></div>
                 <table class="table">
                   <tr>
                     <th>Date:</th>
                     <td><?php echo $artwork['year'];  ?></td>
                   </tr>
                   <tr>
                     <th>Medium:</th>
                     <td><?php echo $artwork['medium'];  ?></td>
                   </tr>  
                   <tr>
                     <th>Dimensions:</th>
                     <td><?php echo $artwork['height'];  ?> cm X <?php echo $artwork['width'];  ?> cm</td>
                   </tr> 
                   <tr>
                     <th>Home:</th>
                     <td><a href="#"><?php echo $artwork['original_home'];  ?></a></td>
                   </tr>  
                   <tr>
                     <th>Genres:</th>
                     <td>
                     <?php echo $artwork['description'];  ?>

                     </td>
                   </tr> 
                   <tr>
                     <th>Subjects:</th>
                     <td>
                     <?php echo $artwork['original_home'];  ?>
                   
                     </td>
                   </tr>     
                 </table>
               </div>                              
               
            </div>  <!-- end col-md-7 -->
         </div>  <!-- end row (product info) -->

 
         <?php include 'includes/art-artist-works.inc.php'; ?>
                     
      </div>  <!-- end col-md-10 (main content) -->
      
      <div class="col-md-2">   
         <?php include 'includes/art-shopping-cart.inc.php'; ?>
      
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
