<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" href="favicon.ico" type="image/icon" sizes="16x16">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Skill's Breaker</title>
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
<link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
<link rel="stylesheet" href="css/main.css">
<link  rel="stylesheet" href="css/font.css">
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js"  type="text/javascript"></script>
<script>
function validateForm() {
  var y = document.forms["form"]["name"].value; 
  if (y == null || y == "") {
    document.getElementById("errormsg").innerHTML="Name must be filled out.";
    return false;
  }
  var br = document.forms["form"]["branch"].value;
  if (br == "") {
    document.getElementById("errormsg").innerHTML="Please select your branch";
    return false;
  }
  if (m.length < 10) {
    document.getElementById("errormsg").innerHTML="Passwords must be 12 digits long";
    return false;
  }
  var g = document.forms["form"]["gender"].value;
  if (g=="") {
    document.getElementById("errormsg").innerHTML="Please select your gender";
    return false;
  }
  var clr = document.forms["form"]["clrname"].value;
  if (clr=="") {
    document.getElementById("errormsg").innerHTML="Please select your colourblind Status";
    return false;
  }
  var x = document.forms["form"]["username"].value;
  if (x.length == 0) {
    document.getElementById("errormsg").innerHTML="Please enter a valid username";
    return false;
  }
  if (x.length < 4) {
    document.getElementById("errormsg").innerHTML="Username must be at least 4 characters long";
    return false;
  }
  var m = document.forms["form"]["phno"].value;
  if (m.length != 10) {
    document.getElementById("errormsg").innerHTML="Phone number must be 10 digits long";
    return false;
  }
}
</script>
<?php
if (@$_GET['w']) {
    echo '<script>alert("' . @$_GET['w'] . '");</script>';
}
?>

</head>
<?php
include_once 'dbConnection.php';
?>
<body>
<div class="header">
<div class="row">
<div class="col-lg-6">
<span class="logo">Skill's Breaker</span></div>
<div class="col-md-4 col-md-offset-2">
<?php
include_once 'dbConnection.php';
session_start();
if (!(isset($_SESSION['username']))) {
    header("location:index.php");
} else {
    $name     = $_SESSION['name'];
    $username = $_SESSION['username'];
    $iduser = $_SESSION['id'];
    include_once 'dbConnection.php';
    echo '<span class="pull-right top title1" ><span style="color:white"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Hello,</span> <span class="log log1" style="color:lightyellow">' . $username . '&nbsp;&nbsp;|&nbsp;&nbsp;<a href="logout.php?q=account.php" style="color:lightyellow"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Logout</button></a></span>';
}
?>
</div>
</div></div>
<div class="bg">
<nav class="navbar navbar-default title1">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li <?php
if (@$_GET['q'] == 1)
    echo 'class="active"';
?> ><a href="account.php?q=1"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;Home<span class="sr-only">(current)</span></a></li>
        <li <?php
if (@$_GET['q'] == 2)
    echo 'class="active"';
?>><a href="account.php?q=2"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;My History</a></li>
    <li <?php
if (@$_GET['q'] == 3)
    echo 'class="active"';
?>><a href="account.php?q=3"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>&nbsp;Leaderboard</a></li>
	<li <?php 
if (@$_GET['q'] == 4)
    echo 'class="active"';
?>><a href="account.php?q=4"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>&nbsp;Profile Setting</a></li>
	<li <?php 
if (@$_GET['q'] == 5)
    echo 'class="active"';
?>><a href="account.php?q=5"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;Update Password</a></li></ul>      
      </div>
  </div>
</nav>
<div class="container">
	<?php
	if (@$_GET['q'] == 1) { ?>
<div class="row">
<div class="col-md-12">
<div class="panel">
<?php
	echo '<div class="col-md-1"><b>Choose subject:</b></div><div class="col-md-5"><form class="form-horizontal title1" name="form" action="account.php"  method="GET"><select id="subjectname" name="sub" placeholder="Select Subject" class="form-control input-md" >
		<option>----Select Subject to Start Quiz----</option>';
	$resultsubject = mysqli_query($con, "SELECT * FROM subject") or die('Error');
	while ($rowsubject = mysqli_fetch_array($resultsubject)) {
		echo'
		  <option value="'.$rowsubject['subID'].'" '; if((isset($_GET['sub'])) && ($rowsubject['subID']==$_GET['sub'])){ echo 'selected';} echo '>'.$rowsubject['subjectName'].'</option>';
	}
	echo '</select></div>
	<input id="q" name="q" value="1" type="hidden"><div class="col-md-1">
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div><br/><br/>';
?>
</div>
<?php
          if (isset($_GET['sub'])) {
			$subID = $_GET['sub'];
            $result = mysqli_query($con, "SELECT * FROM quiz WHERE status = 'enabled' AND subID = '$subID' ORDER BY date DESC") or die('Error');
            echo
            '<div class="panel">
                            <table class="table table-striped title1"  style="vertical-align:middle">
                                <tr>
                                    <td style="vertical-align:middle"><b>S.N.</b></td>
                                    <td style="vertical-align:middle"><b>Name</b></td>
                                    <td style="vertical-align:middle"><b>Total question</b></td>
                                    <td style="vertical-align:middle"><b>Correct Answer</b></td>
                                    <td style="vertical-align:middle"><b>Wrong Answer</b></td>
                                    <td style="vertical-align:middle"><b>Total Marks</b></td>
                                    <td style="vertical-align:middle"><b>Time limit</b></td>
                                    <td style="vertical-align:middle"><b>Action</b></td>
                                </tr>';
            $c = 1;
			$rowcount = mysqli_fetch_row($result);
			if($rowcount>0){
				$resultquiz = mysqli_query($con, "SELECT * FROM quiz WHERE status = 'enabled' AND subID = '$subID' ORDER BY date DESC") or die('Error');
				while ($rowquiz = mysqli_fetch_array($resultquiz)) {
				  $title   = $rowquiz['title'];
				  $total   = $rowquiz['total'];
				  $correct = $rowquiz['correct'];
				  $wrong   = $rowquiz['wrong'];
				  $time    = $rowquiz['time'];
				  $eid     = $rowquiz['eid'];
				  $q12 = mysqli_query($con, "SELECT score FROM history WHERE eid='$eid' AND username='$username'") or die('Error98');
				  $rowcount = mysqli_num_rows($q12);
				  $query = mysqli_query($con, "SELECT * FROM history WHERE status = 'ongoing' AND username ='$username' ");
				  $ongoingStatus = mysqli_num_rows($query);
				  if ($rowcount == 0) {
					if ($ongoingStatus > 0) {
					  echo
					  '<tr>
											<td style="vertical-align:middle">' . $c++ . '</td>
											<td style="vertical-align:middle">' . $title . '</td>
											<td style="vertical-align:middle">' . $total . '</td>
											<td style="vertical-align:middle">+' . $correct . '</td>
											<td style="vertical-align:middle">-' . $wrong . '</td>
											<td style="vertical-align:middle">' . $correct * $total . '</td>
											<td style="vertical-align:middle">' . $time . '&nbsp;min</td>
											<td style="vertical-align:middle"><b>
											<a href="account.php?q=quiz&step=2&eid=' . $eid . '&n=1&t=' . $total . '&start=start" 
											class="btn" disabled
											style=
												"color:#FFFFFF;
												background:darkgreen;
												font-size:12px;
												padding:7px;
												padding-left:10px;
												padding-right:10px" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
											<span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;
											<span><b>Start</b></span></a></b></td>
										</tr>';
					} else {
					  echo
					  '<tr>
											<td style="vertical-align:middle">' . $c++ . '</td>
											<td style="vertical-align:middle">' . $title . '</td>
											<td style="vertical-align:middle">' . $total . '</td>
											<td style="vertical-align:middle">+' . $correct . '</td>
											<td style="vertical-align:middle">-' . $wrong . '</td>
											<td style="vertical-align:middle">' . $correct * $total . '</td>
											<td style="vertical-align:middle">' . $time . '&nbsp;min</td>
											<td style="vertical-align:middle"><b>
											<a href="account.php?q=quiz&step=2&eid=' . $eid . '&n=1&t=' . $total . '&start=start" 
											class="btn" 
											style=
												"color:#FFFFFF;
												background:darkgreen;
												font-size:12px;
												padding:7px;
												padding-left:10px;
												padding-right:10px">
											<span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;
											<span><b>Start</b></span></a></b></td>
										</tr>';
					}
				  } else {
					$q = mysqli_query($con, "SELECT * FROM history WHERE username='$_SESSION[username]' AND eid='$eid' ") or die('Error197');
					while ($row = mysqli_fetch_array($q)) {
					  $timec  = $row['timestamp'];
					  $status = $row['status'];
					}
					$q = mysqli_query($con, "SELECT * FROM quiz WHERE eid='$eid' ") or die('Error197');
					while ($row = mysqli_fetch_array($q)) {
					  $ttimec  = $row['time'];
					  $qstatus = $row['status'];
					}
					$remaining = (($ttimec * 60) - ((time() - $timec)));
					if ($remaining > 0 && $qstatus == "enabled" && $status == "ongoing") {
					  echo
					  '<tr style="color:darkgreen">
											<td style="vertical-align:middle">' . $c++ . '</td>
											<td style="vertical-align:middle">' . $title . '&nbsp;
											<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td>
											<td style="vertical-align:middle">' . $total . '</td>
											<td style="vertical-align:middle">+' . $correct . '</td>
											<td style="vertical-align:middle">-' . $wrong . '</td>
											<td style="vertical-align:middle">' . $correct * $total . '</td>
											<td style="vertical-align:middle">' . $time . '&nbsp;min</td>
											<td style="vertical-align:middle"><b><a href="account.php?q=quiz&step=2&eid=' . $eid . '&n=1&t=' . $total . '&start=start" 
											class="btn" 
											style=
												"margin:0px;
												background:darkorange;
												color:white">
												&nbsp;
											<span class="title1"><b>Continue</b></span></a></b></td>
										</tr>';
					} else {
						unset($_SESSION['6e447159425d2d']);
						$username = $_SESSION['username'];
						$r1 = mysqli_query($con, "UPDATE history SET status='finished',score_updated='true' WHERE eid='$eid' AND username='$username' ") or die('Error');
					if ($ongoingStatus > 0){
						echo
					  '<tr style="color:darkgreen">
											<td style="vertical-align:middle">' . $c++ . '</td>
											<td style="vertical-align:middle">' . $title . '&nbsp;
											<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td>
											<td style="vertical-align:middle">' . $total . '</td>
											<td style="vertical-align:middle">+' . $correct . '</td>
											<td style="vertical-align:middle">-' . $wrong . '</td>
											<td style="vertical-align:middle">' . $correct * $total . '</td>
											<td style="vertical-align:middle">' . $time . '&nbsp;min</td>
											<td style="vertical-align:middle"><b><a href="account.php?q=result&eid=' . $eid . '
											"class="btn" disabled
											style=
												"margin:0px;
												background:darkred;
												color:white">
												&nbsp;
											<span class="title1"><b>View Result</b></span></a></b></td>
										</tr>';
					}else{	
					  echo
					  '<tr style="color:darkgreen">
											<td style="vertical-align:middle">' . $c++ . '</td>
											<td style="vertical-align:middle">' . $title . '&nbsp;
											<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td>
											<td style="vertical-align:middle">' . $total . '</td>
											<td style="vertical-align:middle">+' . $correct . '</td>
											<td style="vertical-align:middle">-' . $wrong . '</td>
											<td style="vertical-align:middle">' . $correct * $total . '</td>
											<td style="vertical-align:middle">' . $time . '&nbsp;min</td>
											<td style="vertical-align:middle"><b><a href="account.php?q=result&eid=' . $eid . '
											"class="btn" 
											style=
												"margin:0px;
												background:darkred;
												color:white">
												&nbsp;
											<span class="title1"><b>View Result</b></span></a></b></td>
										</tr>';
					}
					}
				  }
				}
			}else{
				echo '<tr><td colspan="8" style="text-align: center;font-weight: bold;">None for this subject. Please choose other subject.</td></tr>';
		  }
            $c = 0;
            echo
            '</table></div>'; 
			  
			}
            echo '<div class="panel" 
                            style=
                                "padding-top:1px;
                                padding-left:15%;
                                padding-right:15%;
                                word-wrap:break-word">
                            <h3 align="center" style="font-family:calibri">:: General Instructions ::</h3><br />
                            <ul type="circle"><font style="font-size:14px;font-family:calibri">';
            $file = fopen("instructions.txt", "r");
            while (!feof($file)) {
              echo '<li>';
              $string = fgets($file);
              $num    = strlen($string) - 1;
              $c      = str_split($string);
              for ($i = 0; $i < $num; $i++) {
                $last = $c[$i];
                if ($c[$i] == ' ' && $last == ' ') {
                  echo '&nbsp;';
                } else {
                  echo $c[$i];
                }
              }
              echo "</li><br />";
            }

            fclose($file);
            echo '</font></ul></div>';
	}
          if (@$_GET['q'] == 'quiz' && @$_GET['step'] == 2 && isset($_SESSION['6e447159425d2d']) && $_SESSION['6e447159425d2d'] == "6e447159425d2d" && isset($_GET['endquiz']) == 'end') {
            unset($_SESSION['6e447159425d2d']);
            $q = mysqli_query($con, "UPDATE history SET status='finished' WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
            $q = mysqli_query($con, "SELECT * FROM history WHERE eid='$_GET[eid]' AND username='$_SESSION[username]'") or die('Error156');
            while ($row = mysqli_fetch_array($q)) {
              $s = $row['score'];
              $scorestatus = $row['score_updated'];
            }
            if ($scorestatus == "false") {
              $q = mysqli_query($con, "UPDATE history SET score_updated='true' WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
              $q = mysqli_query($con, "SELECT * FROM rank WHERE username='$username'") or die('Error161');
              $rowcount = mysqli_num_rows($q);
              if ($rowcount == 0) {
                $q2 = mysqli_query($con, "INSERT INTO rank VALUES(NULL,'$username','$s',NOW())") or die('Error165');
              } else {
                while ($row = mysqli_fetch_array($q)) {
                  $sun = $row['score'];
                }

                $sun = $s + $sun;
                $q = mysqli_query($con, "UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE username= '$username'") or die('Error174');
              }
            }
            header('location:account.php?q=result&eid=' . $_GET['eid']);
			exit();
          }

          if (@$_GET['q'] == 'quiz' && @$_GET['step'] == 2 && isset($_GET['start']) && $_GET['start'] == "start" && (!isset($_SESSION['6e447159425d2d']))) {
            $q = mysqli_query($con, "SELECT * FROM history WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
            if (mysqli_num_rows($q) > 0) {
              $q = mysqli_query($con, "SELECT * FROM history WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
              while ($row = mysqli_fetch_array($q)) {
                $timel  = $row['timestamp'];
                $status = $row['status'];
              }
              $q = mysqli_query($con, "SELECT * FROM quiz WHERE eid='$_GET[eid]' ") or die('Error197');
              while ($row = mysqli_fetch_array($q)) {
                $ttimel  = $row['time'];
                $qstatus = $row['status'];
              }
              $remaining = (($ttimel * 60) - ((time() - $timel)));
              if ($status == "ongoing" && $remaining > 0 && $qstatus == "enabled") {
				unset($_SESSION['6e447159425d2d']);  
                $_SESSION['6e447159425d2d'] = "6e447159425d2d";
                //header('location:account.php?q=quiz&step=2&eid=' . $_GET['eid'] . '&n=' . $_GET['n'] . '&t=' . $_GET['t']);
				//exit();
              } else {
				$s = 0;
				$scorestatus = "false";
                $q = mysqli_query($con, "UPDATE history SET status='finished' WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
                $q = mysqli_query($con, "SELECT * FROM history WHERE eid='$_GET[eid]' AND username='$_SESSION[username]'") or die('Error156');
                while ($row = mysqli_fetch_array($q)) {
                  $s = $row['score'];
                  $scorestatus = $row['score_updated'];
                }
                if ($scorestatus == "false") {
                  $q = mysqli_query($con, "UPDATE history SET score_updated='true' WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
                  $q = mysqli_query($con, "SELECT * FROM rank WHERE username='$username'") or die('Error161');
                  $rowcount = mysqli_num_rows($q);
                  if ($rowcount == 0) {
                    $q2 = mysqli_query($con, "INSERT INTO rank VALUES(NULL,'$username','$s',NOW())") or die('Error165');
                  } else {
                    while ($row = mysqli_fetch_array($q)) {
                      $sun = $row['score'];
                    }

                    $sun = $s + $sun;
                    $q = mysqli_query($con, "UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE username= '$username'") or die('Error174');
                  }
                }
                header('location:account.php?q=result&eid=' . $_GET['eid']);
				exit();
              }
            } else {
              $time = time();
              $q = mysqli_query($con, "INSERT INTO history VALUES(NULL,'$username','$_GET[eid]' ,'0','0','0','0',NOW(),'$time','ongoing','false')") or die('Error137');
              $_SESSION['6e447159425d2d'] = "6e447159425d2d";
              //header('location:account.php?q=quiz&step=2&eid=' . $_GET["eid"] . '&n=' . $_GET["n"] . '&t=' . $_GET["t"]);
			  //exit();
            }
          }


          if (@$_GET['q'] == 'quiz' && @$_GET['step'] == 2 && isset($_SESSION['6e447159425d2d']) && $_SESSION['6e447159425d2d'] == "6e447159425d2d") {
            $q = mysqli_query($con, "SELECT * FROM history WHERE username='$username' AND eid='$_GET[eid]' ") or die('Error197');

            if (mysqli_num_rows($q) > 0) {
              $q = mysqli_query($con, "SELECT * FROM history WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
              while ($row = mysqli_fetch_array($q)) {
                $time   = $row['timestamp'];
                $status = $row['status'];
              }
              $q = mysqli_query($con, "SELECT * FROM quiz WHERE eid='$_GET[eid]' ") or die('Error197');
              while ($row = mysqli_fetch_array($q)) {
                $ttime   = $row['time'];
                $qstatus = $row['status'];
              }
              $remaining = (($ttime * 60) - ((time() - $time)));
              if ($status == "ongoing" && $remaining > 0 && $qstatus == "enabled") {
                $q = mysqli_query($con, "SELECT * FROM history WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
                while ($row = mysqli_fetch_array($q)) {
                  $time = $row['timestamp'];
                }
                $q = mysqli_query($con, "SELECT * FROM quiz WHERE eid='$_GET[eid]' ") or die('Error197');
                while ($row = mysqli_fetch_array($q)) {
                  $ttime = $row['time'];
                }
                $remaining = (($ttime * 60) - ((time() - $time)));
                echo '<script>
var seconds = ' . $remaining . ' ;
function frmreset(){
  document.getElementById("qform").reset();
}

    function secondPassed() {
    var minutes = Math.round((seconds - 30)/60);
    var remainingSeconds = seconds % 60;
    if (remainingSeconds < 10) {
        remainingSeconds = "0" + remainingSeconds; 
    }
    document.getElementById(\'countdown\').innerHTML = minutes + ":" +    remainingSeconds;
    if (seconds <= 0) {
        clearInterval(countdownTimer);
        document.getElementById(\'countdown\').innerHTML = "Buzz Buzz...";
        window.location ="account.php?q=quiz&step=2&eid=' . $_GET["eid"] . '&n=' . $_GET["n"] . '&t=' . isset($_GET["total"]) . '&endquiz=end";
    } else {    
        seconds--;
    }
    }
var countdownTimer = setInterval(\'secondPassed()\', 1000);

</script>';
                echo
                '<font size="3" 
                                style=
                                    "margin-left:100px;
                                    font-family:\'typo\' 
                                    font-size:20px; 
                                    font-weight:bold;
                                    color:darkred">Time Left : </font>
                                <span class="timer btn btn-default" 
                                style="margin-left:20px;">
                                <font style="font-family:\'typo\';font-size:20px;font-weight:bold;color:darkblue" id="countdown"></font></span>';
                $eid   = @$_GET['eid'];
                $sn    = @$_GET['n'];
                $total = @$_GET['t'];
				$clrblindname = "";
				$q = mysqli_query($con, "SELECT * FROM user WHERE username='$_SESSION[username]'");
				while($row = mysqli_fetch_array($q)){
					$clrblindname = $row['clrname'];
				}
                $q     = mysqli_query($con, "SELECT * FROM questions WHERE eid='$eid' AND sn='$sn' ");
                echo '<div class="panel" style="margin-right:5%;margin-left:5%;margin-top:10px;border-radius:10px">';
                while ($row = mysqli_fetch_array($q)) {
                  $qns = stripslashes($row['qns']);
                  $qid = $row['qid'];
                  echo '<b><pre style="background-color:white"><div style="font-size:20px;font-weight:bold;font-family:calibri;margin:10px">' . $sn . ' : ' . $qns . '</div>';
				  $img = $row['image'];
				  if(!empty($img)){
					echo '<img class="'.$clrblindname.'" src="uploads/'.$img.'" style="width:300px"/>';
				  }
					echo '</pre></b>';
                }

                echo '<form id="qform" action="update.php?q=quiz&step=2&eid=' . $eid . '&n=' . $sn . '&t=' . $total . '&qid=' . $qid . '" method="POST"  class="form-horizontal">
<br />';

                $q = mysqli_query($con, "SELECT * FROM user_answer WHERE qid='$qid' AND username='$_SESSION[username]' AND eid='$_GET[eid]'") or die("Error222");
                if (mysqli_num_rows($q) > 0) {
                  $row = mysqli_fetch_array($q);
                  $ans = $row['ans'];
                  $q = mysqli_query($con, "SELECT * FROM options WHERE qid='$qid' AND optionid='$ans'") or die("Error222");
                  $row = mysqli_fetch_array($q);
                  if ($ans != "")
                    $ans = $row['option'];
                  //handle if user doesn't choose any answer    
                  else {
                    $ans == "";
                  }
                } else {
                  $ans = "";
                }
                echo '<div class="funkyradio">';
                $q = mysqli_query($con, "SELECT * FROM options WHERE qid='$qid' ");
                while ($row = mysqli_fetch_array($q)) {
                  $option   = stripslashes($row['option']);
                  $optionid = $row['optionid'];
                  echo
                  '<div class="funkyradio-success"><input type="radio" id="' . $optionid . '" name="ans" value="' . $optionid . '" onclick="enable()"> 
                                    <label for="' . $optionid . '" style="width:50%"><div style="color:black;font-size:12px;word-wrap:break-word">&nbsp;&nbsp;' . $option . '</div></label></div>';
                }
                echo '</div>';
				if ($_GET['n'] == 1) {
					echo '<br />
					<button type="button" class="btn btn-default" onclick="frmreset()" style="height:30px"></span>
					<font style="font-size:12px;font-weight:bold">Reset</font></button>
					&nbsp;&nbsp;&nbsp;&nbsp;

					<button type="submit" class="btn btn-primary" id="sbutton" style="height:30px">
					<span class="glyphicon glyphicon-arrow-right" aria-hidden="true"  style="font-size:12px"></span>
					</button>&nbsp;&nbsp;&nbsp;&nbsp;';
                } else {
                if ($_GET["t"] > $_GET['n'] && $_GET["n"] != 1) {
                  echo '<br />
                                    <a href="account.php?q=quiz&step=2&eid=' . $eid . '&n=' . ($sn - 1) . '&t=' . $total . '
                                    " class="btn btn-primary" style="height:30px"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"  style="font-size:12px">
                                    </span></a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    
                                    <button type="button" class="btn btn-default" onclick="frmreset()" style="height:30px"></span>
                                    <font style="font-size:12px;font-weight:bold">Reset</font></button>
                                    &nbsp;&nbsp;&nbsp;&nbsp;

                                    
                                    <button type="submit" class="btn btn-primary" id="sbutton" style="height:30px">
                                    <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"  style="font-size:12px"></span>
                                    </button>&nbsp;&nbsp;&nbsp;&nbsp;';
                } else if ($_GET["t"] == $_GET["n"])
                //only 1 question/last question
                {

                  echo '<br />
                                    <a href="account.php?q=quiz&step=2&eid=' . $eid . '&n=' . ($sn - 1) . '&t=' . $total . '
                                    " class="btn btn-primary" style="height:30px">
                                    <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"  style="font-size:12px"></span></a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;

                                    <button type="button" class="btn btn-default" onclick="frmreset()" style="height:30px">
                                    <font style="font-size:12px;font-weight:bold">Reset</font></button>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    
                                    <button type="submit" class="btn btn-primary" id="sbutton" style="height:30px">
                                    <font style="font-size:12px;font-weight:bold">Submit</font></button>
                                    </button>&nbsp;&nbsp;&nbsp;&nbsp;

                                    </form><br><br>';
                } else if ($_GET["t"] > $_GET["n"] && $_GET["n"] == 1)
                //1st question
                {
                  echo '<br />&nbsp;&nbsp;&nbsp;&nbsp;
                                    
                                    
                                    <button type="button" class="btn btn-default" onclick="frmreset()" style="height:30px"></span>
                                    <font style="font-size:12px;font-weight:bold">Reset</font></button>&nbsp;&nbsp;&nbsp;&nbsp;
                                    
                                     
                                     <button type="submit" class="btn btn-primary"  id="sbutton" style="height:30px">
                                    <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"  style="font-size:12px"></span>
                                    </button>&nbsp;&nbsp;&nbsp;&nbsp;</form><br><br>';
                } 
               }
                $q = mysqli_query($con, "SELECT * FROM questions WHERE eid='$_GET[eid]'") or die("Error222");
                $i = 1;
                while ($row = mysqli_fetch_array($q)) {
                  $ques[$row['qid']] = $i;
                  $i++;
                }
                $q = mysqli_query($con, "SELECT * FROM user_answer WHERE eid='$_GET[eid]' AND username='$_SESSION[username]'") or die("Error222a");
                $i = 1;
                while ($row = mysqli_fetch_array($q)) {
                  if (isset($ques[$row['qid']])) {
                    $quesans[$ques[$row['qid']]] = true;
                  }
                }
				  echo '<center>';
            	for ($i = 1; $i <= $total; $i++) {
				echo '<a href="account.php?q=quiz&step=2&eid=' . $eid . '&n=' . $i . '&t=' . $total . '"  style="margin:5px;padding:5px;background-color:';
                if (isset($quesans[$i])) {
                    echo "darkgreen";
                } else {
                    echo "darkred";
                }
             	echo ';color:white;font-size:16px;font-family:calibri;border-radius:4px;style:text-align:center">&nbsp;' . $i . '&nbsp;</a>';
            }
			echo '</center>';
              } else {
                unset($_SESSION['6e447159425d2d']);
                $q = mysqli_query($con, "UPDATE history SET status='finished' WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
                $q = mysqli_query($con, "SELECT * FROM history WHERE eid='$_GET[eid]' AND username='$_SESSION[username]'") or die('Error156');
                while ($row = mysqli_fetch_array($q)) {
                  $s = $row['score'];
                  $scorestatus = $row['score_updated'];
                }
                if ($scorestatus == "false") {
                  $q = mysqli_query($con, "UPDATE history SET score_updated='true' WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
                  $q = mysqli_query($con, "SELECT * FROM rank WHERE username='$username'") or die('Error161');
                  $rowcount = mysqli_num_rows($q);
                  if ($rowcount == 0) {
                    $q2 = mysqli_query($con, "INSERT INTO rank VALUES(NULL,'$username','$s',NOW())") or die('Error165');
                  } else {
                    while ($row = mysqli_fetch_array($q)) {
                      $sun = $row['score'];
                    }

                    $sun = $s + $sun;
                    $q = mysqli_query($con, "UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE username= '$username'") or die('Error174');
                  }
                }
                header('location:account.php?q=result&eid=' . $_GET['eid']);
				exit();
              }
            } else {
              unset($_SESSION['6e447159425d2d']);
				$scorestatus = "false";
				$s = 0;
              $q = mysqli_query($con, "UPDATE history SET status='finished' WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
              $q = mysqli_query($con, "SELECT * FROM history WHERE eid='$_GET[eid]' AND username='$_SESSION[username]'") or die('Error156');
              while ($row = mysqli_fetch_array($q)) {
                $s = $row['score'];
                $scorestatus = $row['score_updated'];
              }
              if ($scorestatus == "false") {
                $q = mysqli_query($con, "UPDATE history SET score_updated='true' WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
                $q = mysqli_query($con, "SELECT * FROM rank WHERE username='$username'") or die('Error161');
                $rowcount = mysqli_num_rows($q);
                if ($rowcount == 0) {
                  $q2 = mysqli_query($con, "INSERT INTO rank VALUES(NULL,'$username','$s',NOW())") or die('Error165');
                } else {
                  while ($row = mysqli_fetch_array($q)) {
                    $sun = $row['score'];
                  }

                  $sun = $s + $sun;
                  $q = mysqli_query($con, "UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE username= '$username'") or die('Error174');
                }
              }
              header('location:account.php?q=result&eid=' . $_GET['eid']);
			  exit();
            }
          }
		  //DISPLAY ANSWER
          if (@$_GET['q'] == 'result' && @$_GET['eid']) {
			unset($_SESSION['6e447159425d2d']);
			$q = mysqli_query($con, "UPDATE history SET status='finished', score_updated='true' WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
            $eid = @$_GET['eid'];
            $q = mysqli_query($con, "SELECT * FROM quiz WHERE eid='$eid' ") or die('Error157');
            while ($row = mysqli_fetch_array($q)) {
              $total = $row['total'];
            }
            $q = mysqli_query($con, "SELECT * FROM history WHERE eid='$eid' AND username='$username' ") or die('Error157');

            while ($row = mysqli_fetch_array($q)) {
              $s      = $row['score'];
              $w      = $row['wrong'];
              $r      = $row['correct'];
              $status = $row['status'];
            }
              echo
              '<div class="panel">
                            <center><h1 class="title" style="color:#660033">Result</h1>
                            <center><br />
                            <table class="table table-striped title1" style="font-size:20px;font-weight:1000;">';
              echo
              '<tr style="color:darkblue">
                                <td style="vertical-align:middle">Total Questions</td>
                                <td style="vertical-align:middle">' . $total . '</td>
                            </tr>
                            <tr style="color:darkgreen">
                                <td style="vertical-align:middle">Correct Answer&nbsp;
                                <span class="glyphicon glyphicon-ok-arrow" aria-hidden="true"></span></td>
                                <td style="vertical-align:middle">' . $r . '</td>
                            </tr> 
                            <tr style="color:red">
                                <td style="vertical-align:middle">Wrong Answer&nbsp;
                                <span class="glyphicon glyphicon-remove-arrow" aria-hidden="true"></span></td>
                                <td style="vertical-align:middle">' . $w . '</td>
                            </tr>
                            <tr style="color:orange">
                                <td style="vertical-align:middle">Unattempted&nbsp;
                                <span class="glyphicon glyphicon-ban-arrow" aria-hidden="true"></span></td>
                                <td style="vertical-align:middle">' . ($total - $r - $w) . '</td>
                            </tr>
                            <tr style="color:darkblue">
                                <td style="vertical-align:middle">Score&nbsp;
                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span></td>
                                <td style="vertical-align:middle">' . $s . '</td>
                            </tr>';
              $q = mysqli_query($con, "SELECT * FROM rank WHERE  username='$username' ") or die('Error157');
              while ($row = mysqli_fetch_array($q)) {
                $s = $row['score'];
                echo '<tr style="color:#990000"><td style="vertical-align:middle">Overall Score&nbsp;<span class="glyphicon glyphicon-stats" aria-hidden="true"></span></td><td style="vertical-align:middle">' . $s . '</td></tr>';
              }
              echo
              '</table></div>
                            <div class="panel"><br />
                            <h3 align="center" style="font-family:calibri">:: Detailed Analysis ::</h3><br />
                            <ol style="font-size:20px;font-weight:bold;font-family:calibri;margin-top:20px">';
              $q = mysqli_query($con, "SELECT * FROM questions WHERE eid='$_GET[eid]'") or die('Error197');
              while ($row = mysqli_fetch_array($q)) {
                $question = $row['qns'];
                $qid      = $row['qid'];
                $q2 = mysqli_query($con, "SELECT * FROM user_answer WHERE eid='$_GET[eid]' AND qid='$qid' AND username='$_SESSION[username]'") or die('Error197');
                if (mysqli_num_rows($q2) > 0) {
                  $row1         = mysqli_fetch_array($q2);
                  $ansid        = $row1['ans'];
                  $correctansid = $row1['correctans'];
                  $q3 = mysqli_query($con, "SELECT * FROM options WHERE optionid='$ansid'") or die('Error197');
                  $q4 = mysqli_query($con, "SELECT * FROM options WHERE optionid='$correctansid'") or die('Error197');
                  if (mysqli_num_rows($q3) > 0) {
                    $row2       = mysqli_fetch_array($q3);
                    $ans        = $row2['option'];
                  } else {
                    $ans = "Unanswered";
                  }
                  $row3       = mysqli_fetch_array($q4);

                  $correctans = $row3['option'];
                } else {
                  $q3 = mysqli_query($con, "SELECT * FROM answer WHERE qid='$qid'") or die('Error197');
                  $row1         = mysqli_fetch_array($q3);
                  $correctansid = $row1['ansid'];
                  $q4 = mysqli_query($con, "SELECT * FROM options WHERE optionid='$correctansid'") or die('Error197');
                  $row2       = mysqli_fetch_array($q4);
                  $correctans = $row2['option'];
                  $ans        = "Unanswered";
                }
                if ($correctans == $ans && $ans != "Unanswered") {
                  echo '<li>
                                            <div 
                                                style=
                                                    "font-size:16px;
                                                    font-weight:bold;
                                                    font-family:calibri;
                                                    margin-top:20px;
                                                    background-color:lightgreen;
                                                    padding:10px;
                                                    word-wrap:break-word;
                                                    border:2px solid darkgreen;
                                                    border-radius:10px;">' . $question . ' 
                                                <span class="glyphicon glyphicon-ok" style="color:darkgreen"></span></div><br />';
                  echo '<font 
                                            style="font-size:14px;color:darkgreen"><b>Your Answer: </b></font>
                                            <font style="font-size:14px;">' . $ans . '</font><br />';
                  echo '<font 
                                            style="font-size:14px;color:darkgreen"><b>Correct Answer: </b></font>
                                            <font style="font-size:14px;">' . $correctans . '</font><br />';
                } else if ($ans == "Unanswered") {
                  echo '<li>
                                            <div 
                                                style=
                                                    "font-size:16px;
                                                    font-weight:bold;
                                                    font-family:calibri;
                                                    margin-top:20px;
                                                    background-color:#f7f576;
                                                    padding:10px;
                                                    word-wrap:break-word;
                                                    border:2px solid #b75a0e;
                                                    border-radius:10px;">' . $question . ' </div><br />';
                  echo '<font 
                                            style="font-size:14px;color:darkgreen"><b>Correct Answer: </b></font>
                                            <font style="font-size:14px;">' . $correctans . '</font><br />';
                } else {
                  echo '<li>
                                            <div 
                                                style="font-size:16px;
                                                    font-weight:bold;
                                                    font-family:calibri;
                                                    margin-top:20px;
                                                    background-color:#f99595;
                                                    padding:10px;
                                                    word-wrap:break-word;
                                                    border:2px solid darkred;
                                                    border-radius:10px;">' . $question . ' 
                                                <span class="glyphicon glyphicon-remove" style="color:red"></span></div><br />';
                  echo '<font 
                                            style="font-size:14px;color:darkgreen"><b>Your Answer: </b></font>
                                            <font style="font-size:14px;">' . $ans . '</font><br />';
                  echo '<font 
                                            style="font-size:14px;color:red"><b>Correct Answer: </b></font>
                                            <font style="font-size:14px;">' . $correctans . '</font><br />';
                }
                echo "<br /></li>";
              }
              echo '</ol>';
              echo "</div>";
          }
if (@$_GET['q'] == 2) {
            $q = mysqli_query($con, "SELECT * FROM history WHERE username='$username' AND status='finished' ORDER BY date DESC ") or die('Error197');
            echo '<div class="panel title">
                                <table class="table table-striped title1" >
                                    <tr>
                                        <td style="vertical-align:middle"><b>S.N.</b></td>
                                        <td style="vertical-align:middle"><b>Quiz</b></td>
                                        <td style="vertical-align:middle"><b>Total Questions</b></td>
                                        <td style="vertical-align:middle"><b>Right</b></td>
                                        <td style="vertical-align:middle"><b>Wrong<b></td>
                                        <td style="vertical-align:middle"><b>Unattempted<b></td>
                                        <td style="vertical-align:middle"><b>Score</b></td>
                                        <td style="vertical-align:middle"><b>Action<b></td>
                                    </tr>';
            $c = 0;
            while ($row = mysqli_fetch_array($q)) {
              $eid = $row['eid'];
              $s   = $row['score'];
              $w   = $row['wrong'];
              $r   = $row['correct'];
              $q23 = mysqli_query($con, "SELECT * FROM quiz WHERE  eid='$eid' ") or die('Error208');
              while ($row = mysqli_fetch_array($q23)) {
                $title = $row['title'];
                $total = $row['total'];
              }
              $c++;
              echo
              '<tr>
                                <td style="vertical-align:middle">' . $c . '</td>
                                <td style="vertical-align:middle">' . $title . '</td>
                                <td style="vertical-align:middle">' . $total . '</td>
                                <td style="vertical-align:middle">' . $r . '</td>
                                <td style="vertical-align:middle">' . $w . '</td>
                                <td style="vertical-align:middle">' . ($total - $r - $w) . '</td>
                                <td style="vertical-align:middle">' . $s . '</td>
                                <td style="vertical-align:middle"><b>
                                <a href="account.php?q=result&eid=' . $eid . '" class="btn" style="margin:0px;background:darkred;color:white">&nbsp;
                                    <span class="title1"><b>View Result</b></td>
                            </tr>';
            }
            echo '</table></div>';
          }

if (@$_GET['q'] == 3) {
    if(isset($_GET['show'])){
        $show = $_GET['show'];
        $showfrom = (($show-1)*10) + 1;
        $showtill = $showfrom + 9;
    }
    else{
        $show = 1;
        $showfrom = 1;
        $showtill = 10;
    }
    $q = mysqli_query($con, "SELECT * FROM rank");
    
    echo '<div class="panel title">
<table class="table table-striped title1" >
<tr><td style="vertical-align:middle"><b>Rank</b></td><td style="vertical-align:middle"><b>Name</b></td><td style="vertical-align:middle"><b>Branch</b></td><td style="vertical-align:middle"><b>Username</b></td><td style="vertical-align:middle"><b>Score</b></td></tr>';
    $c = $showfrom-1;
    if(empty($q)){
        $total = 0;
    }
    else {
        $total = mysqli_num_rows($q);
    }
    if($total >= $showfrom){
        $q = mysqli_query($con, "SELECT * FROM rank ORDER BY score DESC, time ASC LIMIT ".($showfrom-1).",10") or die('Error223');
        while ($row = mysqli_fetch_array($q)) {
            $e = $row['username'];
            $s = $row['score'];
            $q12 = mysqli_query($con, "SELECT * FROM user WHERE username='$e' ") or die('Error231');
            while ($row = mysqli_fetch_array($q12)) {
                $name     = $row['name'];
                $branch   = $row['branch'];
                $username = $row['username'];
            }
            $c++;
            echo '<tr><td style="color:#99cc32"><b>' . $c . '</b></td><td style="vertical-align:middle">' . $name . '</td><td style="vertical-align:middle">' . $branch . '</td><td style="vertical-align:middle">' . $username . '</td><td style="vertical-align:middle">' . $s . '</td><td style="vertical-align:middle">';
        }
    }
    else{
    }
    echo '</table></div>';
    echo '<div class="panel title"><table class="table table-striped title1" ><tr>';
    $total = round($total/10) + 1;
    if(isset($_GET['show'])){
        $show = $_GET['show'];
    }
    else{
        $show = 1;
    }
    if($show == 1 && $total==1){
    }
    else if($show == 1 && $total!=1){
        $i = 1;
        while($i<=$total){
            echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="account.php?q=3&show='.$i.'">&nbsp;'.$i.'&nbsp;</a></td>';
            $i++;
        }
        echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="account.php?q=3&show='.($show+1).'">&nbsp;>>&nbsp;</a></td>';
    }
    else if($show != 1 && $show==$total){
        echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="account.php?q=3&show='.($show-1).'">&nbsp;<<&nbsp;</a></td>';

        $i = 1;
        while($i<=$total){
            echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="account.php?q=3&show='.$i.'">&nbsp;'.$i.'&nbsp;</a></td>';
            $i++;
        }
    }
    else{
        echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="account.php?q=3&show='.($show-1).'">&nbsp;<<&nbsp;</a></td>';
        $i = 1;
        while($i<=$total){
            echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="account.php?q=3&show='.$i.'">&nbsp;'.$i.'&nbsp;</a></td>';
            $i++;
        }
        echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="account.php?q=3&show='.($show+1).'">&nbsp;>>&nbsp;</a></td>';
    }
    echo '</tr></table></div>';
}

if (@$_GET['q'] == 4) { ?>
	
	<div class="bg">
	<div class="row">
	<div class="panel"> 
	  <form class="form-horizontal" name="form" action="profileupdate.php" onSubmit="return validateForm()" method="POST">
	<fieldset>
	<div class="form-group">
	  <label class="col-md-12 control-label" for="name"></label>  
	  <div class="col-md-12">
	  <h3 align="center">Profile Settings</h3>
	<?php 
		 if(isset($_GET['m'])){
			 echo '<p style="color:green;font-size:15px;text-align: center">' . @$_GET['m'] . '</p>';
		 }else if(isset($_GET['e'])){
			 echo '<p style="color:red;font-size:15px;text-align: center">' . @$_GET['e'] . '</p>';
		 }
		
	$getInfo = mysqli_query($con, "SELECT * FROM user WHERE id='$iduser'");
	$row = mysqli_fetch_array($getInfo);
	$gender = $row['gender'];
	$branch = $row['branch'];
	$clrblindname = $row['clrname'];
	$phonenum = $row['phno'];
	?>
	  </div>
	</div> 
	<div class="form-group">
	  <label class="col-md-12 control-label" for="name"></label>  
	  <div class="col-md-12">
	  <input id="name" name="name" placeholder="Enter your name" class="form-control input-md" type="text" value="<?php
	if (isset($name))
	{
	echo $name;
	}?>">
	  </div>
	</div>
	<div class="form-group">
	  <label class="col-md-12 control-label" for="gender"></label>
	  <div class="col-md-12">
		<select id="gender" name="gender" placeholder="Select your gender" class="form-control input-md" >
	   <option value="" <?php
	if (!isset($gender))
		echo "selected";
	?>>Select Gender</option>
	  <option value="M" <?php
	  if (isset($gender))
	  {
	if ($gender == "M")
		echo "selected";
	  }
	?>>Male</option>
	  <option value="F" <?php
	  if (isset($gender))
	  {
	if ($gender == "F")
		echo "selected";
	  }
	?>>Female</option> </select>
	  </div>
	</div>
	<div class="form-group">
	  <label class="col-md-12 control-label" for="branch"></label>
	  <div class="col-md-12">
		<select id="branch" name="branch" placeholder="Select your branch" class="form-control input-md" >
	   <option value="" <?php
	if (!isset($branch))
		echo "selected";
	?>>Select Branch</option>
	  <option value="CSE" <?php
	  if (isset($branch))
	  {
	if ($branch == "CSE")
		echo "selected";
	  }
	  ?>>Computer Science and Engineering</option>
	  <option value="ECE" <?php
	  if (isset($branch))
	  {
	if ($branch == "ECE")
		echo "selected";
	  }
	?>>Electronics and Communication Engineering</option>
	  <option value="EEE" <?php
	  if (isset($branch))
	  {
	if ($branch == "EEE")
		echo "selected";
	  }
	?>>Electrical and Electronics Engineering</option>
	  <option value="IT" <?php
	  if (isset($branch))
	  {
	  if ($branch == "IT")
		echo "selected";
	  }
	?>>Information Technology</option>
	  <option value="CHEM" <?php
	  if (isset($branch))
	  {
	if ($branch == "CHEM")
		echo "selected";
	  }
	?>>Chemical Engineering</option>
	  <option value="CIVIL" <?php
	  if (isset($branch))
	  {
	if ($branch == "CIVIL")
		echo "selected";
	  }
	?>>Civil Engineering</option> 
	  <option value="MECH" <?php
	  if (isset($branch))
	  {
	if ($branch == "MECH")
		echo "selected";
	  }
	?>>Mechanical Engineering</option> 
	  <option value="BIOTECH" <?php
	  if (isset($branch))
	  {
	if ($branch == "BIOTECH")
		echo "selected";
	  }
	?>>Biotechnology</option> 
	  <option value="IMSC" <?php
	  if (isset($branch))
	  {
	if ($branch == "IMSC")
		echo "selected";
	  }
	?>>Integrated MSc</option> </select>
	  </input>
	  </div>
	</div>
	<div class="form-group">
	  <label class="col-md-12 control-label" for="clrname"></label>
	  <div class="col-md-12">
		<select id="clrname" name="clrname" placeholder="Choose Colour Blind Status" class="form-control input-md" >
	   <option value="" <?php
	if (!isset($clrblindname))
		echo "selected";
	?>>Choose Colour Blind Status</option>
	  <option value="Normal" <?php
	  if (isset($clrblindname))
	  {
	if ($clrblindname == "Normal")
		echo "selected";
	  }
	?>>Normal</option>

	  <option value="Protanopia" <?php
	  if (isset($clrblindname))
	  {
	if ($clrblindname == "Protanopia")
		echo "selected";
	  }
	?>>Protanopia</option>

	<option value="Deuteranopia" <?php
	  if (isset($clrblindname))
	  {
	if ($clrblindname == "Deuteranopia")
		echo "selected";
	  }
	?>>Deuteranopia</option>

	<option value="Tritanopia" <?php
	  if (isset($clrblindname))
	  {
	if ($clrblindname == "Tritanopia")
		echo "selected";
	  }
	?>>Tritanopia</option>
	  </select>
	  </div>
	</div>
	<div class="form-group">
	  <label class="col-md-12 control-label title1" for="username"></label>
	  <div class="col-md-12">
		<input id="username" name="username" placeholder="You cannot change your username" class="form-control input-md" type="username" value="<?php
	if (isset($_SESSION['username']))
	{
	echo $_SESSION['username'], ' (You cannot change your username)';
	};
	?>" style="<?php
	if (isset($_GET['q7']))
		echo "border-color:red";
	?>" disabled>

	  </div>
	</div>
	<div class="form-group">
	  <label class="col-md-12 control-label" for="phno"></label>  
	  <div class="col-md-12">
	  <input id="phno" name="phno" placeholder="Enter your mobile number" class="form-control input-md" type="number" value="<?php
	if (isset($phonenum))
	{
	echo $phonenum;
	}
	?>">
	  </div>
	</div>
	<div class="form-group">
	  <label class="col-md-12 control-label" for=""></label>
	  <div class="col-md-12" style="text-align: right"> 
		<input type="submit" value="Update now" class="btn btn-primary" style="text-align:center" />
	  </div>
	</div>

	</fieldset>
	</form>
	</div>
	</div></div>
<?php 
	}
if (@$_GET['q'] == 5) {?>
	<div class="bg">
	<div class="row">
	<div class="panel"> 
	  <form class="form-horizontal" name="form" action="passwordupdate.php" onSubmit="return validateForm()" method="POST">
	<fieldset>
	<div class="form-group">
	  <label class="col-md-12 control-label" for="name"></label>  
	  <div class="col-md-12">
	  <h3 align="center">Update Password</h3>
	<?php 
		 if(isset($_GET['e'])){
			 echo '<p style="color:green;font-size:15px;text-align: center">' . @$_GET['e'] . '</p>';
		 }else if(isset($_GET['m'])){
			 echo '<p style="color:red;font-size:15px;text-align: center">' . @$_GET['m'] . '</p>';
		 }
		
	$getInfo = mysqli_query($con, "SELECT * FROM user WHERE id='$iduser'");
	$row = mysqli_fetch_array($getInfo);
	$gender = $row['gender'];
	$branch = $row['branch'];
	$clrblindname = $row['clrname'];
	$phonenum = $row['phno'];
	?>
	  </div>
	</div> 
	<div class="form-group">
	  <label class="col-md-12 control-label" for="password"></label>
	  <div class="col-md-12">
		<input id="password" name="password" placeholder="Enter old password" class="form-control input-md" type="password">
	  </div>
	</div>
		
	<div class="form-group">
	  <label class="col-md-12 control-label" for="password"></label>
	  <div class="col-md-12">
		<input id="password" name="newpassword" placeholder="Enter new password" class="form-control input-md" type="password">
	  </div>
	</div>

	<div class="form-group">
	  <label class="col-md-12control-label" for="cpassword"></label>
	  <div class="col-md-12">
		<input id="cpassword" name="cpassword" placeholder="Confirm new Password" class="form-control input-md" type="password">
	  </div>
	</div>
	<div class="form-group">
	  <label class="col-md-12 control-label" for=""></label>
	  <div class="col-md-12" style="text-align: right"> 
		<input type="submit" value="Update now" class="btn btn-primary" style="text-align:center" />
	  </div>
	</div>
	</fieldset>
	</form>
	</div>
	</div></div>
<?php
}
?>
</div></div></div></div>
<svg
  xmlns="http://www.w3.org/2000/svg"
  version="1.1">
  <defs>
    <filter id="protanopia">
      <feColorMatrix
        in="SourceGraphic"
        type="matrix"
        values="0.567, 0.433, 0,     0, 0
                0.558, 0.442, 0,     0, 0
                0,     0.242, 0.758, 0, 0
                0,     0,     0,     1, 0"/>
    </filter>
    <filter id="protanomaly">
      <feColorMatrix
        in="SourceGraphic"
        type="matrix"
        values="0.817, 0.183, 0,     0, 0
                0.333, 0.667, 0,     0, 0
                0,     0.125, 0.875, 0, 0
                0,     0,     0,     1, 0"/>
    </filter>
    <filter id="deuteranopia">
      <feColorMatrix
        in="SourceGraphic"
        type="matrix"
        values="0.625, 0.375, 0,   0, 0
                0.7,   0.3,   0,   0, 0
                0,     0.3,   0.7, 0, 0
                0,     0,     0,   1, 0"/>
    </filter>
    <filter id="deuteranomaly">
      <feColorMatrix
        in="SourceGraphic"
        type="matrix"
        values="0.8,   0.2,   0,     0, 0
                0.258, 0.742, 0,     0, 0
                0,     0.142, 0.858, 0, 0
                0,     0,     0,     1, 0"/>
    </filter>
    <filter id="tritanopia">
      <feColorMatrix
        in="SourceGraphic"
        type="matrix"
        values="0.95, 0.05,  0,     0, 0
                0,    0.433, 0.567, 0, 0
                0,    0.475, 0.525, 0, 0
                0,    0,     0,     1, 0"/>
    </filter>
    <filter id="tritanomaly">
      <feColorMatrix
        in="SourceGraphic"
        type="matrix"
        values="0.967, 0.033, 0,     0, 0
                0,     0.733, 0.267, 0, 0
                0,     0.183, 0.817, 0, 0
                0,     0,     0,     1, 0"/>
    </filter>
    <filter id="achromatopsia">
      <feColorMatrix
        in="SourceGraphic"
        type="matrix"
        values="0.299, 0.587, 0.114, 0, 0
                0.299, 0.587, 0.114, 0, 0
                0.299, 0.587, 0.114, 0, 0
                0,     0,     0,     1, 0"/>
    </filter>
    <filter id="achromatomaly">
      <feColorMatrix
        in="SourceGraphic"
        type="matrix"
        values="0.618, 0.320, 0.062, 0, 0
                0.163, 0.775, 0.062, 0, 0
                0.163, 0.320, 0.516, 0, 0
                0,     0,     0,     1, 0"/>
    </filter>
  </defs>
</svg>
<div class="footer">
	<center>
<a href="#" data-toggle="modal" data-target="#developers" s style="color:lightyellow;" onmouseover="this.style('color:yellow')" target="new">Organized by Muki | Maintenance and Evolution by SME Group 4 (University of Malaya)</a>
<!-- Modal For Developers-->
<div class="modal fade title1" id="developers">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" style="font-family:'typo' "><span style="color:orange">Developers Information</span></h4>
      </div>
	  
      <div class="modal-body">
        <p>
		<div class="row">
		<div class="col-md-6">
		<a href="" style="color:#202020;font-size:18px" title="">Muki Infotech</a>
		<h4 style="color:#202020; font-family:'typo' ;font-size:16px" class="title1">+91 9514444471</h4>
		<h4 style="font-family:'typo' ">mugunthkumar99@gmail.com</h4>
		<h4 style="font-family:'typo' ">Nandha College of Technology ,Erode </h4></div>
		<div class="col-md-6">
		<a href="" style="color:#202020;font-size:18px" title="">University of Malaya</a>
		<h4 class="title1"><a href="https://github.com/aifanshahran" style="color:#202020; font-family:'typo';font-size:16px">Developer 1: Mohamad Aiman</a></h4>
		<h4 style="color:#202020; font-family:'typo' ;font-size:16px" class="title1">Developer 2: Amirul Mukminin</h4>
		<h4 style="color:#202020; font-family:'typo' ;font-size:16px" class="title1">Developer 3: Farhan Sadiq</h4>
		<h4 style="color:#202020; font-family:'typo' ;font-size:16px" class="title1">Developer 4: Nurin Arina</h4>
		<h4 style="color:#202020; font-family:'typo' ;font-size:16px" class="title1">Developer 5: Nur Hazirah</h4>
		<h4 style="color:#202020; font-family:'typo' ;font-size:16px" class="title1">Developer 6: Songyuxuan</h4>
		<h4 style="font-family:'typo' ">University of Malaya, KL </h4></div>
		</div>
		</p>
      </div>
    
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</center>
</body>
</html>
