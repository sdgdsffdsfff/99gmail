<?php

//本类由系统自动生成，仅供测试用途
//namespace Admin\Controller;
//use Think\Controller;
class UnzipController extends Think\Controller {

    //模板文件的直接上级目录名
    var $unzip_direct_upper_dir;

    public function index() {
        echo '';
    }

    //寻找模板文件的直接上级目录名
    public function find_dir($src) {
        $dir = opendir($src);
        while (false !== ( $file = readdir($dir))) {
            if (( $file != '.' ) && ( $file != '..' )) {
                if (is_dir($src . '/' . $file)) {
                    $this->find_dir($src . '/' . $file);
                } else {
                    //copy($src . '/' . $file,$dst . '/' . $file);
                    if ($file == 'index.html') {
                        $this->$unzip_direct_upper_dir = $src;
                    }
                }
            }
        }
        closedir($dir);
        return $this->$unzip_direct_upper_dir;
    }

    //把刚上传的模板文件移动到标准模板目录下
    public function rescue_move_template($src, $dst) {
        $dir = opendir($src);
        @mkdir($dst);
        while (false !== ( $file = readdir($dir))) {
            if (( $file != '.' ) && ( $file != '..' )) {
                if (is_dir($src . '/' . $file)) {
                    $this->rescue_move_template($src . '/' . $file, $dst . '/' . $file);
                } else {
                    copy($src . '/' . $file, $dst . '/' . $file);
                }
            }
        }
        closedir($dir);
        return true;
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

    public function move_tpl($temp) {
        //检测模板文件->找到其直接上级目录名
        $unzip_direct_upper_dir = $this->find_dir($temp);
        //echo $unzip_direct_upper_dir[''];
        //建立存放模板的文件夹
        $move_template_dir = './Application/Home/Common/template/template_' . date("Y_m_d_H_i_s") . '_' . rand(1, 1000);
        @mkdir($move_template_dir);

        //把解压出的模板文件复制到刚建立存放模板的文件夹里面去
        $this->rescue_move_template($unzip_direct_upper_dir[''], $move_template_dir);

        //把上传的所有数据全部删除
        $delete_dir = './Application/Admin/Controller/Uploads/Uploads' . date("Y-m-d");
        $this->deldir($delete_dir);

        //提示成功
        //echo '上传成功！';
    }

    public function unzip($file) {
        $zip = new ZipArchive();
        $unzip_fil = './Application/Admin/Controller/Uploads/Uploads' . date("Y-m-d") . '/' . $file;
        $rs = $zip->open($unzip_fil);
        if ($rs !== TRUE) {
            die('解压失败!Error Code:' . $rs);
        }
        $temp = './Application/Admin/Controller/Uploads/Uploads' . date("Y-m-d") . '/temp/';
        $zip->extractTo($temp);
        $zip->close();
        //echo '解压成功!';
        $temp_tem = './Application/Admin/Controller/Uploads/Uploads' . date("Y-m-d") . '/temp';
        $this->move_tpl($temp_tem);
    }

}
