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
<?php
    $errFullname = $errGender = $errAddress = $errImage = $errDate = '';
    $fullname = $gender = $address = $image = $birthday = '';
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        //Họ và tên
        if(empty($_POST['fullname'])) {
            $errFullname = 'Vui lòng nhập họ và tên!!!';
        } else {
            $fullname = ($_POST['fullname']);
            if(!preg_match("/^[a-zA-Z-' -ạ-á-à-ả-ã]*$/", $fullname)) {
                $errFullname = 'Chỉ cho phép chữ cái và khoảng trắng';
            }
        }

        //Ngày sinh
        if(empty($_POST['birthday'])) {
            $errDate = 'Vui lòng chọn ngày sinh!!!';
        } else {
            $birthday = ($_POST['birthday']);
        }

        //Giới tính
        if(empty($_POST['gender'])) {
            $errGender = 'Vui lòng chọn giới tính!!!';
        } else {
            $gender = ($_POST['gender']);
        }
       //Quê quán
        if(empty($_POST['address'])) {
            $errAddress = 'Hãy chọn quê quán của bạn!!!';
        } else {
            $address = ($_POST['address']);
        }
        //Ảnh đại diện
        $target_dir = './uploads/';
        $target_file = $target_dir . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], './uploads/'.$_FILES['image']['name']);
        if(empty($_FILES['image']['name'])) {
            $errImage = 'Vui lòng chọn ảnh đại diện!!!';
        } else {
            $image = $target_dir.$_FILES['image']['name'];
        }
        
    }
?>

    <div class="container">
        <div class="col-md-6">
            <h1 class="text-center">Đăng ký</h1>
            <form action="" method="post" enctype='multipart/form-data'>
                <!-- Fullname -->
                <div class="form-group">
                    <label for="fullname" class='form-label'>Họ và tên</label>
                    <input id="fullname" class="form-control" type="text" name="fullname" placeholder="Nhập họ và tên" value="<?php echo empty($_POST['fullname'])?'':$_POST['fullname'];?>">
                    <span class="text-danger"><?php echo $errFullname;?></span>
                </div>

                <!--Birthday-->
                <div class="form-group">
                    <label for="birthday" class='form-label'>Ngày sinh</label>
                    <input type="date" class="form-control" name="birthday" value="<?php if(isset($_POST['birthday'])) echo $_POST['birthday'];?>">
                    <span class="text-danger"><?php echo $errDate;?></span>
                </div>

                <!--Gender-->
                <div class="form-check">
                    <label class="form-check-label">Giới tính</label>
                    <label class="form-check-label" for="gender">
                        <input type="radio" class="form-check-input" name="gender" value="Female" <?php if (isset($gender) && $gender == 'Female') echo 'checked';?>>
                        Female
                    </label>
                    <label class="form-check-label" for="gender">
                        <input type="radio" class="form-check-input" name="gender" value="Male" <?php if (isset($gender) && $gender == 'Male') echo 'checked';?>>
                        Male
                    </label>
                    <label class="form-check-label" for="gender">
                        <input type="radio" class="form-check-input" name="gender" value="Other" <?php if (isset($gender) && $gender == 'Other') echo 'checked';?>>
                        Other
                    </label>
                    <span class="text-danger"><?php echo $errGender;?></span>
                </div>

                <!--Quê quán-->
                <div class="form-group">
                <label for="address">Quê quán</label>
                    <select class="form-control" name="address" id="">
                        <option value="">-- Address --</option>
                        <option value="Hà Nội" <?php if(isset($address) && $address == 'Hà Nội') echo 'selected'?>>Hà Nội</option>
                        <option value="Đà Nẵng" <?php if(isset($address) && $address == 'Đà Nẵng') echo 'selected'?>>Đà Nẵng</option>
                        <option value="Hồ Chí Minh" <?php if(isset($address) && $address == 'Hồ Chí Minh') echo 'selected'?> >Hồ Chí Minh</option>
                    </select>
                    <span class="text-danger"><?php echo $errAddress?></span>
                </div>

                <!--Avatar-->
                <div class="form-group">
                  <label for="image">Ảnh đại diện</label>
                  <input type="file" class="form-control-file" name="image" value="<?php if(isset($_FILES['image']['name'])) echo $_FILES['image']['name'];?>">
                </div>
                <span class="text-danger"><?php echo $errImage?></span>
                <button type="submit" name="submit" class="btn btn-primary btn-block" >Đăng ký</button>
                  
            </form>
        </div>

        <div class="col-md-6">
           <?php
                if(empty($_POST['submit'])) {
                    if(($fullname == '') || ($gender == '') || ($address == '') || ($image == '')) {
                        echo '<h1 class="text-center text-danger">Đăng ký chưa thành công</h1>';
                    } else {
                        echo '<h1 class="text-center text-success">Đăng ký thành công</h1>';
                        echo '<div style=" display: flex;justify-content: center;align-items: center;">
                                    <img src="'.$image.'" style="width:15rem; height:15rem; border-radius: 50%;">
                            </div>';
                        echo '<h3 class="text-center text-success">Họ và tên: '.$fullname.'</h3>';
                        echo '<h3 class="text-center text-success">Ngày sinh: '.$birthday.'</h3>';
                        echo '<h3 class="text-center text-success">Giới tính: '.$gender.'</h3>';
                        echo '<h3 class="text-center text-success">Quê quán: '.$address.'</h3>';
                    }
                }
           ?>

        </div>
    </div>
</body>
</html>