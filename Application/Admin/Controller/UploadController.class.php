<?php

//本类由系统自动生成，仅供测试用途
//namespace Admin\Controller;
//use Think\Controller;
include_once('UnzipController.class.php');

class UploadController extends Think\Controller {

    public function index() {
        $this->display('Index:show_upload_index');
    }

    public function upload() {
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
            //echo '<pre>';
            //print_r($info);
            //echo '</pre>';
            $Unzip = new UnzipController();
            $Unzip->unzip($info['zip']['savename']);
            $this->success('上传成功', '/index.php/Admin/TemplateAdmin/index');
        }
    }

}
