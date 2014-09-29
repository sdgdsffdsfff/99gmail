<?php

//本类由系统自动生成，仅供测试用途
//namespace Admin\Controller;
//use Think\Controller;
class WebPointAdminController extends Think\Controller {

    public function index() {
        $city_en = $_GET['city_en'];

        $src = './Application/Home/View/' . $city_en . '/lxwm.html';

        //title
        $title = file_get_contents($src);
        $title_array[] = explode("<input type='hidden' name='introduce_title'/>", $title);

        //introduce
        $introduce = file_get_contents($src);
        $introduce_array[] = explode("<input type='hidden'>", $introduce);


        //connect_us
        $connect_us = file_get_contents($src);
        $connect_us_array[] = explode("<input type='hidden' name='connect_us'/>", $connect_us);


        $this->assign('city_en', $city_en);
        $this->assign('title', trim($title_array[0][1]));
        $this->assign('introduce', $introduce_array[0][1]);
        $this->assign('connect_us', $connect_us_array[0][1]);
        $this->display('Index:web_point_index');
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

    public function upload_logo() {
        $city_en = $_POST['city_en'];
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
            rename('./Application/Admin/Controller/Uploads/Uploads' . date("Y-m-d") . '/' . $info['logo']['savename'], './Application/Home/View/' . $city_en . '/images/163logo.jpg');
            $delete_dir = './Application/Admin/Controller/Uploads/Uploads' . date("Y-m-d");
            $this->deldir($delete_dir);
            $this->success('上传成功', '/index.php/Admin/WebPointAdmin/index?city_en=' . $city_en);
        }
    }

    public function change_introduce_title() {
        $city_en = $_POST['city_en'];
        $introduce_title = $_POST['introduce_title'];
        $src = './Application/Home/View/' . $city_en . '/lxwm.html';
        $content = file_get_contents($src);
        $content_array[] = explode("<input type='hidden' name='introduce_title'/>", $content);
        $content_array[0][1] = $introduce_title;
        $content = $content_array[0][0] . "<input type='hidden' name='introduce_title'/>" . $content_array[0][1] . "<input type='hidden' name='introduce_title'/>" . $content_array[0][2];
        $path = './Application/Home/View/' . $city_en . '/lxwm.html';
        file_put_contents($path, $content . "\r\n");
        $this->success('修改成功', '/index.php/Admin/WebPointAdmin/index?city_en=' . $city_en);
    }

    public function change_introduce() {
        $city_en = $_POST['city_en'];
        $introduce = $_POST['introduce'];
        $src = './Application/Home/View/' . $city_en . '/lxwm.html';
        $content = file_get_contents($src);
        $content_array[] = explode("<input type='hidden'>", $content);
        $content_array[0][1] = $introduce;
        $content = $content_array[0][0] . "<input type='hidden'>" . $content_array[0][1] . "<input type='hidden'>" . $content_array[0][2];
        $path = './Application/Home/View/' . $city_en . '/lxwm.html';
        file_put_contents($path, $content . "\r\n");
        $this->success('修改成功', '/index.php/Admin/WebPointAdmin/index?city_en=' . $city_en);
    }

    public function change_connect_us() {
        $city_en = $_POST['city_en'];
        $connect_us = $_POST['connect_us'];
        $src = './Application/Home/View/' . $city_en . '/lxwm.html';
        $content = file_get_contents($src);
        $content_array[] = explode("<input type='hidden' name='connect_us'/>", $content);
        $content_array[0][1] = $connect_us;
        $content = $content_array[0][0] . "<input type='hidden' name='connect_us'/>" . $content_array[0][1] . "<input type='hidden' name='connect_us'/>" . $content_array[0][2];
        $path = './Application/Home/View/' . $city_en . '/lxwm.html';
        file_put_contents($path, $content . "\r\n");
        $this->success('修改成功', '/index.php/Admin/WebPointAdmin/index?city_en=' . $city_en);
    }

}
