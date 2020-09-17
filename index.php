<?php
// bắt buộc phải login trước khi chuyển sang trang HomeController.php
header('location:Controller/HomeController.php?view=login');
?>