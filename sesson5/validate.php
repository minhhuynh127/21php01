<?php
 $fullname = $username = $password = $confirmPassword = $email = $phone = $avatar = '';
 $errFullname = $errUsername = $errPassword = $errConfirmPassword = $errEmail = $errPhone = $errAvatar = '';
 if($_SERVER['REQUEST_METHOD'] == 'POST') {
     //Fullname
     if(empty($_POST['fullname'])) {
         $errFullname = 'Vui lòng nhập họ và tên!!!';
     } else {
         $fullname = ($_POST['fullname']);
         if(!preg_match("/^[a-zA-Z-' -ạ-á-à-ả-ã]*$/", $fullname)) {
             $errFullname = 'Chỉ cho phép chữ cái và khoảng trắng';
         }
     }

     //Username
     if(empty($_POST['username'])) {
         $errUsername = 'Vui lòng nhập tài khoản đăng ký!!!';
     } else {
         $username = ($_POST['username']);
         if(!preg_match("/^[a-zA-Z-0-1-2-3-4-5-6-7-8-9]*$/", $username)) {
             $errUsername = 'Chỉ cho phép chữ cái và số';
         }
     }

     //Password
     if(empty($_POST['password'])) {
         $errPassword = 'Vui lòng nhập mật khẩu!!!';
     } else {
         $password = ($_POST['password']);   
     }

     //Confirm Password
     if(empty($_POST['confirmPassword'])) {
         $errConfirmPassword = 'Vui lòng xác nhận mật khẩu!!!';
     } else {
         $confirmPassword = $_POST['confirmPassword'];
         if($confirmPassword !== $password) {
             $errConfirmPassword = 'Xác nhận mật khẩu không chính xác';
         }
     }

     //Email
     if(empty($_POST['email'])) {
         $errEmail = 'Vui lòng nhập Email';
     } else {
         $email = $_POST['email'];
         if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
             $errEmail = "Định dạng email không hợp lệ";
           }
     }

     //Phone number
     if(empty($_POST['phone'])) {
         $errPhone = 'Vui lòng nhập số điện thoại';
     } else {
         $phone = $_POST['phone'];
         if(!preg_match("/^[0-1-2-3-4-5-6-7-8-9]*$/", $phone)) {
             $errPhone = 'Chỉ cho phép nhập số';
         }
     }

     //Avatar
     if(empty($_POST['avatar'])) {
        $errAvatar = 'Ban chua chon avatar!!!';
    } else {
        $avatar = $_FILES['avatar'];   
    }
 }