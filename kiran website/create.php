<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Enter a New SCP File</title>
  </head>
     <body class="container">
      <h1 class="page_header">Enter a New SCP File</h1>
      <?php
        
        if($_POST)
        {
            //connect to the database

            include 'connection/connection.php';

            try
            {
                  //insert query

                  $query="insert into scpp set item=:item,object_class=:object_class,procedures=:procedures,description=:description,addition=:addition, reference=:reference";

                  //prepare query for execution
                  $statement=$conn->prepare($query);

                  $item=htmlspecialchars(strip_tags($_POST['item']));
                  $object_class=htmlspecialchars(strip_tags($_POST['object_class']));
                  $procedures=htmlspecialchars(strip_tags($_POST['procedures']));
                  $description=htmlspecialchars(strip_tags($_POST['description']));
                  $addition=htmlspecialchars(strip_tags($_POST['addition']));
                  $reference=htmlspecialchars(strip_tags($_POST['reference']));

                  //bind our parameter to our query
                  $statement->bindParam(':item',$item);
                  $statement->bindParam(':object_class',$object_class);
                  $statement->bindParam(':procedures',$procedures);
                  $statement->bindParam(':description',$description);
                  $statement->bindParam(':addition',$addition);
                  $statement->bindParam(':reference',$references);

                  //execute the query
                  if($statement->execute())
                  {
                    echo"<div class='alert alert-success'>Record was created</div>";
                  }
                  else
                  {
                    echo"<div class='alert alert-danger'>Unable to save record.</div>";
                  }

            }
            catch(PDOException $exception)
            {
                 die('ERROR: ' . $exception->getMessage());
            }
        }

    ?>
    <h2>Please Enter a New SCP File Using The Form Below....</h2>
    <form class="form-group" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
    <label>ITEM:</label>
    <br>
    <input type="text" name="item" class="form-control">
    <br>
    <label>OBJECT:</label>
    <br>
    <input type="text" name="object_class" class="form-control">
    <br>
    <label>PROCEDURE:</label>
    <br>
    <input type="text" name="procedures" class="form-control">
    <br>
    <label>DESCRIPTION:</label>
    <br>
    <input type="text" name="description" class="form-control">
    <br>
    <label>ADDITION:</label>
    <br>
    <input type="text" name="addition" class="form-control">
    <br>
    <label>REFERENCE:</label>
    <br>
    <input type="text" name="reference" class="form-control">
    <br>
    <input type="submit" value="Save" class="btn btn-primary">
    </form>
    <p><a href="index.php" class="btn btn-warning">Back to index page</a></p>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>