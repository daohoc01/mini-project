<?php
/**
 * Entity Student
 */
class StudentEntity
{
	// cấp quyền truy cập
	public $id;
	public $name;
	public $age;
	public $university;
	//hướng đối tượng- để lưu thông trong _construct
	public function __construct($_id, $_name, $_age, $_university)
	{
		// dùng $this để gọi các hàm và gán giá trị của chúng về đối tượng lưu thông trong _construct
		$this->id = $_id;
		$this->name = $_name;
		$this->age = $_age;
		$this->university = $_university;
	}
}
