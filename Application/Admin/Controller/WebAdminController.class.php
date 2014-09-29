<?php

ini_set("max_execution_time", 7200); // s 60 分钟 

/**
  @author  <834916321@qq.com>
  @version 强比站群后台管理系统实现
 */
//WebAdminController 实现正则表达式替换

class WebAdminController extends PropatrepController {

    public function index() {
        $dir = "./Application/Home/View";
        $web_info = array();
        if (is_dir($dir)) {
            if ($dh = opendir($dir)) {
                $i = 0;
                while (($file = readdir($dh)) !== false) {
                    if ($file != "." && $file != "..") {
                        $web_info[$i] = stat($dir . "\\$file");
                        $web_info[$i]['filename'] = $file;
                        $i++;
                    }
                }
                closedir($dh);
            }
        }
        for ($i = 0; $i < count($web_info); $i++) {
            $temp[] = explode('.', $web_info[$i]['filename']);
            $web_info[$i]['filename'] = $temp[$i][0];
        }

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
        $this->assign('web_info', $web_info);
        $this->assign('tpl_info', $tpl_info);
        $this->display('Index:web_admin');
    }

    /**
      生成各个站点
      管理界面点击生成各个站点
      @todo 生成各类的文件
     */
    public function produce_web_point() {
        $tpl_name = $this->get_tplinfo();
        $city = array();
        $Model = new \Think\Model();
        #读取一级域名
        $do_main = $Model->query('SELECT * FROM `cloud_domain_first`');
        #读取城市、域名等信息
        $city_count = $Model->query('SELECT count(*) FROM `cloud_city` ORDER BY `id` ASC');
        $city_count = $city_count[0]['count(*)'];
        $websites_count = $this->get_websitecount();

        if ($city_count == $websites_count) {#站点已经全部生成的时候  提示先删除站点
            $this->success('站点已经全部生成，重新生成请选择更新。', '../WebStationStatistics/index');
        } else if ($websites_count == 0) {#站点不存在的时候 每一次生成100个
            $start = 0;
            $stop = $start + 100;
        } else {                                          #站点已经存在但是还没有完全生成
            $start = $websites_count ;
            $stop = $start + 100;
            if ($stop > $city_count) {
                $stop == $city_count;
            }
        }
        #获取指定的文件
        $cityModel = M('City');
        $limit =$start.',100';
        $city = $cityModel->order('id ASC')->limit($limit)->select();
        //$limit = ' limit '.$start.',100';
        //$sql='SELECT * FROM `cloud_city` ORDER BY `id` ASC'.$limit ;
        //$city=$Model->query($sql);
        for ($i = 0; $i < count($city); $i++) {
            if ($city[$i]['first_do_main'] == 'rand') {
                #没有选择域名的城市随机选择域名实现
                $city[$i]['first_do_main'] = $this->rand_do_main($do_main);
            }
        }
        #获取友情链接
        $external_url = $Model->query('SELECT * FROM `cloud_external_link`');
        if (count($external_url) < 4) {
            $this->error('至少需要4个外链', '/index.php/Admin/ExternalLinkAdmin/index');
        }
        $top50_city = $Model->query('SELECT * FROM `cloud_city` WHERE `gdp_order`<=50 AND `gdp_order`>=1');
        if (count($top50_city) < 5) {
            $this->error('至少需要5个GDP名次小于等于50的城市', '../CityAdmin/index');
        }
        for ($i = 0; $i < count($top50_city); $i++) {
            if ($top50_city[$i]['first_do_main'] == 'rand') {
                $top50_city[$i]['first_do_main'] = $this->top50_city_first_do_main($top50_city[$i]['id'], $city);
            }
        }
        $top50_zhi_hou_city = $Model->query('SELECT * FROM `cloud_city` WHERE `gdp_order`>50');
        if (count($top50_zhi_hou_city) < 11) {
            $this->error('至少需要11个名次大于50的城市', '../CityAdmin/index');
        }
        for ($i = 0; $i < count($top50_zhi_hou_city); $i++) {
            if ($top50_zhi_hou_city[$i]['first_do_main'] == 'rand') {
                $top50_zhi_hou_city[$i]['first_do_main'] = $this->top50_zhi_hou_city_first_do_main($top50_zhi_hou_city[$i]['id'], $city);
            }
        }
        #数据库中获取文章标题  模板信息
        $title = $Model->query('SELECT * FROM `cloud_title`');
        #这个地方的文章标题太多，需要改成随机选择50篇文章
        $title = $this->rand_title($title);
        $tpl_info = $Model->query('SELECT * FROM `cloud_tpl_info`');
        $article = $Model->query('SELECT * FROM `cloud_article`');
        for ($i = 0; $i < count($city); $i++) {
            if ($city[$i]['tpl_name'] == 'rand') {
                #如果模板是随即选择的话随机选择一个模板
                $temp_tpl_name = $this->rand_tpl($tpl_name);
                #这个地方要保证tpl_name保证一致
                $city[$i]['tpl_name'] = $temp_tpl_name;
                $src = './Application/Home/Common/template/' . $temp_tpl_name;
            } else {
                $src = './Application/Home/Common/template/' . $city[$i]['tpl_name'];
                $temp_tpl_name = $city[$i]['tpl_name'];
            }
            #生成文件的目录名
            $dst = './Application/Home/View/' . $city[$i]['city_en'] . '.' . $city[$i]['first_do_main'];
            $this->Regular_replacement($src, $dst, $title, $tpl_info, $article, $city[$i]['city_en'], $city[$i]['city_cn'], $city, $external_url, $top50_city, $top50_zhi_hou_city, $city[$i]['first_do_main']);
            $this->produce_article($dst, $title, $city, $tpl_info, $article, $city[$i]['city_en'], $city[$i]['city_cn'], $external_url, $top50_city, $top50_zhi_hou_city, $temp_tpl_name, $city[$i]['first_do_main']);
            $this->produce_list($dst, $title, $article, $src, 'list.html', $tpl_info, $city, $external_url, $top50_city, $top50_zhi_hou_city, $city[$i]['city_cn'], $city[$i]['city_en'], $city[$i]['first_do_main']);
        }
        #复制文件实现
        $this->copy_imgother($city);
        $websites_count = $this->get_websitecount();
        if ($city_count == $websites_count) {
            $this->success('站点全部更新成功。', '../WebStationStatistics/index');
        } else {
            $update_count = $stop - $start;
            $message = '本次站点更新成功，更新站点' . $update_count . '个，请点击生成站点继续生成。';
            $this->success($message, '../WebStationStatistics/index');
        }
    }

    /**
     * 获取已经生成的站点数
     * @access private
     * @author 赵兴壮 834916321@qq.com
     * @return int  站点数量   $count 
     */
    private function get_websitecount() {
        $dir = "./Application/Home/View";
        $i = 0;
        if (is_dir($dir)) {
            if ($dh = opendir($dir)) {
                while (($file = readdir($dh)) !== false) {
                    //读取文件夹的时候要把 . 跟..去掉因为他们也是目录
                    if ($file != "." && $file != "..") {
                        $i++;
                    }
                }
                closedir($dh);
            }
        }
        return $i;
    }

    /**
     * 删除站点列表实现
     * @access public
     * @author timelesszhuang 834916321@qq.com
     * @version 强比科技有限公司
     */
    public function del_websites() {
        $dir = "./Application/Home/View";
        $web_info = array();
        if (is_dir($dir)) {
            if ($dh = opendir($dir)) {
                $i = 0;
                while (($file = readdir($dh)) !== false) {
                    if ($file != "." && $file != "..") {
                        $web_info[$i] = stat($dir . "\\$file");
                        $web_info[$i]['filename'] = $file;
                        $i++;
                    }
                }
                closedir($dh);
            }
        }
        for ($i = 0; $i < count($web_info); $i++) {
            $temp[] = explode('.', $web_info[$i]['filename']);
            $web_info[$i]['city_name'] = $temp[$i][0];
        }
        for ($i = 0; $i < count($web_info); $i++) {
            $delete_dir = './Application/Home/View/' . $web_info[$i]['filename'];
            $this->deldir($delete_dir);
        }
        $this->success('删除站点成功', '../WebStationStatistics/index');
    }

    /**
     * 复制模板文件中的图片信息跟css等其他的文件实现
      @param string  $city   城市站点全部信息    select * 实现
     */
    private function copy_imgother($city) {
        for ($i = 0; $i < count($city); $i++) {
            $src = './Application/Home/Common/template/' . $city[$i]['tpl_name'];
            $dst = './Application/Home/View/' . $city[$i]['city_en'] . '.' . $city[$i]['first_do_main'];
            $dir = opendir($src);
            while (false !== ($file = readdir($dir))) {
                if (( $file != '.' ) && ( $file != '..' )) {
                    if (is_dir($src . '/' . $file)) {
                        $this->exec_imgothercopy($src . '/' . $file, $dst . '/' . $file);
                    }
                }
            }
            closedir($src);
        }
    }

    /**
     * 读取模板文件   比如文件内容
     * @return array  $tpl_name   模板文件信息
     * @access private
     */
    private function get_tplinfo() {
        $tpl_dir = "./Application/Home/Common/template";
        $tpl_name = array();
        if (is_dir($tpl_dir)) {
            if ($dh = opendir($tpl_dir)) {
                $i = 0;
                while (($file = readdir($dh)) !== false) {
                    if ($file != "." && $file != "..") {
                        $tpl_name[$i] = stat($tpl_dir . "\\$file");
                        $tpl_name[$i]['filename'] = $file;
                        $i++;
                    }
                }
                closedir($dh);
            }
        }
        return $tpl_name;
    }

    /**
     * 执行css文件图片文件复制
     * @param string $src 文件源 
     * @param string $dst 文件要复制到的地址
     * 执行递归操作复制文件
     */
    private function exec_imgothercopy($src, $dst) {
        $dir = opendir($src);
        @mkdir($dst);
        while (false !== ($file = readdir($dir))) {
            if (( $file != '.' ) && ( $file != '..' )) {
                if (!is_dir($src . '/' . $file)) {
                    copy($src . '/' . $file, $dst . '/' . $file);
                } else {
                    $this->exec_imgothercopy($src . '/' . $file, $dst . '/' . $file);
                }
            }
        }
    }

    /**
      @文件操作 生成目录   正则替换
      @param string  $src   模板路径
      @param string  $dst   生成的视图目录
      @param string  $title   文章标题
      @param string  $tpl_info  模板信息   代着标记 {city}
      @param string  $article    文章信息数据库中文章信息  可以拼接实现
      @param string  $city_en  城市站点英文名称
      @param string  $city_cn   城市站点中文
      @param string  $city   城市站点全部信息    select * 实现
      @param string  $external_url  友情链接
      @param string  $top50_city   GDP 前50的城市
      @param string  $top50_zhi_hou_city   GDP50名之后的城市
      @param string $city_first_do_main  城市站点一级域名
      该函数循环执行负责生成文件夹下面的各个文件
     */
    private function Regular_replacement($src, $dst, $title, $tpl_info, $article, $city_en, $city_cn, $city, $external_url, $top50_city, $top50_zhi_hou_city, $city_first_do_main) { // 原目录，复制到的目录
        $dir = opendir($src);
#创建目录文件文件名为 拼接的带域名
        @mkdir($dst);
#文章路径
        @mkdir($dst . "/article");
#文章列表路径
        @mkdir($dst . "/list");
        while (false !== ($file = readdir($dir))) {
            if (( $file != '.') && ($file != '..')) {
                if (!is_dir($src . '/' . $file)) {
                    #购买流程
                    if ($file == 'gmlc.html') {
                        #读取模板文件
                        $content = file_get_contents($src . '/' . $file);
                        $patterns = array();      #模式
                        $replacements = array();     #需要替换的内容
                        $patterns[0] = '/<--city-->/u';
                        $replacements[0] = $city_cn;
                        $patterns[1] = '/<--my_title_1-->/u';
                        #购买流程页面标题 ??          这个地方有点问题/u
                        $replacements[1] = preg_replace('/{city}/u', $city_cn, $tpl_info[2]['title']);
                        $patterns[2] = '/<--my_keywords-->/u';
                        #购买流程页面关键字??          这个地方有点问题/u
                        $replacements[2] = preg_replace('/{city}/u', $city_cn, $tpl_info[2]['keywords']);
                        $patterns[3] = '/<--index_a_href-->/u';
                        $replacements[3] = $city_en . '.' . $city_first_do_main . '/index.html';
                        $patterns[2000] = '/<--description-->/u';
                        #购买流程页面描述??          这个地方有点问题/u 
                        $replacements[2000] = preg_replace('/{city}/u', $city_cn, $tpl_info[2]['description']);
                        $this->super_link($patterns, $replacements, $city, $external_url, $top50_city, $top50_zhi_hou_city);
                        $this->question_rand($patterns, $replacements, 12, $title, $city_en, $city_first_do_main);
                        $this->footer($patterns, $replacements, $tpl_info[2]['web_footer'], $tpl_info[2]['web_chat']);
                        $content = preg_replace($patterns, $replacements, $content);
                        $path = $dst . '/' . $file;
                        file_put_contents($path, $content . "\r\n");
                    } else if ($file == 'index.html') {
                        $content = file_get_contents($src . '/' . $file);
                        $patterns = array();
                        $replacements = array();
                        $patterns[0] = '/<--city-->/u';
                        $replacements[0] = $city_cn;
                        $patterns[1] = '/<--my_title_1-->/u';
                        $replacements[1] = preg_replace('/{city}/u', $city_cn, $tpl_info[0]['title']);
                        $patterns[2] = '/<--my_keywords-->/u';
                        $replacements[2] = preg_replace('/{city}/u', $city_cn, $tpl_info[0]['keywords']);
                        $patterns[3] = '/<--index_a_href-->/u';
                        $replacements[3] = $city_en . '.' . $city_first_do_main . '/index.html';
                        $patterns[2000] = '/<--description-->/u';
                        $replacements[2000] = preg_replace('/{city}/u', $city_cn, $tpl_info[0]['description']);
                        $this->super_link($patterns, $replacements, $city, $external_url, $top50_city, $top50_zhi_hou_city);
                        $this->question_rand($patterns, $replacements, 12, $title, $city_en, $city_first_do_main);
                        $this->footer($patterns, $replacements, $tpl_info[0]['web_footer'], $tpl_info[0]['web_chat']);
                        $this->index_annotate($patterns, $replacements, $tpl_info[0]['index_annotate'], $city_cn);
                        $content = preg_replace($patterns, $replacements, $content);
                        $path = $dst . '/' . $file;
                        file_put_contents($path, $content . "\r\n");
                    } else if ($file == 'khfw.html') {
                        $content = file_get_contents($src . '/' . $file);
                        $patterns = array();
                        $replacements = array();
                        $patterns[0] = '/<--city-->/u';
                        $replacements[0] = $city_cn;
                        $patterns[1] = '/<--my_title_1-->/u';
                        $replacements[1] = preg_replace('/{city}/u', $city_cn, $tpl_info[3]['title']);
                        $patterns[2] = '/<--my_keywords-->/u';
                        $replacements[2] = preg_replace('/{city}/u', $city_cn, $tpl_info[3]['keywords']);
                        $patterns[3] = '/<--index_a_href-->/u';
                        $replacements[3] = $city_en . '.' . $city_first_do_main . '/index.html';
                        $patterns[2000] = '/<--description-->/u';
                        $replacements[2000] = preg_replace('/{city}/u', $city_cn, $tpl_info[3]['description']);
                        $this->super_link($patterns, $replacements, $city, $external_url, $top50_city, $top50_zhi_hou_city);
                        $this->question_rand($patterns, $replacements, 12, $title, $city_en, $city_first_do_main);
                        $this->footer($patterns, $replacements, $tpl_info[3]['web_footer'], $tpl_info[3]['web_chat']);
                        $content = preg_replace($patterns, $replacements, $content);
                        $path = $dst . '/' . $file;
                        file_put_contents($path, $content . "\r\n");
                    } else if ($file == 'list.html') {
                        #不要复制list.html
                    } else if ($file == 'lxwm.html') {
                        $content = file_get_contents($src . '/' . $file);
                        $patterns = array();
                        $replacements = array();
                        $patterns[0] = '/<--city-->/u';
                        $replacements[0] = $city_cn;
                        $patterns[1] = '/<--my_title_1-->/u';
                        $replacements[1] = preg_replace('/{city}/u', $city_cn, $tpl_info[5]['title']);
                        $patterns[2] = '/<--my_keywords-->/u';
                        $replacements[2] = preg_replace('/{city}/u', $city_cn, $tpl_info[5]['keywords']);
                        $patterns[3] = '/<--index_a_href-->/u';
                        $replacements[3] = $city_en . '.' . $city_first_do_main . '/index.html';
                        $patterns[2000] = '/<--description-->/u';
                        $replacements[2000] = preg_replace('/{city}/u', $city_cn, $tpl_info[5]['description']);
                        $patterns[2001] = '/<--connect_us-->/u';
                        $replacements[2001] = $tpl_info[5]['connect_us'];
                        $this->super_link($patterns, $replacements, $city, $external_url, $top50_city, $top50_zhi_hou_city);
                        $this->question_rand($patterns, $replacements, 12, $title, $city_en, $city_first_do_main);
                        $this->footer($patterns, $replacements, $tpl_info[5]['web_footer'], $tpl_info[5]['web_chat']);
                        $content = preg_replace($patterns, $replacements, $content);
                        $path = $dst . '/' . $file;
                        file_put_contents($path, $content . "\r\n");
                    } else if ($file == 'mfsy.html') {
                        $content = file_get_contents($src . '/' . $file);
                        $patterns = array();
                        $replacements = array();
                        $patterns[0] = '/<--city-->/u';
                        $replacements[0] = $city_cn;
                        $patterns[1] = '/<--my_title_1-->/u';
                        $replacements[1] = preg_replace('/{city}/u', $city_cn, $tpl_info[6]['title']);
                        $patterns[2] = '/<--my_keywords-->/u';
                        $replacements[2] = preg_replace('/{city}/u', $city_cn, $tpl_info[6]['keywords']);
                        $patterns[3] = '/<--index_a_href-->/u';
                        $replacements[3] = $city_en . '.' . $city_first_do_main . '/index.html';
                        $patterns[2000] = '/<--description-->/u';
                        $replacements[2000] = preg_replace('/{city}/u', $city_cn, $tpl_info[6]['description']);
                        $this->super_link($patterns, $replacements, $city, $external_url, $top50_city, $top50_zhi_hou_city);
                        $this->question_rand($patterns, $replacements, 12, $title, $city_en, $city_first_do_main);
                        $this->footer($patterns, $replacements, $tpl_info[6]['web_footer'], $tpl_info[6]['web_chat']);
                        $content = preg_replace($patterns, $replacements, $content);
                        $path = $dst . '/' . $file;
                        file_put_contents($path, $content . "\r\n");
                    } else if ($file == 'ysjg.html') {
                        $content = file_get_contents($src . '/' . $file);
                        $patterns = array();
                        $replacements = array();
                        $patterns[0] = '/<--city-->/u';
                        $replacements[0] = $city_cn;
                        $patterns[1] = '/<--my_title_1-->/u';
                        $replacements[1] = preg_replace('/{city}/u', $city_cn, $tpl_info[7]['title']);
                        $patterns[2] = '/<--my_keywords-->/u';
                        $replacements[2] = preg_replace('/{city}/u', $city_cn, $tpl_info[7]['keywords']);
                        $patterns[3] = '/<--index_a_href-->/u';
                        $replacements[3] = $city_en . '.' . $city_first_do_main . '/index.html';
                        $patterns[2000] = '/<--description-->/u';
                        $replacements[2000] = preg_replace('/{city}/u', $city_cn, $tpl_info[7]['description']);
                        $this->super_link($patterns, $replacements, $city, $external_url, $top50_city, $top50_zhi_hou_city);
                        $this->question_rand($patterns, $replacements, 12, $title, $city_en, $city_first_do_main);
                        $this->footer($patterns, $replacements, $tpl_info[7]['web_footer'], $tpl_info[7]['web_chat']);
                        $content = preg_replace($patterns, $replacements, $content);
                        $path = $dst . '/' . $file;
                        file_put_contents($path, $content . "\r\n");
                    } else if ($file == 'yyjs.html') {
                        $content = file_get_contents($src . '/' . $file);
                        $patterns = array();
                        $replacements = array();
                        $patterns[0] = '/<--city-->/u';
                        $replacements[0] = $city_cn;
                        $patterns[1] = '/<--my_title_1-->/u';
                        $replacements[1] = preg_replace('/{city}/u', $city_cn, $tpl_info[8]['title']);
                        $patterns[2] = '/<--my_keywords-->/u';
                        $replacements[2] = preg_replace('/{city}/u', $city_cn, $tpl_info[8]['keywords']);
                        $patterns[3] = '/<--index_a_href-->/u';
                        $replacements[3] = $city_en . '.' . $city_first_do_main . '/index.html';
                        $patterns[2000] = '/<--description-->/u';
                        $replacements[2000] = preg_replace('/{city}/u', $city_cn, $tpl_info[8]['description']);
                        $this->super_link($patterns, $replacements, $city, $external_url, $top50_city, $top50_zhi_hou_city);
                        $this->question_rand($patterns, $replacements, 12, $title, $city_en, $city_first_do_main);
                        $this->footer($patterns, $replacements, $tpl_info[8]['web_footer'], $tpl_info[8]['web_chat']);
                        $content = preg_replace($patterns, $replacements, $content);
                        $path = $dst . '/' . $file;
                        file_put_contents($path, $content . "\r\n");
                    } else if ($file == 'yyys.html') {
                        $content = file_get_contents($src . '/' . $file);
                        $patterns = array();
                        $replacements = array();
                        $patterns[0] = '/<--city-->/u';
                        $replacements[0] = $city_cn;
                        $patterns[1] = '/<--my_title_1-->/u';
                        $replacements[1] = preg_replace('/{city}/u', $city_cn, $tpl_info[9]['title']);
                        $patterns[2] = '/<--my_keywords-->/u';
                        $replacements[2] = preg_replace('/{city}/u', $city_cn, $tpl_info[9]['keywords']);
                        $patterns[3] = '/<--index_a_href-->/u';
                        $replacements[3] = $city_en . '.' . $city_first_do_main . '/index.html';
                        $patterns[2000] = '/<--description-->/u';
                        $replacements[2000] = preg_replace('/{city}/u', $city_cn, $tpl_info[9]['description']);
                        $this->super_link($patterns, $replacements, $city, $external_url, $top50_city, $top50_zhi_hou_city);
                        $this->question_rand($patterns, $replacements, 12, $title, $city_en, $city_first_do_main);
                        $this->footer($patterns, $replacements, $tpl_info[9]['web_footer'], $tpl_info[9]['web_chat']);
                        $content = preg_replace($patterns, $replacements, $content);
                        $path = $dst . '/' . $file;
                        file_put_contents($path, $content . "\r\n");
                    }
                }
            }
        }
        closedir($dir);
        return true;
    }

    /**
     * 生成相应的文章内容页
     * @param string $dst  每个站点的路径 /站点英文.一级域名/
     * @param array $title   select * 文章标题
     * @param array $city   城市信息  select * 实现
     * @param array $tpl_info  模板信息 select * 实现
     * @param array $article   Description  文章信息
     */
    private function produce_article($dst, $title, $city, $tpl_info, $article, $city_en, $city_cn, $external_url, $top50_city, $top50_zhi_hou_city, $tpl_name, $city_first_do_main) {
        for ($i = 0; $i < count($title); $i++) {
            $file_get_contents_path = './Application/Home/Common/template/' . $tpl_name . '/cont.html';
            $content = file_get_contents($file_get_contents_path);
            $patterns = array();
            $replacements = array();
            $patterns[0] = '/<--city-->/u';
            $replacements[0] = $city_cn;
            $patterns[1] = '/<--my_title_1-->/u';
            $replacements[1] = $title[$i]['title'];
            $patterns[2] = '/<--my_keywords-->/u';
#替换关键字中的{city}
            $replacements[2] = $title[$i]['title'] . '，' . preg_replace('/{city}/u', $city_cn, $tpl_info[1]['keywords']);
            $patterns[3] = '/<--index_a_href-->/u';
            $replacements[3] = $city_en . '.' . $city_first_do_main . '/index.html';
#把文章详细页中的客户服务重写成文章列表
            $patterns[2002] = '/<a href="\.\.\/khfw\.html">客户服务<\/a>/u';
            $replacements[2002] = '<a href="http://' . $city_en . '.' . $city_first_do_main . '/list/0.html">文章列表</a>';
            $this->super_link($patterns, $replacements, $city, $external_url, $top50_city, $top50_zhi_hou_city);
            $this->question_rand($patterns, $replacements, 12, $title, $city_en, $city_first_do_main);
#生成正则表达式匹配  文章详细内容匹配
            $this->article($patterns, $replacements, $title[$i], $article);
            $this->rand_key($patterns, $replacements, $tpl_info[1], $city_cn);
            $this->footer($patterns, $replacements, $tpl_info[1]['web_footer'], $tpl_info[1]['web_chat']);
            $content = preg_replace($patterns, $replacements, $content);
            $path = $dst . '/article/' . $i . '.html';
            file_put_contents($path, $content . "\r\n");
        }
    }

    /**
     * 生成文章列表实现
     * @param array  $title  标题
     * @param array  $article  文章
     * @param string $src 文件路径 
     * @param string $file 列表文件路径
     * @param array $tpl_info 模板信息
     * @param array $city 城市站点
     * @param array $external_url  超级链接  
     */
    private function produce_list($dst, $title, $article, $src, $file, $tpl_info, $city, $external_url, $top50_city, $top50_zhi_hou_city, $city_cn, $city_en, $city_first_do_main) {
//分页数
        $fen_ye_num = ceil(count($title) / 8);
#unique_rand 生成唯一的数组值唯一
        $title_rand_num = $this->unique_rand(0, count($title) - 1, count($title));
        for ($i = 0; $i < count($title_rand_num); $i++) {
            $title_ready[$i] = $title[$title_rand_num[$i]]['title'];
        }
#以后把文章改成独立文章
#该循环生成标题下面的文章根据article_ids
        for ($i = 0; $i < count($title_rand_num); $i++) {
            $article_ids = explode('|', $title[$title_rand_num[$i]]['article_ids']);
            for ($j = 0; $j < count($article); $j++) {
                if ($article[$j]['id'] == $article_ids[0]) {
                    $article_ready[$i] = $article[$j]['content_paragraph'];
                }
            }
        }
        for ($i = 0; $i < $fen_ye_num; $i++) {
//读取模板信息
            $content = file_get_contents($src . '/' . $file);
            $patterns = array();
            $replacements = array();
            $patterns[0] = '/<--city-->/u';
            $replacements[0] = $city_cn;
            $patterns[1] = '/<--my_title_1-->/u';
            $replacements[1] = preg_replace('/{city}/u', $city_cn, $tpl_info[4]['title']);
            $patterns[2] = '/<--my_keywords-->/u';
#需要替换{city}信息
            $replacements[2] = preg_replace('/{city}/u', $city_cn, $tpl_info[4]['keywords']);
            $patterns[3] = '/<--index_a_href-->/u';
#这个需要修改为城市英文.一级域名
            $replacements[3] = $city_en . '.' . $city_first_do_main . '/index.html';
            $patterns[2000] = '/<--description-->/u';
            $replacements[2000] = preg_replace('/{city}/u', $city_cn, $tpl_info[4]['description']);
            $patterns[2002] = '/<a href="\.\.\/khfw\.html">客户服务<\/a>/u';
#文章列表页面链接需要修改
            $replacements[2002] = '<a href="http://' . $city_en . '.' . $city_first_do_main . '/list/0.html">文章列表</a>';
            $this->super_link($patterns, $replacements, $city, $external_url, $top50_city, $top50_zhi_hou_city);
            $this->question_rand($patterns, $replacements, 12, $title, $city_en, $city_first_do_main);
#列表页随机
            $this->list_rand($patterns, $replacements, $title_ready, $article_ready, $i, $title, $fen_ye_num, $city_en, $title_rand_num, $city_first_do_main);
            $this->footer($patterns, $replacements, $tpl_info[4]['web_footer'], $tpl_info[4]['web_chat']);
            $content = preg_replace($patterns, $replacements, $content);
            $path = $dst . '/list/' . $i . '.html';
            file_put_contents($path, $content . "\r\n");
        }
    }

    /**
     * 随即生成文章标题
     * @access public
     * @author 赵兴壮 <834916321@qq.com>
     * @param array $title 文章标题
     * 筛选出50篇文章标题
     */
    private function rand_title($title) {
        $rand_titile = array();
        $count = count($title);
        for ($i = 0; $i < 50; $i++) {
            $titleid = rand(0, $count - 1);
            $rand_titile[$i] = $title[$titleid];
        }
        return $rand_titile;
    }

    /**
     * 超级链接
     * @param array $pattern  模式替换   
     * @param array  $replacement  要替换的文字 
     * @param array $city  各种城市站点信息
     * @param array $external_url  友情链接
     * @param array $top50_city     GDP前50名城市信息
     * @param array $top50_zhi_hou_city  GDP前50名之后的城市信息 select * 实现
     */
    private function super_link(&$patterns, &$replacements, $city, $external_url, $top50_city, $top50_zhi_hou_city) {
#随即生成友情链接规则
        $external_url_all = rand(2, 4);
        $top50_city_all = rand(3, 5);
        $top50_zhi_hou_city_all = 16 - $external_url_all - $top50_city_all;
        $external_url_rand_num = $this->unique_rand(0, count($external_url) - 1, $external_url_all);
        $top50_city_rand_num = $this->unique_rand(0, count($top50_city) - 1, $top50_city_all);
        $top50_zhi_hou_city_rand_num = $this->unique_rand(0, count($top50_zhi_hou_city) - 1, $top50_zhi_hou_city_all);
        $custom_super_link_variable_rand = $this->unique_rand(1, 16, 16);
        for ($i = 0; $i < $external_url_all; $i++) {
            $j = $i;
            $k = $i + 4;
            $patterns[$k] = '/<--link_city_cn_' . $custom_super_link_variable_rand[$j] . '-->/u';
            $replacements[$k] = $external_url[$external_url_rand_num[$i]]['keywords'];
        }
        for ($i = 0; $i < $top50_city_all; $i++) {
            $j = $i + $external_url_all;
            $k = $i + 4 + $external_url_all;
            $patterns[$k] = '/<--link_city_cn_' . $custom_super_link_variable_rand[$j] . '-->/u';
            $replacements[$k] = $top50_city[$top50_city_rand_num[$i]]['city_cn'];
        }
        for ($i = 0; $i < $top50_zhi_hou_city_all; $i++) {
            $j = $i + $external_url_all + $top50_city_all;
            $k = $i + 4 + $external_url_all + $top50_city_all;
            $patterns[$k] = '/<--link_city_cn_' . $custom_super_link_variable_rand[$j] . '-->/u';
            $replacements[$k] = $top50_zhi_hou_city[$top50_zhi_hou_city_rand_num[$i]]['city_cn'];
        }
        for ($i = 0; $i < $external_url_all; $i++) {
            $j = $i;
            $k = $i + 4 + 16;
            $patterns[$k] = '/<--link_city_en_' . $custom_super_link_variable_rand[$j] . '-->/u';
            $replacements[$k] = $external_url[$external_url_rand_num[$i]]['link_url'];
        }
        for ($i = 0; $i < $top50_city_all; $i++) {
            $j = $i + $external_url_all;
            $k = $i + 4 + $external_url_all + 16;
            $patterns[$k] = '/<--link_city_en_' . $custom_super_link_variable_rand[$j] . '-->/u';
            $replacements[$k] = $top50_city[$top50_city_rand_num[$i]]['city_en'] . '.' . $top50_city[$top50_city_rand_num[$i]]['first_do_main'];
        }
        for ($i = 0; $i < $top50_zhi_hou_city_all; $i++) {
            $j = $i + $external_url_all + $top50_city_all;
            $k = $i + 4 + $external_url_all + $top50_city_all + 16;
            $patterns[$k] = '/<--link_city_en_' . $custom_super_link_variable_rand[$j] . '-->/u';
            $replacements[$k] = $top50_zhi_hou_city[$top50_zhi_hou_city_rand_num[$i]]['city_en'] . '.' . $top50_zhi_hou_city[$top50_zhi_hou_city_rand_num[$i]]['first_do_main'];
        }
    }

    private function return_article_paragraph($article_id, $article) {
        for ($i = 0; $i < count($article); $i++) {
            if ($article[$i]['id'] == $article_id) {
                return $article[$i]['content_paragraph'];
            }
        }
    }

    /**
     * 产生相应的不重复的随机数
     * @param int $min 最小的数字
     * @param int $max 最大的数字
     * @param int  $num 需要产生的个数 
     */
    private function unique_rand($min, $max, $num) {
        $count = 0;
        $return = array();
        while ($count < $num) {
            $return[] = mt_rand($min, $max);
#把随机数中的重复数据删除array_flip() 返回一个翻转后的数组   如果值重复的话使用最后一个简明作为他的值
            $return = array_flip(array_flip($return));
            $count = count($return);
        }
#把数组中的元素俺随即顺序重新排列
        shuffle($return);
        return $return;
    }

    private function rand_tpl($tpl_name) {
        $rand_temp = rand(0, count($tpl_name) - 1);
        return $tpl_name[$rand_temp]['filename'];
    }

    private function rand_do_main($do_main) {
        $rand_temp = rand(0, count($do_main) - 1);
        return $do_main[$rand_temp]['domain_first_name'];
    }

    //递归删除某个目录及其下级所有文件
    private function deldir($dir) {
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

    private function top50_city_first_do_main($id, $city) {
        for ($i = 0; $i < count($city); $i++) {
            if ($city[$i]['id'] == $id) {
                return $city[$i]['first_do_main'];
            }
        }
    }

    private function top50_zhi_hou_city_first_do_main($id, $city) {
        for ($i = 0; $i < count($city); $i++) {
            if ($city[$i]['id'] == $id) {
                return $city[$i]['first_do_main'];
            }
        }
    }

}
