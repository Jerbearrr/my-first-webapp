<?php
include('database.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Home</title>
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

        <div class="d-inline-flex align-items-center ">
          <button onclick="Opensidenav()" class=" ml-2 mr-1 ml-md-0 d-sm-block d-md-none my-0 align-items-center d-flex " type="button" style="background-color:white;font-size:25px;border:1px solid #F2FCFF;border-radius:3px;">
            <span class="fas fa-bars my-1 opensidenav " style="background-color:white;color:black;line-height:1.1!important"></span>
          </button>
          <a class="navbar-brand justify-content-center py-0 my-0 px-0 mr-1 d-none d-md-block" href="./index.php" style="width:100%;">
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
          <div class=" d-flex ml-auto ">


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
          <?php echo "<a class='bookdescriptioncontainerhome text-decoration-none ' href ='index.php'>"; ?>
          <li class="homebutton  d-flex align-items-center mt-2  w-100 ">
            <i class="fas fa-home h-10 mr-2 align-items-center "></i>
            <h5 class=" buttontext align-items-center mt-2 justify-content-center">Home</h5>
          </li>
          </a>

          <?php echo "<a class='bookdescriptioncontainerhome text-decoration-none d-flex' href ='AdvanceSearch.php'>"; ?>
          <li class="homebutton d-flex align-items-center mt-2 w-100 ">
            <i class="fas fa-search mr-2 align-items-center  "></i>
            <h5 class="buttontext align-items-center mt-2 justify-content-center">Browse</h5>
          </li>
          </a>

          <?php
          if (isset($_SESSION['logintype'])) {
            if ($_SESSION['logintype'] === 'admin' || $_SESSION['logintype'] === 'student') { ?>

              <?php echo "<a class='bookdescriptioncontainerhome text-decoration-none d-flex' href ='logout.php'>"; ?>
              <li class="homebutton d-flex align-items-center mt-2 w-100 ">

                <i class="fas fa-sign-in-alt mr-2 align-items-center  "></i>
                <h5 class="buttontext align-items-center mt-2 justify-content-center">Logout</h5>
              </li>
              </a>


            <?php
            }
          } else {
            ?>

            <?php echo "<a class='bookdescriptioncontainerhome text-decoration-none d-flex' href ='LoginPage.php'>"; ?>
            <li class="homebutton d-flex align-items-center mt-2 w-100 ">
              <i class="fas fa-sign-in-alt mr-2 align-items-center  "></i>
              <h5 class="buttontext align-items-center mt-2 justify-content-center">Login</h5>
            </li>
            </a>

          <?php
          }
          ?>




        </ul>

      </div>

      <div class="rightblock d-block ml-0 ml-lg-3 mt-0">
        <div class="searchbox d-flex align-items-center mt-2 d-block d-lg-none">
          <div class="input-group ml-2 d-inline-flex">
            <i class="fas fa-search mr-2 align-items-center  my-auto"></i>
            <input type="text" class="form-control my-auto" placeholder="Search " style="border:0;height:30px;padding-left:2px; outline:none;box-shadow:none;">
            <div class="input-group-append">
              <button class="btn " type="submit" style="box-shadow:none;outline:none;">
                <i class="fa fa-arrow-right"></i>
              </button>
            </div>
          </div>
        </div>
        <div class="pt-3 sticktodapat d-none d-lg-block">
          <div class="searchbox d-flex align-items-center">
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
        </div>
        <div class="searchfeaturebox ">

          <div class="featuredbox mt-3 ">

            <div class="d-inline-flex w-100 h-100">
              <?php
              include('database.php');



              $random = "SELECT t.*
FROM books AS t
INNER JOIN
    (SELECT ROUND(
       RAND() * 
      (SELECT MAX(id) FROM books )) AS id
     ) AS x
WHERE
    t.id >= x.id
LIMIT 1;";
              $rs_result = mysqli_query($conn, $random);

              while ($row = mysqli_fetch_assoc($rs_result)) {

              ?>


                <?php echo "<a class='bookimagecontainerhome text-decoration-none text-dark justify-content-center d-block-flex h-100' href ='Openbook.php?id=" . $row["id"] . "'>"; ?>

                <div class="d-flex pt-4 pl-4" style="height:20%;">
                  <h3 style="color:#A31F1F;">Featured</h3>
                </div>
                <div class="bookdescriptionhome text-decoration-none d-block-flex pt-4 pb-3 mx-auto mb-0 " style="overflow:auto;">
                  <h2 style="font-weight:600;"><?php echo $row["title"]; ?></h2>
                  <h4>-<?php echo $row["author"]; ?></h4>




                </div>
                </a>


                <?php echo "<a class='bookdescriptioncontainerhome text-decoration-none d-flex' href ='Openbook.php?id=" . $row["id"] . "'>"; ?>

                <div class="bookimagehome  px-2 pt-2">
                  <div class="bookimagebox d-flex align-items-center justify-content-center h-100  ">
                    <?php
                    echo '<img class="bookimg text-center"  alt="No Image Preview" src="./uploads/images/' . $row['image'] . '"/>';
                    ?>

                  </div>
                <?php
              }
                ?>


                </div>

                </a>

            </div>
          </div>
        </div>


        <div class="recentlyadded" style="margin-top:18px;">
          <h3 class="d-flex align-items-center" style="font-family:cambria;font-weight:700;margin-bottom:0!important;"> Recently Added </h3>
          <div class="recentadded mt-0  h-100 w-100">

            <div class="owl-carousel owlnew row mt-1 mx-0 low ">
              <?php
              include('database.php');



              $recentadded = "SELECT * FROM books ORDER BY id DESC LIMIT 5;";
              $recently = mysqli_query($conn, $recentadded);

              while ($row = mysqli_fetch_array($recently)) {
                extract($row);
              ?>

                <?php echo "<a class=' d-block text-decoration-none p-1 w-100' href ='Openbook.php?id=" . $row["id"] . "'>"; ?>
                <div class="card newitems w-100 py-1 px-1">
                  <div class="card-img-top d-flex mx-auto w-100 align-items-center justify-content-center">
                    <?php echo '<img class="cardimg text-light"  alt="No Image Preview " src="./uploads/images/' . $row['image'] . '"/>';  ?>

                  </div>
                  <div class="card-body pt-1 pb-0 px-0 ">
                    <p class="card-title newitemname mb-0"><?php echo $title; ?></p>
                    <p class="card-text itemauthor mb-0">-<?php echo $author; ?> </p>
                  </div>
                </div>
                </a>

              <?php
              }
              mysqli_close($conn);
              ?>


            </div>
          </div>
        </div>

      </div>


    </div>

  </div>


</body>

</html>