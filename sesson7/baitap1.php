<?php
    class Username {
        public $fullname;
        public $age;
        public $year;
        public function setUsername($value1, $value2, $value3) {
            $this->fullname = $value1;
            $this->age = $value2;
            $this->year = $value3;
        }
        public function addUsername() {
            echo '<h3>Add Username</h3>';
            echo '<br>';
            echo "<b>Họ và tên: $fullname</b>";
            echo "<b>Tuổi: $age</b>";
            echo "<b>Năm sinh: $year</b>";
        }
        private function editUsername() {
            echo '<br>';
            echo '<h3>Edit Username</h3>';        
        }
        public function deleteUsername() {
            echo '<br>';
            echo '<h3>Delete Username</h3>';
        }
    }
    
    class Student extends Username {
        public $point;
        public $subject;
        public function addStudent() {
            $this->addUsername();
        }
        public function deleteStudent() {
            $this->deleteUsername();
        }
        public function transcript() {
            echo '<br>';
            echo '<h3>Bảng điểm sinh vienr</h3>';
        }
        public function subject() {
            echo '<br>';
            echo '<h3>DAnh sách môn học</h3>';
        }
    }
?>