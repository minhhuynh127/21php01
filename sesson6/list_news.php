
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
            <h2 class="text-center">Danh sach tin tức</h2>
            </div>
        </div>
        <table class="table table-bordered table-hover">
            <tr>
                <th>ID</th>
                <th>NAME_NEWS</th>
                <th>LIST_NEWS</th>
                <th>AVATAR_NEWS</th>
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
        $query = "SELECT news.id as id, news.name_news as name_news, news.avatar_news as avatar_news, list_news.listnews as listnews FROM news INNER JOIN list_news WHERE list_news.id = news.id";
        $listNews = $connect->query($query);
        $data = array();
        while($row = $listNews->fetch_array()) {
            $data[] = $row;
        }
        $connect->close();
        for($i = 0; $i < count($data); $i++) {
            $id = $data[$i]['id'];
            echo    '<tr>
                        <td>'.$data[$i]['id'].'</td>
                        <td>'.$data[$i]['name_news'].'</td>
                        <td>'.$data[$i]['listnews'].'</td>
                        <td><img class="style_img" src="./uploads/'.$data[$i]['avatar_news'].'"></td>
                        <td>
				            <a href="delete_news.php?id='.$id.'">Delete</a>
                            <span>|</span>
                            <a href="update_news.php?id='.$id.'">Update</a>
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