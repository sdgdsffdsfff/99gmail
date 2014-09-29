<?php

/**
  @author John Doe <john.doe@example.com>
  @version 强比站群管理系统1.0版本
  @access public
  @copyright (c) 2014年, 强比
  @name TitleAdminController
  标题管理
 */
class TitleAdminController extends Think\Controller {

    public function index() {
        $title = array();
        $Model = new \Think\Model();
        $title = $Model->query('SELECT * FROM `cloud_title` ORDER BY `id` DESC');
        $this->assign('title', $title);
        $this->display('Index:title_admin');
    }

    public function add_title() {

        $title = $_POST['title'];
        $Model = new \Think\Model();
        $result = $Model->execute("INSERT INTO `cloud_title` (`title`) VALUES ('" . $title . "')");
        if ($result) {
            $this->success('添加成功', '/index.php/Admin/TitleAdmin/index');
        } else {
            $this->error('添加失败', '/index.php/Admin/TitleAdmin/index');
        }
    }

    public function delete_title() {

        $id = $_GET['id'];
        $Model = new \Think\Model();
        $result = $Model->execute("DELETE FROM `cloud_title` WHERE `id`=" . $id);
        if ($result) {
            $this->success('删除成功', '/index.php/Admin/TitleAdmin/index');
        } else {
            $this->error('删除失败', '/index.php/Admin/TitleAdmin/index');
        }
    }

    public function unique_rand($min, $max, $num) {
        $count = 0;
        $return = array();
        while ($count < $num) {
            $return[] = mt_rand($min, $max);
            $return = array_flip(array_flip($return));
            $count = count($return);
        }
        shuffle($return);
        return $return;
    }

    public function update() {

        $tag = $_GET['tag'];

        $Model = new \Think\Model();

        $title_number = $Model->query("SELECT count(*) FROM `cloud_title`");
        $article_number = $Model->query("SELECT count(*) FROM `cloud_article`");
        if ($title_number[0]['count(*)'] == 0) {
            $this->error('请添加至少一条标题', '/index.php/Admin/TitleAdmin/index');
        }
        if ($article_number[0]['count(*)'] < 2) {
            $this->error('请添加至少两个文章段落', '/index.php/Admin/ArticleAdmin/index');
        }

        $title = $Model->query("SELECT * FROM `cloud_title`");
        $article = $Model->query("SELECT * FROM `cloud_article`");
        if ($article_number[0]['count(*)'] < 6) {
            for ($i = 0; $i < $title_number[0]['count(*)']; $i++) {
                $article_rand_number = array();
                for ($j = 0; $j < 6; $j++) {
                    $article_rand_number[] = rand(0, $article_number[0]['count(*)'] - 1);
                }
                $article_ids = $article[$article_rand_number[0]]['id'] . '|' . $article[$article_rand_number[1]]['id'] . '|' . $article[$article_rand_number[2]]['id'] . '|' . $article[$article_rand_number[3]]['id'] . '|' . $article[$article_rand_number[4]]['id'] . '|' . $article[$article_rand_number[5]]['id'];
                $result = $Model->execute("UPDATE `cloud_title` SET `article_ids`='" . $article_ids . "' WHERE `id`=" . $title[$i]['id']);
                if (!$result) {
                    $this->error('更新失败', '/index.php/Admin/TitleAdmin/index');
                }
            }
        } else {
            for ($i = 0; $i < $title_number[0]['count(*)']; $i++) {
                $article_rand_number = $this->unique_rand(0, $article_number[0]['count(*)'] - 1, 6);
                $article_ids = $article[$article_rand_number[0]]['id'] . '|' . $article[$article_rand_number[1]]['id'] . '|' . $article[$article_rand_number[2]]['id'] . '|' . $article[$article_rand_number[3]]['id'] . '|' . $article[$article_rand_number[4]]['id'] . '|' . $article[$article_rand_number[5]]['id'];
                $result = $Model->execute("UPDATE `cloud_title` SET `article_ids`='" . $article_ids . "' WHERE `id`=" . $title[$i]['id']);
                if (!$result) {
                    $this->error('更新失败', '/index.php/Admin/TitleAdmin/index');
                }
            }
        }
        if ($tag == 'title') {
            $this->success('更新成功', 'index');
        } else if ($tag == 'article') {
            $this->success('更新成功', '../ArticleAdmin/index');
        }
    }

}
