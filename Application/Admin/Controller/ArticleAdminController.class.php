<?php

//本类由系统自动生成，仅供测试用途
//namespace Admin\Controller;
//use Think\Controller;
class ArticleAdminController extends Think\Controller {

    public function index() {
        $article = array();
        $Model = new \Think\Model();
        $article = $Model->query('SELECT * FROM `cloud_article` ORDER BY `id` DESC');
        $this->assign('article', $article);
        $this->display('Index:article_admin');
    }

    public function add_article() {

        $article_paragraph = $_POST['article_paragraph'];
        $Model = new \Think\Model();
        $result = $Model->execute("INSERT INTO `cloud_article` (`content_paragraph`) VALUES ('" . $article_paragraph . "')");
        if ($result) {
            $this->success('添加成功', '/index.php/Admin/ArticleAdmin/index');
        } else {
            $this->error('添加失败', '/index.php/Admin/ArticleAdmin/index');
        }
    }

    public function delete_article() {
        $id = $_GET['id'];
        $Model = new \Think\Model();
        $result = $Model->execute("DELETE FROM `cloud_article` WHERE `id`=" . $id);
        if ($result) {
            $this->success('删除成功', '/index.php/Admin/ArticleAdmin/index');
        } else {
            $this->error('删除失败', '/index.php/Admin/ArticleAdmin/index');
        }
    }

}
