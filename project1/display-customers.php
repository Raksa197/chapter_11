<?php
   // Connect to the database
$dbhost = 'localhost';
$dbname = 'Web3_A4';
$dbuser = 'postgres';
$dbpass = 'David910139';
$conn = new PDO("pgsql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);

// Handle search query


if (isset($_GET['search'])) {
   $search = $_GET['search'];

   $stmt = $conn->prepare("SELECT first_name, last_name, email, university, city FROM customers WHERE first_name LIKE :search OR last_name LIKE :search OR email LIKE :search OR university LIKE :search OR city LIKE :search");
   $stmt->execute(array(':search' => '%' . $search . '%'));

   $customers = $stmt->fetchAll();
}else {
   $search = '';
   $customers = $conn->query('SELECT first_name, last_name, email, university, city FROM customers');
   
}


$categories = $conn->query('SELECT name FROM categories');
$imprints = $conn->query('SELECT name FROM imprints');

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta http-equiv="Content-Type" content="text/html; 
   charset=UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="">
   <meta name="author" content="">
   <title>Book Template</title>

   <link rel="shortcut icon" href="../../assets/ico/favicon.png">   

   <!-- Bootstrap core CSS -->
   <link href="bootstrap3_bookTheme/dist/css/bootstrap.min.css" rel="stylesheet">
   <!-- Bootstrap theme CSS -->
   <link href="bootstrap3_bookTheme/theme.css" rel="stylesheet">


   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!--[if lt IE 9]>
   <script src="bootstrap3_bookTheme/assets/js/html5shiv.js"></script>
   <script src="bootstrap3_bookTheme/assets/js/respond.min.js"></script>
   <![endif]-->
</head>

<body>

<header>  
    <div class="navbar navbar-default ">
      <div class="container">
         <nav>
           <div class="navbar-header">
             <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
             </button>
             <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-book"></span> Book Rep CRM</a>
           </div>
           <div class="navbar-collapse collapse navbar-right">
             <ul class="nav navbar-nav">
               <li><a href="#"><span class="glyphicon glyphicon-home"></span> Home</a></li>
               <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
             </ul>
             <form class="navbar-form navbar-right" role="search" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
               <div class="form-group">
                 <input type="text" class="form-control" placeholder="Search Customer" name="search" autocomplete="off">
               </div>
               <button type="submit" class="btn btn-default">Submit</button>
             </form>               
           </div><!-- end navbar collapse -->
        </nav>
      </div>
    </div>  <!-- end navbar -->
</header>

   
<div class="container">
   <div class="row">  <!-- start main content row -->

      <div class="col-md-2">  <!-- start left navigation rail column -->
         <?php include 'includes/book-left-nav.inc.php'; ?>
      </div>  <!-- end left navigation rail --> 

      <div class="col-md-8">  <!-- start main content column -->
        
         <!-- book panel  -->
         <div class="panel panel-danger spaceabove">           
           <div class="panel-heading"><h4>My Customers</h4></div>
           <table class="table">
             <tr>
               <th>Name</th>
               <th>Email</th>
               <th>University</th>
               <th>City</th>
             </tr>

             <?php foreach ($customers as $customer) { ?>
             <tr>
               <td><a><?php echo $customer['first_name']; ?><?php echo " " ?><?php echo $customer['last_name']; ?></a></td>
               <td><?php echo $customer['email']; ?></td>
               <td><?php echo $customer['university']; ?></td>
               <td><?php echo $customer['city']; ?></td>
             </tr>
         <?php } ?>

           </table>
         </div>           
      </div>
      
      <div class="col-md-2">  <!-- start left navigation rail column -->
         <div class="panel panel-info spaceabove">
            <div class="panel-heading"><h4>Categories</h4></div>
            
               <ul class="nav nav-pills nav-stacked">
               <?php foreach ($categories as $categories) { ?>
                     <li><a><?php echo $categories['name']; ?></a></li>
               <?php } ?>

               </ul> 
         </div>
         
         <div class="panel panel-info">
            <div class="panel-heading"><h4>Imprints</h4></div>
            <ul class="nav nav-pills nav-stacked">
               <?php foreach ($imprints as $imprints) { ?>
                        <li><a><?php echo $imprints['name']; ?></a></li>
                  <?php } ?>

            </ul>
         </div>         
      </div>  <!-- end left navigation rail --> 


      </div>  <!-- end main content column -->
   </div>  <!-- end main content row -->
</div>   <!-- end container -->
   


   
   
 <!-- Bootstrap core JavaScript
 ================================================== -->
 <!-- Placed at the end of the document so the pages load faster -->
 <script src="bootstrap3_bookTheme/assets/js/jquery.js"></script>
 <script src="bootstrap3_bookTheme/dist/js/bootstrap.min.js"></script>
 <script src="bootstrap3_bookTheme/assets/js/holder.js"></script>
</body>
</html>