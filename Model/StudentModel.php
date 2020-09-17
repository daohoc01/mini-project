<?php
// gọi file tới
include_once("Model.php");
include_once("StudentEntity.php");
// hướng đối tượng - tính kế thừa
// ở đây ta có Model kế thừa dữ liệu của StudentModel
class StudentModel extends Model
{
	// định nghĩa cho hàm _construct
	public function __construct() 
	{
		// trả dữ liệu về _construct
		return parent::__construct();
	}
	// định nghĩa cho hàm list
	public function list() 
	{
		// lấy dữ liệu từ database
		$query = 'SELECT * FROM students';
		$results = $this->connection->query($query);
		$students = [];
		// Biến đổi dữ liệu lấy ra từ cơ sở dữ liệu thành dạng mảng dễ sử dụng
		while ($row = mysqli_fetch_assoc($results)) {
			$students[$row['id']] = new StudentEntity($row['id'], $row['name'], $row['age'], $row['university']);
		}
		// Trả về giá trị cuối cùng
		return $students;
	}
	// định nghĩa cho hàm detail sử dụng dữ liệu database thong qua $id
	public function detail($id) 
	{
		//Giả sử rằng ta load data từ CSDL
		$allStudent = $this->list();
		// trả về giá trị $allStudent
		return $allStudent[$id];
	}
}