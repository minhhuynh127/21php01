
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<style>
    .style_img{
        width: 50px;
        height: 50px;
        border-radius: 50%;
    }
</style>
<body>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
            <h2 class="text-center">Danh sach User Register</h2>
            </div>
        </div>
        <table class="table table-bordered table-hover">
            <tr>
                <th>ID</th>
                <th>FULL_NAME</th>
                <th>USER_NAME</th>
                <th>PASSWORD</th>
                <th>EMAIL</th>
                <th>PHONE_NUMBERR</th>
                <th>AVATAR</th>
                <th>DELETE</th>
                <th>EDIT</th>
            </tr>
            <tbody>
<?php
    //Tao ket noi database
    $connect = new mysqli('localhost', 'root', '', 'my_username');
    mysqli_set_charset($connect, 'utf8');
    if ($connect->connect_error) {
	    die("Connection failed: " . $connect->connect_error);
	} else {
        //Lay du lieu
        $query = "SELECT * FROM username";
        $listUsername = $connect->query($query);
        $data = array();
        while($row = $listUsername->fetch_array()) {
            $data[] = $row;
        }
        $connect->close();
        for($i = 0; $i < count($data); $i++) {
            $id = $data[$i]['ID'];
            echo    '<tr>
                        <td>'.$data[$i]['ID'].'</td>
                        <td>'.$data[$i]['FULL_NAME'].'</td>
                        <td>'.$data[$i]['USER_NAME'].'</td>
                        <td>'.$data[$i]['PASSWORD'].'</td>
                        <td>'.$data[$i]['EMAIL'].'</td>
                        <td>'.$data[$i]['PHONE_NUMBER'].'</td>
                        <td><img class="style_img" src="./uploads/'.$data[$i]['AVATAR'].'"></td>
                        <td>
				            <a href="delete_user.php?id='.$id.'">Delete</a>
			            </td>
                        <td>
				            <a href="update_user.php?id='.$id.'">Update</a>
			            </td>
                    </tr>';
        }
	}

?>
            </tbody>
        </table>
    </div>
</body>
</html>