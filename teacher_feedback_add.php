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
            <?php
            require_once('navbar.php');
            ?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                <li>
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
                   <li class="active">
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
                            Add Feedback
                        </h1>
                    </div>
					<div class="col-lg-12">
                    <form name="form" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
                    <?php
                            $count=0;
                            $query1="SELECT * FROM class WHERE classteacher='$username' order by std";
                            $result1=mysqli_query($stat,$query1);
                            $i=0;
                            while($row=mysqli_fetch_array($result1))
                            {
                                $std=$row['std'];
                                ?>
        					<div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <tbody>
                                            <tr>
                                                <td><b>Register No.</b></td>
                                                <td><b>Name</b></td>
                                                <td><b>Remark</b></td>
                                            </tr>
                                                    <thead>
                                                        <tr>
                                                            <th  colspan="3"><h4><b><?php echo $std;?></b></h4></th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                    $query2="SELECT * FROM student WHERE std='$std' order by name";
                                                    $result2=mysqli_query($stat,$query2);
                                                    
                                                    while($row2=mysqli_fetch_array($result2))
                                                    { 
                                                        ?>
        									            <tr>
                                                            <td><?php echo $row2['regno'];?></td>
                                                            <td><?php echo $row2['name'];?></td>
                                                            <td><textarea type="text" rows='1' cols='100' maxlength='250' name="remark[]"></textarea></td>
                                                            <?php 
                                                                $id[$i] = $row2['regno']; 
                                                                $st[$i]= $std;
                                                                $i++; 
                                                                $count++; 
                                                            ?>  
                                                        </tr>
                                                        <?php
                                                    }
                                                    
                                                ?>
                                            
                                           
                                        </tbody>
                                    </table>
				
                                </div>
                        <?php } ?>
                        <td><button style="background-color:#ddd; width:100%;" type="submit" name="submit" class="btn btn-default">Submit</button></td>
					</div>
                    </form>
					 <?php 
                        if(isset($_POST['submit']))
                        {
                            $remark=$_POST['remark'];
                            $f=0;
                            for($i=0;$i<$count;$i++)
                            {
                                if((trim($remark[$i])!=""))
                                {
                                    require_once('db.php');
                                    $r=$id[$i];
                                    $s=$st[$i];
                                    $re=$remark[$i];
                                    echo $re;
                                    $d= new DateTime('today');
                                    $da=$d->format('d-m-Y');
                                    $sql1 = "INSERT INTO feedback(`id`,`std`,`regno`,`date`,`remark`,`teacher`) VALUES(NULL,'$s','$r','$da','$re','$username')";
                                    $result1=mysqli_query($stat,$sql1);
                                    $f++;
                                }
                                
                            }
                            if($f!=0)
                            {
                                echo "<meta http-equiv=\"refresh\" content=\"0;URL=teacher_feedback_add.php\">";
                                echo"
                                  <script type='text/javascript'>
                                  alert('Feedback Succesfully Inserted for ".$f." students!!');
                                  </script>";
                            }
                        }
                        ?>
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