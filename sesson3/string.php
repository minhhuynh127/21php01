<?php 
	$myString = "Hello this is my string!";
	// In chuỗi ký tự lên
	echo $myString;
	echo "<br>";
	// Chiều dài của chuỗi
	echo strlen($myString);
	echo "<br>";
	// Số từ có trong chuỗi
	echo str_word_count($myString);
	echo "<br>";
	// Tìm vị trí của ký tự trong chuỗi
	echo strpos($myString, "o");
	echo "<br>";
	echo strpos($myString, "i");
	echo "<br>";
	echo strpos($myString, "this");
	echo "<br>";
	// Thay thế từ hoặc chuỗi ký tự trong chuỗi
	echo str_replace("is", "are", $myString);
	echo "<br>";
	// Tìm vị trí cuối cùng của ký tự trong chuỗi
	echo strrpos($myString, "i");
	echo "<br>";
	// Viết hoa chuỗi ký tự
	echo strtoupper($myString);
	echo "<br>";
	// Viết thường chuỗi ký tự
	echo mb_strtolower($myString);
    
?>
