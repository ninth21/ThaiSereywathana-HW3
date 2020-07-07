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
                <li><a href="register.php">Register</a></li>
              </ul>
          </div><!--/.navbar-collapse -->
        </div>
    </nav>
    <div class="container">
        <?php
            $file = fopen("register.txt",'r');
            while(!feof($file))
            {
                $content = fgets($file);
                $carray =  explode(",",$content);
                list($first_name,$last_name,$email,$password,$password_confirm) = $carray;
                // echo "<pre>"; 
                // var_dump($first_name);  
            }
            if(isset($_POST['btn_submit']))
            {
                $em = $_POST['email'];
                $pass = $_POST['password'];
                if($em === $email && $password === $pass)
                {
                    header('Location:body.php');
                }
                else{
                    echo "<h3 class='text-danger'>Failed to Login, Please Try Again!</h3>";
                }
            }
        ?>
    </div>
    <div class="container">
        <h1 class="text-success">Login Form</h1>
        <form action="login.php" method="POST" class="form--inline">
        <div class="row">
            <div class="col-sm-2">
                <label for="email">Email Address:</label>
            </div>
            <div class="col-sm-6">
                <input type="email" name="email" size="40" required autofocus>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-2">
                <label for="password">Password:</label>
            </div>
            <div class="col-sm-6">
            <input type="password" name="password" size="40" required>
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