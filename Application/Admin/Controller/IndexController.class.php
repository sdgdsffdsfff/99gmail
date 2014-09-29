<?php

// 本类由系统自动生成，仅供测试用途
//namespace Admin\Controller;
//use Think\Controller;
class IndexController extends Think\Controller {

    public function index() {
        $this->display('login');
    }

    public function checkUser() {
        if (session('check')) {
            $this->display('index');
        } else {
            $this->error('请登录…', '/index.php/Admin');
        }
    }
}
