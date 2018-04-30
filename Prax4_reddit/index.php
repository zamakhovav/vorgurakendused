<?php
include('server.php');


$dbCon = mysqli_connect('localhost', 'st2014', 'progress', 'st2014') or die(mysqli_error());
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
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="My Account"><img src="girl.png" class="w3-circle" style="height:25px;width:25px" alt="Avatar"></a>
 </div>
</div>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:50px">
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
          <?php if (isset($_SESSION['username'])): ?>
            <h4 class="w3-center">Welcome <strong><?php echo $_SESSION['username']; ?></strong></h4>
            <p class="w3-center"><img src="man-2.png" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
            <hr>
          <?php else: ?>
            <h4 class="w3-center">Sign up/ Log in</strong></h4>
            <p class="w3-center"><img src="man-2.png" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
            <?php include_once 'menu.php'; ?>
          <?php endif; ?>


           <div class="content">
             <?php if (isset($_SESSION['success'])): ?>
               <div class="error success">
                 <h3>
                   <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                 </h3>
               </div>

            <?php endif; ?>

             <?php if (isset($_SESSION['username'])): ?>
               <center>
                 <form action='writepost.php' class="w3-margin-center w3-text-theme" method="POST" />
                  <button type="submit" name="post" class="w3-button w3-theme"><i class="fa fa-pencil"></i>Write post</button>
                 </form>
                 <br>
                 <a href="index.php?logout='1'">Log out</a></button>
              </center>
            <?php endif ?>

          </div>
        </p>
        </div>
      </div>
      <br>
    <!-- End Left Column -->
    </div>

    <!-- Middle Column -->
    <div class="w3-col m7">

      <?php
        $sql1 = "SELECT * FROM t164751v3_posts ORDER BY id DESC"; //last posts on the top
        $result = mysqli_query($dbCon, $sql1);

        while ($row = mysqli_fetch_array($result)) {
          $likes = $row['likes'];
          $image = $row['image'];
          $postid = $row['id'];
        ?>

          <div class='w3-container w3-card w3-white w3-round w3-margin'><br>
            <!--<img src="background.jpg" alt="" class="w3-left w3-circle w3-margin-right" style="width:60px">-->
            <span class="w3-right w3-opacity"><?php echo $row['date']; ?></span><br>
            <span class="w3-right" style="color:#FF6633;"><?php echo $row['author']; ?></span>
            <hr class="w3-clear">
            <h4><?php echo $row['title']; ?></h4>
            <p><?php echo $row['text']; ?></p>

            <?php if (isset($_SESSION['username'])): ?>
              <a href=vote_plus.php?id=<?php echo $row['id']; ?>>Like</a>
              <a href=vote_minus.php?id=<?php echo $row['id']; ?>>Dislike</a>
              <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom">Comment</button>
              <span class="w3-right w3-opacity">Likes: <?php echo $row['likes']; ?></span>

            <?php else: ?>
              <button type="" class="w3-button w3-theme-d2 w3-margin-bottom">Show comment</button>
            <?php endif; ?>

        </div>
      <?php } ?>
    <!-- End Middle Column -->
    </div>

  <!-- End Grid -->
  </div>

<!-- End Page Container -->
</div>
<br>

<!--
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    // when the user clicks on like
    $('.like').click(function() {
      var postid = $(this).attr('id');
      $.ajax({
        url: 'index.php',
        type: 'post',
        async: false,
        data:{
          'liked': 1,
          'postid': postid
        },
        success: function() {

        }
      });
    });
  });

</script>
-->
</body>
</html>
