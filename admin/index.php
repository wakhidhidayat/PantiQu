<?php
require 'connect.php';
session_start();
if(!isset($_SESSION['admin'])) {
    echo "<script>location: login.php;</script>";
    header('location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PantiQ - Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Admin</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;">  <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
                     <li>
                        <a  href="index.php?page=panti"><i class="fa fa-dashboard fa-3x"></i> Panti</a>
                    </li>
                    <li>
                        <a  href="index.php?page=event"><i class="fa fa-dashboard fa-3x"></i> Event</a>
                    </li>
                    <li>
                        <a  href="index.php?page=user"><i class="fa fa-dashboard fa-3x"></i> User</a>
                    </li>
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                    </div>
                </div> 
                
                <?php 
						if (isset($_GET['page']))
						{
							if ($_GET['page'] == "panti")
							{
								include 'panti.php';
                            }
                            elseif ($_GET['page'] == "event")
							{
								include 'event.php';
                            }
                            elseif ($_GET['page'] == "user")
							{
								include 'user.php';
							}
							elseif ($_GET['page'] == "insert-user")
							{
								include 'insert-user.php';
							}
							elseif ($_GET['page'] == "insert-panti")
							{
								include 'insert.php';
                            }
                            elseif ($_GET['page'] == "insert-event")
							{
								include 'insert-event.php';
							}
                            elseif ($_GET['page'] == "delete-panti")
                            {
                                include 'delete.php';
                            }
                            elseif ($_GET['page'] == "delete-event")
                            {
                                include 'delete-event.php';
                            }
                            if ($_GET['page'] == "delete-user")
							{
								include 'delete-user.php';
							}
							elseif ($_GET['page'] == "edit-panti")
							{
								include 'edit.php';
                            }
                            elseif ($_GET['page'] == "edit-event")
							{
								include 'edit-event.php';
                            }
                            if ($_GET['page'] == "edit-user")
							{
								include 'edit-user.php';
							}
						}
					?>

                    
                </div>
                    
                 <!-- /. ROW  -->           
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
