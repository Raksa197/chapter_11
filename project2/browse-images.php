<?php

$dbhost = 'localhost';
$dbname = 'Web3_A4_E2';
$dbuser = 'postgres';
$dbpass = 'David910139';
$conn = new PDO("pgsql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);

// Get the selected filter parameters
$city = $_GET['city'];
$country = $_GET['country'];

// Construct the SQL query based on the selected filters
$sql = 'SELECT * FROM travelimages';
if ($city != 0 && $country != 0) {
   $sql .= " WHERE city_id='$city' AND country_id='$country'";
}
else if ($city != 0 ) {
   $sql .= " WHERE city_id='$city'";
}
else if ($country != 0) {
   $sql .= " WHERE country_id='$country'";
}

// Query to select images from the database based on the selected filters
$images = $conn->query($sql);

// Query to retrieve cities, continents, and countries for filtering
$cities = $conn->query('SELECT * FROM geocities');
$continents = $conn->query('SELECT * FROM geocontinents');
$countries = $conn->query('SELECT * FROM geocountries');
$countries_filter = $conn->query('SELECT * FROM geocountries');

?>

<!-- Display the filter form and the images -->
<!-- ... -->


<!DOCTYPE html>
<html lang="en">
<head>
   <title>Travel Template</title>
   <?php include 'includes/travel-head.inc.php'; ?>
</head>
<body>

<?php include 'includes/travel-header.inc.php'; ?>
   
<div class="container">  <!-- start main content container -->
   <div class="row">  <!-- start main content row -->
      <div class="col-md-3">  <!-- start left navigation rail column -->
         <?php include 'includes/travel-left-rail.inc.php'; ?>
      </div>  <!-- end left navigation rail --> 
      
      <div class="col-md-9">  <!-- start main content column -->
         <ol class="breadcrumb">
           <li><a href="#">Home</a></li>
           <li><a href="#">Browse</a></li>
           <li class="active">Images</li>
         </ol>          


         <div class="well well-sm">
            <form class="form-inline" role="form" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
              <div class="form-group" >
                <select class="form-control" name="city">
                  <option value="0">Filter by City</option>
                  <?php foreach ($cities as $cities) { ?>
                    <option value="<?php echo $cities['city_id']; ?>"><?php echo $cities['city_name']; ?></option>
                  <?php } ?>
    
                </select>
              </div>
              <div class="form-group">
                <select class="form-control" name="country">
                  <option value="0">Filter by Country</option>
                  <?php foreach ($countries_filter as $countries_filter) { ?>
                    <option value="<?php echo $countries_filter['country_id']; ?>"><?php echo $countries_filter['country_name']; ?></option>
                  <?php } ?>
                </select>
              </div>  
              <button type="submit" class="btn btn-primary">Filter</button>
            </form>         
         </div>      <!-- end filter well -->
           
         
         <div class="well">
            <div class="row">
                <!-- display image thumbnails code here -->

                <!-- display image thumbnails code here -->
               <?php 
               foreach($images as $image): ?>
               <div class="col-md-3">
                  <a href="travel-image.php?id=<?php echo $image['image_id']; ?>">
                     <img src="images/travel/square/<?php echo $image['image_path']; ?>" alt="<?php echo $image['Title']; ?>" class="img-thumbnail">
                  </a>
               </div>
               <?php endforeach; ?>
            </div>
         </div>   <!-- end images well -->

      </div>  <!-- end main content column -->
   </div>  <!-- end main content row -->
</div>   <!-- end main content container -->
   
<?php include 'includes/travel-footer.inc.php'; ?>   

   
   
 <!-- Bootstrap core JavaScript
 ================================================== -->
 <!-- Placed at the end of the document so the pages load faster -->
 <script src="bootstrap3_travelTheme/assets/js/jquery.js"></script>
 <script src="bootstrap3_travelTheme/dist/js/bootstrap.min.js"></script>
 <script src="bootstrap3_travelTheme/assets/js/holder.js"></script>
</body>
</html>