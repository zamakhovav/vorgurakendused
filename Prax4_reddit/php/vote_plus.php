<?php
$dbCon = mysqli_connect('localhost', 'st2014', 'progress', 'st2014') or die(mysqli_error());

$updateSql = "UPDATE t164751v3_posts SET likes=likes+1 WHERE id=".$_GET['id']."";
mysqli_query($dbCon, $updateSql);

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
                 <form method="post">
                   <h6 class="w3-opacity">Thank you for thumbs up!</h6>
                   <center>
                     <a href="index.php">Show posts</a>
                   </center>
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
