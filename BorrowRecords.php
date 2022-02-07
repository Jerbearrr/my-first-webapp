<?php
include('./database.php');

session_start();

if (isset($_GET['pagenum'])) {
  $pageNum = $_GET['pagenum'];
} else {
  $pageNum = 1;
}

$sorter = $_GET['value']??'';
if ($sorter == 'all' || $sorter == ''){
	
}
							 
									   


$requestsPerPage = 4;
$offset = ($pageNum - 1) * $requestsPerPage;

if (isset($_SESSION)) {
  $firstname = $_SESSION['firstname'];
  $lastname = $_SESSION['lastname'];
  $logintype = $_SESSION['logintype'];
}

//Get total rows and pages for pagination
									   
if ($sorter == 'all' || $sorter == ''){
	$query = "select count(*) from books inner join book_requests on books.id = book_requests.book_id   ";
	
}else {$query = "select count(*) from books inner join book_requests on books.id = book_requests.book_id WHERE status='$sorter' && borrower_fn='$firstname' && borrower_ln ='$lastname' ";}

																																   

$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$totalRows = mysqli_fetch_array($result)[0];
$totalPages = ceil($totalRows / $requestsPerPage);

//Get all transaction records
if ($sorter == 'all' || $sorter == ''){
	$query = "select * from books inner join book_requests on books.id = book_requests.book_id WHERE borrower_fn='$firstname' && borrower_ln ='$lastname' order by date_of_request DESC limit $offset, $requestsPerPage ;";
}else{
	$query = "select * from books inner join book_requests on books.id = book_requests.book_id WHERE status='$sorter' && borrower_fn='$firstname' && borrower_ln ='$lastname' order by date_of_request DESC limit $offset, $requestsPerPage ;";
}																																											
 

$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

//Redirect user to homepage if not logged in as admin
if ($logintype != "student") {
  header("Location: ./index.php?admin=false");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>My Records</title>
  <link rel="icon" href="./assets/images/puplogo.png" type = "image/x-icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="./styles/CETproj.css" />


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">

  <link rel="stylesheet" href="assets/owlcarousel/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/owlcarousel/assets/owl.theme.default.min.css">
  <script src="assets/vendors/jquery.min.js"></script>
  <script src="assets/owlcarousel/owl.carousel.js"></script>
  <link rel="stylesheet" href="assets/css/animate.css" />
  <script src="./scripts/script.js"></script>
  <script>

  	function checkAll(checkbox) {
    var checkboxes = document.getElementsByName('check');
	var checkeditem = document.querySelector('.form-check-input:checked').value;
	
    checkboxes.forEach((item) => {		
        if (item !== checkbox) item.checked = false;
    })
}
  function onChange(element) {
    	
  var inputs = document.querySelectorAll('input[type="checkbox"]');
  var arrData = [];
  // For each inputs...
  inputs.forEach(function(input){
    // ... save what you want (but 'ID' and 'checked' values are necessary)
    arrData.push({ id: input.id, checked: input.checked });
  });
  // Save in localStorage
  localStorage.setItem('inputs', JSON.stringify(arrData));

  console.log(JSON.stringify(arrData));
		const urlParams = new URLSearchParams(window.location.search);

        urlParams.set('value', element.value);
        urlParams.set('pagenum','1')
        window.location.search = urlParams;			
    }
$(document).ready(function(){
	
	
var wat= JSON.parse(window.localStorage.getItem('inputs'));

for(var p in wat)
    {
      {        
		 $('#'+ wat[p].id).prop('checked', wat[p].checked);
      }
    }
    $('.receivedbtn').click(function(event){
        // your stuff here      
        event.stopPropagation();		 
    });
});
  </script>
  <?php 

$changepass = $_GET['changepass'] ?? 'true' ;

if($changepass == 'false'){
	echo "<script> $(document).ready(function(){ $('#myModal').modal('show'); }); </script>";
}else if ($changepass == true || $changepass == ''){
	
}

?>
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


  <nav class="navbar-expand-md fixed-top py-1" style="background-color:#A31F1F;box-shadow: 0px 0 18px rgba(55, 66, 59, 0.08);box-shadow:   0px 0.1px 5px 0px white; z-index:5;">
    <div class="container" style="max-width:1150px;">
      <div class="d-flex">

        <div class="d-inline-flex align-items-center " style="">
          <button onclick="Opensidenav()" class=" ml-2 mr-1 ml-md-0 d-sm-block d-md-none my-0 align-items-center d-flex " type="button" style="background-color:white;font-size:25px;border:1px solid #F2FCFF;border-radius:3px;">
            <span class="fas fa-bars my-1 opensidenav " style="background-color:white;color:black;line-height:1.1!important"></span>
          </button>
          <a class="navbar-brand justify-content-center py-0 my-0 px-0 mr-1 d-none d-md-block" href="index.php" style="width:100%;">
            <img class="d-flex justify-content-center " src="assets/images/puplogo.png" alt="Logo" style="height:38px;">
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
            <img class="logoimg " src="assets/images/puplogo.png" alt="Card image">
          </div>
          <div class="logoname d-flex align-items-center justify-content-center mb-4 w-100 bg-dark text-light">

            <h4 class="">PUP CEA</h4>
            <h3 class="">Web Library</h3>
          </div>

        </div>
        <ul class="homebuttons" style="padding: 0;list-style-type: none;">
          <a href="./index.php">
            <li class="homebutton  d-flex align-items-center mt-2  w-100 ">
              <i class="fas fa-home h-10 mr-2 align-items-center "></i>
              <h5 class=" buttontext align-items-center mt-2 justify-content-center">Home</h5>
            </li>
          </a>
          <a href="./AdvanceSearch.php">
            <li class="homebutton d-flex align-items-center mt-2 w-100 ">
              <i class="fas fa-search mr-2 align-items-center  "></i>
              <h5 class="buttontext align-items-center mt-2 justify-content-center">Browse</h5>
            </li>
          </a>
          <?php
          if (isset($_SESSION)) {
            echo '<a href="./logout.php">
                    <li class="homebutton d-flex align-items-center mt-2 w-100 ">
                      <i class="fas fa-sign-in-alt mr-2 align-items-center  "></i>
                      <h5 class="buttontext align-items-center mt-2 justify-content-center">Logout</h5>
                    </li>
                  </a>';
          } else {
            echo '<a href="./LoginPage.php">
                    <li class="homebutton d-flex align-items-center mt-2 w-100 ">
                      <i class="fas fa-sign-in-alt mr-2 align-items-center  "></i>
                      <h5 class="buttontext align-items-center mt-2 justify-content-center">Login</h5>
                    </li>
                  </a>';
          }
          ?>
        </ul>

      </div>

      <div class="rightblock ml-0 ml-lg-3 pb-4 d-flex align-items-center justify-content-center" style="flex-direction:column;">

        <div class="pt-3 sticktodapat d-none d-lg-block" style="box-shadow:none;border-bottom:2px solid #b3b5b7;">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item advtabs">
              <a href="ManageTransactionStatus.php" class="nav-link  active pt-3">
                <div class="d-flex align-items-center justify-content-center"><i class="fas fa-file"></i></div>Request Status
              </a>
            </li>

          </ul>
        </div>


        <div class="logincontainer browsecontainer  mt-5 d-flex  pb-3 " style="width:99.2%;">
          <!-- Nav tabs -->


          <!-- Tab panes -->
          <div class="tab-content justify-content-center">
            <div id="home" class="container tab-pane active mt-3">
				<div class="inline-flex w-100 ">
                  <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" id="ch1" onclick="checkAll(this)" onchange="onChange(this)" value="all" name="check" class="form-check-input"> All
                    </label>
                  </div>
				  <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" id="ch2" onclick="checkAll(this)" onchange="onChange(this)" name="check" value="pending" class="form-check-input"> Pending
                    </label>
                  </div>
				  <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" id="ch3" onclick="checkAll(this)" onchange="onChange(this)" name="check" value="confirmed" class="form-check-input"> Confirmed
                    </label>
                  </div>
				  <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" id="ch4" onclick="checkAll(this)" onchange="onChange(this)" name="check" value="received" class="form-check-input"> Received
                    </label>
                  </div>
				  <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" id="ch5" onclick="checkAll(this)" onchange="onChange(this)" name="check" value="returned" class="form-check-input"> Returned
                    </label>
                  </div>
                

                </div>					  
												 

              <div id="target-content" class="productsitemlist   mt-2 mx-0 mx-md-0" style="">
                <?php

                while ($request = mysqli_fetch_assoc($result)) {
                  echo '<form method="post" action="./scripts/request.php">
                    <div class="card  my-3 productcard ">
                      <div class="row no-gutters overflow-hidden d-inline-flex py-md-3 py-2 px-md-3 px-2">
                        <div class="col d-flex mx-auto h-100 align-items-center justify-content-center productcardimgcart" onclick="location.href=\'./Openbook.php?id=' . $request['book_id'] . '\';">
                          <img class="cardimg " src="./uploads/images/' . $request['image'] . '" alt="Book image" style="height:100%;min-width:0;">
                        </div>
                        <div class="card-body p-0 d-flex productcardbodycart " onclick="location.href=\'./Openbook.php?id=' . $request['book_id'] . '\';">
                          <div class="col pr-0">
                            <h4 class="card-title itemname my-0  w-100 ">' . $request['title'] . '</h4>
                            <p class="card-text my-0 my-1">- ' . $request['author'] . '</p>
                            <p class="card-text itemdescription my-1  w-100">Borrower: ' . $request['borrower_fn'] . " " . $request['borrower_ln'] . '</p>
                            <p class="card-text itemdescription my-1  w-100">Status: ' . $request['status'];

                            //If request confirmed, calculate days of borrow duration
                            if ($request['status'] == "confirmed") {
                              $today = new DateTime("Now");
                              $deadline = new DateTime($request['date_of_process'] . '+ 5 days');
                              $duration = date_diff($deadline, $today);
                            
                           
                              echo '<p class="card-text itemdescription my-1  w-100">Days Remaining: ' . $duration->format('%a days') . '</p>';
                            }

																				 
                            if ($request['status'] == "borrowed") {
                              $today = new DateTime("Now");
                              $deadline = new DateTime($request['date_of_process'] . '+ 7 days');
                              $duration = date_diff($deadline, $today);
		
																								  
																																		   

                              echo ' <button name="book_returned" value=' . $request['id'] .  ' class="mx-2 receivedbtn"   >Book is returned</button> </p>';
                              echo '<p class="card-text itemdescription my-1  w-100">Days Remaining: ' . $duration->format('%a days') . '</p>';
                            }
                          echo '</div>
                        </div>
                      </div>
                    </div>
                  </form>';
						
						
                }
                ?>
                <div class="d-flex flex-row pagination mt-2 text-dark">
<?php if ($totalPages != 0){ ?>
																										   
                  <?php
                  if ($totalPages > 1) {
                    echo '<a class="page mx-1 px-3 py-1 " href="?pagenum=1&value='.$sorter.'">First</a>';
                  }

                  if ($totalPages != 1) {
                    /* First we check if we are on page one. If we are then we don't need a link to 
                         the previous page or the first page so we do nothing. If we aren't then we
                         generate links to the first page, and to the previous page. */
                    if ($pageNum > 1) {
                      // Render clickable number links that should appear on the left of the target page number
                      for ($i = $pageNum - 2; $i < $pageNum; $i++) {
                        if ($i > 0) {
                                 echo '<a class="page mx-1 px-3 py-1 " href="' . $_SERVER['PHP_SELF'] . '?pagenum=' . $i . '&value='.$sorter.'">' . $i . '</a>';
                        }
                      }
                    }
                    // Render the target page number, but without it being a link
                    echo '<a class="page mx-1 px-3 py-1 " style = "background-color: #A31F1F">' . $pageNum . '</a>';
                    // Render clickable number links that should appear on the right of the target page number
                    for ($i = $pageNum + 1; $i <= $totalPages; $i++) {
                   echo '<a class="page mx-1 px-3 py-1 disabled" href="' . $_SERVER['PHP_SELF'] . '?pagenum=' . $i . '&value='.$sorter.'">' . $i . '</a>';
                      if ($i >= $pageNum + 2) {
                        break;
                      }
                    }
                  }

                  ?>
                  <a class="page mx-1 px-3 py-1 " href="?pagenum=<?php echo $totalPages."&value=$sorter" ?>">Last</a>
				<?php }else {echo ('no data found');} ?>

											  
                </div>

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

  <script>
    function changeStatus(id) {
      $.ajax({
        type: "POST",
        url: "./scripts/request.php",
        data: {
          id: id
        }
      })
    }
  </script>

</body>

</html>