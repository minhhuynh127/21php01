<?php 
	$connect = new mysqli('localhost', 'root', '', 'my_username');

	// Check connection
	if ($connect->connect_error) {
	    die("Connection failed: " . $connect->connect_error);
	} else {
		$id_update = $_GET['id'];
		$query = "SELECT * FROM username WHERE id = $id_update";
        $userUpdate = $connect->query($query);
        while($row = $userUpdate->fetch_assoc()) {
            $old_name = $row['FULL_NAME'];
            $old_user = $row['USER_NAME'];
            $old_password = $row['PASSWORD'];
            $old_email = $row['EMAIL'];
            $old_phone = $row['PHONE_NUMBER'];
            $old_avatar = $row['AVATAR'];
        }
        
        if(isset($_POST['update'])) {
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
                $avatar_name = $old_avatar;
            }
            $sqlQuery = "UPDATE username SET FULL_NAME = '$fullname', USER_NAME = '$username', PASSWORD = '$password', EMAIL = '$email', PHONE_NUMBER = '$phone', AVATAR = '$avatar_name' WHERE id = $id_update";
            $connect->query($sqlQuery);
            header("location: list_username.php");
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
                                <input id="fullname" class="form-control" type="text" name="fullname" value="<?php echo $old_name?>">
        
                            </div>
                            <div class="form-group">
                                <label for="username" class="form-label text-primary">Username</label>
                                <input id="username" class="form-control" type="text" name="username" value="<?php echo $old_user?>">
                                
                            </div>
                            <div class="form-group">
                                <label for="password" class="form-label text-primary">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="" value="<?php echo $old_password?>">
                               
                            </div>
                            <div class="form-group">
                                <label for="password" class="form-label text-primary">Confirm Password</label>
                                <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="" value="<?php echo $old_password?>">
                                
    
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label text-primary">Email</label>
                                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelpId" placeholder="" value="<?php echo $old_email?>">
                                
    
                            </div>
                            <div class="form-group">
                                <label for="phone" class="form-label text-primary">Phone Number</label>
                                <input id="phone" class="form-control" type="tel" name="phone" value="<?php echo $old_phone?>">
                                
                            </div>
    
                            <div class="form-group">
                                <label for="avatar" class="form-label text-primary">Avatar</label>
                                <input id="avatar" class="form-control" type="file" name="avatar" value="<?php echo $old_avatar?>">
                            </div>
                            <button type="submit" name="update" class="btn btn-primary btn-block">Update</button>
                        </form>
                    </div>
                </div>
    
            </div>
    
        </div>
    </body>
    </html>