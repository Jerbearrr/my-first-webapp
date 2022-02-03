<?php
	include('database.php');
	session_start();
	unset($_SESSION['firstname']);
	unset($_SESSION['lastname']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sign In</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


  <link rel="stylesheet" href="assets/owlcarousel/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/owlcarousel/assets/owl.theme.default.min.css">
  <script src="assets/owlcarousel/owl.carousel.js"></script>
  
  <script src="./scripts/script.js"></script>
  <link rel="stylesheet" href="./styles/CETproj.css" />

</head>

<body style="background-color:white;background-size:cover;background-attachment:fixed;" >



<nav class="navbar-expand-md fixed-top py-1" style="background-color:#A31F1F;box-shadow: 0px 0 18px rgba(55, 66, 59, 0.08);box-shadow:   0px 0.1px 5px 0px white; z-index:1000;" >
<div class="container" style="max-width:1150px;">
<div class="d-flex" > 

<div class="d-inline-flex align-items-center " style="">
  <button onclick="Opensidenav()" class=" ml-2 mr-1 ml-md-0 d-sm-block d-md-none my-0 align-items-center d-flex " type="button"  style="background-color:white;font-size:25px;border:1px solid #F2FCFF;border-radius:3px;">   
    <span class="fas fa-bars my-1 opensidenav " style="background-color:white;color:black;line-height:1.1!important" ></span>
  </button> 
 <a class="navbar-brand justify-content-center py-0 my-0 px-0 mr-1 d-none d-md-block" href="./index.php" style="width:100%;">
    <img class="d-flex justify-content-center " src="assets/images/puplogo.png" alt="Logo" style="height:38px;">
  </a>
</div>


<div class="d-flex " style="">
<div class="collapse navbar-collapse ml-0  " id="collapsibleNavbar"   >
    <ul class="navbar-nav "  >
      <li class="nav-item ">
        <a class="nav-link"  style="color:white;text-decoration:none;" href="./index.php">Welcome Visitor!</a>
      </li>



    </ul>
</div>
</div>

<div class="collapse navbar-collapse ml-1   " id="collapsibleNavbar"  >
<div class=" d-flex ml-auto " style="">

 <span class="navline my-1 " ></span>

    <ul class="navbar-nav "  >
	
      <li class="nav-item bg-sm-dark">
        <a class="nav-link navlinkbuttons" href="CETprojCartpage.html">Other Resources</a>
      </li>	  
	<li class="nav-item">
        <a class="nav-link navlinkbuttons" href="#" data-toggle="modal" data-target="#myModal">Contact Us</a>
      </li>
    </ul>

</div>
</div>




</div>
</div>
</nav>

<div id="myModal1" class="modal fade">
	<div class="modal-dialog ">
<div class="SignupStudent bg-dark modal-content modal-loginform"  autocomplete="false" >
			<form action="confirmation.php" method="post" autocomplete="false" autocomplete="off" >
				<div class="modal-header align-items-center">				
					<h4 class="modal-title">Student Sign Up</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: #F8ECFF;opacity:1;outline:none;" >&times;</button>
				</div>
				<div class="modal-body">				
					<div class="form-group">
						<label>First Name</label>
						<input type="text" class="form-control" required="required" autocomplete="off"  autocomplete="false" >
					</div>
					<div class="form-group">
						<label>Last Name</label>
						<input type="text" class="form-control" required="required" autocomplete="off"  autocomplete="false" >
					</div>
					<div class="form-group">
						<div class="clearfix">
							<label>Email</label>
						
						</div>
						
						<input type="email" class="form-control" required="required" autocomplete="off"  autocomplete="false">
					</div>
					<div class="form-group">
						<div class="clearfix">
							<label>Password</label>
							
						</div>
						
						<input type="password" class="form-control" required="required" autocomplete="off"  autocomplete="false">
					</div>
					
				</div>
				<div class="modal-footer justify-content-center">
					
		
					<input type="submit" class="btn btn-light"   value="Sign Up" style="color:black;width:50%;box-shadow:0px 1px 1px 0px black;">
				</div>
			</form>
		</div>
	</div>
</div> 




<div class="container mt-0 px-lg-3  px-md-2 px-1 navchange h-25 " style="max-width:1150px;">

<div class="d-inline-flex w-100" >

<div class="leftblock d-none d-lg-block mt-3 " >

<div class="logo d-flex align-items-center justify-content-center mb-3 w-100 bg-dark">
<div class="logobox d-flex align-items-center justify-content-center w-100 bg-dark  px-4 py-4">
<img class="logoimg " src="assets/images/puplogo.png" alt="Card image"  >
</div>
<div class="logoname d-flex align-items-center justify-content-center mb-4 w-100 bg-dark text-light">

<h4 class="" >PUP CEA</h4>
<h3 class="" >Web Library</h3>
</div>

</div>
<ul class="homebuttons" style="padding: 0;list-style-type: none;">
<?php echo "<a class='bookdescriptioncontainerhome text-decoration-none ' href ='index.php'>"; ?>
<li class="homebutton  d-flex align-items-center mt-2  w-100 " >
<i class="fas fa-home h-10 mr-2 align-items-center "></i><h5 class=" buttontext align-items-center mt-2 justify-content-center" >Home</h5>
</li>
</a>

<?php echo "<a class='bookdescriptioncontainerhome text-decoration-none d-flex' href ='AdvanceSearch.php'>"; ?>
<li class="homebutton d-flex align-items-center mt-2 w-100 ">
<i class="fas fa-search mr-2 align-items-center  "></i><h5 class="buttontext align-items-center mt-2 justify-content-center" >Browse</h5>
</li>
</a>
<?php echo "<a class='bookdescriptioncontainerhome text-decoration-none d-flex' href ='LoginPage.php'>"; ?>
<li class="homebutton d-flex align-items-center mt-2 w-100 ">
<i class="fas fa-sign-in-alt mr-2 align-items-center  "></i><h5 class="buttontext align-items-center mt-2 justify-content-center" >Login</h5>
</li>
</a>
</ul>

</div>

<div class="rightblock ml-0 ml-lg-3 pb-4 d-flex align-items-center justify-content-center" style="flex-direction:column;min-height:700px;margin-top:48px;"  >

<div class="loginpagecontainer browsecontainer d-flex w-100 align-items-center justify-content-center h-100  mt-3" style="min-height:498px;">

<div class="bg-light loginforms  py-2  d-block align-items-center " style="width:40%;border-radius:5px;">

<div class="container" id="container">
	<div class="form-container sign-up-container">
								<form action="scripts/auth.php?type=admin" method="post" autocomplete="off">
									<h1 class="mb-4">Sign in as Admin</h1>



									<input type="email" placeholder="Email" name="email"/>
									<input type="password" placeholder="Password" name="password"/>
									<button class="mt-3 w-100 loginbutton">Sign In</button>
									<?php
										if(isset($_GET['error']) && $_GET['type'] == 'admin') {
											switch($_GET['error']) {
												case 401:
													echo '<p style="color: red">You entered a wrong email/password</p>';
													break;													
											}
										}
									?>		
								</form>
	</div>
	<div class="form-container sign-in-container">
								<form action="scripts/auth.php?type=student" method="post" autocomplete="off">
									<h1 class="mb-4">Sign in as Student</h1>


									<input type="email" placeholder="Email" name="email"/>
									<input type="password" placeholder="Password" name="password"/>

									<button class="mt-3 w-100 loginbutton">Sign In</button>		
									<?php
										if(isset($_GET['error']) && $_GET['type'] == 'student') {
											switch($_GET['error']) {
												case 401:
													echo '<p style="color: red">You entered a wrong email/password</p>';
													break;													
											}
										}
									?>		
											<div class="w-100 mt-3" style="border-bottom:1px solid black;" ></div>
								<button class="mt-3 bg-dark signupbutton  "   data-toggle="modal" data-dismiss="modal" data-target="#myModal1">Create new account</button>
								</form>
			
	
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1 class="mb-2" >Sign in as Student?</h1>
				<p>Get the resources that you need by entering your student account</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1 class="mb-2">Sign in as Admin?</h1>
				<p>Enter your personal details and manage the library resources</p>
				<button class="ghost" id="signUp">Sign In</button>
			</div>
		</div>
	</div>
</div>



<form class="d-none" action="confirmation.php" method="post" autocomplete="false" autocomplete="off" >
				<div class="modal-header align-items-center">				
					<h4 class="modal-title">Login as Admin</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: #F8ECFF;opacity:1;outline:none;" >&times;</button>
				</div>
				<div class="modal-body">				
					<div class="form-group">
						<label>First Name</label>
						<input type="text" class="form-control" required="required" autocomplete="off"  autocomplete="false" >
					</div>
					<div class="form-group">
						<label>Last Name</label>
						<input type="text" class="form-control" required="required" autocomplete="off"  autocomplete="false" >
					</div>
					<div class="form-group">
						<div class="clearfix">
							<label>Email</label>
						
						</div>
						
						<input type="email" class="form-control" required="required" autocomplete="off"  autocomplete="false">
					</div>
					<div class="form-group">
						<div class="clearfix">
							<label>Password</label>
							
						</div>
						
						<input type="password" class="form-control" required="required" autocomplete="off"  autocomplete="false">
					</div>
					
				</div>
				<div class="modal-footer justify-content-center">
					
		
					<input type="submit" class="btn btn-light"   value="Sign Up" style="background-color:#F48BA9 !important;color:white;width:50%;box-shadow:0px 1px 1px 0px black;">
				</div>
			</form>
</div>


</div>











</div>


</div>

</div>


</body>

</html>

