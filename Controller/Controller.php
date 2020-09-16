<?php
class Controller 
{
    // định nghĩa hàm error
    // quyền hạn truy cập
    public function error() 
	{
        //gọi file hiển thị cho error
		include_once("../View/Layouts/header.html");
		include_once("../View/Errors/404.html");
		include_once("../View/Layouts/footer.html");
	}
}
?>