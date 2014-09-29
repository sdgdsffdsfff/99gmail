<?php

//本类由系统自动生成，仅供测试用途
//namespace Admin\Controller;
//use Think\Controller;
class WebInfoAdminController extends Think\Controller {

    public function index() {
        $this->display('Index:web_value_index');
    }

    public function sub_menu() {
        $this->display('Index:sub_menu');
    }

    public function sub_mian() {
        $index_info = array();
        $Model = new \Think\Model();
        $index_info = $Model->query('SELECT * FROM `cloud_tpl_info` WHERE `tpl_name`="index.html"');
        $this->assign('index_info', $index_info);
        $this->display('Index:sub_mian_index');
    }

    public function sub_index() {
        if ($_POST['title']) {
            $title = $_POST['title'];
        } else {
            $title = '';
        }
        if ($_POST['keywords']) {
            $keywords = $_POST['keywords'];
        } else {
            $keywords = '';
        }
        if ($_POST['description']) {
            $description = $_POST['description'];
        } else {
            $description = '';
        }
        if ($_POST['index_annotate']) {
            $index_annotate = $_POST['index_annotate'];
        } else {
            $index_annotate = '';
        }
        $index_info = array();
        $Model = new \Think\Model();
        if ($title != '' || $keywords != '' || $description != '' || $index_annotate != '') {
            $index_info = $Model->query('UPDATE `cloud_tpl_info` SET `title`="' . $title . '", `keywords`="' . $keywords . '", `description`="' . $description . '", `index_annotate`="' . $index_annotate . '" WHERE `tpl_name`="index.html"');
        }
        $index_info = $Model->query('SELECT * FROM `cloud_tpl_info` WHERE `tpl_name`="index.html"');
        $this->assign('index_info', $index_info);
        $this->display('Index:sub_mian_index');
    }

    public function cont() {
        if ($_POST['title']) {
            $title = $_POST['title'];
        } else {
            $title = '';
        }
        if ($_POST['keywords']) {
            $keywords = $_POST['keywords'];
        } else {
            $keywords = '';
        }
        if ($_POST['description']) {
            $description = $_POST['description'];
        } else {
            $description = '';
        }
        if ($_POST['rand_key_1']) {
            $rand_key_1 = $_POST['rand_key_1'];
        } else {
            $rand_key_1 = '';
        }
        if ($_POST['rand_key_2']) {
            $rand_key_2 = $_POST['rand_key_2'];
        } else {
            $rand_key_2 = '';
        }
        if ($_POST['rand_key_3']) {
            $rand_key_3 = $_POST['rand_key_3'];
        } else {
            $rand_key_3 = '';
        }
        $cont_info = array();
        $Model = new \Think\Model();
        if ($title != '' || $keywords != '' || $description != '' || $rand_key_1 != '' || $rand_key_2 != '' || $rand_key_3 != '') {
            $cont_info = $Model->query('UPDATE `cloud_tpl_info` SET `title`="' . $title . '", `keywords`="' . $keywords . '", `description`="' . $description . '", `rand_key_1`="' . $rand_key_1 . '",  `rand_key_2`="' . $rand_key_2 . '",  `rand_key_3`="' . $rand_key_3 . '" WHERE `tpl_name`="cont.html"');
        }
        $cont_info = $Model->query('SELECT * FROM `cloud_tpl_info` WHERE `tpl_name`="cont.html"');
        $this->assign('cont_info', $cont_info);
        $this->display('Index:sub_mian_cont');
    }

    public function sub_list() {
        if ($_POST['title']) {
            $title = $_POST['title'];
        } else {
            $title = '';
        }
        if ($_POST['keywords']) {
            $keywords = $_POST['keywords'];
        } else {
            $keywords = '';
        }
        if ($_POST['description']) {
            $description = $_POST['description'];
        } else {
            $description = '';
        }
        $list_info = array();
        $Model = new \Think\Model();
        if ($title != '' || $keywords != '' || $description != '') {
            $list_info = $Model->query('UPDATE `cloud_tpl_info` SET `title`="' . $title . '", `keywords`="' . $keywords . '", `description`="' . $description . '" WHERE `tpl_name`="list.html"');
        }
        $list_info = $Model->query('SELECT * FROM `cloud_tpl_info` WHERE `tpl_name`="list.html"');
        $this->assign('list_info', $list_info);
        $this->display('Index:sub_mian_sub_list');
    }

    public function jie_shao() {
        if ($_POST['title']) {
            $title = $_POST['title'];
        } else {
            $title = '';
        }
        if ($_POST['keywords']) {
            $keywords = $_POST['keywords'];
        } else {
            $keywords = '';
        }
        if ($_POST['description']) {
            $description = $_POST['description'];
        } else {
            $description = '';
        }
        $jiashao_info = array();
        $Model = new \Think\Model();
        if ($title != '' || $keywords != '' || $description != '') {
            $jiashao_info = $Model->query('UPDATE `cloud_tpl_info` SET `title`="' . $title . '", `keywords`="' . $keywords . '", `description`="' . $description . '" WHERE `tpl_name`="yyjs.html"');
        }
        $jiashao_info = $Model->query('SELECT * FROM `cloud_tpl_info` WHERE `tpl_name`="yyjs.html"');
        $this->assign('jiashao_info', $jiashao_info);
        $this->display('Index:sub_mian_jie_shao');
    }

    public function you_shi() {
        if ($_POST['title']) {
            $title = $_POST['title'];
        } else {
            $title = '';
        }
        if ($_POST['keywords']) {
            $keywords = $_POST['keywords'];
        } else {
            $keywords = '';
        }
        if ($_POST['description']) {
            $description = $_POST['description'];
        } else {
            $description = '';
        }
        $youshi_info = array();
        $Model = new \Think\Model();
        if ($title != '' || $keywords != '' || $description != '') {
            $youshi_info = $Model->query('UPDATE `cloud_tpl_info` SET `title`="' . $title . '", `keywords`="' . $keywords . '", `description`="' . $description . '" WHERE `tpl_name`="yyys.html"');
        }
        $youshi_info = $Model->query('SELECT * FROM `cloud_tpl_info` WHERE `tpl_name`="yyys.html"');
        $this->assign('youshi_info', $youshi_info);
        $this->display('Index:sub_mian_you_shi');
    }

    public function jia_ge() {
        if ($_POST['title']) {
            $title = $_POST['title'];
        } else {
            $title = '';
        }
        if ($_POST['keywords']) {
            $keywords = $_POST['keywords'];
        } else {
            $keywords = '';
        }
        if ($_POST['description']) {
            $description = $_POST['description'];
        } else {
            $description = '';
        }
        $jiage_info = array();
        $Model = new \Think\Model();
        if ($title != '' || $keywords != '' || $description != '') {
            $jiage_info = $Model->query('UPDATE `cloud_tpl_info` SET `title`="' . $title . '", `keywords`="' . $keywords . '", `description`="' . $description . '" WHERE `tpl_name`="ysjg.html"');
        }
        $jiage_info = $Model->query('SELECT * FROM `cloud_tpl_info` WHERE `tpl_name`="ysjg.html"');
        $this->assign('jiage_info', $jiage_info);
        $this->display('Index:sub_mian_jia_ge');
    }

    public function gou_mai() {
        if ($_POST['title']) {
            $title = $_POST['title'];
        } else {
            $title = '';
        }
        if ($_POST['keywords']) {
            $keywords = $_POST['keywords'];
        } else {
            $keywords = '';
        }
        if ($_POST['description']) {
            $description = $_POST['description'];
        } else {
            $description = '';
        }
        $goumai_info = array();
        $Model = new \Think\Model();
        if ($title != '' || $keywords != '' || $description != '') {
            $goumai_info = $Model->query('UPDATE `cloud_tpl_info` SET `title`="' . $title . '", `keywords`="' . $keywords . '", `description`="' . $description . '" WHERE `tpl_name`="gmlc.html"');
        }
        $goumai_info = $Model->query('SELECT * FROM `cloud_tpl_info` WHERE `tpl_name`="gmlc.html"');
        $this->assign('goumai_info', $goumai_info);
        $this->display('Index:sub_mian_gou_mai');
    }

    public function fu_wu() {
        if ($_POST['title']) {
            $title = $_POST['title'];
        } else {
            $title = '';
        }
        if ($_POST['keywords']) {
            $keywords = $_POST['keywords'];
        } else {
            $keywords = '';
        }
        if ($_POST['description']) {
            $description = $_POST['description'];
        } else {
            $description = '';
        }
        $fuwu_info = array();
        $Model = new \Think\Model();
        if ($title != '' || $keywords != '' || $description != '') {
            $fuwu_info = $Model->query('UPDATE `cloud_tpl_info` SET `title`="' . $title . '", `keywords`="' . $keywords . '", `description`="' . $description . '" WHERE `tpl_name`="khfw.html"');
        }
        $fuwu_info = $Model->query('SELECT * FROM `cloud_tpl_info` WHERE `tpl_name`="khfw.html"');
        $this->assign('fuwu_info', $fuwu_info);
        $this->display('Index:sub_mian_fu_wu');
    }

    public function shi_yong() {
        if ($_POST['title']) {
            $title = $_POST['title'];
        } else {
            $title = '';
        }
        if ($_POST['keywords']) {
            $keywords = $_POST['keywords'];
        } else {
            $keywords = '';
        }
        if ($_POST['description']) {
            $description = $_POST['description'];
        } else {
            $description = '';
        }
        $shiyong_info = array();
        $Model = new \Think\Model();
        if ($title != '' || $keywords != '' || $description != '') {
            $shiyong_info = $Model->query('UPDATE `cloud_tpl_info` SET `title`="' . $title . '", `keywords`="' . $keywords . '", `description`="' . $description . '" WHERE `tpl_name`="mfsy.html"');
        }
        $shiyong_info = $Model->query('SELECT * FROM `cloud_tpl_info` WHERE `tpl_name`="mfsy.html"');
        $this->assign('shiyong_info', $shiyong_info);
        $this->display('Index:sub_mian_shi_yong');
    }

    public function lian_xi() {
        if ($_POST['title']) {
            $title = $_POST['title'];
        } else {
            $title = '';
        }
        if ($_POST['keywords']) {
            $keywords = $_POST['keywords'];
        } else {
            $keywords = '';
        }
        if ($_POST['description']) {
            $description = $_POST['description'];
        } else {
            $description = '';
        }
        if ($_POST['connect_us']) {
            $connect_us = $_POST['connect_us'];
        } else {
            $connect_us = '';
        }
        $lianxi_info = array();
        $Model = new \Think\Model();
        if ($title != '' || $keywords != '' || $description != '' || $connect_us != '') {
            $lianxi_info = $Model->query('UPDATE `cloud_tpl_info` SET `title`="' . $title . '", `keywords`="' . $keywords . '", `description`="' . $description . '", `connect_us`="' . $connect_us . '" WHERE `tpl_name`="lxwm.html"');
        }
        $lianxi_info = $Model->query('SELECT * FROM `cloud_tpl_info` WHERE `tpl_name`="lxwm.html"');
        $this->assign('lianxi_info', $lianxi_info);
        $this->display('Index:sub_mian_lian_xi');
    }

    public function quan_ju() {
        $tpl_dir = "./Application/Home/Common/template";
        $tpl_info = array();
        if (is_dir($tpl_dir)) {
            if ($dh = opendir($tpl_dir)) {
                $i = 0;
                while (($file = readdir($dh)) !== false) {
                    if ($file != "." && $file != "..") {
                        $tpl_info[$i] = stat($tpl_dir . "\\$file");
                        $tpl_info[$i]['filename'] = $file;
                        $i++;
                    }
                }
                closedir($dh);
            }
        }
        if ($_POST['web_footer']) {
            $web_footer = $_POST['web_footer'];
        } else {
            $web_footer = '';
        }
        if ($_POST['web_chat']) {
            $web_chat = $_POST['web_chat'];
        } else {
            $web_chat = '';
        }
        $web_info = array();
        $Model = new \Think\Model();
        if ($web_footer != '' || $web_chat != '') {
            $web_info = $Model->query('UPDATE `cloud_tpl_info` SET `web_footer`="' . $web_footer . '", `web_chat`="' . $web_chat . '"');
        }
        $web_info = $Model->query('SELECT * FROM `cloud_tpl_info`');
        $this->assign('web_info', $web_info);
        $this->assign('tpl_info', $tpl_info);
        $this->display('Index:sub_main_quan_ju');
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

    public function upload_zou_logo() {
        $tpl_name = $_POST['tpl_name_zou'];
        if ($tpl_name == 'please_select_tpl') {
            $this->error('请选择模板', '/index.php/Admin/WebInfoAdmin/quan_ju');
        }
        $config = array(
            'rootPath' => './',
            'savePath' => './Application/Admin/Controller/Uploads/Uploads',
            'autoSub' => true,
        );
        $upload = new \Think\Upload($config);
        $info = $upload->upload();
        if (!$info) {
            // 上传错误提示错误信息        
            $this->error($upload->getError());
        } else {
            // 上传成功        
            rename('./Application/Admin/Controller/Uploads/Uploads' . date("Y-m-d") . '/' . $info['zuo_logo']['savename'], './Application/Home/Common/template/' . $tpl_name . '/images/logo.jpg');
            $delete_dir = './Application/Admin/Controller/Uploads/Uploads' . date("Y-m-d");
            $this->deldir($delete_dir);
            $this->success('上传成功', '/index.php/Admin/WebInfoAdmin/quan_ju');
        }
    }

    public function upload_you_logo() {
        $tpl_name = $_POST['tpl_name_you'];
        if ($tpl_name == 'please_select_tpl') {
            $this->error('请选择模板', '/index.php/Admin/WebInfoAdmin/quan_ju');
        }
        $config = array(
            'rootPath' => './',
            'savePath' => './Application/Admin/Controller/Uploads/Uploads',
            'autoSub' => true,
        );
        $upload = new \Think\Upload($config);
        $info = $upload->upload();
        if (!$info) {
            // 上传错误提示错误信息        
            $this->error($upload->getError());
        } else {
            // 上传成功        
            rename('./Application/Admin/Controller/Uploads/Uploads' . date("Y-m-d") . '/' . $info['you_logo']['savename'], './Application/Home/Common/template/' . $tpl_name . '/images/dh.jpg');
            $delete_dir = './Application/Admin/Controller/Uploads/Uploads' . date("Y-m-d");
            $this->deldir($delete_dir);
            $this->success('上传成功', '/index.php/Admin/WebInfoAdmin/quan_ju');
        }
    }

    public function upload_24_xiao_shi_ke_fu_zi_xun_re_xian() {
        $tpl_name = $_POST['tpl_name_24_xiao_shi_ke_fu_zi_xun_re_xian'];
        if ($tpl_name == 'please_select_tpl') {
            $this->error('请选择模板', '/index.php/Admin/WebInfoAdmin/quan_ju');
        }
        $config = array(
            'rootPath' => './',
            'savePath' => './Application/Admin/Controller/Uploads/Uploads',
            'autoSub' => true,
        );
        $upload = new \Think\Upload($config);
        $info = $upload->upload();
        if (!$info) {
            // 上传错误提示错误信息        
            $this->error($upload->getError());
        } else {
            // 上传成功        
            rename('./Application/Admin/Controller/Uploads/Uploads' . date("Y-m-d") . '/' . $info['24_xiao_shi_ke_fu_zi_xun_re_xian']['savename'], './Application/Home/Common/template/' . $tpl_name . '/images/24hour1.jpg');
            $delete_dir = './Application/Admin/Controller/Uploads/Uploads' . date("Y-m-d");
            $this->deldir($delete_dir);
            $this->success('上传成功', '/index.php/Admin/WebInfoAdmin/quan_ju');
        }
    }

    public function upload_shou_hou_fu_wu_you_xiang() {
        $tpl_name = $_POST['tpl_name_shou_hou_fu_wu_you_xiang'];
        if ($tpl_name == 'please_select_tpl') {
            $this->error('请选择模板', '/index.php/Admin/WebInfoAdmin/quan_ju');
        }
        $config = array(
            'rootPath' => './',
            'savePath' => './Application/Admin/Controller/Uploads/Uploads',
            'autoSub' => true,
        );
        $upload = new \Think\Upload($config);
        $info = $upload->upload();
        if (!$info) {
            // 上传错误提示错误信息        
            $this->error($upload->getError());
        } else {
            // 上传成功        
            rename('./Application/Admin/Controller/Uploads/Uploads' . date("Y-m-d") . '/' . $info['shou_hou_fu_wu_you_xiang']['savename'], './Application/Home/Common/template/' . $tpl_name . '/images/24hour2.jpg');
            $delete_dir = './Application/Admin/Controller/Uploads/Uploads' . date("Y-m-d");
            $this->deldir($delete_dir);
            $this->success('上传成功', '/index.php/Admin/WebInfoAdmin/quan_ju');
        }
    }

}
