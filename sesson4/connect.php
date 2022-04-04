<?php
function connectSql() {
    if(!empty($_POST)) {
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $confirmPassword = $_POST['confirmPassword'];
        //Liên kết database
        $connect = new mysqli("localhost", "root", "", "my_username");
        //Cho phép PHP lưu unicode (utf8) - database
        mysqli_set_charset($connect, "utf8");
        //Kiểm tra kết nối
        if($connect->connect_error) {
            var_dump($connect->$connect_error);
            die();
        }
        //Thực hiện chèn dữ liệu vào database
        $query = "INSERT INTO username(FULL_NAME, USER_NAME, PASSWORD, EMAIL, PHONE_NUMBER) VALUE('".$fullname."', '".$username."', '".$password."', '".$email."', '".$phone."')";  
        if(($fullname != '') && ($username != '') && ($password != '') && ($email != '') && ($phone != '') && ($confirmPassword != '') &&($confirmPassword == $password)) {
            mysqli_query($connect, $query);
            header("location: login.php");
            
        }
        $connect->close();
    }
}