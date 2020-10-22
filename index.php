<?php
include 'database.php';

// check the signup.php file for explanation on code
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) && !empty($_POST['submit'])){


        $uname = trim($_POST['uname']);
        $password = trim($_POST['pwd']);

        $db = new database('localhost', 'root', '', 'project1', 'utf8');

        $db->login($uname, $password);

}


?>


<html>
<head>
    <title>Login</title>

    <!-- link cascading style sheet
                  <a href="signup.php" >New user? Sign up!</a><br>
                  <a href="lostpwd.php">Forgot password?</a><br>
                  -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
  <h1>Login</h1>
<div class="outer">
    <div class="middle">
        <div class="inner"

             <div class="d-flex justify-content-center">
                <form action="index.php" method="post">  <div class="form-group">

                    <label for="exampleInputEmail1">Username</label> <br>
                    <input type="text" name="uname" placeholder="Username" required /><br>
                </div>
                <div class="form-group">

                    <label for="exampleInputPassword1">Password</label> <br>
                    <input type="password" name="pwd" placeholder="Password" required /><br>

                </div>
                <input type="submit" name='submit' /><br>
            </form>

        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s"
        crossorigin="anonymous"></script>
</body>
</html>


