<?php
$con=mysqli_connect('localhost', 'root', '111111','opentutorials');
// mysql_select_db('opentutorials');
switch($_GET['mode']){
  case 'insert' :
    // $sql="INSERT INTO topic (title, description, created) VALUES ('".mysql_real_escape_string($_POST['title'])."', '".mysql_real_escape_string($_POST['description'])."', now())");
    $result = mysqli_query($con,"INSERT INTO topic (title, description, created) VALUES (' " . mysqli_real_escape_string($_POST['title']). "', '".mysqli_real_escape_string($_POST['description'])."', now())");
    header("Location: list.php");

      break;

  case 'delete':
      mysqli_query($con,'DELETE FROM topic WHERE id = '.mysqli_real_escape_string($_POST['id']));
      header("Location: list.php");
      break;
  case 'modify':
      mysqli_query($con,'UPDATE topic SET title = "'.mysqli_real_escape_string($_POST['title']).'", description = "'.mysqli_real_escape_string($_POST['description']).'" WHERE id = '.mysqli_real_escape_string($_POST['id'])');
      header("Location: list.php?id={$_POST['id']}");
      break;
  }

 ?>
