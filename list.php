<?php
$con=mysqli_connect('localhost', 'root', '111111','opentutorials');
// mysql_select_db('opentutorials');
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$list_result = mysqli_query($con,'SELECT * FROM topic');



if(!empty($_GET['id'])) {
    $topic_result = mysqli_query($con,'SELECT * FROM topic WHERE id = '.mysqli_real_escape_string($con,$_GET['id']));
    $topic = mysqli_fetch_array($topic_result);

}

?>






<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>database list</title>
    <style type="text/css">
      body{
        font-size: 0.8em;
        font-family: dotum;
        Line-height:1.6em;

      }
      header{
        border-bottom: 1px solid #ccc;
        padding: 20px 0;
      }
      nav{
        float: left;
        margin-right: 20px;
      }
      nav.ul{
        list-style-type:  circle;
        padding-Left: 0;
        padding-right: 20px;

      }
      article {
                     float: left;
                 }
     .description{
                     width:500px;
                 }

    </style>
  </head>
  <body id="body">
    <div>
               <nav>
                   <ul>
                       <?php
                       // $con=mysqli_connect('localhost', 'root', '111111','opentutorials');
                       //
                       // $list_result = mysqli_query($con,'SELECT * FROM topic');
                       // $epoc = mysqli_fetch_array($list_result);
                       while($epoc = mysqli_fetch_array($list_result)) {
                           echo "<li><a href=\"?id={$epoc['id']}\">".htmlspecialchars($epoc['title'])."</a></li>";                        }
                       ?>
                   </ul>
                   <ul>
                       <li><a href="input.php">추가</a></li>
                   </ul>
               </nav>
               <article>
                   <?php
                   if(!empty($topic)){
                   ?>
                   <h2><?=htmlspecialchars($topic['title'])?></h2>
                   <div class="description">
                       <?=htmlspecialchars($topic['description'])?>
                   </div>
                   <div>
                       <a href="modify.php?id=<?=$topic['id']?>">수정</a>
                       <form method="POST" action="process.php?mode=delete">
                           <input type="hidden" name="id" value="<?=$topic['id']?>" />
                           <input type="submit" value="삭제" />
                       </form>
                   </div>
                   <?php
                   }
                   ?>
               </article>
           </div>
  </body>
</html>

<!-- https://www.w3schools.com/php/func_mysqli_fetch_array.asp -->
