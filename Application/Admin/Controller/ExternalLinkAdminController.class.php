<?php

//本类由系统自动生成，仅供测试用途
//namespace Admin\Controller;
//use Think\Controller;
class ExternalLinkAdminController extends Think\Controller {

    public function index() {
        $Model = new \Think\Model();
        $external_link_info = $Model->query('SELECT * FROM `cloud_external_link` ORDER BY `link_url` ASC');
        $this->assign('external_link_info', $external_link_info);
        $this->display('Index:external_link_admin');
    }

    public function add_external_link() {
        if ($_POST['keywords']) {
            $keywords = $_POST['keywords'];
        } else {
            $keywords = '';
        }
        if ($_POST['link_url']) {
            $link_url = $_POST['link_url'];
        } else {
            $link_url = '';
        }
        if ($_POST['attribute']) {
            $attribute = $_POST['attribute'];
        } else {
            $attribute = '';
        }
        $Model = new \Think\Model();
        if ($keywords != '' || $link_url != '' || $attribute != '') {
            $resulte = $Model->query('INSERT INTO `cloud_external_link` (`keywords`, `link_url`, `attribute`) VALUES ("' . $keywords . '", "' . $link_url . '", "' . $attribute . '")');
        }
        $this->success('添加成功', '/index.php/Admin/ExternalLinkAdmin/index');
    }

    public function delete_external_url() {
        if ($_GET['id']) {
            $id = $_GET['id'];
        } else {
            $id = '';
        }
        $Model = new \Think\Model();
        if ($id != '') {
            $result = $Model->execute("DELETE FROM `cloud_external_link` WHERE `id`=" . $id);
        }
        if ($result) {
            $this->success('删除成功', '/index.php/Admin/ExternalLinkAdmin/index');
        } else {
            $this->error('删除失败', '/index.php/Admin/ExternalLinkAdmin/index');
        }
    }

}
