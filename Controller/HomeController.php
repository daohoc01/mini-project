<?php
// gọi file contreller, nêu đã có từ trước thì không hiển thị phần nội dung gọi sau
include_once("Contreller.php");
// hướng đối tượng dùng tính kế thừa
class HomeController extends Controller
{
    //định nghĩa hàm invoke
    public function invoke()
    {
        if(isset($_GET[`view`]))
        {
            include_once("../View/Layuots/header.html");
            // khối lệnh điều khiển
            switch($_GET['view'])
            {
                // gọi hàm login, nếu nhận thì bỏ qua phần sau, trực tiếp ra ngòai chạy tiếp
                case 'login':
                    $this->login($_GET);
                break;
                //gọi hàm register, nếu nhận thì bỏ qua phần sau, trực tiếp ra ngoài chạy tiếp
                case 'register':
                    $this->register($_GET);
                break;
                //gọi hàm dashboard, nếu nhận thì bỏ qua phần sau, trực tiếp ra ngoài chạy tiếp
                case 'dashboard':
                    $this->dashboard($_GET);
                break;
                //nếu 3 hàm trên đều không nhận, mặc định không có dữ liệu hoặc có lỗi xảy ra, gọi hàm error và kết thúc câu lệnh switch
                default:
                $this->error();
            break;
            }
            // gọi file hiển thị
            include_once("../View/Layouts/footer.html");
        } else{
            // kiểm tra hàm
            if (empty($_POST))
            {
                //gọi hàm error
                $this->error();
            }
        }
    }
    // định nghĩa hàm invokePost
    public function invokePost()
    {
        //gọi hàm login và register
        $this->loginPost();
        $this->registerPost();
    }
    // định nghĩa hàm dashboard
    public function dashboard()
    {
        //gọi file hiển thị dashboard
        include_once("../View/Home/dashboard.html");
    }
    // định nghĩa hàm login
    public function login()
    {
        //gọi file hiển thị login
        include_once("../View/home/login.html");
    }
    //định nghĩa hàm loginPost
    public function loginPost()
    {
        //kiểm tra biến
        if(isset($_POST['loginPost']))
        {
            // nếu trả về đúng thì kết thúc lệnh của hàm loginPost
            die('loginPost');
        }
    }
    // định nghĩa hàm register
    public function register()
    {
        // gọi file hiển thị register
        include_once("../View/Home/register,html");
    }
    // định nghĩa hàm registerPost
    public function registerPost()
    {
        //kiểm tra biến
        if(isset($_POST['registerPost']))
        {
            // nếu trả về đúng thì kết thúc lệnh của hàm registerPost
            die('registerPost');
        }
    } 
}
// hướng đối tương-tính đóng gói
// thay đổi quyền truy cập cho $homeController và giá trị sang invoke() và invokePost()
$homeController = new HomeController();
$homeController->invoke();
$homeController->invokePost();
?>