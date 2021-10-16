<?php

  include 'database.php';

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>First tutorial on Ajax</title>


    <link rel="stylesheet" type="text/css" href="style.css">
    <script
      src="https://code.jquery.com/jquery-3.6.0.js"
      integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
      crossorigin="anonymous"
    ></script>
    <script>
      // jQuery Code here!

      $(document).ready(function() {
         var commentCount = 2;
          $("button").click(function() {
             commentCount = commentCount + 2;
            $("#comments").load("load-comments.php", {
               commentNewCount: commentCount

            });
          });
      });
    </script>
  </head>
  <body>
    <div id="comments">
      <?php
        $sql = "select * from comments limit 2";
        //  echo $sql;
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
          while ($row = mysqli_fetch_assoc($result)){

            echo "<p>";
            echo $row['author'];
            echo "<br>";
            echo $row['message'];

            echo "</p>";

          }

        } else {
          echo "There are no comments";
        }

      ?>
    </div>
    <button id="">Show more comments</button>
  </body>
</html>
