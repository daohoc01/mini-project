<?php
/**
 * Entity Administrator
 */
//tạo nhóm AdministratorEntity
class AdministratorEntity
{
    // cấp quyền truy cập cho các biến
	public $id;
	public $username;
	public $password;
    public $created_at;
    public $updated_at;
	// khai báo cấp quyền các biến vào _construct
	public function __construct($_id, $_username, $_password, $_created_at, $_updated_at)
	{
        //gọi các dữ liệu của biến
		$this->id = $_id;
		$this->username = $_username;
		$this->password = $_password;
		$this->created_at = $_created_at;
		$this->updated_at = $_updated_at;
	}
}