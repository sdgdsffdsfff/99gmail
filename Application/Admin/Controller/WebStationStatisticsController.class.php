<?php

//本类由系统自动生成，仅供测试用途
//namespace Admin\Controller;
//use Think\Controller;
class WebStationStatisticsController extends Think\Controller {

    public function index() {


        $view_dir = "./Application/Home/View";
        $view_info = array();
        if (is_dir($view_dir)) {
            if ($dh = opendir($view_dir)) {
                $i = 0;
                while (($file = readdir($dh)) !== false) {
                    if ($file != "." && $file != "..") {
                        $view_info[$i] = stat($view_dir . "\\$file");
                        $view_info[$i]['filename'] = $file;
                        $i++;
                    }
                }
                closedir($dh);
            }
        }
        //for($i=0; $i<count($tpl_info); $i++){
        //		$temp[] = explode('.', $tpl_info[$i]['filename']);
        //		$tpl_info[$i]['filename'] = $tpl_info[$i]['filename'];
        //}

        $this->assign('view_info', $view_info);

        $Model = new \Think\Model();


        $city = $Model->query('SELECT * FROM `cloud_city` ORDER BY `gdp_order` ASC');


        $city_keywords = $Model->query('SELECT `title` FROM `cloud_tpl_info` WHERE `tpl_name`="index.html"');
        $city_keywords = explode('，', $city_keywords[0][title]);


        $external_link = $Model->query('SELECT * FROM `cloud_external_link` ORDER BY `keywords` ASC');


        $this->assign('city', $city);
        $this->assign('city_keywords', $city_keywords[0]);
        $this->assign('external_link', $external_link);
        $this->display('Index:web_station_statistics');
    }

}
