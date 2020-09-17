<?php
include_once("Model.php");
include_once("AdministratorEntity.php");
// hướng đối tượng - tính kế thừa
// nhóm AdministratorNodel kế thưa nhóm Model
// nhóm được kế thừa được phép sử dụng dữ liệu của nhóm cha là Model
class AdministratorModel extends Model
{
    //định nghĩa hãm _construct
	public function __construct() 
	{
        // trả về _construct
		return parent::__construct();
	}
	// ddingj nghĩa hàm list
	public function list() 
	{
        // lấy dữ liệu từ database administrators
		$query = 'SELECT * FROM administrators';
		$results = $this->connection->query($query);
		$administrators = [];
		// Biến đổi dữ liệu lấy ra từ cơ sở dữ liệu thành dạng mảng dễ sử dụng
		while ($row = mysqli_fetch_assoc($results)) {
			$administrators[$row['id']] = new AdministratorEntity($row['id'], $row['username'], $row['password'], $row['created_at'], $row['updated_at']);
		}
		// Trả về giá trị cuối cùng
		return $administrators;
	}
	// định nghĩa hàm detail được lấy dữ liệu qua việc gọi id của database thông qua $id.
	public function detail($id) 
	{
        //Ta load data tu CSDL
        // gọi dữ liệu thông qua $this để $allStundent được dùng dữ liệu của $list
        $allStudent = $this->list();
        // trả về giá trị cuối cùng của biến
		return $allStudent[$id];
	}
    // định nghĩa hàm save được lấy dữ liệu của database thong qua $data
	public function save($data)
	{
        // điền dữ liệu vào trong database
		$query = "INSERT INTO administrators (`username`, `password`, `created_at`, `updated_at`) VALUES ('" . $data['username'] . "','" . md5($data['password']) . "','" . $data['created_at'] . "', '" . $data['updated_at'] . "')";
		
        $results = $this->connection->query($query);
        // điều kiện chạy
		if($results)
		{
            //nếu điều kiện của $results được thỏa mãn thì trả về giá trị $insert_id thông qua $connection nhờ $this
			return $this->connection->insert_id;
		}
		else 
		{
            // nếu điều kiện của $results không thỏa mãn thì trả về rỗng
			return 0;
		}
	}
    // định nghĩa hàm checklogin
    // dữ liệu được lấy từ database thông qua 2 biến $username và $password
	public function checkLogin($username, $password)
	{
        // Câu lệnh query để lấy ra người dùng có username, password tương ứng
        // lấy dữ liệu của database administrators với 2 biến $username và $password
		$query = "SELECT * FROM administrators WHERE `username`='" . $username . "' AND `password`='" . md5($password) . "' ORDER BY `created_at` LIMIT 1";
        $results = $this->connection->query($query);
        // câu điều kiện
		if($results)
		{
			$administrators = [];
			while ($row = mysqli_fetch_assoc($results)) {
				$administrators[] = new AdministratorEntity($row['id'], $row['username'], $row['password'], $row['created_at'], $row['updated_at']);
			}
			// Trả về giá trị cuối cùng
			return isset($administrators[0]) ? $administrators[0] : false;
		}
		else
		{
            // trả về và báo sai
			return false;
		}
	}
}