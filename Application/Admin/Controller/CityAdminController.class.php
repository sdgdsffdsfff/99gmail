<?php
/**
@author John Doe <john.doe@example.com>
@version 强比站群管理系统1.0版本
@access public
@copyright (c) 2014年, 强比 
 @name CityAdminController 
 城市添加 城市域名管理  城市模板修改
 */
class CityAdminController extends Think\Controller {

    public function index() {
        $city = array();
        $Model = new \Think\Model();
        $city = $Model->query('SELECT * FROM `cloud_city` ORDER BY `gdp_order` ASC');
        $domain_name = $Model->query('select * from cloud_domain_first');

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

        $this->assign('city', $city);
        $this->assign('domain_name', $domain_name);
        $this->assign('tpl_info', $tpl_info);
        $this->display('Index:city_admin');
    }

    public function delete_city() {
        $id = $_GET['id'];
        $Model = new \Think\Model();
        $result = $Model->execute("DELETE FROM `cloud_city` WHERE `id`=" . $id);
        if ($result) {
            $this->success('删除成功', '/index.php/Admin/CityAdmin/index');
        } else {
            $this->error('删除失败', '/index.php/Admin/CityAdmin/index');
        }
    }

    public function add_city() {
        if ($_POST['gdp_order']) {
            $gdp_order = $_POST['gdp_order'];
        } else {
            $gdp_order = '';
        }
        if ($_POST['city_en']) {
            $city_en = $_POST['city_en'];
        } else {
            $city_en = '';
        }
        if ($_POST['city_cn']) {
            $city_cn = $_POST['city_cn'];
        } else {
            $city_cn = '';
        }
        $Model = new \Think\Model();
        if ($gdp_order != '' || $city_en != '' || $city_cn != '') {
            $result = $Model->execute("INSERT INTO `cloud_city` (`city_en`, `city_cn`, `gdp_order`) VALUES ('" . $city_en . "', '" . $city_cn . "', '" . $gdp_order . "')");
        }
        if ($result) {
            $this->success('添加成功', '/index.php/Admin/CityAdmin/index');
        } else {
            $this->error('添加失败', '/index.php/Admin/CityAdmin/index');
        }
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

    public function add_city_file() {
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
            $content = file_get_contents($info['city_file']['savepath'] . '/' . $info['city_file']['savename']);

            //把上传的所有数据全部删除
            $delete_dir = './Application/Admin/Controller/Uploads/Uploads' . date("Y-m-d");
            $this->deldir($delete_dir);


            $content = explode(',', $content);
            for ($i = 0; $i < count($content) - 1; $i++) {
                $temp = explode('|', $content[$i]);
                $values .= "('" . $temp[2] . "', '" . $temp[1] . "', " . $temp[0] . "),";
            }
            $temp_count = count($content) - 1;
            $temp_last = $content[$temp_count];
            $temp_last = explode('|', $temp_last);
            $values .= "('" . $temp_last[2] . "', '" . $temp_last[1] . "', " . $temp_last[0] . ")";
            $Model = new \Think\Model();
            $result = $Model->execute("INSERT INTO `cloud_city` (`city_en`, `city_cn`, `gdp_order`) VALUES " . $values);
            $this->success('上传成功', '/index.php/Admin/CityAdmin/index');
        }
    }

    public function delete_all_city() {
        $Model = new \Think\Model();
        $result = $Model->execute("DELETE FROM `cloud_city`");
        $this->success('删除成功', '/index.php/Admin/CityAdmin/index');
    }

    public function recurse_copy($src, $dst) { // 原目录，复制到的目录
        $dir = opendir($src);
        @mkdir($dst);
        while (false !== ( $file = readdir($dir))) {
            if (( $file != '.' ) && ( $file != '..' )) {
                if (is_dir($src . '/' . $file)) {
                    $this->recurse_copy($src . '/' . $file, $dst . '/' . $file);
                } else {
                    copy($src . '/' . $file, $dst . '/' . $file);
                }
            }
        }
        closedir($dir);
        return true;
    }

    public function addFileToZip($src, $zip) {
        $dir = opendir($src);
        while (false !== ( $file = readdir($dir))) {
            if (( $file != '.' ) && ( $file != '..' )) {
                if (is_dir($src . '/' . $file)) {
                    $this->addFileToZip($src . '/' . $file, $zip);
                } else {
                    $zip->addFile($src . '/' . $file);
                }
            }
        }
        closedir($dir);
        return true;
    }

    public function load_city_source() {
        $city_en = $_GET['city_en'];
        $this->recurse_copy('./Application/Home/View/' . $city_en, './' . $city_en);
        $zip = new ZipArchive();
        if ($zip->open('./zip/' . $city_en . '.zip', ZipArchive::OVERWRITE)) {
            $this->addFileToZip($city_en, $zip);
        }
        $zip->close();
        $this->deldir($city_en);
        Header("HTTP/1.1 303 See Other");
        Header("Location: /zip/$city_en.zip");
    }

    public function _after_index() {
        $dir = './zip/';
        if (is_dir($dir)) {
            if ($dh = opendir($dir)) {
                while (($file = readdir($dh)) !== false) {
                    if ($file != "." && $file != "..") {
                        unlink($dir . "\\$file");
                    }
                }
                closedir($dh);
            }
        }
    }

    public function change_first_do_main() {

        $id = $_POST['id'];
        $value = $_POST['value'];

        $Model = new \Think\Model();
        $result = $Model->execute("UPDATE `cloud_city` SET `first_do_main`='$value' WHERE `id`=$id");
        if ($result) {
            echo '修改成功';
        } else {
            echo '修改失败';
        }
    }

    public function change_tpl_name() {

        $id = $_POST['id'];
        $value = $_POST['value'];

        $Model = new \Think\Model();
        $result = $Model->execute("UPDATE `cloud_city` SET `tpl_name`='$value' WHERE `id`=$id");
        if ($result) {
            echo '修改成功';
        } else {
            echo '修改失败';
        }
    }

}
