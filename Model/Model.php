<?php
include_once("Connection.php");
// tạo chức năng lớp trừu tượng cho Model
abstract Class Model 
{
  // cho class Model được phép truy cập vào connection
    protected $connection;
    protected function __construct() {
		// Khởi tạo Object Connection để sử dụng
		$connection = new Connection();
    // Gán connection được khởi tạo bởi Object Connection vào property của StudentModel để sử dụng
    //////////
    // ta dùng $this để gọi 
		$this->connection = $connection->connection;
    }
    // tạo lớp trừu tượng cho hàm
    abstract public function list();
    abstract public function detail($id);
}