<?php
//Bài tập strings
    echo '<h1>Bài tập String</h1>';
    $fullname = 'Huynh Cong Minh';   
    $ho = substr($fullname, 0, 5);
    $tendem = substr($fullname, 6, 4);
    $ten = substr($fullname, 11, 5);
    echo '<br>';
    echo $fullname;
    echo '<br>';
    //Số ký tự trong chuỗi
    echo '<b>Số ký tự trong chuỗi: </b>'. strlen($fullname);
    //Số chữ n trong chuỗi
    $arrString = str_split($fullname, 1);
    $count = 0;
    foreach($arrString as $key => $value) {
        if ($arrString[$key] == 'n'){
            $count++;
        }
    }
    echo '<br>';
    echo '<b>Số kí tự \'n\' trong chuỗi: </b>'.$count;
    //Số ký tự trong tên
    echo '<br>';
    echo '<b>Số ký tự trong tên: </b>'. strlen($ten);
    //viết hoa tên đệm
    echo '<br>';
    echo $ho.' '.strtoupper($tendem).' '.$ten;
    //thay tên = 20php01
    echo '<br>';
    echo str_replace($ten, " 20PHP01", $fullname);
////////////////////////////////////////////////////////////////////////////////

//Bài tập Array
echo '<h1>Bài tập Array</h1>';
$class = array(
    array('fullname' => 'Nguyen Thanh Nam', 'birthday' => '17/7/2000', 'email' => 'thanhnam@gmail.com'),
    array('fullname' => 'Nguyen Xuan Tu', 'birthday' => '20/2/1999', 'email' => 'tu@gmail.com'),
    array('fullname' => 'Nguyen Quang Hai', 'birthday' => '14/8/1997', 'email' => 'hai@gmail.com'),
    array('fullname' => 'Huynh Cong Minh', 'birthday' => '12/7/1995', 'email' => 'congminh@gmail.com'),
    array('fullname' => 'Nguyen Trong Thai', 'birthday' => '12/7/2000', 'email' => 'trongthai@gmail.com')
);
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
    <h1>Danh sách lớp học</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Họ và tên</th>
                <th>Ngày sinh</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row"><?php echo $class[0]['fullname']?></td>
                <td><?php echo $class[0]['birthday']?></td>
                <td><?php echo $class[0]['email']?></td>
            </tr>
            <tr>
                <td scope="row"><?php echo $class[1]['fullname']?></td>
                <td><?php echo $class[1]['birthday']?></td>
                <td><?php echo $class[1]['email']?></td>
            </tr>
            <tr>
                <td scope="row"><?php echo $class[2]['fullname']?></td>
                <td><?php echo $class[2]['birthday']?></td>
                <td><?php echo $class[2]['email']?></td>
            </tr>
            <tr>
                <td scope="row"><?php echo $class[3]['fullname']?></td>
                <td><?php echo $class[3]['birthday']?></td>
                <td><?php echo $class[3]['email']?></td>
            </tr>
            <tr>
                <td scope="row"><?php echo $class[4]['fullname']?></td>
                <td><?php echo $class[4]['birthday']?></td>
                <td><?php echo $class[4]['email']?></td>
            </tr>
        </tbody>
    </table>
<!-- =====================================================================   -->
    <h1>Đổi tên bạn thứ 2 và in lại</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Họ và tên</th>
                <th>Ngày sinh</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row"><?php echo $class[0]['fullname']?></td>
                <td><?php echo $class[0]['birthday']?></td>
                <td><?php echo $class[0]['email']?></td>
            </tr>
            <tr>
                <td scope="row"><?php echo $class[1]['fullname'] = 'Nguyen Van Tuan'?></td>
                <td><?php echo $class[1]['birthday']?></td>
                <td><?php echo $class[1]['email']?></td>
            </tr>
            <tr>
                <td scope="row"><?php echo $class[2]['fullname']?></td>
                <td><?php echo $class[2]['birthday']?></td>
                <td><?php echo $class[2]['email']?></td>
            </tr>
            <tr>
                <td scope="row"><?php echo $class[3]['fullname']?></td>
                <td><?php echo $class[3]['birthday']?></td>
                <td><?php echo $class[3]['email']?></td>
            </tr>
            <tr>
                <td scope="row"><?php echo $class[4]['fullname']?></td>
                <td><?php echo $class[4]['birthday']?></td>
                <td><?php echo $class[4]['email']?></td>
            </tr>
        </tbody>
    </table>

<!-- ======================================================================    -->
<!-- Xoa ban thu 2 -->
    <?php   
        unset($class[2]);
        $class = array_values($class);
    ?>
    <h1>Xóa bạn thứ 3</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Họ và tên</th>
                <th>Ngày sinh</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row"><?php echo $class[0]['fullname']?></td>
                <td><?php echo $class[0]['birthday']?></td>
                <td><?php echo $class[0]['email']?></td>
            </tr>
            <tr>
                <td scope="row"><?php echo $class[1]['fullname'] = 'Nguyen Van Tuan'?></td>
                <td><?php echo $class[1]['birthday']?></td>
                <td><?php echo $class[1]['email']?></td>
            </tr>
            <tr>
                <td scope="row"><?php echo $class[2]['fullname']?></td>
                <td><?php echo $class[2]['birthday']?></td>
                <td><?php echo $class[2]['email']?></td>
            </tr>
            <tr>
                <td scope="row"><?php echo $class[3]['fullname']?></td>
                <td><?php echo $class[3]['birthday']?></td>
                <td><?php echo $class[3]['email']?></td>
            </tr>
        </tbody>
    </table>
<!-- ========================================================================   -->
    <h1>Kiểm tra email</h1>
    <?php
        foreach($class as $key => $value) {
            foreach($value as $key1 => $value1){   
                if(strpos($value['email'], "n")) {
                    echo $key1.' - '.$value1;
                    echo '</br>';
                }
            }           
        }       
    ?>
</body>
</html>