<?php
    //Bài 1
    echo '<h2>
    BT1: Có hai tổ công nhân, tổ một có 12 công nhân, tổ hai nếu có thêm 4 người thì sẽ gấp đôi tổ một. Hỏi tổ hai có bao nhiêu công nhân?
    </h2>';
    $to1 = 12;
    $to2 = 0;
    if($to2 + 4) {
        $to2 = ($to1 * 2) - 4;
    }
    echo '<b>Đáp án: </b>', 'Tổ 2 có ', $to2, ' công nhân';

    //Bài 2
    echo '<h2>
    BT2: Cho ban 2000 vnđ đi mua kẹo .Biết : 1 viên kẹo giá 200 vnđ. cứ 2 vỏ kẹo đổi được 1 viên. Hỏi với 2000 vnđ, ban sẽ mua đc bao nhiêu viên kẹo ?
    </h2>';
    $money = 2000;
    $price = 200;
    $candy = $money / $price;
    $candyShell = $candy;
    while($candyShell >= 2) {
        $candy += floor($candyShell / 2);
        $candyShell = floor($candyShell / 2) + ($candyShell % 2);
    }
    echo '<b>Đáp án: </b>', 'Mua được ', $candy, ' cây kẹo';

    //Bài 3
    echo '<h2>
    BT3:Túi thứ nhất có 18 viên bi, túi thứ hai gấp hai lần túi thứ nhất. Hỏi phải chuyển bao nhiêu viên bi từ túi thứ hai sang túi thứ nhất để số bi ở hai túi bằng nhau?
    </h2>';
    $bag1 = 18;
    $bag2 = $bag1 * 2;
    $count = 0;
    while($bag2-- > $bag1++) {
        $count++;
    }
    echo '<b>Đáp án: </b>', 'Phải chuyển ', $count, ' viên bi cho túi thứu nhất';

    //Bài 4
    echo '<h2>
    BT4: Bình có 27 quyển sách, Bình có số sách gấp 3 lần số sách của Minh. Hỏi Bình phải chuyển cho Minh bao nhiêu quyển sách để số sách của Bình gấp đôi số sách của Minh?
    </h2>';
    $bookBinh = 27;
    $bookMinh = $bookBinh / 3;
    $count = 0;
    while($bookBinh-- > $bookMinh++ * 2) {
        $count++;
    }
    echo '<b>Đáp án: </b>', 'Bính phải chuyên cho Minh ', $count, ' quyển sách';
?>