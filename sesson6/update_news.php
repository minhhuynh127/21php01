<?php
$connect = new mysqli('localhost', 'root', '', 'my_username');
if($connect->connect_error) {
    var_dump($connect->connect_error);
    die();
}
$id_update = $_GET['id'];
$sql = "SELECT * FROM news WHERE id = $id_update";
$newsUpdate = $connect->query($sql);
$list_news_id_old = '';
while($row = $newsUpdate->fetch_assoc()) {
    $old_name = $row['name_news'];
    $old_avatar =  $row['avatar_news'];
    $list_news_id_old = $row['id'];
}
//Danh sach danh muc tin tuc
$sqlListnews = "SELECT id, listnews FROM list_news";
$resultListNews = $connect->query($sqlListnews);
if(!empty($_POST)) {
    $name_news = $_POST['name_news'];
    $list_news_id = $_POST['list_news_id'];
    $avatar_news = $_FILES['avatar_news'];
    $avatar_name = $avatar_news['name'];
        move_uploaded_file($avatar_news['tmp_name'], 'uploads/'.$avatar_news['name']);
        if ($avatar_name == '') {
            $avatar_name = $old_avatar;
        }
    $query = "UPDATE news SET name_news = '$name_news', avatar_news = '$avatar_name', id = '$list_news_id' WHERE id = $id_update";
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
                            <input id="name_news" class="form-control" type="text" name="name_news" value="<?php echo $old_name?>">
                        </div>
                       <div class="form-group">
                           <label for="my-select" class="form-label text-primary">Danh mục tin tức</label>
                           <select id="my-select" class="form-control" name="list_news_id">
                           <option value="" <?php echo $list_news_id_old == ''?'selected':'';?>>Please choose class</option>
                               <?php
                                    while($row = $resultListNews->fetch_assoc()) {
                                        $id = $row['id'];
                                        $name = $row['listnews'];
                                        $selected =  $list_news_id_old == $id?'selected':'';
				                        echo "<option value = '$id' $selected>$name</option>";                              
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