<?php

// 本类由系统自动生成，仅供测试用途
//namespace Admin\Controller;
//use Think\Controller;
class LoginController extends Think\Controller {

    public function index() {
        $this->display('login');
    }

    public function do_Login() {
        $Model = new \Think\Model();
        $login_name = $_POST['login_name'];
        $login_pwd = $_POST['login_pwd'];
        $member = $Model->query('select * from cloud_member');
        for ($i = 0; $i < count($member); $i++) {
            if ($member[$i]['name'] == $login_name && $member[$i]['pwd'] == $login_pwd) {
                session('check', '1');
                $this->success('登陆成功', '../Index/checkUser');
            }
        }
        $this->error('登陆失败', '/index.php/Admin');
    }

}

?>