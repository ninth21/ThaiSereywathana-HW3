<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SabayTraining</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="css/concise.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/masthead.css" />
    <style>
        body {
            padding-bottom: 20px;
        }
        .navbar {
            margin-bottom: 0px;
            border-radius: 0;
        }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-inverse">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="https://sabaytraining.com/">
                &copy; SabayTraining, Laravel</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="login.php">Login</a></li>

              </ul>
          </div><!--/.navbar-collapse -->
        </div>
    </nav>
<div class="container">
    <?php
        print '<h2>Registration Form</h2>
        <p>Register so that you can take advantage of certain features 
        like this, that, and the other thing.</p>';
    ?>
    <!-- Add_to_File -->
    <?php

        if(isset($_POST['btn_submit']))
        {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];
        $text = $first_name . "," . $last_name . "," . $email . "," . $password1 . "," . $password2 . "\n";
        $fp = fopen('register.txt', 'a+');

            if(fwrite($fp, $text))  {
                echo '<p class="text-success">Data has been saved!</p>';

            }
        fclose ($fp);    
        }
    ?>
</div>
    <div class="container">
        <form action="register.php" method="post" class="form--inline">
            <div class="row">
                <div class="col-sm-2">
                    <label for="first_name">First Name:</label>
                </div>
                <div class="col-sm-6">
                    <input type="text" name="first_name" size="40" required autofocus>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-2">
                    <label for="last_name">Last Name:</label>
                </div>
                <div class="col-sm-6">
                    <input type="text" name="last_name" size="40" required>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-2">
                    <label for="email">Email Address:</label>
                </div>
                <div class="col-sm-6">
                    <input type="email" name="email" size="40" required>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-2">
                    <label for="email">Password:</label>
                </div>
                <div class="col-sm-6">
                    <input type="password" name="password1" size="40" required>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-2">
                    <label for="password2">Confirm Password:</label>
                </div>
                <div class="col-sm-6">
                    <input type="password" name="password2" size="40" required>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-2">
                    <input type="submit" name="btn_submit"  class="button--pill">
                </div>
            </div>
        </form>
    </div>
    <hr>
<div class="container">
    <footer>
        <p><a href="https://sabaytraining.com/">&copy; SabayTraining, Laravel</a></p>
    </footer>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>