<?php
// 本类由系统自动生成，仅供测试用途
//namespace Home\Controller;
//use Think\Controller;
class IndexController extends Think\Controller {
    public function index(){

			//获取域名或主机地址 
			echo $_SERVER['HTTP_HOST']."<br>"; 
			//获取网页地址 
			echo $_SERVER['PHP_SELF']."<br>";

			$host_array = explode('.', $_SERVER['HTTP_HOST']);
			$self_array = explode('/', $_SERVER['PHP_SELF']);
			print_r($host_array);
			echo '<br/><br/>';
			print_r($self_array);
			echo '<br/><br/>';
			if(count($self_array) == 2){
					$this->display($host_array[0].'/index');
			}else{
					$this->display($host_array[0].'/aa');
			}
    }
}
