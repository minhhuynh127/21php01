<?php
 $connect = new mysqli('localhost', 'root', '', 'my_username');
 mysqli_set_charset($connect, "utf8");
 if($connect->connect_error) {
     var_dump($connect->$connect_error);
     die();
 }
 $sql = "SELECT id, listnews FROM list_news";
 $resultListNews = $connect->query($sql);
    if(!empty($_POST)) {
        $name_news = $_POST['name_news'];
        $list_news_id = $_POST['list_news_id'];
        $avatar_news = $_FILES['avatar_news'];
        $avatar_name = $avatar_news['name'];
            move_uploaded_file($avatar_news['tmp_name'], 'uploads/'.$avatar_news['name']);
            if ($avatar_name == '') {
                $avatar_name = 'default.jpg';
            }
        $query = "INSERT INTO news(name_news, avatar_news, id) VALUE('$name_news', '$avatar_name', '$list_news_id')";
        $connect->query($query);
        header('location: list_news.php');
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
                    <h3>Thêm mới tin tức</h3>
                </div>
                <div class="panel-body">
                    <form action="" method="POST" class="bg-secondary" enctype='multipart/form-data'>
                        <div class="form-group">
                            <label for="name_news" class="form-label text-primary">Tên tin tức</label>
                            <input id="name_news" class="form-control" type="text" name="name_news">
                        </div>
                       <div class="form-group">
                           <label for="my-select" class="form-label text-primary">Danh mục tin tức</label>
                           <select id="my-select" class="form-control" name="list_news_id">
                               <option value="">Please selected list news</option>
                               <?php
                                    while($row = $resultListNews->fetch_assoc()) {
                                        $id = $row['id'];
                                        $name = $row['listnews'];
				                        echo "<option value = '$id'>$name</option>";                              
                                    }
                               ?>
                           </select>
                       </div>
                        <div class="form-group">
                            <label for="avatar_news" class="form-label text-primary">Hình ảnh tin tức</label>
                            <input id="avatar_news" class="form-control" type="file" name="avatar_news">
                        </div>
                        <button class="btn btn-primary btn-block" type="submit" name="submit">ADD NEWS</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>