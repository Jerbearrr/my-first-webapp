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

$book_added = '';
$error_type = '';
if(isset($_GET['success'])) {
	$book_added = $_GET['success'];
}
if(isset($_GET['error'])) {
	$error_type = $_GET['error'];
}

if (isset($_SESSION)) {
	$firstname = $_SESSION['firstname'];
	$lastname  = $_SESSION['lastname'];
}

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$image = $_GET['image'];
	$title = $_GET['title'];
	$author = $_GET['author'];
	$isbn = $_GET['isbn'];
	$publisher = $_GET['publisher'];
	$description = $_GET['description'];
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
  
<div id="Sidenav" class="sidenav bg-light"  >

<div class="d-flex align-items-center justify-content-center py-1" style=" border-bottom:2px solid #741515;height:9em;width:100%;background-color:#a31f1f;" > 
<img class="" src="assets/images/puplogo.png" class=""  alt="Logo" style="max-width: 100%;max-height: 100%;align:center;">
</div>

<div class="mt-2 pb-3 " style=" border-bottom:0.05px solid #444;">

<a href="index.php" style="text-decoration: none !important;color:inherit !important;">
<div class="Sidenavbutton   hvr-sweep-to-right w-100 " onclick="Closesidenav()"> 
<h5 class=" px-4 my-3 d-inline-flex align-items-center " ><i class="fas fa-home mr-3  "></i> Home</h5>
</div> 
</a>

<a href ="AdvanceSearch.php" style="text-decoration: none !important;color:inherit !important;">
<div class="Sidenavbutton  hvr-sweep-to-right w-100" onclick="Closesidenav()"> 
<h5 class=" px-4 my-3 d-inline-flex align-items-center " ><i class="fas fa-search mr-3 "></i> Browse</h5>
</div>
</a>
          <?php
              if (isset($_SESSION['logintype'])) {
                if ($_SESSION['logintype'] === 'admin') { ?>
				
				<?php echo "<a style='text-decoration: none !important;color:inherit !important;' href ='./ManageBookspageAdd.php'>"; ?>

		      <div class="Sidenavbutton  hvr-sweep-to-right w-100" onclick="Closesidenav()"> 
              <h5 class=" px-4 my-3 d-inline-flex align-items-center " ><i class="fas fa-book mr-3 "></i>Manage Books</h5>
              </div>
              </a>
			  <?php echo "<a style='text-decoration: none !important;color:inherit !important;' href ='./ManageTransactionReq.php'>"; ?>

		      <div class="Sidenavbutton  hvr-sweep-to-right w-100" onclick="Closesidenav()"> 
              <h5 class=" px-4 my-3 d-inline-flex align-items-center " ><i class="fas fa-file mr-3 "></i>Manage Transactions</h5>
              </div>
              </a>
			  
			  <?php echo "<a style='text-decoration: none !important;color:inherit !important;' href='#' data-toggle='modal' data-target='#myModal' >"; ?>
			  <div class="Sidenavbutton  hvr-sweep-to-right w-100" onclick="Closesidenav()"> 
              <h5 class=" px-4 my-3 d-inline-flex align-items-center " ><i class="fas fa-key mr-3 "></i>Change password</h5>
              </div>
			  </a>
				  

                <?php
                } else if ($_SESSION['logintype'] === 'student') {
                ?>
				
			  <?php echo "<a style='text-decoration: none !important;color:inherit !important;' href ='./bookmarks.php'>"; ?>

		      <div class="Sidenavbutton  hvr-sweep-to-right w-100" onclick="Closesidenav()"> 
              <h5 class=" px-4 my-3 d-inline-flex align-items-center " ><i class="fas fa-book mr-3 "></i>Bookmarks</h5>
              </div>
              </a>
			  <?php echo "<a style='text-decoration: none !important;color:inherit !important;' href ='./BorrowRecords.php'>"; ?>

		      <div class="Sidenavbutton  hvr-sweep-to-right w-100" onclick="Closesidenav()"> 
              <h5 class=" px-4 my-3 d-inline-flex align-items-center " ><i class="fas fa-file mr-3 "></i>Borrow Records</h5>
              </div>
              </a>
				  <?php echo "<a style='text-decoration: none !important;color:inherit !important;' href='#' data-toggle='modal' data-target='#myModal' >"; ?>
			  <div class="Sidenavbutton  hvr-sweep-to-right w-100" onclick="Closesidenav()"> 
              <h5 class=" px-4 my-3 d-inline-flex align-items-center " ><i class="fas fa-key mr-3 "></i>Change password</h5>
              </div>
			  </a>

              <?php
                }
              }
              ?>
          <?php
          if (isset($_SESSION['logintype'])) {
            if ($_SESSION['logintype'] === 'admin' || $_SESSION['logintype'] === 'student') { ?>

              <?php echo "<a style='text-decoration: none !important;color:inherit !important;' href ='logout.php'>"; ?>
              <div class="Sidenavbutton  hvr-sweep-to-right w-100" onclick="Closesidenav()"> 
              <h5 class=" px-4 my-3 d-inline-flex align-items-center " ><i class="fas fa-sign-in-alt mr-3 "></i>Logout</h5>
              </div>
              </a>


            <?php
            }
          } else {
            ?>

            <?php echo "<a style='text-decoration: none !important;color:inherit !important;' href ='LoginPage.php'>"; ?>
                   <div class="Sidenavbutton  hvr-sweep-to-right w-100" onclick="Closesidenav()"> 
              <h5 class=" px-4 my-3 d-inline-flex align-items-center " ><i class="fas fa-sign-in-alt mr-3 "></i>Login</h5>
              </div>
            </a>

          <?php
          }
          ?>




</div>
</div>


<div id="Sidenavbg" onclick="Closesidenav()" class="sidenavbg disabled " style="display:none;position: fixed; width: 100vw; height: 100vh;background-color:black;z-index:10;opacity:0.3; ">
</div>

  <nav class="navbar-expand-md sticky-top py-1" style="background-color:#A31F1F;box-shadow: 0px 0 18px rgba(55, 66, 59, 0.08);box-shadow:   0px 0.1px 5px 0px white; z-index:5;">
    <div class="container pl-0 pl-md-1 pl-lg-3 " style="max-width:1150px;">
      <div class="d-flex">

        <div class="d-inline-flex align-items-center ">
          <button onclick="Opensidenav()" class=" ml-2 mr-1 ml-md-0 d-flex d-lg-none my-0 align-items-center  " type="button" style="background-color:white;font-size:25px;border:1px solid #F2FCFF;border-radius:3px;">
            <span class="fas fa-bars  opensidenav my-1 " style="background-color:white;color:black;line-height:1.1!important"></span>
          </button>
          <a class="navbar-brand justify-content-center py-0 my-0 px-0 mr-1 d-none d-lg-block" href="./index.php" style="width:100%;">
            <img class="d-flex justify-content-center " src="assets/images/puplogo.png" alt="Logo" style="height:38px;">
          </a>
        </div>



        <div class="d-flex ">
          <div class="collapse navbar-collapse ml-0   " id="collapsibleNavbar">
            <ul class="navbar-nav d-none d-lg-inline-flex">
              <li class="nav-item ">
                <a class="nav-link" style="color:white;text-decoration:none;" href="./index.php">Welcome
                  <?php


                  if (isset($_SESSION['logintype'])) {
                    if ($_SESSION['firstname'] && $_SESSION['lastname']) {
                      $firstname = $_SESSION['firstname'];
                      $lastname = $_SESSION['lastname'];
                    }
                    echo "$firstname $lastname";
                  } else {
                    echo "Visitor";
                  }
                  ?>

                </a>
              </li>
            </ul>
			<?php
               if (isset($_SESSION['logintype'])) {
		    ?>
             <div class="dropdown d-none d-lg-inline-flex">
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
		  <div class="searchbox d-inline-flex d-lg-none d-flex align-items-center" style="border:none;width:60vw;">
            <form class="input-group ml-2 d-inline-flex" action="search.php" method="GET">

              <i class="fas fa-search mr-2 align-items-center  my-auto"></i>
              <input type="text" class="form-control my-auto" name="searchtext" placeholder="Search " style="border:0;height:30px;padding-left:2px; outline:none;box-shadow:none;">
              <div class="input-group-append">
                <button class="btn " type="submit" style="box-shadow:none;outline:none;">
                  <i class="fa fa-arrow-right"></i>
                </button>
              </div>

            </form>
          </div>

        <div class="collapse navbar-collapse ml-1   " id="collapsibleNavbar">
          <div class=" d-flex ml-auto ">


            <ul class="navbar-nav d-none d-lg-inline-flex ">

              <?php
              if (isset($_SESSION['logintype'])) {
                if ($_SESSION['logintype'] === 'admin') { ?>

                  <li class="nav-item bg-sm-dark">
                    <a class="nav-link navlinkbuttons navactive" href="./ManageBookspageAdd.php">Manage Books</a>
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

				<div class="pt-3 sticktodapat d-block d-lg-block" style="box-shadow:none;border-bottom:2px solid #b3b5b7;">
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item advtabs">
							<a href="ManageBookspageAdd.php" class="nav-link  pt-1 pt-lg-3">
								<div class="d-flex align-items-center justify-content-center "><i class="fas fa-shopping-cart d-none d-lg-block"></i></div>
								<div class="mx-3">Add Books</div>
							</a>
						</li>
						<li class="nav-item advtabs">
							<a href="ManageBookspageEdit.php" class="nav-link active pt-1 pt-lg-3" data-toggle="tab" href="#menu1">
								<div class="d-flex align-items-center justify-content-center"><i class="fas fa-file  d-none d-lg-block"></i></div>Edit Books
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

								<form class="" action="./scripts/updateBook.php?id=<?php echo $id ?>&image=<?php echo $image ?>" method="post" autocomplete="false" autocomplete="off" enctype="multipart/form-data">
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
									<div class="modal-body  addbookmodalbdy">
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
											<div class="form-group">
									     	<label>Downloadable File:</label><br>
											<input type="file" name="myfile" title=" " class="fileinput w-100" onchange="readURL(this);"> 
										</div>
									</div>
									<div class="modal-footer justify-content-center my-0 ">
										<input type="submit" class="btn btn-dark bg-dark" value="Save" style="width:100%;border:1px solid black;color:white">
														<?php
										switch($book_added) {
											case "true":
												echo '<p>Book has been edited</p>';
												break;
											case "false":
												switch($error_type) {
													case "notImage":
														echo "<p style='color: red;'>File type is not an image. Book is not edited.</p>";
														break;
													case "fileType":
														echo "<p style='color: red;'>File type is not an image. Book is not edited.</p>";
														break;
													case "notFile":
														echo "<p style='color: red;'>Downloadable File is not a File. Please try again later.</p>";
														break;
													case "InvalidFile":
														echo "<p style='color: red;'>Downloadable File is not in PDF or Word format. Please try again later.</p>";
														break;
													case "upload":
														echo "<p style='color: red;'>Book is not edited. Please try again later.</p>";
														break;
													case "bookExists":
														echo "<p style='color: red;'>Book already exists.</p>";
														break;
												}
										}
										?>
									</div>
									
								</form>
							</div>



						</div>


						<div id="menu1" class="container tab-pane fade mt-3 ">



						</div>



					</div>


				</div>



			</div>







		</div>


	</div>

	</div>


</body>

</html>