<?php
include('database.php');

	session_start();
	
$id = $_GET['id'];

  $firstname = $_SESSION['firstname']??'';
  $lastname = $_SESSION['lastname']??'';



   $useid="";
   $user_id = "SELECT * FROM `accounts` WHERE firstname='".$firstname."' && lastname='".$lastname."' ";
   $str = mysqli_query($conn, $user_id);
   while($rower = mysqli_fetch_assoc($str)) {
	  $useid = $rower['id'];
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Products</title>
  <link rel="icon" href="./assets/images/puplogo.png" type = "image/x-icon">
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

<script type="text/javascript">
    jQuery(document).ready(function($){
          $('.button').on('click', function(e){
              e.preventDefault();
              var user_id = $(this).attr('user_id'); // Get the parameter user_id from the button
              var book_id = $(this).attr('book_id'); // Get the parameter director_id from the button
              var method = $(this).attr('method');  // Get the parameter method from the button
			
              if (method == "Like") {
                $(this).attr('method', 'Unlike') // Change the div method attribute to Unlike
				$(this).attr('style', 'color:#f62121')
              
              } else {
               $(this).attr('method', 'Like')
               $(this).attr('style', 'color:white')
              }
	
              $.ajax({
                  url: 'favs.php', // Call favs.php to update the database
                  type: 'GET',
                  data: {user_id: user_id, book_id: book_id, method: method},
                  cache: false,
                  success: function(data){
                  }
              });
          });
      });
	  
	function show_confirm(){
    // build the confirm box
	var method = $("#borrowbtn").attr('method');  // Get the parameter method from the button
	if (method == "Borrowing"){
		var text= "Are you sure you want to borrow this book?";
	}else {
		var text= "Are you sure you want to cancel borrow request for this book?";
	}		
	
    var c= confirm(text);
	
	

    // if true
    if (c){
		     
			  var method = $("#borrowbtn").attr('method');  // Get the parameter method from the button
		    
              var user_id = $("#borrowbtn").attr('user_id'); // Get the parameter user_id from the button
              var book_id = $("#borrowbtn").attr('book_id'); // Get the parameter director_id from the button
              
			  
		
              if (method == "Borrowing") {
                $("#borrowbtn").attr('method', 'Unborrowing') // Change the div method attribute to Unlike
				$("#borrowbtn").html("Cancel request");
              
              } else {
               $("#borrowbtn").attr('method', 'Borrowing')
               $("#borrowbtn").html("Borrow");
              }
	
              $.ajax({
                  url: 'borrow.php', // Call favs.php to update the database
                  type: 'GET',
                  data: {user_id: user_id, book_id: book_id, method: method},
                  cache: false,
                  success: function(data){
                  }
              });
     }else{ // if false
       
    }
  }
 </script>	
<?php 

$changepass = $_GET['changepass'] ?? 'true' ;

if($changepass == 'false'){
	echo "<script> $(document).ready(function(){ $('#myModal').modal('show'); }); </script>";
}else if ($changepass == true || $changepass == ''){
	
}

?> 
</head>

<body style="background-color:white;background-size:cover;background-attachment:fixed;" >
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

<div class="modal fade" id="dlmodal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-light" style="background-color:#9f3535;" >
        <h5 class="modal-title ">Download File</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="text-light" aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>The download button for this book on this account will be lost forever after 7 days when the file is downloaded, do you still wish to continue?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<button type="button" class="btn btn-primary" onclick="location.href='download.php?file_id=<?php echo $id ?>&userid=<?php echo $useid?>';" data-dismiss="modal" >Confirm</button>
      </div>
    </div>
  </div>
</div>

<nav class="navbar-expand-md sticky-top py-1" style="background-color:#A31F1F;box-shadow: 0px 0 18px rgba(55, 66, 59, 0.08);box-shadow:   0px 0.1px 5px 0px white; z-index:5;" >
<div class="container" style="max-width:1150px;">
<div class="d-flex" > 

<div class="d-inline-flex align-items-center " style="">
  <button onclick="Opensidenav()" class=" ml-2 mr-1 ml-md-0 d-sm-block d-md-none my-0 align-items-center d-flex " type="button"  style="background-color:white;font-size:25px;border:1px solid #F2FCFF;border-radius:3px;">   
    <span class="fas fa-bars my-1 opensidenav " style="background-color:white;color:black;line-height:1.1!important" ></span>
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
<?php
if (isset($_SESSION['logintype'])){
    if ($_SESSION['logintype'] === 'admin' || $_SESSION['logintype'] === 'student' ) {?>
	
<?php echo "<a class='bookdescriptioncontainerhome text-decoration-none d-flex' href ='logout.php'>"; ?>
<li class="homebutton d-flex align-items-center mt-2 w-100 ">

<i class="fas fa-sign-in-alt mr-2 align-items-center  "></i><h5 class="buttontext align-items-center mt-2 justify-content-center" >Logout</h5>
</li>
</a>


<?php       
	} }else  {
?>

<?php echo "<a class='bookdescriptioncontainerhome text-decoration-none d-flex' href ='LoginPage.php'>"; ?>
<li class="homebutton d-flex align-items-center mt-2 w-100 ">
<i class="fas fa-sign-in-alt mr-2 align-items-center  "></i><h5 class="buttontext align-items-center mt-2 justify-content-center" >Login</h5>
</li>
</a>

<?php       
}
?>
</ul>

</div>

<div class="rightblock d-block ml-0 ml-lg-3 mt-0" >
<div class="pt-3 sticktodapat d-none d-md-block">
<div class="searchbox d-flex align-items-center">
<form class="input-group ml-2 d-inline-flex" action="search.php" method="GET" >

<i class="fas fa-search mr-2 align-items-center  my-auto"></i>
<input type="text" class="form-control my-auto" name="searchtext" placeholder="Search " style="border:0;height:30px;padding-left:2px; outline:none;box-shadow:none;">
<div class="input-group-append">
      <button class="btn " type="submit" style="box-shadow:none;outline:none;">
        <i class="fa fa-arrow-right"></i>
      </button>
    </div>

</form>
</div>
</div>
<div class="searchfeaturebox ">
<?php
include('database.php');


$sql = "SELECT * FROM books where id=".$_GET['id'];
$bookselect = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($bookselect)) {

?>
<div class="featuredbox d-flex mt-3 bg-light">
<div class="d-inline-flex w-100 h-100" style="position:relative;">
<div class="borrowbutton mx-3 my-3 px-2 py-1"> 
<?php 

$id = $_GET['id'];

  $firstname = $_SESSION['firstname']??'';
  $lastname = $_SESSION['lastname']??'';


if(session_status() == PHP_SESSION_ACTIVE){
   $useid="";
   $user_id = "SELECT * FROM `accounts` WHERE firstname='".$firstname."' && lastname='".$lastname."' ";
   $str = mysqli_query($conn, $user_id);
   while($rower = mysqli_fetch_assoc($str)) {
	  $useid = $rower['id'];
   }
   
  
  
   

  
$result_db = mysqli_query($conn,"SELECT * FROM `bookmarks` WHERE book_id='".$id."' && user_id='".$useid."'  "); 
$row_db = mysqli_fetch_row($result_db);  
$bookm= $row_db[0]??'';  



     if ($bookm == 0 && $useid != "" && $_SESSION['logintype'] === 'student') {   
			    
			 echo " <a class='button borrowa px-2 py-1 mx-1' method = 'Like'  user_id = ".$useid." book_id = ".$id."  style='color:#white;'><i class='fas fa-bookmark'  ></i></a> ";
		
        }else if  ($bookm > 0 && $useid != "" ) {   
			 echo " <a class='button borrowa px-2 py-1 mx-1' method = 'Unlike'  user_id = ".$useid." book_id = ".$id."  style='color:#f62121;'><i class='fas fa-bookmark'  ></i></a> ";
		 }
		
	   
        

$result_db = mysqli_query($conn,"SELECT * FROM `book_requests` WHERE book_id='".$id."' && borrower_id='".$useid."' && status = 'pending'  "); 
$row_db = mysqli_fetch_row($result_db);  
$bookb= $row_db[0]??'';  



     if ($bookb == 0 && $useid != "" && $_SESSION['logintype'] === 'student' ) {   
			    
			 echo " <a id='borrowbtn' class='borrowa  px-2 py-1' method = 'Borrowing'  user_id = ".$useid." book_id = ".$id." onclick='show_confirm()' >Borrow</a> ";
		
        }else if  ($bookb > 0 && $useid != "" ) {   
			 echo " <a id='borrowbtn' class='borrowa  px-2 py-1' method = 'UnBorrowing'  user_id = ".$useid." book_id = ".$id." onclick='show_confirm()' >Cancel request</a> ";
		 }

}
        
        
	
	
?>


<a class='bg-dark text-light px-2 py-1 mx-1' data-toggle="modal" data-target="#dlmodal"  ><i class='fas fa-download '  ></i></a>
      
<?php
 if ($useid == ""){
?>
<a class="borrowa px-2 py-1"  href="loginpage.php"><i class='fas fa-bookmark'  ></i></a>
<a id="borrowbtn" class="borrowa  px-2 py-1" href="loginpage.php"> Borrow</a>
<?php
 }

?>

</div>
<div class="bookimagecontainer justify-content-center d-flex h-100 ">

<div class="bookimagehome  px-2 pt-2">
<div class="bookimagebox d-flex align-items-center justify-content-center h-100  ">
<?php
echo '<img class="bookimg text-center "  alt="No Image Preview" src="./uploads/images/'.$row['image'] .'"/>';
?>
</div>


</div>

</div>

<div class="bookdescriptioncontainer d-flex pr-2 pr-md-5">


<div class="bookdescription pt-1 " style="overflow:auto;">
<h2><?php echo $row["title"]; ?></h2>
<h4>-<?php echo $row["author"]; ?></h4>
<h5 class="mt-3">ISBN: <?php echo $row["isbn"]; ?></h5>
<h5 class="">Subject: <?php echo $row["subject"]; ?></h5>
<h5 class="">Document Type:</h5>
<h5 class="">Number of Copies:</h5>


</div>
<?php
}
mysqli_close($conn);
?>
</div>

</div>
</div>
</div>

<div class="recentlyadded  mt-3">
<h3 class=" pb-1 px-1 bg-dark text-light"> Summary </h3>
<div class="recentadded mt-1  h-100 w-100 px-2 py-2">
<h5> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod 
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim 
veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea 
commodo consequat. Duis aute irure dolor in reprehenderit in voluptate 
velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat 
cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est 
laborum. </h5>
</div>

</div>
<div class="recentlyadded  mt-1">
<h4 class=" pb-1 px-1 bg-dark text-light"> Date Added </h4>
<div class="recentadded mt-1  h-100 w-100 px-2 py-2">
<h5> February 21, 2021 </h5>
</div>
</div>

<div class="recentlyadded  mt-1">
<h4 class=" pb-1 px-1 bg-dark text-light"> Condition </h4>
<div class="recentadded mt-1 h-100 w-100 px-2 py-2">
<h5> Good </h5>
</div>
</div>

<div class="recentlyadded mt-1">
<h4 class=" pb-1 px-1 bg-dark text-light"> Call Number </h4>
<div class="recentadded mt-1  h-100 w-100 px-2 py-2">
<h5> Q1 .S35 </h5>
</div>
</div>



</div>


</div>

</div>


</body>

</html>
