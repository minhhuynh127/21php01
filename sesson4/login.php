<?php
    function login() {
        if(!empty($_POST)) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            //Tao ket noi database
            $connect = new mysqli('localhost', 'root', '', 'my_username');
            mysqli_set_charset($connect, 'utf8');
            if($connect->connect_error) {
                var_dump($connect->connect_error);
                die();
            }
            //Truy van du lieu
            $query = "SELECT * FROM username WHERE USER_NAME = '".$username."' AND PASSWORD = '".$password."'";
            $result = mysqli_query($connect, $query);
            $data = array();
            while($row = mysqli_fetch_array($result, 1)) {
                $data[] = $row;
            }
            $connect->close();
            if($data != NULL && count($data) > 0) {
                header("location: http://localhost/phpmyadmin/index.php?route=/sql&server=1&db=myusername&table=username&pos=0");
            } else if($username != '') echo '<h3 class="text-center text-danger">Login Fail!!!</h3>'; 
        }
    }
    login();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading text-center">
                    <h3>Login</h3>
                </div>
                <div class="panel-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="username" class="text-success">Username</label>
                            <input id="username" class="form-control" type="text" name="username">
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-success">Password</label>
                            <input id="password" class="form-control" type="password" name="password">
                        </div>
                        <button type="submit" name="submit" class="btn btn-success btn-block">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>