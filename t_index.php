<?php
session_start();
if(isset($_SESSION['t_name']))
{

require_once("db.php");
$username=$_SESSION['t_name'];
$query="SELECT * FROM teacher WHERE username='$username'";
$result=mysqli_query($stat,$query);
$rows=mysqli_fetch_array($result);

$name=$rows['name'];
$address=$rows['address'];
$designation=$rows['designation'];
$qualification=$rows['qualification'];
$subject1=$rows['subject1'];
$subject2=$rows['subject2'];
$subject3=$rows['subject3'];
$subject4=$rows['subject4'];
$subject5=$rows['subject5'];
$photo=$rows['photo'];
$contactno=$rows['contactno'];
$query="SELECT * FROM class WHERE teacher='$username'";
$result=mysqli_query($stat,$query);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Teacher Interface</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="t_index.php">Teacher's web Interface </a>
            </div>
            <!-- Top Menu Items -->
            <?php
			require_once("navbar.php");?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
					<li class="active">
                        <a href="t_index.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                    </li>
                    <li>
                        <a href="t_dashboard.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="t_timetable.php"><i class="fa fa-fw fa-calendar"></i> View timetable</a>
                    </li>
                   <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-bar-chart-o"></i> Marks <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
						     <li>
                                <a href="t_marks_view.php"><i class="fa fa-fw fa-table fa-fw"></i> View marks</a>
                            </li>
                            <li>
                                <a href="t_marks_add.php"><i class="fa fa-fw fa-plus fa-fw"></i> Update marks</a>
                            </li>
                            <li>
                                <a href="t_marks_edit.php"><i class="fa fa-fw fa-edit fa-fw"></i> Edit marks</a>
                            </li>
							<li>
                                <a href="t_marks_delete.php"><i class="fa fa-fw fa-minus fa-fw"></i> Delete marks</a>
                            </li>
                        </ul>
                    </li>
										<li>
                        <a href="t_att_add.php"><i class="fa fa-fw fa-edit"></i> Attendance</a>
                    </li>
				   <li>
                       <a href="javascript:;" data-toggle="collapse" data-target="#demo1"><i class="fa fa-envelope"></i> Feedback <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo1" class="collapse">
                            <li>
                                <a href="teacher_feedback_add.php"><i class="fa fa-fw fa-plus"></i> Add feedback</a>
                            </li>
                            <li>
                                <a href="teacher_feedback_view.php"><i class="fa fa-fw fa-desktop"></i> View feedback</a>
                            </li>
                            <li>
                                <a href="teacher_feedback_edit.php"><i class="fa fa-fw fa-edit"></i> Edit feedback</a>
                            </li>
                            <li>
                                <a href="teacher_feedback_del.php"><i class="fa fa-fw fa-minus"></i> Delete feedback</a>
                            </li>
                        </ul>
                    </li>
                     <li>
                       <a href="javascript:;" data-toggle="collapse" data-target="#demo2"><i class="fa fa-fw fa-file"></i> Activities <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo2" class="collapse">
                            <li>
                                <a href="teacher_activity_add.php"><i class="fa fa-fw fa-plus"></i> Add activity</a>
                            </li>
                            <li>
                                <a href="teacher_activity_view.php"><i class="fa fa-fw fa-desktop"></i> View activities</a>
                            </li>
                            <li>
                                <a href="teacher_activity_edit.php"><i class="fa fa-fw fa-edit"></i> Edit activities</a>
                            </li>
                            <li>
                                <a href="teacher_activity_del.php"><i class="fa fa-fw fa-minus"></i> Delete activities</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Profile
                            <small></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> Personal details can be changed via the "Edit profile" menu
                            </li>
                           
                        </ol>
                    </div>
					<div class="col-lg-9">
					<div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th  colspan="2"><h4><b>Staff profile</b></h4></th>
                                        
                                       
                                    </tr>
                                </thead>
                                <tbody>
								      
                                    <tr>
                                        <td><b>Username</b></td>
                                        <td><?php echo $username;?></td>
										 
                                    </tr>
									 <tr>
                                        <td><b>Name</b></td>
                                        <td><?php echo $name;?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Address</b></td>
                                        <td><?php echo $address;?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Qualification</b></td>
                                         <td><?php echo $qualification;?></td>     
                                    </tr>
                                    <tr>
                                        <td><b>Designation</b></td>
                                        <td><?php echo $designation;?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Contact number</b></td>
                                        <td><?php echo $contactno;?></td>
                                    </tr>
                                </tbody>
                            </table>
							<table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th><h4><b>Classes</b></h4></th>
                                        <th><h4><b>Subjects</b></h4></th>
                                        
                                       
                                    </tr>
                                </thead>
                                <tbody>
								 <?php
                                    while($row=mysqli_fetch_array($result))
									{
									    ?>
								   <tr>
                                        <td><b><?php echo $row['std'];?></b></td>
                                        <td><?php echo $row['subject'];?></td>
                                    </tr>
									
								<?php	
									}
                                for($k=1;$k<10;$k++)
								{
                                $query="SELECT * FROM class WHERE teacher".$k."='$username'";
                                $result=mysqli_query($stat,$query);
								while($row=mysqli_fetch_array($result))
								{
							    ?>
								 <tr>
                                        <td><b><?php echo $row['std'];?></b></td>
                                        <td><?php echo $row['subject'.$k];?></td>
                                    </tr>

                                 <?php
								 }								
								
                                 }
                                  ?>								 
                                </tbody>
                            </table>
                        </div>
					</div>
					<div class="col-lg-3">
						 <img width="100%" src="image/<?php echo $photo; ?>">
					 </div>
					 
                </div>
                <!-- /.row -->
              
						
            </div>
			
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
<?php
}
else
{
     header("refresh:0,url=teacherlogin.php");

}
?>