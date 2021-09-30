<?php include('server.php');
if(isset($_SESSION["Username"])){
	$username=$_SESSION["Username"];
	if ($_SESSION["Usertype"]==1) {
		$linkPro="employeeProfile.php";
		$linkEditPro="editEmployee.php";
		$linkBtn="applyJob.php";
		$textBtn="Apply for this job";
	}
	else{
		$linkPro="employerProfile.php";
		$linkEditPro="editEmployer.php";
		$linkBtn="editJob.php";
		$textBtn="Edit the job offer";
	}
}
else{
    $username="";
	//header("location: index.php");
}

if(isset($_SESSION["f_user"])){
	$f_user=$_SESSION["f_user"];
	$_SESSION["msgRcv"]=$f_user;
}

$sql = "SELECT * FROM employe WHERE username='$f_user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$profilepic=$row["profilepic"];
		$fname=$row["fname"];
        $lname=$row["lname"];
		$Email=$row["Email"];
		$mnumber=$row["mnumber"];
		$Gender=$row["Gender"];
		$Age=$row["Age"];
		$Bdate=$row["Bdate"];
		$address=$row["address"];
		$zipcode=$row["zipcode"];
		$city=$row["city"];
		$province=$row["province"];
		$validID=$row["validID"];
		 
	    }
} else {
    echo "0 results";
}


 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Employee profile</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
	  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="asset/fontawesome/css/all.min.css">

<style>
	body{padding-top: 3%;margin: 0;}
	.card{box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); background:#fff}
</style>

</head>
<body>

<!--Navbar menu-->
<nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-white portfolio-navbar gradient">
        <div class="container"><a class="navbar-brand logo" href="<?php echo $linkPro; ?>">Service Finder</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navbarNav"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navbarNav">
                <ul class="nav navbar-nav ml-auto">
                <li class="nav-item" role="presentation"><a class="nav-link active" href="allEmployee.php">Browse all Employees</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="allEmployer.php">Browse all Employer</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="allJob.php">Browse all jobs</a></li>
                    <div class="btn-group">
                    <button type="button"   role="presentation" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="color:white">
                    <i class="fas fa-user"></i><?php echo $username; ?>
                    </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Edit Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Message</a></li>
                        </ul>
                    </div>
            </div>
        </div>
        <li class="nav navbar-nav nav-item" role="presentation"><a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i></a></li>
    </nav>
<!--End Navbar menu-->


<!--main body-->
<div style="padding:5% 3% 1% 3%;">
<div class="row">

<!--Column 1-->
	<div class="col-lg-3">

<!--Main profile card-->
		<div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
			<p></p>
			<img src="asset/img/<?php echo $profilepic; ?>">
			<h2><?php echo $fname; ?>, <?php echo $lname; ?></h2>
			<p><span class="glyphicon glyphicon-user"></span> <?php echo $f_user; ?></p>
	        <center><a href="sendMessage.php" class="btn btn-info"><span class="glyphicon glyphicon-envelope"></span>  Send Message</a></center>
	        <p></p>
	    </div>
<!--End Main profile card-->




	</div>
<!--End Column 1-->

<!--Column 2-->
	<div class="col-lg-7">

<!--Freelancer Profile Details-->	
		<div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
			<div class="panel panel-primary">
			  <div class="panel-heading"><h3>Employee Profile Details</h3></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-heading"><h4>User Information</h4></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-body"><h5> Name: <?php echo $fname; ?>, <?php echo $lname; ?></h5></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-body"><h5> Email: <?php echo $Email; ?></h5></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-body"><h5> Gender: <?php echo $Gender; ?></h5></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-body"><h5> Age: <?php echo $Age; ?></h5></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-body"><h5> Mobile Number: <?php echo $mnumber; ?></h5></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-body"><h5> Address: <?php echo $address; ?>, <?php echo $city; ?>,<?php echo $province; ?></h5></div>
			</div>
			
		</div>
<!--End Freelancer Profile Details-->

	</div>
<!--End Column 2-->



</div>
</div>
<!--End main body-->


<script src="assets/js/jquery-3.4.1.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="sassets/js/jquery.min.js"></script>
</body>
</html>