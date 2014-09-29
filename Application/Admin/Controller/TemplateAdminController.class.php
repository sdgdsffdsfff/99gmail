<?php

//本类由系统自动生成，仅供测试用途
//namespace Admin\Controller;
//use Think\Controller;
class TemplateAdminController extends Think\Controller {

    public function index() {
        //获取模板信息
        $template_info = array();  //存放模板信息的数组
        $dir = "./Application/Home/Common/template";
        if (is_dir($dir)) {
            if ($dh = opendir($dir)) {
                $i = 0;
                while (($file = readdir($dh)) !== false) {
                    if ($file != "." && $file != "..") {
                        $template_info[$i] = stat($dir . "\\$file");
                        $template_info[$i]['filename'] = $file;
                        $i++;
                    }
                }
                closedir($dh);
            }
        }
        $this->assign('template_info', $template_info);
        $this->display('Index:template_admin');
    }

    //递归删除某个目录及其下级所有文件
    public function deldir($dir) {
        //先删除目录下的文件：
        $dh = opendir($dir);
        while ($file = readdir($dh)) {
            if ($file != "." && $file != "..") {
                $fullpath = $dir . "/" . $file;
                if (!is_dir($fullpath)) {
                    unlink($fullpath);
                } else {
                    $this->deldir($fullpath);
                }
            }
        }
        closedir($dh);
        //删除当前文件夹：
        if (rmdir($dir)) {
            return true;
        } else {
            return false;
        }
    }

    //删除模板
    public function delete_tpl() {
        $filename = $_GET['filename'];
        $Model = new \Think\Model();
        $city = $Model->query('SELECT * FROM `cloud_city`');
        for ($i = 0; $i < count($city); $i++) {
            if ($city[$i]['tpl_name'] == $filename) {
                $temp_id = $city[$i]['id'];
                $Model->execute("UPDATE `cloud_city` SET `tpl_name`='rand' WHERE `id`=$temp_id");
            }
        }
        $delete_dir = './Application/Home/Common/template/' . $filename;
        $this->deldir($delete_dir);
        $this->success('删除成功', '/index.php/Admin/TemplateAdmin/index');
    }
}
