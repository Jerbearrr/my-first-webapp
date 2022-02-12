<?php
include('database.php');

	session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Advanced Search</title>
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

<div class="rightblock ml-0 ml-lg-3 pb-4 d-flex align-items-center justify-content-center" style="flex-direction:column;"  >

<div class="pt-3 sticktodapat d-none d-lg-block">
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
<?php
include('database.php');

$limit = 5;  
if (isset($_GET["page"])) {
	$page  = $_GET["page"]; 
	} 
	else{ 
	$page=1;
	};  
$start_from = ($page-1) * $limit;  
$bookselect = "";


$title = $_GET['title'];
$author = $_GET['author'];
$isbn = $_GET['isbn'];
$publisher = $_GET['publisher'];
$keyword = $_GET['keyword'];

$sortby = $_GET['sortby']??'';

if ($sortby == "" || $sortby == "ASC"){
	$sortby = "ASC";
}else {
	$sortby = "DESC";
}


    //Do real escaping here

    $query = "SELECT * FROM books";
    $conditions = array();
	$build = array();
	
    $bindType = "";

    if(! empty($title)) {

      $conditions[] = "title LIKE ? ";
	  $bindType .= "s" ; 
	  $keywordst = "%" . $title . "%";
	  
	  array_splice( $build, 1, 0, array( &$keywordst ) ); 

	  



	  
    }
    if(! empty($author)) {
 
	  
	  $conditions[] = "author LIKE ? ";
	  $bindType .= "s" ; 
	  $keywordsa = "%" . $author . "%";
	    array_splice( $build, 1, 0, array( &$keywordsa ) ); 

	  
    }
    if(! empty($isbn)) {

	  
	  $conditions[] = "isbn LIKE  ? ";
	  $bindType .= "s" ; 
	  $keywordsi = "%" . $isbn . "%";
	    array_splice( $build, 1, 0, array( &$keywordsi ) ); 
	
    }
    if(! empty($publisher)) {

	  
	  $conditions[] = "publisher LIKE ? ";
	  $bindType .= "s" ; 
	  $keywordsp = "%" . $publisher . "%";
	  array_splice( $build, 1, 0, array( &$keywordsp ) ); 
	 
	  
	  
    }
	if(! empty($keyword)) {
	  
	  
	  unset($conditions);
	 
	   
      $conditions[] = "title LIKE ? OR author LIKE ? OR isbn LIKE ? OR publisher LIKE ? ";
	  
	  $bindType = "ssss" ;
	  
	  $keywordsk = "%" . $keyword . "%";
	  
	  
	  unset($build);
      $build = array_values(array( &$keywordsk, &$keywordsk, &$keywordsk, &$keywordsk ) );
	  
	
	  
	 
	  
	  
	  

    }

    $sql = $query;
	$sqlc =  "SELECT * FROM books";
	
    if (count($conditions) > 0) {
      $sql .= " WHERE " . implode(' AND ', $conditions);
      $sql .= "ORDER BY title $sortby LIMIT $start_from, $limit";
	  
	
	  
	  $sqlc .= " WHERE " . implode(' AND ', $conditions);
	  $sqlc .= "ORDER BY title $sortby ";
	 
	
	  $stmt = mysqli_prepare($conn,$sql);
	  $strti =  mysqli_prepare($conn,$sqlc);
		
		
      call_user_func_array(array($stmt, "bind_param"), array_merge(array($bindType), $build));
	  call_user_func_array(array($strti, "bind_param"), array_merge(array($bindType), $build));
      
	  
	  mysqli_stmt_execute($strti);
     
	 
	  
	  mysqli_stmt_store_result($strti);
	  $totali = mysqli_stmt_num_rows($strti);
	  
	 
	  
	  
	
	 
	  

    } 
   
	
     mysqli_stmt_execute($stmt);



	$bookselect = mysqli_stmt_get_result($stmt);



?>
<?php
	/*
		Place code to connect to your DB here.
	*/
	
$adjacents = 1;


$total_pages = $totali;  
	
	/* Setup vars for query. */
	$limit = 5; 								//how many items to show per page
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */

	
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<a class=' page mr-1 px-2 pb-1' href='advancedsearching.php?title=".$title."&author=".$author."&isbn=".$isbn."&publisher=".$publisher."&keyword=".$keyword."&page=".$prev."&sortby=".$sortby."'>«</a>";
		else
			$pagination.= "<span class=\"disabled pb-1 d-none\">« previous</span>";	
		
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"activepage-items mx-1 px-2 \">$counter</span>";
				else
					$pagination.= "<a class='  page mx-1 px-2' href='advancedsearching.php?title=".$title."&author=".$author."&isbn=".$isbn."&publisher=".$publisher."&keyword=".$keyword."&page=".$counter."&sortby=".$sortby."'>$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"activepage-items mr-1 px-2 \">$counter</span>";
					else
						$pagination.= "<a class='  page mr-1 px-2' href='advancedsearching.php?title=".$title."&author=".$author."&isbn=".$isbn."&publisher=".$publisher."&keyword=".$keyword."&page=".$counter."&sortby=".$sortby."'>$counter</a>";					
				}
				$pagination.= "<span class=\"mr-1 \">...</span>";
				$pagination.= "<a class='  page mr-1 px-2 ' href='advancedsearching.php?title=".$title."&author=".$author."&isbn=".$isbn."&publisher=".$publisher."&keyword=".$keyword."&page=".$lpm1."&sortby=".$sortby."' >$lpm1</a>";
				$pagination.= "<a class='  page mr-1 px-2 ' href='advancedsearching.php?title=".$title."&author=".$author."&isbn=".$isbn."&publisher=".$publisher."&keyword=".$keyword."&page=".$lastpage."&sortby=".$sortby."' >$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a class='  page mr-1 px-2 ' href='advancedsearching.php?title=".$title."&author=".$author."&isbn=".$isbn."&publisher=".$publisher."&keyword=".$keyword."&page=1&sortby=".$sortby."' >1</a>";
				$pagination.= "<a class='  page mr-1 px-2 ' href='advancedsearching.php?title=".$title."&author=".$author."&isbn=".$isbn."&publisher=".$publisher."&keyword=".$keyword."&page=2&sortby=".$sortby."' >2</a>";
				$pagination.= "<span class=\"mr-1 \">...</span>";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"activepage-items mr-1 px-2 \">$counter</span>";
					else
						$pagination.= "<a class='  page mr-1 px-2 ' href='advancedsearching.php?title=".$title."&author=".$author."&isbn=".$isbn."&publisher=".$publisher."&keyword=".$keyword."&page=".$counter."&sortby=".$sortby."' >$counter</a>";					
				}
				$pagination.= "<span class=\"mr-1 \">...</span>";
				$pagination.= "<a class='  page mr-1 px-2 ' href='advancedsearching.php?title=".$title."&author=".$author."&isbn=".$isbn."&publisher=".$publisher."&keyword=".$keyword."&page=".$lpm1."&sortby=".$sortby."' >$lpm1</a>";
				$pagination.= "<a class='   page mr-1 px-2 ' href='advancedsearching.php?title=".$title."&author=".$author."&isbn=".$isbn."&publisher=".$publisher."&keyword=".$keyword."&page=".$lastpage."&sortby=".$sortby."' >$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a class='  page mr-1 px-2' href='advancedsearching.php?title=".$title."&author=".$author."&isbn=".$isbn."&publisher=".$publisher."&keyword=".$keyword."&page=1&sortby=".$sortby."' >1</a>";
				$pagination.= "<a class='   page mr-1 px-2' href='advancedsearching.php?title=".$title."&author=".$author."&isbn=".$isbn."&publisher=".$publisher."&keyword=".$keyword."&page=2&sortby=".$sortby."'>2</a>";
				$pagination.= "<span class=\"mr-1 \">...</span>";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"activepage-items mr-1 px-2 \">$counter</span>";
					else
						$pagination.= "<a class='   page mr-1 px-2  ' href='advancedsearching.php?title=".$title."&author=".$author."&isbn=".$isbn."&publisher=".$publisher."&keyword=".$keyword."&page=".$counter."&sortby=".$sortby."'>$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a class='   page mr-1 px-2 pb-1 ' href='advancedsearching.php?title=".$title."&author=".$author."&isbn=".$isbn."&publisher=".$publisher."&keyword=".$keyword."&page=".$next."&sortby=".$sortby."' >»</a>";
		else
			$pagination.= "<span class=\"disabled d-none\">next »</span>";
		$pagination.= "</div>\n";		
	}
?>

<div class="logincontainer browsecontainer d-flex px-3 pb-3 " style="width:99.3%;">
<!-- Nav tabs -->
<div class=" categoriescontentstop w-100  mx-0 d-inline-flex mt-3" style="max-width:100%;">
<div class="resultsection mt-2 d-flex align-items-center  w-100">
<h5 class="resulttext" > Search Result: </h5>
<?php 
  if( $title != NULL){
 echo '<h5 class="resultfor mx-1 px-2 py-1" >'.$title.' </h5> ';
} 
?>
<?php 
  if( $author != NULL){
 echo '<h5 class="resultfor mx-1 px-2 py-1" >'.$author.' </h5> ';
} 
?>
<?php 
  if( $isbn != NULL){
 echo '<h5 class="resultfor mx-1 px-2 py-1" >'.$isbn.' </h5> ';
} 
?>
<?php 
  if( $publisher != NULL){
 echo '<h5 class="resultfor mx-1 px-2 py-1" >'.$publisher.' </h5> ';
} 
?>
<?php 
  if( $keyword != NULL){
 echo '<h5 class="resultfor mx-1 px-2 py-1" >'.$keyword.' </h5> ';
} 
?>


<p style="color:#666;position:relative;top:10px;" >page: <?php echo $page ?> of <?php echo $lastpage ?> </p>


</div>

<div class="d-inline-flex  align-items-center mr-md-0 mr-1" style="border-bottom: 2px solid black;">

        <select id="myselect" class="selectpicker myselect show-tick py-1 "  onchange="location= this.value;"   >
		
	  <?php if ($sortby == "ASC"){ 
         echo "<option value='advancedsearching.php?title=".$title."&author=".$author."&isbn=".$isbn."&publisher=".$publisher."&keyword=".$keyword."&sortby=ASC' selected >Sort: Asc</option>"; 
	     echo "<option value='advancedsearching.php?title=".$title."&author=".$author."&isbn=".$isbn."&publisher=".$publisher."&keyword=".$keyword."&sortby=DESC' >Sort: Desc</option>";
		 }else {
	    
		 echo "<option value='advancedsearching.php?title=".$title."&author=".$author."&isbn=".$isbn."&publisher=".$publisher."&keyword=".$keyword."&sortby=ASC' >Sort: Asc</option>"; 
		 echo "<option value=advancedsearching.php?title=".$title."&author=".$author."&isbn=".$isbn."&publisher=".$publisher."&keyword=".$keyword."&sortby=DESC' selected>Sort: Desc</option>";	 
		 }
		 ?>


        </select>


<!-- <select name="sort" id="myselect"  class="py-1 " >


	  <option value="nameasc"  >Name: Asc</option>
	  <option value="namedesc"  >Name: Desc</option>
	  <option value="priceasc"  >Price: Asc</option>
	  <option value="pricedesc"  >Price: Desc</option>
</select> -->
</div>
</div>

<div id="target-content" class="productsitemlist   mt-2 mx-0 mx-md-0" style="" >
<?php while($row = mysqli_fetch_assoc($bookselect)) { 
?>

	<?php echo "<a class='card  my-3 productcard d-block text-decoration-none ' href ='Openbook.php?id=".$row["id"]."'>"; ?>
	<div class="row no-gutters d-inline-flex py-md-3 py-2 px-md-3 px-2 w-100" >
	<div class="col d-flex mx-auto h-100 align-items-center justify-content-center productcardimg" >
	<?php echo '<img class="cardimg text-dark"  alt="No Image Preview " src="'.$row['image'] .'"/>';  ?>

	</div>
    <div class="card-body p-0 d-flex productcardbody" >
	<div class="col pr-0"> 
        <h4 class="card-title itemname my-0  w-100 "><?php echo $row["title"]; ?></h4>
        <p class="card-text itemprice px-2 bg-dark my-1 d-inline-flex">-<?php echo substr($row['author'], 0, 20) .((strlen($row['author']) > 20) ? '...' : ''); ?> </p> 
        <p class="card-text itemdescription my-1  w-100">Adaptation of the first of J.K. Rowling's popular children's novels about Harry Potter, a boy who learns on his eleventh birthday that he is the orphaned son of two powerful wizards and possesses unique magical powers of his own. He is summoned from his life as an unwanted child to become a student at Hogwarts, an English boarding school for wizards. There, he meets several friends who become his closest allies and help him discover the truth about his parents' mysterious deaths.</p>
    </div>

    </div>
	</div>
	</a>	
	
    <?php
    }
		if ($total_pages == 0) { /* code to do */ 
			echo ("No Results Found");
		}

?>


<?=$pagination?>
	






</div>


</div>



</div>







</div>


</div>

</div>


</body>

</html>