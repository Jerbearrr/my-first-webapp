<?php

$firstname = '';
$lastname = '';
$image = '';
$title = '';
$author = '';
$isbn = '';
$publisher = '';
$description = '';

session_start();

if (isset($_SESSION)) {
	$firstname = $_SESSION['firstname'];
	$lastname  = $_SESSION['lastname'];
}

if (isset($_GET['id'])) {
	$id = htmlspecialchars($_GET['id']);
	$image = htmlspecialchars($_GET['image']);
	$title = htmlspecialchars($_GET['title']);
	$author = htmlspecialchars($_GET['author']);
	$isbn = htmlspecialchars($_GET['isbn']);
	$publisher = htmlspecialchars($_GET['publisher']);
	$description = htmlspecialchars($_GET['description']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Products</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
	<script src="./scripts/script.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
	<link rel="stylesheet" href="./assets/owlcarousel/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="./assets/owlcarousel/assets/owl.theme.default.min.css">
	<script src="./assets/owlcarousel/owl.carousel.js"></script>
	<link rel="stylesheet" href="./assets/css/animate.css" />
	<link rel="stylesheet" href="./styles/CETproj.css" />
<?php 

$changepass = $_GET['changepass'] ?? 'true' ;

if($changepass == 'false'){
	echo "<script> $(document).ready(function(){ $('#myModal').modal('show'); }); </script>";
}else if ($changepass == true || $changepass == ''){
	
}

?>
</head>

<body style="background-color:white;background-size:cover;background-attachment:fixed;">

  <div id="myModal" class="modal fade">
    <div class="modal-dialog ">
      <div class="modal-content my-5 modal-loginform" autocomplete="false">
        <form action="./scripts/changePass.php" method="post" autocomplete="false" autocomplete="off">
          <div class="modal-header modalhome align-items-center">
            <h4 class="modal-title">Change Password</h4>
            <button type="button" id="modalbtnclose" class="close" data-dismiss="modal" aria-hidden="true" style="color: #F8ECFF;opacity:1;outline:none;" onclick="window.location.href='<?php
$s = $_SERVER['REQUEST_URI'] ;
$v = 'changepass';
   
function removeqsvar($url, $varname) {
	$url = preg_replace('/(&|\?)'.preg_quote($varname).'=[^&]*$/', '', $url);
    $url = preg_replace('/(&|\?)'.preg_quote($varname).'=[^&]*&/', '$1', $url);
    return $url;
}

echo removeqsvar($s,$v);
?>'" >
          
		  &times;</button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Old Password</label>
              <input type="password" name="oldPass" class="form-control" required="required" autocomplete="off" autocomplete="false">
            </div>
            <div class="form-group">
              <div class="clearfix">
                <label>New Password</label>

              </div>

              <input type="password" name="newPass" class="form-control" required="required" autocomplete="off" autocomplete="false">
            </div>
						<?php  if($changepass == 'false'){
	echo "<p class='text-danger'>Password does not match</p>";
}else if ($changepass == true || $changepass == ''){
	
}
?>
          </div>
          <div class="modal-footer justify-content-end">
            <div>
              <input type="submit" class="btn btn-dark " value="Change Password">

            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

	<nav class="navbar-expand-md sticky-top py-1" style="background-color:#A31F1F;box-shadow: 0px 0 18px rgba(55, 66, 59, 0.08);box-shadow:   0px 0.1px 5px 0px white; z-index:5;">
		<div class="container" style="max-width:1150px;">
			<div class="d-flex">

				<div class="d-inline-flex align-items-center " style="">
					<button onclick="Opensidenav()" class=" ml-2 mr-1 ml-md-0 d-sm-block d-md-none my-0 align-items-center d-flex " type="button" style="background-color:white;font-size:25px;border:1px solid #F2FCFF;border-radius:3px;">
						<span class="fas fa-bars my-1 opensidenav " style="background-color:white;color:black;line-height:1.1!important"></span>
					</button>
					 <a class="navbar-brand justify-content-center py-0 my-0 px-0 mr-1 d-none d-md-block" href="index.php" style="width:100%;">
						<img class="d-flex justify-content-center " src="./assets/images/puplogo.png" alt="Logo" style="height:38px;">
					</a>
				</div>


        <div class="d-flex ">
          <div class="collapse navbar-collapse ml-0  " id="collapsibleNavbar">
            <ul class="navbar-nav ">
              <li class="nav-item ">
                <a class="nav-link" style="color:white;text-decoration:none;" href="./index.php">Welcome
                  <?php
                  if (isset($_SESSION['logintype'])) {

                    if ($_SESSION['firstname'] && $_SESSION['lastname']) {
                      $firstname = $_SESSION['firstname'];
                      $lastname = $_SESSION['lastname'];

                      echo "$firstname $lastname";
                    } ?>
                  <?php
                  } else {
                    echo ("Visitor");
                  }
                  ?> </a>
              </li>
            </ul>
		    <?php
               if (isset($_SESSION['logintype'])) {
		    ?>
             <div class="dropdown">
              <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#myModal">Change Password</a>

              </div>
            </div>
					  
            <?php 
                } 
            ?>
          </div>
        </div>
        <div class="collapse navbar-collapse ml-1   " id="collapsibleNavbar">
          <div class=" d-flex ml-auto " style="">


            <ul class="navbar-nav ">
                          <ul class="navbar-nav ">

              <?php
              if (isset($_SESSION['logintype'])) {
                if ($_SESSION['logintype'] === 'admin') { ?>

                  <li class="nav-item bg-sm-dark">
                    <a class="nav-link navlinkbuttons" href="./ManageBookspageAdd.php">Manage Books</a>
                  </li>
                  <li class="nav-item bg-sm-dark">
                    <a class="nav-link navlinkbuttons" href="./ManageTransactionReq.php">Manage Transactions</a>
                  </li>

                <?php
                } else if ($_SESSION['logintype'] === 'student') {
                ?>
                  <li class="nav-item bg-sm-dark">
                    <a class="nav-link navlinkbuttons" href="bookmarks.php">Bookmarks</a>
                  </li>
                  <li class="nav-item bg-sm-dark">
                    <a class="nav-link navlinkbuttons" href="BorrowRecords.php">Borrow Records</a>
                  </li>
              <?php
                }
              }
              ?>
              <span class="navline my-1 "></span>
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






	<div class="container mt-0 px-lg-3  px-md-2 px-0 navchange h-25 " style="max-width:1150px;">

		<div class="d-inline-flex w-100">

			<div class="leftblock d-none d-lg-block mt-3 ">

				<div class="logo d-flex align-items-center justify-content-center mb-3 w-100 bg-dark">
					<div class="logobox d-flex align-items-center justify-content-center w-100 bg-dark  px-4 py-4">
						<img class="logoimg " src="./assets/images/puplogo.png" alt="Card image">
					</div>
					<div class="logoname d-flex align-items-center justify-content-center mb-4 w-100 bg-dark text-light">

						<h4 class="">PUP CEA</h4>
						<h3 class="">Web Library</h3>
					</div>

				</div>
				<ul class="homebuttons" style="padding: 0;list-style-type: none;">
					<a href="./">
						<li class="homebutton  d-flex align-items-center mt-2  w-100 ">
							<i class="fas fa-home h-10 mr-2 align-items-center "></i>
							<h5 class=" buttontext align-items-center mt-2 justify-content-center">Home</h5>
						</li>
					</a>
					<a href="AdvanceSearch.php">
						<li class="homebutton d-flex align-items-center mt-2 w-100 ">
							<i class="fas fa-search mr-2 align-items-center  "></i>
							<h5 class="buttontext align-items-center mt-2 justify-content-center">Browse</h5>
						</li>
					</a>
					<a href="logout.php">
						<li class="homebutton d-flex align-items-center mt-2 w-100 ">
							<i class="fas fa-sign-in-alt mr-2 align-items-center  "></i>
							<h5 class="buttontext align-items-center mt-2 justify-content-center">Logout</h5>
						</li>
					</a>
				</ul>

			</div>

			<div class="rightblock ml-0 ml-lg-3 pb-4 d-flex align-items-center justify-content-center" style="flex-direction:column;">

				<div class="pt-3 sticktodapat d-none d-lg-block" style="box-shadow:none;border-bottom:2px solid #b3b5b7;">
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item advtabs">
							<a href="ManageBookspageAdd.php" class="nav-link  pt-3">
								<div class="d-flex align-items-center justify-content-center "><i class="fas fa-shopping-cart"></i></div>
								<div class="mx-3">Add Books</div>
							</a>
						</li>
						<li class="nav-item advtabs">
							<a href="ManageBookspageEdit.php" class="nav-link active pt-3" data-toggle="tab" href="#menu1">
								<div class="d-flex align-items-center justify-content-center"><i class="fas fa-file"></i></div>Edit Books
							</a>
						</li>

					</ul>
				</div>


				<div class="logincontainer browsecontainer  d-flex  pb-3 " style="width:99.3%;">
					<!-- Nav tabs -->


					<!-- Tab panes -->
					<div class="tab-content justify-content-center">
						<div id="home" class="container tab-pane active mt-3">
							<div class="searchbox d-flex align-items-center">
								<div class="input-group ml-2 d-inline-flex">
									<i class="fas fa-search mr-2 align-items-center  my-auto"></i>
									<input type="text" class="form-control my-auto" id='search' placeholder="Search" style="border:0;height:30px;padding-left:2px; outline:none;box-shadow:none;">
									<!-- <div class="input-group-append">
										<button class="btn " type="submit" style="box-shadow:none;outline:none;">
											<i class="fa fa-arrow-right"></i>
										</button>
									</div> -->
								</div>

							</div>
							<div id="display"></div>

							<div class="d-flex addbookform justify-content-center px-0 mx-0 mt-3">

								<form class="" action="./scripts/updateBook.php?id=<?php echo $id ?>&image=<?php echo $image ?>" method="post" autocomplete="false" autocomplete="off">
									<div class="modal-header bookimageinput align-items-center justify-content-center py-2  d-flex ">
										<div class="bookimageaddbook  px-2 pt-2">
											<div class="bookimagebox d-flex align-items-center justify-content-center h-100  ">
												<img class="bookimg " src="./uploads/images/<?php echo $image ?>" alt="Card image">
											</div>
										</div>
										<div class="mt-2">
											<input type='file' name="image" class="fileinput" onchange="readURL(this);" value="./uploads/images/<?php echo $image ?>" />
										</div>
									</div>
									<div class="modal-body  ">
										<div class="form-group">
											<label>Title:</label>
											<input type="text" name="title" class="form-control" required="required" autocomplete="off" autocomplete="false" value="<?php echo $title; ?>">
										</div>
										<div class="form-group">
											<label>Author:</label>
											<input type="text" name="author" class="form-control" required="required" autocomplete="off" autocomplete="false" value="<?php echo $author; ?>">
										</div>
										<div class="form-group">
											<label>ISBN:</label>
											<input type="text" name="isbn" class="form-control" required="required" autocomplete="off" autocomplete="false" value="<?php echo $isbn; ?>">
										</div>

										<div class="form-group">
											<label>Publisher:</label>
											<input type="text" name="publisher" class="form-control" required="required" autocomplete="off" autocomplete="false" value="<?php echo $publisher; ?>">
										</div>
										<div class="form-group">
											<label>Description:</label>
											<textarea rows="5" input type="text" name="description" class="form-control" required="required" autocomplete="off" autocomplete="false"><?php echo $description; ?></textarea>
										</div>
									</div>
									<div class="modal-footer justify-content-center my-0 ">
										<input type="submit" class="btn btn-dark bg-dark" value="Save" style="width:100%;border:1px solid black;color:white">
									</div>
								</form>
							</div>



						</div>


						<div id="menu1" class="container tab-pane fade mt-3 ">



						</div>



					</div>

					<!-- 		<form action="confirmation.php" method="post" autocomplete="false" autocomplete="off"  >
				<div class="modal-header align-items-center justify-content-center">				
					<h4 class="modal-title">Advanced Search</h4>
		
				</div>
				<div class="modal-body">				
					<div class="form-group">
						<label>Title:</label>
						<input type="text" class="form-control" required="required" autocomplete="off"  autocomplete="false" >
					</div>
					<div class="form-group">
						<label>Author:</label>
						<input type="text" class="form-control" required="required" autocomplete="off"  autocomplete="false" >
					</div>
	                <div class="form-group">
						<label>ISBN:</label>
						<input type="text" class="form-control" required="required" autocomplete="off"  autocomplete="false" >
					</div>
					

                    <div class="form-group">
						<label>Publisher:</label>
						<input type="text" class="form-control" required="required" autocomplete="off"  autocomplete="false" >
					</div>
					<div class="form-group">
						<label>Keyword:</label>
						<input type="text" class="form-control" required="required" autocomplete="off"  autocomplete="false" >
					</div>
				</div>
				<div class="modal-footer justify-content-center">
					
		
					<input type="submit" class="btn btn-light"   value="Search" style="background-color:white !important;color:black;width:50%;box-shadow:0px 1px 1px 0px black;">
				</div>
			</form> -->




				</div>



			</div>







		</div>


	</div>

	</div>


</body>

</html>