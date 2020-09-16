<?php
/**
 * Class để kết nối cơ sở dữ liệu
 */
Class Connection {
    // cấp quyền truy câp
    public $connection;
    public function __construct() 
	{
        // Load mảng cấu hình vào biến $config
        $config = include('../Config/database.php');
        // Kết nối cơ sở dữ liệu
        // ở đây ta phải dùng $this để gọi, vì không thẻ gọi trực tiếp $connection được
		$this->connection = mysqli_connect(
            $config['host'], 
            $config['username'], 
            $config['password'], 
            $config['database']);
        // Cấu hình charset utf8 cho kết nối để đảm bảo không lỗi font khi lấy dữ liệu từ db ra
        $this->connection->set_charset('utf8');
        // điều kiện khi xảy ra lỗi
		if (!$this->connection) {
			echo "Lỗi kết nối tới MySQL: ".mysqli_connect_error();
    		exit;
		}
	}
}