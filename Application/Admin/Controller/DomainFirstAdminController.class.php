<?php

//本类由系统自动生成，仅供测试用途
//namespace Admin\Controller;
//use Think\Controller;
class DomainFirstAdminController extends Think\Controller {

    public function index() {
        $Model = new \Think\Model();
        $domain = $Model->query('SELECT * FROM `cloud_domain_first` ORDER BY `id` DESC');
        $this->assign('domain', $domain);
        $this->display('Index:domain_first_admin');
    }

    public function add_domain() {
        if ($_POST['domainname']) {
            $domainname = $_POST['domainname'];
        } else {
            $domainname = '';
        }
        $Model = new \Think\Model();
        if ($domainname != '') {
            $resulte = $Model->query('INSERT INTO `cloud_domain_first` (`domain_first_name`) VALUES ("' . $domainname . '")');
        }
        $this->success('添加成功', '/index.php/Admin/DomainFirstAdmin/index');
    }

    public function delete_domain() {
        if ($_GET['id']) {
            $id = $_GET['id'];
        } else {
            $id = '';
        }
        $Model = new \Think\Model();
        if ($id != '') {
            $result = $Model->execute("DELETE FROM `cloud_domain_first` WHERE `id`=" . $id);
        }
        if ($result) {
            $this->success('删除成功', '/index.php/Admin/DomainFirstAdmin/index');
        } else {
            $this->error('删除失败', '/index.php/Admin/DomainFirstAdmin/index');
        }
    }

}
