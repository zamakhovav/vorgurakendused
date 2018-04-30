<?php
  session_start();

  $errors = array();

  if (isset($_SESSION['username'])) {

    $username = ucfirst($_SESSION['username']);
    $username = $_SESSION['username'];

    if (isset($_POST['submit'])) {
      $title = $_POST['title'];
      $content = $_POST['content'];

      include_once('connection.php');

      if (empty($title)) {
        array_push($errors, "Title is required");
      }

      if (empty($content)) {
        array_push($errors, "Text is required");
      }


      if (count($errors) == 0) {
        $sql = "INSERT INTO t164751v3_posts (title, text, author, likes) VALUE (mysql_real_escape_string($title), mysql_real_escape_string($content), '$username', 0)";
        mysqli_query($dbCon, $sql);
        $_SESSION['success'] = "Posted";
      }

    }
  }
?>

 <!DOCTYPE html>
 <html>
 <title>Mini-reddit</title>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="style.css">
 <link rel="stylesheet" href="colors.css">
 <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <style>
   html,body,h1,h2,h3,h4,h5 {
     font-family: "Open Sans", sans-serif
   }
 </style>

 <body class="w3-theme-l5">

 <!-- Navbar -->
 <div class="w3-top">
  <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
   <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2"><i class="fa fa-bars"></i></a>
   <a href="http://dijkstra.cs.ttu.ee/~vezama/prax4/index.php" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i></a>
   <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="News"><i class="fa fa-globe"></i></a>
   <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Account Settings"><i class="fa fa-user"></i></a>
   <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Messages"><i class="fa fa-envelope"></i></a>
   <a href="#" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="My Account"><img src="girl.png" class="w3-circle" style="height:25px;width:25px" alt="Avatar"></a>
  </div>
 </div>

 <!-- Page Container -->
 <div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
   <!-- The Grid -->
   <div class="w3-row">

     <!-- Middle Column -->
     <div class="w3-col">
       <div class="w3-row-padding">
         <div class="w3-col m12">
           <div class="w3-card w3-round w3-white">
             <div class="w3-container w3-padding">
               <center>
                 <p>
                   <div class="content">
                     <?php if (isset($_SESSION['success'])): ?>
                       <div class="error success">
                         <h5>
                           <?php
                                echo $_SESSION['success'];
                                unset($_SESSION['success']);
                            ?>
                         </h5>
                       </div>
                     <?php endif ?>

                     <?php if (isset($_SESSION['username'])): ?>
                       <center>
                         <a href="index.php">Show posts</a>
                      </center>
                     <?php endif ?>

                  </div>
                </p>
                <?php include('errors.php'); ?>
                 <form method="post" action="writepost.php">
                   <h6 class="w3-opacity">Title</h6>
                   <input placeholder="Title" name="title" type="text" autofocus size="50" class="w3-border w3-padding"></p>
                   <h6 class="w3-opacity">Share interesting news with people!</h6>
                   <textarea placeholder="Your post" name="content" type="text" rows="15" cols="50" class="w3-border w3-padding"></textarea>
                   <br><br>
                   <button name="submit" type="submit" class="w3-button w3-theme">Post</button>
                 </form>
              </center>
             </div>
           </div>
         </div>
       </div>
     <!-- End Middle Column -->
     </div>
   <!-- End Grid -->
   </div>
 <!-- End Page Container -->
 </div>
 <br>
 </body>
 </html>
