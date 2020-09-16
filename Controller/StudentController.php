<?php
//gọi file khác đến
include_once("../Model/StudentModel.php");
include_once("Controller.php");

//1. Declaration
/**
 * Định nghĩa Class StudentController
 */
// hướng đối tượng- tính kế thừa
class  StudentController extends Controller
{
	/**
	 * Định nghĩa hàm invoke để khởi tạo tất cả
	 */
	public function invoke()
	{
		// Tạo một method invoke để gom các method dùng method get khởi tạo cùng nhau
        include_once("../View/Layouts/header.html");
		if(isset($_GET['view'])) 
		{ 
            // khối lệnh điều khiển
			switch($_GET['view']) 
			{
				case 'detail': // Check nếu là view detail thì gọi method xem detail
					$this->detail($_GET);
					break;
				case 'list': // Check là view list thì gọi method xem danh sách
					$this->list();
					break;
				case 'add': // check là view add thì gọi method thêm mới
					$this->add();
					break;
				case 'update': // check là view update thì gọi method update
					$this->update($_GET);
					break;
				case 'delete': // check là view delete thì 
					$this->delete($_GET);
					break;
				default:
					$this->error();
					break;
			}
		} 
		else 
		{ // Check nếu không có studen id thì load view xem danh sách
			$this->error();			
		}
        include_once("../View/Layouts/footer.html");
	}
    // định nghĩa hàm invokePost
	public function invokePost() {
        // Tạo một method invokePost() để gom các post method vào khởi tạo cùng nhau
        //gọi hàm addPost và updatePost
		$this->addPost();
		$this->updatePost();
	}
    //định nghĩa hàm detail
    // hàm detail này lấy dữ liệu thông qua id của bảng database students
	public function detail($id) 
	{
		$modelStudent =  new StudentModel();
		$student = $modelStudent->detail($_GET['stid']);
		
		include_once("../View/Students/detail.html");
	}

	public function list() 
	{
		$modelStudent =  new StudentModel();
		$studentList = $modelStudent->list();
		
		include_once("../View/Students/list.html");
	}

	public function add() {
		include_once("../View/Students/add.html");
	}

	public function addPost() {
		if(isset($_POST['addStudent'])) 
		{

		}
	}

	public function update() 
	{
		include_once("../View/Students/update.html");
	}

	public function updatePost() 
	{
		if(isset($_POST['updateStudent'])) 
		{

		}
	}

	public function delete() 
	{

	}

};


//////////////////////////////////////
//2. Process
// Khởi tạo StudenController và chạy 
$studentController = new StudentController();
$studentController->invoke();
$studentController->invokePost();
    
