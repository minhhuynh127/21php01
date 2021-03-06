<?php
   require_once("validate.php");
   if(!empty($_POST)) {
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $confirmPassword = $_POST['confirmPassword'];
        $avatar = $_FILES['avatar'];
        $avatar_name = $avatar['name'];
            move_uploaded_file($avatar['tmp_name'], 'uploads/'.$avatar['name']);
            if ($avatar_name == '') {
                $avatar_name = 'default.jpg';
            }
        //Liên kết database
        $connect = new mysqli("localhost", "root", "", "my_username");
        //Cho phép PHP lưu unicode (utf8) - database
        mysqli_set_charset($connect, "utf8");
        //Kiểm tra kết nối
        if($connect->connect_error) {
            var_dump($connect->$connect_error);
            die();
        } else {
        // Thực hiện chèn dữ liệu vào database
            $query = "INSERT INTO username(FULL_NAME, USER_NAME, PASSWORD, EMAIL, PHONE_NUMBER, AVATAR) VALUE('$fullname', '$username', '$password', '$email', '$phone', '$avatar_name')";  
            if(($fullname != '') && ($username != '') && ($password != '') && ($email != '') && ($phone != '') && ($confirmPassword != '') &&($confirmPassword == $password)) {
                $connect->query($query);
                // header("location: login.php");
                // header("location: http://localhost/phpmyadmin/index.php?route=/sql&server=1&db=my_username&table=username&pos=0");
                header("location: login.php");
            }
            $connect->close();
        }
    }
    
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
            <div class="panel panel-primary">
                <div class="panel-heading text-center">
                    <h3>Nhập thông tin đăng ký</h3>
                </div>
                <div class="panel-body">
                    <form action="" method="POST" class="bg-secondary" enctype='multipart/form-data'>
                        <div class="form-group">
                            <label for="fullname" class="form-label text-primary">Fullname</label>
                            <input id="fullname" class="form-control" type="text" name="fullname" value="<?php echo empty($_POST['fullname'])?'':$_POST['fullname'];?>">
                            <span class="text-danger"><?php echo $errFullname;?></span>
                        </div>
                        <div class="form-group">
                            <label for="username" class="form-label text-primary">Username</label>
                            <input id="username" class="form-control" type="text" name="username" value="<?php echo empty($_POST['username'])?'':$_POST['username'];?>">
                            <span class="text-danger"><?php echo $errUsername;?></span>
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label text-primary">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="" value="<?php echo empty($_POST['password'])?'':$_POST['password'];?>">
                            <span class="text-danger"><?php echo $errPassword;?></span>
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label text-primary">Confirm Password</label>
                            <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="" value="<?php echo empty($_POST['confirmPassword'])?'':$_POST['confirmPassword'];?>">
                            <span class="text-danger"><?php echo $errConfirmPassword;?></span>

                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label text-primary">Email</label>
                            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelpId" placeholder="" value="<?php echo empty($_POST['email'])?'':$_POST['email'];?>">
                            <span class="text-danger"><?php echo $errEmail;?></span>

                        </div>
                        <div class="form-group">
                            <label for="phone" class="form-label text-primary">Phone Number</label>
                            <input id="phone" class="form-control" type="tel" name="phone" value="<?php echo empty($_POST['phone'])?'':$_POST['phone'];?>">
                            <span class="text-danger"><?php echo $errPhone;?></span>
                        </div>

                        <div class="form-group">
                            <label for="avatar" class="form-label text-primary">Avatar</label>
                            <input id="avatar" class="form-control" type="file" name="avatar">
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary btn-block">Đăng ký</button>
                    </form>
                </div>
            </div>

        </div>

    </div>
</body>
</html>