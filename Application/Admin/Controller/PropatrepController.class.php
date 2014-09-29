<?php

//namespace Admin\Controller;
//use Think\Controller;
/**
 * 生成替换规则 
 *  关键参数：pattern   需要替换的模板中的文本
 *                    replacement  要替换成的文本
 * webAdmin控制器继承文件调用 该文件
 */
class PropatrepController extends Think\Controller {

    /**
     * 文章列表页面实现
     * @param array $pattern 要替换的模式
     * @param array $replacements  替换之后的文件 
     * 
     */
    protected function list_rand(&$patterns, &$replacements, $title_ready, $article_ready, $dang_qian_ye_shu, $title, $fen_ye_num, $city_en, $title_rand_num, $city_first_do_main) {
        #文章url
        $article_domain_url = $city_en . '.' . $city_first_do_main . '/article/';
        if ($dang_qian_ye_shu == 0) {
            #判断条件当前标题数量为0
            if (count($title) == 0) {
                $patterns[70] = '/<--list_article_title_1-->/u';
                $replacements[70] = '';
                $patterns[71] = '/<--list_article_title_2-->/u';
                $replacements[71] = '';
                $patterns[72] = '/<--list_article_title_3-->/u';
                $replacements[72] = '';
                $patterns[73] = '/<--list_article_title_4-->/u';
                $replacements[73] = '';
                $patterns[74] = '/<--list_article_title_5-->/u';
                $replacements[74] = '';
                $patterns[75] = '/<--list_article_title_6-->/u';
                $replacements[75] = '';
                $patterns[76] = '/<--list_article_title_7-->/u';
                $replacements[76] = '';
                $patterns[77] = '/<--list_article_title_8-->/u';
                $replacements[77] = '';

                $patterns[78] = '/<--list_article_href_1-->/u';
                $replacements[78] = '';
                $patterns[79] = '/<--list_article_href_2-->/u';
                $replacements[79] = '';
                $patterns[80] = '/<--list_article_href_3-->/u';
                $replacements[80] = '';
                $patterns[81] = '/<--list_article_href_4-->/u';
                $replacements[81] = '';
                $patterns[82] = '/<--list_article_href_5-->/u';
                $replacements[82] = '';
                $patterns[83] = '/<--list_article_href_6-->/u';
                $replacements[83] = '';
                $patterns[84] = '/<--list_article_href_7-->/u';
                $replacements[84] = '';
                $patterns[85] = '/<--list_article_href_8-->/u';
                $replacements[85] = '';

                $patterns[86] = '/<--list_article_desc_1-->/u';
                $replacements[86] = '';
                $patterns[87] = '/<--list_article_desc_2-->/u';
                $replacements[87] = '';
                $patterns[88] = '/<--list_article_desc_3-->/u';
                $replacements[88] = '';
                $patterns[89] = '/<--list_article_desc_4-->/u';
                $replacements[89] = '';
                $patterns[90] = '/<--list_article_desc_5-->/u';
                $replacements[90] = '';
                $patterns[91] = '/<--list_article_desc_6-->/u';
                $replacements[91] = '';
                $patterns[92] = '/<--list_article_desc_7-->/u';
                $replacements[92] = '';
                $patterns[93] = '/<--list_article_desc_8-->/u';
                $replacements[93] = '';

                #路径要修改
                $patterns[94] = '/<--list_url-->/u';
                $replacements[94] = $city_en . '.' . $city_first_do_main . '/list/';
                $patterns[95] = '/<--shang_yi_ye-->/u';
                $replacements[95] = $city_en . '.' . $city_first_do_main . '/list/0.html';
                $patterns[96] = '/<--xia_yi_ye-->/u';
                $replacements[96] = $city_en . '.' . $city_first_do_main . '/list/0.html';
            }
            #文章数量除以8之后余数 为1 且 文章数量大于8篇

            if (count($title) % 8 == 1 && count($title) > 8) {
                $patterns[70] = '/<--list_article_title_1-->/u';
                $replacements[70] = $title_ready[0];
                $patterns[71] = '/<--list_article_title_2-->/u';
                $replacements[71] = $title_ready[1];
                $patterns[72] = '/<--list_article_title_3-->/u';
                $replacements[72] = $title_ready[2];
                $patterns[73] = '/<--list_article_title_4-->/u';
                $replacements[73] = $title_ready[3];
                $patterns[74] = '/<--list_article_title_5-->/u';
                $replacements[74] = $title_ready[4];
                $patterns[75] = '/<--list_article_title_6-->/u';
                $replacements[75] = $title_ready[5];
                $patterns[76] = '/<--list_article_title_7-->/u';
                $replacements[76] = $title_ready[6];
                $patterns[77] = '/<--list_article_title_8-->/u';
                $replacements[77] = $title_ready[7];

                $patterns[78] = '/<--list_article_href_1-->/u';
                $replacements[78] = $article_domain_url . $title_rand_num[0];
                $patterns[79] = '/<--list_article_href_2-->/u';
                $replacements[79] = $article_domain_url . $title_rand_num[1];
                $patterns[80] = '/<--list_article_href_3-->/u';
                $replacements[80] = $article_domain_url . $title_rand_num[2];
                $patterns[81] = '/<--list_article_href_4-->/u';
                $replacements[81] = $article_domain_url . $title_rand_num[3];
                $patterns[82] = '/<--list_article_href_5-->/u';
                $replacements[82] = $article_domain_url . $title_rand_num[4];
                $patterns[83] = '/<--list_article_href_6-->/u';
                $replacements[83] = $article_domain_url . $title_rand_num[5];
                $patterns[84] = '/<--list_article_href_7-->/u';
                $replacements[84] = $article_domain_url . $title_rand_num[6];
                $patterns[85] = '/<--list_article_href_8-->/u';
                $replacements[85] = $article_domain_url . $title_rand_num[7];

                $patterns[86] = '/<--list_article_desc_1-->/u';
                $replacements[86] = $article_ready[0];
                $patterns[87] = '/<--list_article_desc_2-->/u';
                $replacements[87] = $article_ready[1];
                $patterns[88] = '/<--list_article_desc_3-->/u';
                $replacements[88] = $article_ready[2];
                $patterns[89] = '/<--list_article_desc_4-->/u';
                $replacements[89] = $article_ready[3];
                $patterns[90] = '/<--list_article_desc_5-->/u';
                $replacements[90] = $article_ready[4];
                $patterns[91] = '/<--list_article_desc_6-->/u';
                $replacements[91] = $article_ready[5];
                $patterns[92] = '/<--list_article_desc_7-->/u';
                $replacements[92] = $article_ready[6];
                $patterns[93] = '/<--list_article_desc_8-->/u';
                $replacements[93] = $article_ready[7];

                $patterns[94] = '/<--list_url-->/u';
                $replacements[94] = $city_en . '.' . $city_first_do_main . '/list/';
                $patterns[95] = '/<--shang_yi_ye-->/u';
                $replacements[95] = $city_en . '.' . $city_first_do_main . '/list/0.html';
                $patterns[96] = '/<--xia_yi_ye-->/u';
                $replacements[96] = $city_en . '.' . $city_first_do_main . '/list/1.html';
                #文章数量除以8之后余数为1 且 文章总的数量 <=8  
            } else if (count($title) % 8 == 1 && count($title) <= 8) {
                $patterns[70] = '/<--list_article_title_1-->/u';
                $replacements[70] = $title_ready[0];
                $patterns[71] = '/<--list_article_title_2-->/u';
                $replacements[71] = '';
                $patterns[72] = '/<--list_article_title_3-->/u';
                $replacements[72] = '';
                $patterns[73] = '/<--list_article_title_4-->/u';
                $replacements[73] = '';
                $patterns[74] = '/<--list_article_title_5-->/u';
                $replacements[74] = '';
                $patterns[75] = '/<--list_article_title_6-->/u';
                $replacements[75] = '';
                $patterns[76] = '/<--list_article_title_7-->/u';
                $replacements[76] = '';
                $patterns[77] = '/<--list_article_title_8-->/u';
                $replacements[77] = '';

                $patterns[78] = '/<--list_article_href_1-->/u';
                $replacements[78] = $article_domain_url . $title_rand_num[0];
                $patterns[79] = '/<--list_article_href_2-->/u';
                $replacements[79] = '';
                $patterns[80] = '/<--list_article_href_3-->/u';
                $replacements[80] = '';
                $patterns[81] = '/<--list_article_href_4-->/u';
                $replacements[81] = '';
                $patterns[82] = '/<--list_article_href_5-->/u';
                $replacements[82] = '';
                $patterns[83] = '/<--list_article_href_6-->/u';
                $replacements[83] = '';
                $patterns[84] = '/<--list_article_href_7-->/u';
                $replacements[84] = '';
                $patterns[85] = '/<--list_article_href_8-->/u';
                $replacements[85] = '';

                $patterns[86] = '/<--list_article_desc_1-->/u';
                $replacements[86] = $article_ready[0];
                $patterns[87] = '/<--list_article_desc_2-->/u';
                $replacements[87] = '';
                $patterns[88] = '/<--list_article_desc_3-->/u';
                $replacements[88] = '';
                $patterns[89] = '/<--list_article_desc_4-->/u';
                $replacements[89] = '';
                $patterns[90] = '/<--list_article_desc_5-->/u';
                $replacements[90] = '';
                $patterns[91] = '/<--list_article_desc_6-->/u';
                $replacements[91] = '';
                $patterns[92] = '/<--list_article_desc_7-->/u';
                $replacements[92] = '';
                $patterns[93] = '/<--list_article_desc_8-->/u';
                $replacements[93] = '';

                $patterns[94] = '/<--list_url-->/u';
                $replacements[94] = $city_en . '.' . $city_first_do_main . '/list/';
                $patterns[95] = '/<--shang_yi_ye-->/u';
                $replacements[95] = $city_en . '.' . $city_first_do_main . '/list/0.html';
                $patterns[96] = '/<--xia_yi_ye-->/u';
                $replacements[96] = $city_en . '.' . $city_first_do_main . '/list/0.html';
            }

            if (count($title) % 8 == 2 && count($title) > 8) {
                $patterns[70] = '/<--list_article_title_1-->/u';
                $replacements[70] = $title_ready[0];
                $patterns[71] = '/<--list_article_title_2-->/u';
                $replacements[71] = $title_ready[1];
                $patterns[72] = '/<--list_article_title_3-->/u';
                $replacements[72] = $title_ready[2];
                $patterns[73] = '/<--list_article_title_4-->/u';
                $replacements[73] = $title_ready[3];
                $patterns[74] = '/<--list_article_title_5-->/u';
                $replacements[74] = $title_ready[4];
                $patterns[75] = '/<--list_article_title_6-->/u';
                $replacements[75] = $title_ready[5];
                $patterns[76] = '/<--list_article_title_7-->/u';
                $replacements[76] = $title_ready[6];
                $patterns[77] = '/<--list_article_title_8-->/u';
                $replacements[77] = $title_ready[7];

                $patterns[78] = '/<--list_article_href_1-->/u';
                $replacements[78] = $article_domain_url . $title_rand_num[0];
                $patterns[79] = '/<--list_article_href_2-->/u';
                $replacements[79] = $article_domain_url . $title_rand_num[1];
                $patterns[80] = '/<--list_article_href_3-->/u';
                $replacements[80] = $article_domain_url . $title_rand_num[2];
                $patterns[81] = '/<--list_article_href_4-->/u';
                $replacements[81] = $article_domain_url . $title_rand_num[3];
                $patterns[82] = '/<--list_article_href_5-->/u';
                $replacements[82] = $article_domain_url . $title_rand_num[4];
                $patterns[83] = '/<--list_article_href_6-->/u';
                $replacements[83] = $article_domain_url . $title_rand_num[5];
                $patterns[84] = '/<--list_article_href_7-->/u';
                $replacements[84] = $article_domain_url . $title_rand_num[6];
                $patterns[85] = '/<--list_article_href_8-->/u';
                $replacements[85] = $article_domain_url . $title_rand_num[7];

                $patterns[86] = '/<--list_article_desc_1-->/u';
                $replacements[86] = $article_ready[0];
                $patterns[87] = '/<--list_article_desc_2-->/u';
                $replacements[87] = $article_ready[1];
                $patterns[88] = '/<--list_article_desc_3-->/u';
                $replacements[88] = $article_ready[2];
                $patterns[89] = '/<--list_article_desc_4-->/u';
                $replacements[89] = $article_ready[3];
                $patterns[90] = '/<--list_article_desc_5-->/u';
                $replacements[90] = $article_ready[4];
                $patterns[91] = '/<--list_article_desc_6-->/u';
                $replacements[91] = $article_ready[5];
                $patterns[92] = '/<--list_article_desc_7-->/u';
                $replacements[92] = $article_ready[6];
                $patterns[93] = '/<--list_article_desc_8-->/u';
                $replacements[93] = $article_ready[7];
                $patterns[94] = '/<--list_url-->/u';
                $replacements[94] = $city_en . '.' . $city_first_do_main . '/list/';
                $patterns[95] = '/<--shang_yi_ye-->/u';
                $replacements[95] = $city_en . '.' . $city_first_do_main . '/list/0.html';
                $patterns[96] = '/<--xia_yi_ye-->/u';
                $replacements[96] = $city_en . '.' . $city_first_do_main . '/list/1.html';
            } else if (count($title) % 8 == 2 && count($title) <= 8) {
                $patterns[70] = '/<--list_article_title_1-->/u';
                $replacements[70] = $title_ready[0];
                $patterns[71] = '/<--list_article_title_2-->/u';
                $replacements[71] = $title_ready[1];
                $patterns[72] = '/<--list_article_title_3-->/u';
                $replacements[72] = '';
                $patterns[73] = '/<--list_article_title_4-->/u';
                $replacements[73] = '';
                $patterns[74] = '/<--list_article_title_5-->/u';
                $replacements[74] = '';
                $patterns[75] = '/<--list_article_title_6-->/u';
                $replacements[75] = '';
                $patterns[76] = '/<--list_article_title_7-->/u';
                $replacements[76] = '';
                $patterns[77] = '/<--list_article_title_8-->/u';
                $replacements[77] = '';

                $patterns[78] = '/<--list_article_href_1-->/u';
                $replacements[78] = $article_domain_url . $title_rand_num[0];
                $patterns[79] = '/<--list_article_href_2-->/u';
                $replacements[79] = $article_domain_url . $title_rand_num[1];
                $patterns[80] = '/<--list_article_href_3-->/u';
                $replacements[80] = '';
                $patterns[81] = '/<--list_article_href_4-->/u';
                $replacements[81] = '';
                $patterns[82] = '/<--list_article_href_5-->/u';
                $replacements[82] = '';
                $patterns[83] = '/<--list_article_href_6-->/u';
                $replacements[83] = '';
                $patterns[84] = '/<--list_article_href_7-->/u';
                $replacements[84] = '';
                $patterns[85] = '/<--list_article_href_8-->/u';
                $replacements[85] = '';

                $patterns[86] = '/<--list_article_desc_1-->/u';
                $replacements[86] = $article_ready[0];
                $patterns[87] = '/<--list_article_desc_2-->/u';
                $replacements[87] = $article_ready[1];
                $patterns[88] = '/<--list_article_desc_3-->/u';
                $replacements[88] = '';
                $patterns[89] = '/<--list_article_desc_4-->/u';
                $replacements[89] = '';
                $patterns[90] = '/<--list_article_desc_5-->/u';
                $replacements[90] = '';
                $patterns[91] = '/<--list_article_desc_6-->/u';
                $replacements[91] = '';
                $patterns[92] = '/<--list_article_desc_7-->/u';
                $replacements[92] = '';
                $patterns[93] = '/<--list_article_desc_8-->/u';
                $replacements[93] = '';

                $patterns[94] = '/<--list_url-->/u';
                $replacements[94] = $city_en . '.' . $city_first_do_main . '/list/';
                $patterns[95] = '/<--shang_yi_ye-->/u';
                $replacements[95] = $city_en . '.' . $city_first_do_main . '/list/0.html';
                $patterns[96] = '/<--xia_yi_ye-->/u';
                $replacements[96] = $city_en . '.' . $city_first_do_main . '/list/0.html';
            }

            if (count($title) % 8 == 3 && count($title) > 8) {
                $patterns[70] = '/<--list_article_title_1-->/u';
                $replacements[70] = $title_ready[0];
                $patterns[71] = '/<--list_article_title_2-->/u';
                $replacements[71] = $title_ready[1];
                $patterns[72] = '/<--list_article_title_3-->/u';
                $replacements[72] = $title_ready[2];
                $patterns[73] = '/<--list_article_title_4-->/u';
                $replacements[73] = $title_ready[3];
                $patterns[74] = '/<--list_article_title_5-->/u';
                $replacements[74] = $title_ready[4];
                $patterns[75] = '/<--list_article_title_6-->/u';
                $replacements[75] = $title_ready[5];
                $patterns[76] = '/<--list_article_title_7-->/u';
                $replacements[76] = $title_ready[6];
                $patterns[77] = '/<--list_article_title_8-->/u';
                $replacements[77] = $title_ready[7];

                $patterns[78] = '/<--list_article_href_1-->/u';
                $replacements[78] = $article_domain_url . $title_rand_num[0];
                $patterns[79] = '/<--list_article_href_2-->/u';
                $replacements[79] = $article_domain_url . $title_rand_num[1];
                $patterns[80] = '/<--list_article_href_3-->/u';
                $replacements[80] = $article_domain_url . $title_rand_num[2];
                $patterns[81] = '/<--list_article_href_4-->/u';
                $replacements[81] = $article_domain_url . $title_rand_num[3];
                $patterns[82] = '/<--list_article_href_5-->/u';
                $replacements[82] = $article_domain_url . $title_rand_num[4];
                $patterns[83] = '/<--list_article_href_6-->/u';
                $replacements[83] = $article_domain_url . $title_rand_num[5];
                $patterns[84] = '/<--list_article_href_7-->/u';
                $replacements[84] = $article_domain_url . $title_rand_num[6];
                $patterns[85] = '/<--list_article_href_8-->/u';
                $replacements[85] = $article_domain_url . $title_rand_num[7];

                $patterns[86] = '/<--list_article_desc_1-->/u';
                $replacements[86] = $article_ready[0];
                $patterns[87] = '/<--list_article_desc_2-->/u';
                $replacements[87] = $article_ready[1];
                $patterns[88] = '/<--list_article_desc_3-->/u';
                $replacements[88] = $article_ready[2];
                $patterns[89] = '/<--list_article_desc_4-->/u';
                $replacements[89] = $article_ready[3];
                $patterns[90] = '/<--list_article_desc_5-->/u';
                $replacements[90] = $article_ready[4];
                $patterns[91] = '/<--list_article_desc_6-->/u';
                $replacements[91] = $article_ready[5];
                $patterns[92] = '/<--list_article_desc_7-->/u';
                $replacements[92] = $article_ready[6];
                $patterns[93] = '/<--list_article_desc_8-->/u';
                $replacements[93] = $article_ready[7];

                $patterns[94] = '/<--list_url-->/u';
                $replacements[94] = $city_en . '.' . $city_first_do_main . '/list/';
                $patterns[95] = '/<--shang_yi_ye-->/u';
                $replacements[95] = $city_en . '.' . $city_first_do_main . '/list/0.html';
                $patterns[96] = '/<--xia_yi_ye-->/u';
                $replacements[96] = $city_en . '.' . $city_first_do_main . '/list/1.html';
            } else if (count($title) % 8 == 3 && count($title) <= 8) {
                $patterns[70] = '/<--list_article_title_1-->/u';
                $replacements[70] = $title_ready[0];
                $patterns[71] = '/<--list_article_title_2-->/u';
                $replacements[71] = $title_ready[1];
                $patterns[72] = '/<--list_article_title_3-->/u';
                $replacements[72] = $title_ready[2];
                $patterns[73] = '/<--list_article_title_4-->/u';
                $replacements[73] = '';
                $patterns[74] = '/<--list_article_title_5-->/u';
                $replacements[74] = '';
                $patterns[75] = '/<--list_article_title_6-->/u';
                $replacements[75] = '';
                $patterns[76] = '/<--list_article_title_7-->/u';
                $replacements[76] = '';
                $patterns[77] = '/<--list_article_title_8-->/u';
                $replacements[77] = '';

                $patterns[78] = '/<--list_article_href_1-->/u';
                $replacements[78] = $article_domain_url . $title_rand_num[0];
                $patterns[79] = '/<--list_article_href_2-->/u';
                $replacements[79] = $article_domain_url . $title_rand_num[1];
                $patterns[80] = '/<--list_article_href_3-->/u';
                $replacements[80] = $article_domain_url . $title_rand_num[2];
                $patterns[81] = '/<--list_article_href_4-->/u';
                $replacements[81] = '';
                $patterns[82] = '/<--list_article_href_5-->/u';
                $replacements[82] = '';
                $patterns[83] = '/<--list_article_href_6-->/u';
                $replacements[83] = '';
                $patterns[84] = '/<--list_article_href_7-->/u';
                $replacements[84] = '';
                $patterns[85] = '/<--list_article_href_8-->/u';
                $replacements[85] = '';

                $patterns[86] = '/<--list_article_desc_1-->/u';
                $replacements[86] = $article_ready[0];
                $patterns[87] = '/<--list_article_desc_2-->/u';
                $replacements[87] = $article_ready[1];
                $patterns[88] = '/<--list_article_desc_3-->/u';
                $replacements[88] = $article_ready[2];
                $patterns[89] = '/<--list_article_desc_4-->/u';
                $replacements[89] = '';
                $patterns[90] = '/<--list_article_desc_5-->/u';
                $replacements[90] = '';
                $patterns[91] = '/<--list_article_desc_6-->/u';
                $replacements[91] = '';
                $patterns[92] = '/<--list_article_desc_7-->/u';
                $replacements[92] = '';
                $patterns[93] = '/<--list_article_desc_8-->/u';
                $replacements[93] = '';

                $patterns[94] = '/<--list_url-->/u';
                $replacements[94] = $city_en . '.' . $city_first_do_main . '/list/';
                $patterns[95] = '/<--shang_yi_ye-->/u';
                $replacements[95] = $city_en . '.' . $city_first_do_main . '/list/0.html';
                $patterns[96] = '/<--xia_yi_ye-->/u';
                $replacements[96] = $city_en . '.' . $city_first_do_main . '/list/0.html';
            }
            if (count($title) % 8 == 4 && count($title) > 8) {
                $patterns[70] = '/<--list_article_title_1-->/u';
                $replacements[70] = $title_ready[0];
                $patterns[71] = '/<--list_article_title_2-->/u';
                $replacements[71] = $title_ready[1];
                $patterns[72] = '/<--list_article_title_3-->/u';
                $replacements[72] = $title_ready[2];
                $patterns[73] = '/<--list_article_title_4-->/u';
                $replacements[73] = $title_ready[3];
                $patterns[74] = '/<--list_article_title_5-->/u';
                $replacements[74] = $title_ready[4];
                $patterns[75] = '/<--list_article_title_6-->/u';
                $replacements[75] = $title_ready[5];
                $patterns[76] = '/<--list_article_title_7-->/u';
                $replacements[76] = $title_ready[6];
                $patterns[77] = '/<--list_article_title_8-->/u';
                $replacements[77] = $title_ready[7];

                $patterns[78] = '/<--list_article_href_1-->/u';
                $replacements[78] = $article_domain_url . $title_rand_num[0];
                $patterns[79] = '/<--list_article_href_2-->/u';
                $replacements[79] = $article_domain_url . $title_rand_num[1];
                $patterns[80] = '/<--list_article_href_3-->/u';
                $replacements[80] = $article_domain_url . $title_rand_num[2];
                $patterns[81] = '/<--list_article_href_4-->/u';
                $replacements[81] = $article_domain_url . $title_rand_num[3];
                $patterns[82] = '/<--list_article_href_5-->/u';
                $replacements[82] = $article_domain_url . $title_rand_num[4];
                $patterns[83] = '/<--list_article_href_6-->/u';
                $replacements[83] = $article_domain_url . $title_rand_num[5];
                $patterns[84] = '/<--list_article_href_7-->/u';
                $replacements[84] = $article_domain_url . $title_rand_num[6];
                $patterns[85] = '/<--list_article_href_8-->/u';
                $replacements[85] = $article_domain_url . $title_rand_num[7];

                $patterns[86] = '/<--list_article_desc_1-->/u';
                $replacements[86] = $article_ready[0];
                $patterns[87] = '/<--list_article_desc_2-->/u';
                $replacements[87] = $article_ready[1];
                $patterns[88] = '/<--list_article_desc_3-->/u';
                $replacements[88] = $article_ready[2];
                $patterns[89] = '/<--list_article_desc_4-->/u';
                $replacements[89] = $article_ready[3];
                $patterns[90] = '/<--list_article_desc_5-->/u';
                $replacements[90] = $article_ready[4];
                $patterns[91] = '/<--list_article_desc_6-->/u';
                $replacements[91] = $article_ready[5];
                $patterns[92] = '/<--list_article_desc_7-->/u';
                $replacements[92] = $article_ready[6];
                $patterns[93] = '/<--list_article_desc_8-->/u';
                $replacements[93] = $article_ready[7];

                $patterns[94] = '/<--list_url-->/u';
                $replacements[94] = $city_en . '.' . $city_first_do_main . '/list/';
                $patterns[95] = '/<--shang_yi_ye-->/u';
                $replacements[95] = $city_en . '.' . $city_first_do_main . '/list/0.html';
                $patterns[96] = '/<--xia_yi_ye-->/u';
                $replacements[96] = $city_en . '.' . $city_first_do_main . '/list/1.html';
            } else if (count($title) % 8 == 4 && count($title) <= 8) {
                $patterns[70] = '/<--list_article_title_1-->/u';
                $replacements[70] = $title_ready[0];
                $patterns[71] = '/<--list_article_title_2-->/u';
                $replacements[71] = $title_ready[1];
                $patterns[72] = '/<--list_article_title_3-->/u';
                $replacements[72] = $title_ready[2];
                $patterns[73] = '/<--list_article_title_4-->/u';
                $replacements[73] = $title_ready[3];
                $patterns[74] = '/<--list_article_title_5-->/u';
                $replacements[74] = '';
                $patterns[75] = '/<--list_article_title_6-->/u';
                $replacements[75] = '';
                $patterns[76] = '/<--list_article_title_7-->/u';
                $replacements[76] = '';
                $patterns[77] = '/<--list_article_title_8-->/u';
                $replacements[77] = '';

                $patterns[78] = '/<--list_article_href_1-->/u';
                $replacements[78] = $article_domain_url . $title_rand_num[0];
                $patterns[79] = '/<--list_article_href_2-->/u';
                $replacements[79] = $article_domain_url . $title_rand_num[1];
                $patterns[80] = '/<--list_article_href_3-->/u';
                $replacements[80] = $article_domain_url . $title_rand_num[2];
                $patterns[81] = '/<--list_article_href_4-->/u';
                $replacements[81] = $article_domain_url . $title_rand_num[3];
                $patterns[82] = '/<--list_article_href_5-->/u';
                $replacements[82] = '';
                $patterns[83] = '/<--list_article_href_6-->/u';
                $replacements[83] = '';
                $patterns[84] = '/<--list_article_href_7-->/u';
                $replacements[84] = '';
                $patterns[85] = '/<--list_article_href_8-->/u';
                $replacements[85] = '';

                $patterns[86] = '/<--list_article_desc_1-->/u';
                $replacements[86] = $article_ready[0];
                $patterns[87] = '/<--list_article_desc_2-->/u';
                $replacements[87] = $article_ready[1];
                $patterns[88] = '/<--list_article_desc_3-->/u';
                $replacements[88] = $article_ready[2];
                $patterns[89] = '/<--list_article_desc_4-->/u';
                $replacements[89] = $article_ready[3];
                $patterns[90] = '/<--list_article_desc_5-->/u';
                $replacements[90] = '';
                $patterns[91] = '/<--list_article_desc_6-->/u';
                $replacements[91] = '';
                $patterns[92] = '/<--list_article_desc_7-->/u';
                $replacements[92] = '';
                $patterns[93] = '/<--list_article_desc_8-->/u';
                $replacements[93] = '';

                $patterns[94] = '/<--list_url-->/u';
                $replacements[94] = $city_en . '.' . $city_first_do_main . '/list/';
                $patterns[95] = '/<--shang_yi_ye-->/u';
                $replacements[95] = $city_en . '.' . $city_first_do_main . '/list/0.html';
                $patterns[96] = '/<--xia_yi_ye-->/u';
                $replacements[96] = $city_en . '.' . $city_first_do_main . '/list/0.html';
            }
            if (count($title) % 8 == 5 && count($title) > 8) {
                $patterns[70] = '/<--list_article_title_1-->/u';
                $replacements[70] = $title_ready[0];
                $patterns[71] = '/<--list_article_title_2-->/u';
                $replacements[71] = $title_ready[1];
                $patterns[72] = '/<--list_article_title_3-->/u';
                $replacements[72] = $title_ready[2];
                $patterns[73] = '/<--list_article_title_4-->/u';
                $replacements[73] = $title_ready[3];
                $patterns[74] = '/<--list_article_title_5-->/u';
                $replacements[74] = $title_ready[4];
                $patterns[75] = '/<--list_article_title_6-->/u';
                $replacements[75] = $title_ready[5];
                $patterns[76] = '/<--list_article_title_7-->/u';
                $replacements[76] = $title_ready[6];
                $patterns[77] = '/<--list_article_title_8-->/u';
                $replacements[77] = $title_ready[7];

                $patterns[78] = '/<--list_article_href_1-->/u';
                $replacements[78] = $article_domain_url . $title_rand_num[0];
                $patterns[79] = '/<--list_article_href_2-->/u';
                $replacements[79] = $article_domain_url . $title_rand_num[1];
                $patterns[80] = '/<--list_article_href_3-->/u';
                $replacements[80] = $article_domain_url . $title_rand_num[2];
                $patterns[81] = '/<--list_article_href_4-->/u';
                $replacements[81] = $article_domain_url . $title_rand_num[3];
                $patterns[82] = '/<--list_article_href_5-->/u';
                $replacements[82] = $article_domain_url . $title_rand_num[4];
                $patterns[83] = '/<--list_article_href_6-->/u';
                $replacements[83] = $article_domain_url . $title_rand_num[5];
                $patterns[84] = '/<--list_article_href_7-->/u';
                $replacements[84] = $article_domain_url . $title_rand_num[6];
                $patterns[85] = '/<--list_article_href_8-->/u';
                $replacements[85] = $article_domain_url . $title_rand_num[7];

                $patterns[86] = '/<--list_article_desc_1-->/u';
                $replacements[86] = $article_ready[0];
                $patterns[87] = '/<--list_article_desc_2-->/u';
                $replacements[87] = $article_ready[1];
                $patterns[88] = '/<--list_article_desc_3-->/u';
                $replacements[88] = $article_ready[2];
                $patterns[89] = '/<--list_article_desc_4-->/u';
                $replacements[89] = $article_ready[3];
                $patterns[90] = '/<--list_article_desc_5-->/u';
                $replacements[90] = $article_ready[4];
                $patterns[91] = '/<--list_article_desc_6-->/u';
                $replacements[91] = $article_ready[5];
                $patterns[92] = '/<--list_article_desc_7-->/u';
                $replacements[92] = $article_ready[6];
                $patterns[93] = '/<--list_article_desc_8-->/u';
                $replacements[93] = $article_ready[7];
                $patterns[94] = '/<--list_url-->/u';
                $replacements[94] = $city_en . '.' . $city_first_do_main . '/list/';
                $patterns[95] = '/<--shang_yi_ye-->/u';
                $replacements[95] = $city_en . '.' . $city_first_do_main . '/list/0.html';
                $patterns[96] = '/<--xia_yi_ye-->/u';
                $replacements[96] = $city_en . '.' . $city_first_do_main . '/list/1.html';
            } else if (count($title) % 8 == 5 && count($title) <= 8) {
                $patterns[70] = '/<--list_article_title_1-->/u';
                $replacements[70] = $title_ready[0];
                $patterns[71] = '/<--list_article_title_2-->/u';
                $replacements[71] = $title_ready[1];
                $patterns[72] = '/<--list_article_title_3-->/u';
                $replacements[72] = $title_ready[2];
                $patterns[73] = '/<--list_article_title_4-->/u';
                $replacements[73] = $title_ready[3];
                $patterns[74] = '/<--list_article_title_5-->/u';
                $replacements[74] = $title_ready[4];
                $patterns[75] = '/<--list_article_title_6-->/u';
                $replacements[75] = '';
                $patterns[76] = '/<--list_article_title_7-->/u';
                $replacements[76] = '';
                $patterns[77] = '/<--list_article_title_8-->/u';
                $replacements[77] = '';

                $patterns[78] = '/<--list_article_href_1-->/u';
                $replacements[78] = $article_domain_url . $title_rand_num[0];
                $patterns[79] = '/<--list_article_href_2-->/u';
                $replacements[79] = $article_domain_url . $title_rand_num[1];
                $patterns[80] = '/<--list_article_href_3-->/u';
                $replacements[80] = $article_domain_url . $title_rand_num[2];
                $patterns[81] = '/<--list_article_href_4-->/u';
                $replacements[81] = $article_domain_url . $title_rand_num[3];
                $patterns[82] = '/<--list_article_href_5-->/u';
                $replacements[82] = $article_domain_url . $title_rand_num[4];
                $patterns[83] = '/<--list_article_href_6-->/u';
                $replacements[83] = '';
                $patterns[84] = '/<--list_article_href_7-->/u';
                $replacements[84] = '';
                $patterns[85] = '/<--list_article_href_8-->/u';
                $replacements[85] = '';

                $patterns[86] = '/<--list_article_desc_1-->/u';
                $replacements[86] = $article_ready[0];
                $patterns[87] = '/<--list_article_desc_2-->/u';
                $replacements[87] = $article_ready[1];
                $patterns[88] = '/<--list_article_desc_3-->/u';
                $replacements[88] = $article_ready[2];
                $patterns[89] = '/<--list_article_desc_4-->/u';
                $replacements[89] = $article_ready[3];
                $patterns[90] = '/<--list_article_desc_5-->/u';
                $replacements[90] = $article_ready[4];
                $patterns[91] = '/<--list_article_desc_6-->/u';
                $replacements[91] = '';
                $patterns[92] = '/<--list_article_desc_7-->/u';
                $replacements[92] = '';
                $patterns[93] = '/<--list_article_desc_8-->/u';
                $replacements[93] = '';

                $patterns[94] = '/<--list_url-->/u';
                $replacements[94] = $city_en . '.' . $city_first_do_main . '/list/';
                $patterns[95] = '/<--shang_yi_ye-->/u';
                $replacements[95] = $city_en . '.' . $city_first_do_main . '/list/0.html';
                $patterns[96] = '/<--xia_yi_ye-->/u';
                $replacements[96] = $city_en . '.' . $city_first_do_main . '/list/0.html';
            }
            if (count($title) % 8 == 6 && count($title) > 8) {
                $patterns[70] = '/<--list_article_title_1-->/u';
                $replacements[70] = $title_ready[0];
                $patterns[71] = '/<--list_article_title_2-->/u';
                $replacements[71] = $title_ready[1];
                $patterns[72] = '/<--list_article_title_3-->/u';
                $replacements[72] = $title_ready[2];
                $patterns[73] = '/<--list_article_title_4-->/u';
                $replacements[73] = $title_ready[3];
                $patterns[74] = '/<--list_article_title_5-->/u';
                $replacements[74] = $title_ready[4];
                $patterns[75] = '/<--list_article_title_6-->/u';
                $replacements[75] = $title_ready[5];
                $patterns[76] = '/<--list_article_title_7-->/u';
                $replacements[76] = $title_ready[6];
                $patterns[77] = '/<--list_article_title_8-->/u';
                $replacements[77] = $title_ready[7];

                $patterns[78] = '/<--list_article_href_1-->/u';
                $replacements[78] = $article_domain_url . $title_rand_num[0];
                $patterns[79] = '/<--list_article_href_2-->/u';
                $replacements[79] = $article_domain_url . $title_rand_num[1];
                $patterns[80] = '/<--list_article_href_3-->/u';
                $replacements[80] = $article_domain_url . $title_rand_num[2];
                $patterns[81] = '/<--list_article_href_4-->/u';
                $replacements[81] = $article_domain_url . $title_rand_num[3];
                $patterns[82] = '/<--list_article_href_5-->/u';
                $replacements[82] = $article_domain_url . $title_rand_num[4];
                $patterns[83] = '/<--list_article_href_6-->/u';
                $replacements[83] = $article_domain_url . $title_rand_num[5];
                $patterns[84] = '/<--list_article_href_7-->/u';
                $replacements[84] = $article_domain_url . $title_rand_num[6];
                $patterns[85] = '/<--list_article_href_8-->/u';
                $replacements[85] = $article_domain_url . $title_rand_num[7];

                $patterns[86] = '/<--list_article_desc_1-->/u';
                $replacements[86] = $article_ready[0];
                $patterns[87] = '/<--list_article_desc_2-->/u';
                $replacements[87] = $article_ready[1];
                $patterns[88] = '/<--list_article_desc_3-->/u';
                $replacements[88] = $article_ready[2];
                $patterns[89] = '/<--list_article_desc_4-->/u';
                $replacements[89] = $article_ready[3];
                $patterns[90] = '/<--list_article_desc_5-->/u';
                $replacements[90] = $article_ready[4];
                $patterns[91] = '/<--list_article_desc_6-->/u';
                $replacements[91] = $article_ready[5];
                $patterns[92] = '/<--list_article_desc_7-->/u';
                $replacements[92] = $article_ready[6];
                $patterns[93] = '/<--list_article_desc_8-->/u';
                $replacements[93] = $article_ready[7];

                $patterns[94] = '/<--list_url-->/u';
                $replacements[94] = $city_en . '.' . $city_first_do_main . '/list/';
                $patterns[95] = '/<--shang_yi_ye-->/u';
                $replacements[95] = $city_en . '.' . $city_first_do_main . '/list/0.html';
                $patterns[96] = '/<--xia_yi_ye-->/u';
                $replacements[96] = $city_en . '.' . $city_first_do_main . '/list/1.html';
            } else if (count($title) % 8 == 6 && count($title) <= 8) {
                $patterns[70] = '/<--list_article_title_1-->/u';
                $replacements[70] = $title_ready[0];
                $patterns[71] = '/<--list_article_title_2-->/u';
                $replacements[71] = $title_ready[1];
                $patterns[72] = '/<--list_article_title_3-->/u';
                $replacements[72] = $title_ready[2];
                $patterns[73] = '/<--list_article_title_4-->/u';
                $replacements[73] = $title_ready[3];
                $patterns[74] = '/<--list_article_title_5-->/u';
                $replacements[74] = $title_ready[4];
                $patterns[75] = '/<--list_article_title_6-->/u';
                $replacements[75] = $title_ready[5];
                $patterns[76] = '/<--list_article_title_7-->/u';
                $replacements[76] = '';
                $patterns[77] = '/<--list_article_title_8-->/u';
                $replacements[77] = '';

                $patterns[78] = '/<--list_article_href_1-->/u';
                $replacements[78] = $article_domain_url . $title_rand_num[0];
                $patterns[79] = '/<--list_article_href_2-->/u';
                $replacements[79] = $article_domain_url . $title_rand_num[1];
                $patterns[80] = '/<--list_article_href_3-->/u';
                $replacements[80] = $article_domain_url . $title_rand_num[2];
                $patterns[81] = '/<--list_article_href_4-->/u';
                $replacements[81] = $article_domain_url . $title_rand_num[3];
                $patterns[82] = '/<--list_article_href_5-->/u';
                $replacements[82] = $article_domain_url . $title_rand_num[4];
                $patterns[83] = '/<--list_article_href_6-->/u';
                $replacements[83] = $article_domain_url . $title_rand_num[5];
                $patterns[84] = '/<--list_article_href_7-->/u';
                $replacements[84] = '';
                $patterns[85] = '/<--list_article_href_8-->/u';
                $replacements[85] = '';

                $patterns[86] = '/<--list_article_desc_1-->/u';
                $replacements[86] = $article_ready[0];
                $patterns[87] = '/<--list_article_desc_2-->/u';
                $replacements[87] = $article_ready[1];
                $patterns[88] = '/<--list_article_desc_3-->/u';
                $replacements[88] = $article_ready[2];
                $patterns[89] = '/<--list_article_desc_4-->/u';
                $replacements[89] = $article_ready[3];
                $patterns[90] = '/<--list_article_desc_5-->/u';
                $replacements[90] = $article_ready[4];
                $patterns[91] = '/<--list_article_desc_6-->/u';
                $replacements[91] = $article_ready[5];
                $patterns[92] = '/<--list_article_desc_7-->/u';
                $replacements[92] = '';
                $patterns[93] = '/<--list_article_desc_8-->/u';
                $replacements[93] = '';

                $patterns[94] = '/<--list_url-->/u';
                $replacements[94] = $city_en . '.' . $city_first_do_main . '/list/';
                $patterns[95] = '/<--shang_yi_ye-->/u';
                $replacements[95] = $city_en . '.' . $city_first_do_main . '/list/0.html';
                $patterns[96] = '/<--xia_yi_ye-->/u';
                $replacements[96] = $city_en . '.' . $city_first_do_main . '/list/0.html';
            }
            if (count($title) % 8 == 7 && count($title) > 8) {
                $patterns[70] = '/<--list_article_title_1-->/u';
                $replacements[70] = $title_ready[0];
                $patterns[71] = '/<--list_article_title_2-->/u';
                $replacements[71] = $title_ready[1];
                $patterns[72] = '/<--list_article_title_3-->/u';
                $replacements[72] = $title_ready[2];
                $patterns[73] = '/<--list_article_title_4-->/u';
                $replacements[73] = $title_ready[3];
                $patterns[74] = '/<--list_article_title_5-->/u';
                $replacements[74] = $title_ready[4];
                $patterns[75] = '/<--list_article_title_6-->/u';
                $replacements[75] = $title_ready[5];
                $patterns[76] = '/<--list_article_title_7-->/u';
                $replacements[76] = $title_ready[6];
                $patterns[77] = '/<--list_article_title_8-->/u';
                $replacements[77] = $title_ready[7];

                $patterns[78] = '/<--list_article_href_1-->/u';
                $replacements[78] = $article_domain_url . $title_rand_num[0];
                $patterns[79] = '/<--list_article_href_2-->/u';
                $replacements[79] = $article_domain_url . $title_rand_num[1];
                $patterns[80] = '/<--list_article_href_3-->/u';
                $replacements[80] = $article_domain_url . $title_rand_num[2];
                $patterns[81] = '/<--list_article_href_4-->/u';
                $replacements[81] = $article_domain_url . $title_rand_num[3];
                $patterns[82] = '/<--list_article_href_5-->/u';
                $replacements[82] = $article_domain_url . $title_rand_num[4];
                $patterns[83] = '/<--list_article_href_6-->/u';
                $replacements[83] = $article_domain_url . $title_rand_num[5];
                $patterns[84] = '/<--list_article_href_7-->/u';
                $replacements[84] = $article_domain_url . $title_rand_num[6];
                $patterns[85] = '/<--list_article_href_8-->/u';
                $replacements[85] = $article_domain_url . $title_rand_num[7];

                $patterns[86] = '/<--list_article_desc_1-->/u';
                $replacements[86] = $article_ready[0];
                $patterns[87] = '/<--list_article_desc_2-->/u';
                $replacements[87] = $article_ready[1];
                $patterns[88] = '/<--list_article_desc_3-->/u';
                $replacements[88] = $article_ready[2];
                $patterns[89] = '/<--list_article_desc_4-->/u';
                $replacements[89] = $article_ready[3];
                $patterns[90] = '/<--list_article_desc_5-->/u';
                $replacements[90] = $article_ready[4];
                $patterns[91] = '/<--list_article_desc_6-->/u';
                $replacements[91] = $article_ready[5];
                $patterns[92] = '/<--list_article_desc_7-->/u';
                $replacements[92] = $article_ready[6];
                $patterns[93] = '/<--list_article_desc_8-->/u';
                $replacements[93] = $article_ready[7];

                $patterns[94] = '/<--list_url-->/u';
                $replacements[94] = $city_en . '.' . $city_first_do_main . '/list/';
                $patterns[95] = '/<--shang_yi_ye-->/u';
                $replacements[95] = $city_en . '.' . $city_first_do_main . '/list/0.html';
                $patterns[96] = '/<--xia_yi_ye-->/u';
                $replacements[96] = $city_en . '.' . $city_first_do_main . '/list/1.html';
            } else if (count($title) % 8 == 7 && count($title) <= 8) {
                $patterns[70] = '/<--list_article_title_1-->/u';
                $replacements[70] = $title_ready[0];
                $patterns[71] = '/<--list_article_title_2-->/u';
                $replacements[71] = $title_ready[1];
                $patterns[72] = '/<--list_article_title_3-->/u';
                $replacements[72] = $title_ready[2];
                $patterns[73] = '/<--list_article_title_4-->/u';
                $replacements[73] = $title_ready[3];
                $patterns[74] = '/<--list_article_title_5-->/u';
                $replacements[74] = $title_ready[4];
                $patterns[75] = '/<--list_article_title_6-->/u';
                $replacements[75] = $title_ready[5];
                $patterns[76] = '/<--list_article_title_7-->/u';
                $replacements[76] = $title_ready[6];
                $patterns[77] = '/<--list_article_title_8-->/u';
                $replacements[77] = '';

                $patterns[78] = '/<--list_article_href_1-->/u';
                $replacements[78] = $article_domain_url . $title_rand_num[0];
                $patterns[79] = '/<--list_article_href_2-->/u';
                $replacements[79] = $article_domain_url . $title_rand_num[1];
                $patterns[80] = '/<--list_article_href_3-->/u';
                $replacements[80] = $article_domain_url . $title_rand_num[2];
                $patterns[81] = '/<--list_article_href_4-->/u';
                $replacements[81] = $article_domain_url . $title_rand_num[3];
                $patterns[82] = '/<--list_article_href_5-->/u';
                $replacements[82] = $article_domain_url . $title_rand_num[4];
                $patterns[83] = '/<--list_article_href_6-->/u';
                $replacements[83] = $article_domain_url . $title_rand_num[5];
                $patterns[84] = '/<--list_article_href_7-->/u';
                $replacements[84] = $article_domain_url . $title_rand_num[6];
                $patterns[85] = '/<--list_article_href_8-->/u';
                $replacements[85] = '';

                $patterns[86] = '/<--list_article_desc_1-->/u';
                $replacements[86] = $article_ready[0];
                $patterns[87] = '/<--list_article_desc_2-->/u';
                $replacements[87] = $article_ready[1];
                $patterns[88] = '/<--list_article_desc_3-->/u';
                $replacements[88] = $article_ready[2];
                $patterns[89] = '/<--list_article_desc_4-->/u';
                $replacements[89] = $article_ready[3];
                $patterns[90] = '/<--list_article_desc_5-->/u';
                $replacements[90] = $article_ready[4];
                $patterns[91] = '/<--list_article_desc_6-->/u';
                $replacements[91] = $article_ready[5];
                $patterns[92] = '/<--list_article_desc_7-->/u';
                $replacements[92] = $article_ready[6];
                $patterns[93] = '/<--list_article_desc_8-->/u';
                $replacements[93] = '';

                $patterns[94] = '/<--list_url-->/u';
                $replacements[94] = $city_en . '.' . $city_first_do_main . '/list/';
                $patterns[95] = '/<--shang_yi_ye-->/u';
                $replacements[95] = $city_en . '.' . $city_first_do_main . '/list/0.html';
                $patterns[96] = '/<--xia_yi_ye-->/u';
                $replacements[96] = $city_en . '.' . $city_first_do_main . '/list/0.html';
            }
            if (count($title) % 8 == 0 && count($title) > 8) {
                $patterns[70] = '/<--list_article_title_1-->/u';
                $replacements[70] = $title_ready[0];
                $patterns[71] = '/<--list_article_title_2-->/u';
                $replacements[71] = $title_ready[1];
                $patterns[72] = '/<--list_article_title_3-->/u';
                $replacements[72] = $title_ready[2];
                $patterns[73] = '/<--list_article_title_4-->/u';
                $replacements[73] = $title_ready[3];
                $patterns[74] = '/<--list_article_title_5-->/u';
                $replacements[74] = $title_ready[4];
                $patterns[75] = '/<--list_article_title_6-->/u';
                $replacements[75] = $title_ready[5];
                $patterns[76] = '/<--list_article_title_7-->/u';
                $replacements[76] = $title_ready[6];
                $patterns[77] = '/<--list_article_title_8-->/u';
                $replacements[77] = $title_ready[7];

                $patterns[78] = '/<--list_article_href_1-->/u';
                $replacements[78] = $article_domain_url . $title_rand_num[0];
                $patterns[79] = '/<--list_article_href_2-->/u';
                $replacements[79] = $article_domain_url . $title_rand_num[1];
                $patterns[80] = '/<--list_article_href_3-->/u';
                $replacements[80] = $article_domain_url . $title_rand_num[2];
                $patterns[81] = '/<--list_article_href_4-->/u';
                $replacements[81] = $article_domain_url . $title_rand_num[3];
                $patterns[82] = '/<--list_article_href_5-->/u';
                $replacements[82] = $article_domain_url . $title_rand_num[4];
                $patterns[83] = '/<--list_article_href_6-->/u';
                $replacements[83] = $article_domain_url . $title_rand_num[5];
                $patterns[84] = '/<--list_article_href_7-->/u';
                $replacements[84] = $article_domain_url . $title_rand_num[6];
                $patterns[85] = '/<--list_article_href_8-->/u';
                $replacements[85] = $article_domain_url . $title_rand_num[7];

                $patterns[86] = '/<--list_article_desc_1-->/u';
                $replacements[86] = $article_ready[0];
                $patterns[87] = '/<--list_article_desc_2-->/u';
                $replacements[87] = $article_ready[1];
                $patterns[88] = '/<--list_article_desc_3-->/u';
                $replacements[88] = $article_ready[2];
                $patterns[89] = '/<--list_article_desc_4-->/u';
                $replacements[89] = $article_ready[3];
                $patterns[90] = '/<--list_article_desc_5-->/u';
                $replacements[90] = $article_ready[4];
                $patterns[91] = '/<--list_article_desc_6-->/u';
                $replacements[91] = $article_ready[5];
                $patterns[92] = '/<--list_article_desc_7-->/u';
                $replacements[92] = $article_ready[6];
                $patterns[93] = '/<--list_article_desc_8-->/u';
                $replacements[93] = $article_ready[7];

                $patterns[94] = '/<--list_url-->/u';
                $replacements[94] = $city_en . '.' . $city_first_do_main . '/list/';
                $patterns[95] = '/<--shang_yi_ye-->/u';
                $replacements[95] = $city_en . '.' . $city_first_do_main . '/list/0.html';
                $patterns[96] = '/<--xia_yi_ye-->/u';
                $replacements[96] = $city_en . '.' . $city_first_do_main . '/list/0.html';
            } else if (count($title) % 8 == 0 && count($title) <= 8) {
                $patterns[70] = '/<--list_article_title_1-->/u';
                $replacements[70] = $title_ready[0];
                $patterns[71] = '/<--list_article_title_2-->/u';
                $replacements[71] = $title_ready[1];
                $patterns[72] = '/<--list_article_title_3-->/u';
                $replacements[72] = $title_ready[2];
                $patterns[73] = '/<--list_article_title_4-->/u';
                $replacements[73] = $title_ready[3];
                $patterns[74] = '/<--list_article_title_5-->/u';
                $replacements[74] = $title_ready[4];
                $patterns[75] = '/<--list_article_title_6-->/u';
                $replacements[75] = $title_ready[5];
                $patterns[76] = '/<--list_article_title_7-->/u';
                $replacements[76] = $title_ready[6];
                $patterns[77] = '/<--list_article_title_8-->/u';
                $replacements[77] = $title_ready[7];

                $patterns[78] = '/<--list_article_href_1-->/u';
                $replacements[78] = $article_domain_url . $title_rand_num[0];
                $patterns[79] = '/<--list_article_href_2-->/u';
                $replacements[79] = $article_domain_url . $title_rand_num[1];
                $patterns[80] = '/<--list_article_href_3-->/u';
                $replacements[80] = $article_domain_url . $title_rand_num[2];
                $patterns[81] = '/<--list_article_href_4-->/u';
                $replacements[81] = $article_domain_url . $title_rand_num[3];
                $patterns[82] = '/<--list_article_href_5-->/u';
                $replacements[82] = $article_domain_url . $title_rand_num[4];
                $patterns[83] = '/<--list_article_href_6-->/u';
                $replacements[83] = $article_domain_url . $title_rand_num[5];
                $patterns[84] = '/<--list_article_href_7-->/u';
                $replacements[84] = $article_domain_url . $title_rand_num[6];
                $patterns[85] = '/<--list_article_href_8-->/u';
                $replacements[85] = $article_domain_url . $title_rand_num[7];

                $patterns[86] = '/<--list_article_desc_1-->/u';
                $replacements[86] = $article_ready[0];
                $patterns[87] = '/<--list_article_desc_2-->/u';
                $replacements[87] = $article_ready[1];
                $patterns[88] = '/<--list_article_desc_3-->/u';
                $replacements[88] = $article_ready[2];
                $patterns[89] = '/<--list_article_desc_4-->/u';
                $replacements[89] = $article_ready[3];
                $patterns[90] = '/<--list_article_desc_5-->/u';
                $replacements[90] = $article_ready[4];
                $patterns[91] = '/<--list_article_desc_6-->/u';
                $replacements[91] = $article_ready[5];
                $patterns[92] = '/<--list_article_desc_7-->/u';
                $replacements[92] = $article_ready[6];
                $patterns[93] = '/<--list_article_desc_8-->/u';
                $replacements[93] = $article_ready[7];

                $patterns[94] = '/<--list_url-->/u';
                $replacements[94] = $city_en . '.' . $city_first_do_main . '/list/';
                $patterns[95] = '/<--shang_yi_ye-->/u';
                $replacements[95] = $city_en . '.' . $city_first_do_main . '/list/0.html';
                $patterns[96] = '/<--xia_yi_ye-->/u';
                $replacements[96] = $city_en . '.' . $city_first_do_main . '/list/0.html';
            }
        } else if ($dang_qian_ye_shu == $fen_ye_num - 1) {
            $shang_yi_ye_temp = $dang_qian_ye_shu - 1;
            if (count($title) % 8 == 1) {
                $patterns[70] = '/<--list_article_title_1-->/u';
                $replacements[70] = $title_ready[$dang_qian_ye_shu * 8 + 1];
                $patterns[71] = '/<--list_article_title_2-->/u';
                $replacements[71] = '';
                $patterns[72] = '/<--list_article_title_3-->/u';
                $replacements[72] = '';
                $patterns[73] = '/<--list_article_title_4-->/u';
                $replacements[73] = '';
                $patterns[74] = '/<--list_article_title_5-->/u';
                $replacements[74] = '';
                $patterns[75] = '/<--list_article_title_6-->/u';
                $replacements[75] = '';
                $patterns[76] = '/<--list_article_title_7-->/u';
                $replacements[76] = '';
                $patterns[77] = '/<--list_article_title_8-->/u';
                $replacements[77] = '';

                $patterns[78] = '/<--list_article_href_1-->/u';
                $replacements[78] = $article_domain_url . $title_rand_num[$dang_qian_ye_shu * 8 + 1];
                $patterns[79] = '/<--list_article_href_2-->/u';
                $replacements[79] = '';
                $patterns[80] = '/<--list_article_href_3-->/u';
                $replacements[80] = '';
                $patterns[81] = '/<--list_article_href_4-->/u';
                $replacements[81] = '';
                $patterns[82] = '/<--list_article_href_5-->/u';
                $replacements[82] = '';
                $patterns[83] = '/<--list_article_href_6-->/u';
                $replacements[83] = '';
                $patterns[84] = '/<--list_article_href_7-->/u';
                $replacements[84] = '';
                $patterns[85] = '/<--list_article_href_8-->/u';
                $replacements[85] = '';

                $patterns[86] = '/<--list_article_desc_1-->/u';
                $replacements[86] = $article_ready[$dang_qian_ye_shu * 8 + 1];
                $patterns[87] = '/<--list_article_desc_2-->/u';
                $replacements[87] = '';
                $patterns[88] = '/<--list_article_desc_3-->/u';
                $replacements[88] = '';
                $patterns[89] = '/<--list_article_desc_4-->/u';
                $replacements[89] = '';
                $patterns[90] = '/<--list_article_desc_5-->/u';
                $replacements[90] = '';
                $patterns[91] = '/<--list_article_desc_6-->/u';
                $replacements[91] = '';
                $patterns[92] = '/<--list_article_desc_7-->/u';
                $replacements[92] = '';
                $patterns[93] = '/<--list_article_desc_8-->/u';
                $replacements[93] = '';

                $patterns[94] = '/<--list_url-->/u';
                $replacements[94] = $city_en . '.' . $city_first_do_main . '/list/';
                $patterns[95] = '/<--shang_yi_ye-->/u';
                $replacements[95] = $city_en . '.' . $city_first_do_main . '/list/' . $shang_yi_ye_temp . '.html';
                $patterns[96] = '/<--xia_yi_ye-->/u';
                $replacements[96] = $city_en . '.' . $city_first_do_main . '/list/' . $dang_qian_ye_shu . '.html';
            }
            if (count($title) % 8 == 2) {
                $patterns[70] = '/<--list_article_title_1-->/u';
                $replacements[70] = $title_ready[$dang_qian_ye_shu * 8 + 1];
                $patterns[71] = '/<--list_article_title_2-->/u';
                $replacements[71] = $title_ready[$dang_qian_ye_shu * 8 + 2];
                $patterns[72] = '/<--list_article_title_3-->/u';
                $replacements[72] = '';
                $patterns[73] = '/<--list_article_title_4-->/u';
                $replacements[73] = '';
                $patterns[74] = '/<--list_article_title_5-->/u';
                $replacements[74] = '';
                $patterns[75] = '/<--list_article_title_6-->/u';
                $replacements[75] = '';
                $patterns[76] = '/<--list_article_title_7-->/u';
                $replacements[76] = '';
                $patterns[77] = '/<--list_article_title_8-->/u';
                $replacements[77] = '';

                $patterns[78] = '/<--list_article_href_1-->/u';
                $replacements[78] = $article_domain_url . $title_rand_num[$dang_qian_ye_shu * 8 + 1];
                $patterns[79] = '/<--list_article_href_2-->/u';
                $replacements[79] = $article_domain_url . $title_rand_num[$dang_qian_ye_shu * 8 + 2];
                $patterns[80] = '/<--list_article_href_3-->/u';
                $replacements[80] = '';
                $patterns[81] = '/<--list_article_href_4-->/u';
                $replacements[81] = '';
                $patterns[82] = '/<--list_article_href_5-->/u';
                $replacements[82] = '';
                $patterns[83] = '/<--list_article_href_6-->/u';
                $replacements[83] = '';
                $patterns[84] = '/<--list_article_href_7-->/u';
                $replacements[84] = '';
                $patterns[85] = '/<--list_article_href_8-->/u';
                $replacements[85] = '';

                $patterns[86] = '/<--list_article_desc_1-->/u';
                $replacements[86] = $article_ready[$dang_qian_ye_shu * 8 + 1];
                $patterns[87] = '/<--list_article_desc_2-->/u';
                $replacements[87] = $article_ready[$dang_qian_ye_shu * 8 + 2];
                $patterns[88] = '/<--list_article_desc_3-->/u';
                $replacements[88] = '';
                $patterns[89] = '/<--list_article_desc_4-->/u';
                $replacements[89] = '';
                $patterns[90] = '/<--list_article_desc_5-->/u';
                $replacements[90] = '';
                $patterns[91] = '/<--list_article_desc_6-->/u';
                $replacements[91] = '';
                $patterns[92] = '/<--list_article_desc_7-->/u';
                $replacements[92] = '';
                $patterns[93] = '/<--list_article_desc_8-->/u';
                $replacements[93] = '';

                $patterns[94] = '/<--list_url-->/u';
                $replacements[94] = $city_en . '.' . $city_first_do_main . '/list/';
                $patterns[95] = '/<--shang_yi_ye-->/u';
                $replacements[95] = $city_en . '.' . $city_first_do_main . '/list/' . $shang_yi_ye_temp . '.html';
                $patterns[96] = '/<--xia_yi_ye-->/u';
                $replacements[96] = $city_en . '.' . $city_first_do_main . '/list/' . $dang_qian_ye_shu . '.html';
            }
            if (count($title) % 8 == 3) {
                $patterns[70] = '/<--list_article_title_1-->/u';
                $replacements[70] = $title_ready[$dang_qian_ye_shu * 8 + 1];
                $patterns[71] = '/<--list_article_title_2-->/u';
                $replacements[71] = $title_ready[$dang_qian_ye_shu * 8 + 2];
                $patterns[72] = '/<--list_article_title_3-->/u';
                $replacements[72] = $title_ready[$dang_qian_ye_shu * 8 + 3];
                $patterns[73] = '/<--list_article_title_4-->/u';
                $replacements[73] = '';
                $patterns[74] = '/<--list_article_title_5-->/u';
                $replacements[74] = '';
                $patterns[75] = '/<--list_article_title_6-->/u';
                $replacements[75] = '';
                $patterns[76] = '/<--list_article_title_7-->/u';
                $replacements[76] = '';
                $patterns[77] = '/<--list_article_title_8-->/u';
                $replacements[77] = '';

                $patterns[78] = '/<--list_article_href_1-->/u';
                $replacements[78] = $article_domain_url . $title_rand_num[$dang_qian_ye_shu * 8 + 1];
                $patterns[79] = '/<--list_article_href_2-->/u';
                $replacements[79] = $article_domain_url . $title_rand_num[$dang_qian_ye_shu * 8 + 2];
                $patterns[80] = '/<--list_article_href_3-->/u';
                $replacements[80] = $article_domain_url . $title_rand_num[$dang_qian_ye_shu * 8 + 3];
                $patterns[81] = '/<--list_article_href_4-->/u';
                $replacements[81] = '';
                $patterns[82] = '/<--list_article_href_5-->/u';
                $replacements[82] = '';
                $patterns[83] = '/<--list_article_href_6-->/u';
                $replacements[83] = '';
                $patterns[84] = '/<--list_article_href_7-->/u';
                $replacements[84] = '';
                $patterns[85] = '/<--list_article_href_8-->/u';
                $replacements[85] = '';

                $patterns[86] = '/<--list_article_desc_1-->/u';
                $replacements[86] = $article_ready[$dang_qian_ye_shu * 8 + 1];
                $patterns[87] = '/<--list_article_desc_2-->/u';
                $replacements[87] = $article_ready[$dang_qian_ye_shu * 8 + 2];
                $patterns[88] = '/<--list_article_desc_3-->/u';
                $replacements[88] = $article_ready[$dang_qian_ye_shu * 8 + 3];
                $patterns[89] = '/<--list_article_desc_4-->/u';
                $replacements[89] = '';
                $patterns[90] = '/<--list_article_desc_5-->/u';
                $replacements[90] = '';
                $patterns[91] = '/<--list_article_desc_6-->/u';
                $replacements[91] = '';
                $patterns[92] = '/<--list_article_desc_7-->/u';
                $replacements[92] = '';
                $patterns[93] = '/<--list_article_desc_8-->/u';
                $replacements[93] = '';

                $patterns[94] = '/<--list_url-->/u';
                $replacements[94] = $city_en . '.' . $city_first_do_main . '/list/';
                $patterns[95] = '/<--shang_yi_ye-->/u';
                $replacements[95] = $city_en . '.' . $city_first_do_main . '/list/' . $shang_yi_ye_temp . '.html';
                $patterns[96] = '/<--xia_yi_ye-->/u';
                $replacements[96] = $city_en . '.' . $city_first_do_main . '/list/' . $dang_qian_ye_shu . '.html';
            }
            if (count($title) % 8 == 4) {
                $patterns[70] = '/<--list_article_title_1-->/u';
                $replacements[70] = $title_ready[$dang_qian_ye_shu * 8 + 1];
                $patterns[71] = '/<--list_article_title_2-->/u';
                $replacements[71] = $title_ready[$dang_qian_ye_shu * 8 + 2];
                $patterns[72] = '/<--list_article_title_3-->/u';
                $replacements[72] = $title_ready[$dang_qian_ye_shu * 8 + 3];
                $patterns[73] = '/<--list_article_title_4-->/u';
                $replacements[73] = $title_ready[$dang_qian_ye_shu * 8 + 4];
                $patterns[74] = '/<--list_article_title_5-->/u';
                $replacements[74] = '';
                $patterns[75] = '/<--list_article_title_6-->/u';
                $replacements[75] = '';
                $patterns[76] = '/<--list_article_title_7-->/u';
                $replacements[76] = '';
                $patterns[77] = '/<--list_article_title_8-->/u';
                $replacements[77] = '';

                $patterns[78] = '/<--list_article_href_1-->/u';
                $replacements[78] = $article_domain_url . $title_rand_num[$dang_qian_ye_shu * 8 + 1];
                $patterns[79] = '/<--list_article_href_2-->/u';
                $replacements[79] = $article_domain_url . $title_rand_num[$dang_qian_ye_shu * 8 + 2];
                $patterns[80] = '/<--list_article_href_3-->/u';
                $replacements[80] = $article_domain_url . $title_rand_num[$dang_qian_ye_shu * 8 + 3];
                $patterns[81] = '/<--list_article_href_4-->/u';
                $replacements[81] = $article_domain_url . $title_rand_num[$dang_qian_ye_shu * 8 + 4];
                $patterns[82] = '/<--list_article_href_5-->/u';
                $replacements[82] = '';
                $patterns[83] = '/<--list_article_href_6-->/u';
                $replacements[83] = '';
                $patterns[84] = '/<--list_article_href_7-->/u';
                $replacements[84] = '';
                $patterns[85] = '/<--list_article_href_8-->/u';
                $replacements[85] = '';

                $patterns[86] = '/<--list_article_desc_1-->/u';
                $replacements[86] = $article_ready[$dang_qian_ye_shu * 8 + 1];
                $patterns[87] = '/<--list_article_desc_2-->/u';
                $replacements[87] = $article_ready[$dang_qian_ye_shu * 8 + 2];
                $patterns[88] = '/<--list_article_desc_3-->/u';
                $replacements[88] = $article_ready[$dang_qian_ye_shu * 8 + 3];
                $patterns[89] = '/<--list_article_desc_4-->/u';
                $replacements[89] = $article_ready[$dang_qian_ye_shu * 8 + 4];
                $patterns[90] = '/<--list_article_desc_5-->/u';
                $replacements[90] = '';
                $patterns[91] = '/<--list_article_desc_6-->/u';
                $replacements[91] = '';
                $patterns[92] = '/<--list_article_desc_7-->/u';
                $replacements[92] = '';
                $patterns[93] = '/<--list_article_desc_8-->/u';
                $replacements[93] = '';

                $patterns[94] = '/<--list_url-->/u';
                $replacements[94] = $city_en . '.' . $city_first_do_main . '/list/';
                $patterns[95] = '/<--shang_yi_ye-->/u';
                $replacements[95] = $city_en . '.' . $city_first_do_main . '/list/' . $shang_yi_ye_temp . '.html';
                $patterns[96] = '/<--xia_yi_ye-->/u';
                $replacements[96] = $city_en . '.' . $city_first_do_main . '/list/' . $dang_qian_ye_shu . '.html';
            }
            if (count($title) % 8 == 5) {
                $patterns[70] = '/<--list_article_title_1-->/u';
                $replacements[70] = $title_ready[$dang_qian_ye_shu * 8 + 1];
                $patterns[71] = '/<--list_article_title_2-->/u';
                $replacements[71] = $title_ready[$dang_qian_ye_shu * 8 + 2];
                $patterns[72] = '/<--list_article_title_3-->/u';
                $replacements[72] = $title_ready[$dang_qian_ye_shu * 8 + 3];
                $patterns[73] = '/<--list_article_title_4-->/u';
                $replacements[73] = $title_ready[$dang_qian_ye_shu * 8 + 4];
                $patterns[74] = '/<--list_article_title_5-->/u';
                $replacements[74] = $title_ready[$dang_qian_ye_shu * 8 + 5];
                $patterns[75] = '/<--list_article_title_6-->/u';
                $replacements[75] = '';
                $patterns[76] = '/<--list_article_title_7-->/u';
                $replacements[76] = '';
                $patterns[77] = '/<--list_article_title_8-->/u';
                $replacements[77] = '';

                $patterns[78] = '/<--list_article_href_1-->/u';
                $replacements[78] = $article_domain_url . $title_rand_num[$dang_qian_ye_shu * 8 + 1];
                $patterns[79] = '/<--list_article_href_2-->/u';
                $replacements[79] = $article_domain_url . $title_rand_num[$dang_qian_ye_shu * 8 + 2];
                $patterns[80] = '/<--list_article_href_3-->/u';
                $replacements[80] = $article_domain_url . $title_rand_num[$dang_qian_ye_shu * 8 + 3];
                $patterns[81] = '/<--list_article_href_4-->/u';
                $replacements[81] = $article_domain_url . $title_rand_num[$dang_qian_ye_shu * 8 + 4];
                $patterns[82] = '/<--list_article_href_5-->/u';
                $replacements[82] = $article_domain_url . $title_rand_num[$dang_qian_ye_shu * 8 + 5];
                $patterns[83] = '/<--list_article_href_6-->/u';
                $replacements[83] = '';
                $patterns[84] = '/<--list_article_href_7-->/u';
                $replacements[84] = '';
                $patterns[85] = '/<--list_article_href_8-->/u';
                $replacements[85] = '';

                $patterns[86] = '/<--list_article_desc_1-->/u';
                $replacements[86] = $article_ready[$dang_qian_ye_shu * 8 + 1];
                $patterns[87] = '/<--list_article_desc_2-->/u';
                $replacements[87] = $article_ready[$dang_qian_ye_shu * 8 + 2];
                $patterns[88] = '/<--list_article_desc_3-->/u';
                $replacements[88] = $article_ready[$dang_qian_ye_shu * 8 + 3];
                $patterns[89] = '/<--list_article_desc_4-->/u';
                $replacements[89] = $article_ready[$dang_qian_ye_shu * 8 + 4];
                $patterns[90] = '/<--list_article_desc_5-->/u';
                $replacements[90] = $article_ready[$dang_qian_ye_shu * 8 + 5];
                $patterns[91] = '/<--list_article_desc_6-->/u';
                $replacements[91] = '';
                $patterns[92] = '/<--list_article_desc_7-->/u';
                $replacements[92] = '';
                $patterns[93] = '/<--list_article_desc_8-->/u';
                $replacements[93] = '';

                $patterns[94] = '/<--list_url-->/u';
                $replacements[94] = $city_en . '.' . $city_first_do_main . '/list/';
                $patterns[95] = '/<--shang_yi_ye-->/u';
                $replacements[95] = $city_en . '.' . $city_first_do_main . '/list/' . $shang_yi_ye_temp . '.html';
                $patterns[96] = '/<--xia_yi_ye-->/u';
                $replacements[96] = $city_en . '.' . $city_first_do_main . '/list/' . $dang_qian_ye_shu . '.html';
            }
            if (count($title) % 8 == 6) {
                $patterns[70] = '/<--list_article_title_1-->/u';
                $replacements[70] = $title_ready[$dang_qian_ye_shu * 8 + 1];
                $patterns[71] = '/<--list_article_title_2-->/u';
                $replacements[71] = $title_ready[$dang_qian_ye_shu * 8 + 2];
                $patterns[72] = '/<--list_article_title_3-->/u';
                $replacements[72] = $title_ready[$dang_qian_ye_shu * 8 + 3];
                $patterns[73] = '/<--list_article_title_4-->/u';
                $replacements[73] = $title_ready[$dang_qian_ye_shu * 8 + 4];
                $patterns[74] = '/<--list_article_title_5-->/u';
                $replacements[74] = $title_ready[$dang_qian_ye_shu * 8 + 5];
                $patterns[75] = '/<--list_article_title_6-->/u';
                $replacements[75] = $title_ready[$dang_qian_ye_shu * 8 + 6];
                $patterns[76] = '/<--list_article_title_7-->/u';
                $replacements[76] = '';
                $patterns[77] = '/<--list_article_title_8-->/u';
                $replacements[77] = '';

                $patterns[78] = '/<--list_article_href_1-->/u';
                $replacements[78] = $article_domain_url . $title_rand_num[$dang_qian_ye_shu * 8 + 1];
                $patterns[79] = '/<--list_article_href_2-->/u';
                $replacements[79] = $article_domain_url . $title_rand_num[$dang_qian_ye_shu * 8 + 2];
                $patterns[80] = '/<--list_article_href_3-->/u';
                $replacements[80] = $article_domain_url . $title_rand_num[$dang_qian_ye_shu * 8 + 3];
                $patterns[81] = '/<--list_article_href_4-->/u';
                $replacements[81] = $article_domain_url . $title_rand_num[$dang_qian_ye_shu * 8 + 4];
                $patterns[82] = '/<--list_article_href_5-->/u';
                $replacements[82] = $article_domain_url . $title_rand_num[$dang_qian_ye_shu * 8 + 5];
                $patterns[83] = '/<--list_article_href_6-->/u';
                $replacements[83] = $article_domain_url . $title_rand_num[$dang_qian_ye_shu * 8 + 6];
                $patterns[84] = '/<--list_article_href_7-->/u';
                $replacements[84] = '';
                $patterns[85] = '/<--list_article_href_8-->/u';
                $replacements[85] = '';

                $patterns[86] = '/<--list_article_desc_1-->/u';
                $replacements[86] = $article_ready[$dang_qian_ye_shu * 8 + 1];
                $patterns[87] = '/<--list_article_desc_2-->/u';
                $replacements[87] = $article_ready[$dang_qian_ye_shu * 8 + 2];
                $patterns[88] = '/<--list_article_desc_3-->/u';
                $replacements[88] = $article_ready[$dang_qian_ye_shu * 8 + 3];
                $patterns[89] = '/<--list_article_desc_4-->/u';
                $replacements[89] = $article_ready[$dang_qian_ye_shu * 8 + 4];
                $patterns[90] = '/<--list_article_desc_5-->/u';
                $replacements[90] = $article_ready[$dang_qian_ye_shu * 8 + 5];
                $patterns[91] = '/<--list_article_desc_6-->/u';
                $replacements[91] = $article_ready[$dang_qian_ye_shu * 8 + 6];
                $patterns[92] = '/<--list_article_desc_7-->/u';
                $replacements[92] = '';
                $patterns[93] = '/<--list_article_desc_8-->/u';
                $replacements[93] = '';

                $patterns[94] = '/<--list_url-->/u';
                $replacements[94] = $city_en . '.' . $city_first_do_main . '/list/';
                $patterns[95] = '/<--shang_yi_ye-->/u';
                $replacements[95] = $city_en . '.' . $city_first_do_main . '/list/' . $shang_yi_ye_temp . '.html';
                $patterns[96] = '/<--xia_yi_ye-->/u';
                $replacements[96] = $city_en . '.' . $city_first_do_main . '/list/' . $dang_qian_ye_shu . '.html';
            }
            if (count($title) % 8 == 7) {
                $patterns[70] = '/<--list_article_title_1-->/u';
                $replacements[70] = $title_ready[$dang_qian_ye_shu * 8 + 1];
                $patterns[71] = '/<--list_article_title_2-->/u';
                $replacements[71] = $title_ready[$dang_qian_ye_shu * 8 + 2];
                $patterns[72] = '/<--list_article_title_3-->/u';
                $replacements[72] = $title_ready[$dang_qian_ye_shu * 8 + 3];
                $patterns[73] = '/<--list_article_title_4-->/u';
                $replacements[73] = $title_ready[$dang_qian_ye_shu * 8 + 4];
                $patterns[74] = '/<--list_article_title_5-->/u';
                $replacements[74] = $title_ready[$dang_qian_ye_shu * 8 + 5];
                $patterns[75] = '/<--list_article_title_6-->/u';
                $replacements[75] = $title_ready[$dang_qian_ye_shu * 8 + 6];
                $patterns[76] = '/<--list_article_title_7-->/u';
                $replacements[76] = $title_ready[$dang_qian_ye_shu * 8 + 7];
                $patterns[77] = '/<--list_article_title_8-->/u';
                $replacements[77] = '';

                $patterns[78] = '/<--list_article_href_1-->/u';
                $replacements[78] = $article_domain_url . $title_rand_num[$dang_qian_ye_shu * 8 + 1];
                $patterns[79] = '/<--list_article_href_2-->/u';
                $replacements[79] = $article_domain_url . $title_rand_num[$dang_qian_ye_shu * 8 + 2];
                $patterns[80] = '/<--list_article_href_3-->/u';
                $replacements[80] = $article_domain_url . $title_rand_num[$dang_qian_ye_shu * 8 + 3];
                $patterns[81] = '/<--list_article_href_4-->/u';
                $replacements[81] = $article_domain_url . $title_rand_num[$dang_qian_ye_shu * 8 + 4];
                $patterns[82] = '/<--list_article_href_5-->/u';
                $replacements[82] = $article_domain_url . $title_rand_num[$dang_qian_ye_shu * 8 + 5];
                $patterns[83] = '/<--list_article_href_6-->/u';
                $replacements[83] = $article_domain_url . $title_rand_num[$dang_qian_ye_shu * 8 + 6];
                $patterns[84] = '/<--list_article_href_7-->/u';
                $replacements[84] = $article_domain_url . $title_rand_num[$dang_qian_ye_shu * 8 + 7];
                $patterns[85] = '/<--list_article_href_8-->/u';
                $replacements[85] = '';

                $patterns[86] = '/<--list_article_desc_1-->/u';
                $replacements[86] = $article_ready[$dang_qian_ye_shu * 8 + 1];
                $patterns[87] = '/<--list_article_desc_2-->/u';
                $replacements[87] = $article_ready[$dang_qian_ye_shu * 8 + 2];
                $patterns[88] = '/<--list_article_desc_3-->/u';
                $replacements[88] = $article_ready[$dang_qian_ye_shu * 8 + 3];
                $patterns[89] = '/<--list_article_desc_4-->/u';
                $replacements[89] = $article_ready[$dang_qian_ye_shu * 8 + 4];
                $patterns[90] = '/<--list_article_desc_5-->/u';
                $replacements[90] = $article_ready[$dang_qian_ye_shu * 8 + 5];
                $patterns[91] = '/<--list_article_desc_6-->/u';
                $replacements[91] = $article_ready[$dang_qian_ye_shu * 8 + 6];
                $patterns[92] = '/<--list_article_desc_7-->/u';
                $replacements[92] = $article_ready[$dang_qian_ye_shu * 8 + 7];
                $patterns[93] = '/<--list_article_desc_8-->/u';
                $replacements[93] = '';

                $patterns[94] = '/<--list_url-->/u';
                $replacements[94] = $city_en . '.' . $city_first_do_main . '/list/';
                $patterns[95] = '/<--shang_yi_ye-->/u';
                $replacements[95] = $city_en . '.' . $city_first_do_main . '/list/' . $shang_yi_ye_temp . '.html';
                $patterns[96] = '/<--xia_yi_ye-->/u';
                $replacements[96] = $city_en . '.' . $city_first_do_main . '/list/' . $dang_qian_ye_shu . '.html';
            }
            if (count($title) % 8 == 0) {
                $patterns[70] = '/<--list_article_title_1-->/u';
                $replacements[70] = $title_ready[$dang_qian_ye_shu * 8 + 1];
                $patterns[71] = '/<--list_article_title_2-->/u';
                $replacements[71] = $title_ready[$dang_qian_ye_shu * 8 + 2];
                $patterns[72] = '/<--list_article_title_3-->/u';
                $replacements[72] = $title_ready[$dang_qian_ye_shu * 8 + 3];
                $patterns[73] = '/<--list_article_title_4-->/u';
                $replacements[73] = $title_ready[$dang_qian_ye_shu * 8 + 4];
                $patterns[74] = '/<--list_article_title_5-->/u';
                $replacements[74] = $title_ready[$dang_qian_ye_shu * 8 + 5];
                $patterns[75] = '/<--list_article_title_6-->/u';
                $replacements[75] = $title_ready[$dang_qian_ye_shu * 8 + 6];
                $patterns[76] = '/<--list_article_title_7-->/u';
                $replacements[76] = $title_ready[$dang_qian_ye_shu * 8 + 7];
                $patterns[77] = '/<--list_article_title_8-->/u';
                $replacements[77] = $title_ready[$dang_qian_ye_shu * 8 + 8];

                $patterns[78] = '/<--list_article_href_1-->/u';
                $replacements[78] = $article_domain_url . $title_rand_num[$dang_qian_ye_shu * 8 + 1];
                $patterns[79] = '/<--list_article_href_2-->/u';
                $replacements[79] = $article_domain_url . $title_rand_num[$dang_qian_ye_shu * 8 + 2];
                $patterns[80] = '/<--list_article_href_3-->/u';
                $replacements[80] = $article_domain_url . $title_rand_num[$dang_qian_ye_shu * 8 + 3];
                $patterns[81] = '/<--list_article_href_4-->/u';
                $replacements[81] = $article_domain_url . $title_rand_num[$dang_qian_ye_shu * 8 + 4];
                $patterns[82] = '/<--list_article_href_5-->/u';
                $replacements[82] = $article_domain_url . $title_rand_num[$dang_qian_ye_shu * 8 + 5];
                $patterns[83] = '/<--list_article_href_6-->/u';
                $replacements[83] = $article_domain_url . $title_rand_num[$dang_qian_ye_shu * 8 + 6];
                $patterns[84] = '/<--list_article_href_7-->/u';
                $replacements[84] = $article_domain_url . $title_rand_num[$dang_qian_ye_shu * 8 + 7];
                $patterns[85] = '/<--list_article_href_8-->/u';
                $replacements[85] = $article_domain_url . $title_rand_num[$dang_qian_ye_shu * 8 + 8];

                $patterns[86] = '/<--list_article_desc_1-->/u';
                $replacements[86] = $article_ready[$dang_qian_ye_shu * 8 + 1];
                $patterns[87] = '/<--list_article_desc_2-->/u';
                $replacements[87] = $article_ready[$dang_qian_ye_shu * 8 + 2];
                $patterns[88] = '/<--list_article_desc_3-->/u';
                $replacements[88] = $article_ready[$dang_qian_ye_shu * 8 + 3];
                $patterns[89] = '/<--list_article_desc_4-->/u';
                $replacements[89] = $article_ready[$dang_qian_ye_shu * 8 + 4];
                $patterns[90] = '/<--list_article_desc_5-->/u';
                $replacements[90] = $article_ready[$dang_qian_ye_shu * 8 + 5];
                $patterns[91] = '/<--list_article_desc_6-->/u';
                $replacements[91] = $article_ready[$dang_qian_ye_shu * 8 + 6];
                $patterns[92] = '/<--list_article_desc_7-->/u';
                $replacements[92] = $article_ready[$dang_qian_ye_shu * 8 + 7];
                $patterns[93] = '/<--list_article_desc_8-->/u';
                $replacements[93] = $article_ready[$dang_qian_ye_shu * 8 + 8];

                $patterns[94] = '/<--list_url-->/u';
                $replacements[94] = $city_en . '.' . $city_first_do_main . '/list/';
                $patterns[95] = '/<--shang_yi_ye-->/u';
                $replacements[95] = $city_en . '.' . $city_first_do_main . '/list/' . $shang_yi_ye_temp . '.html';
                $patterns[96] = '/<--xia_yi_ye-->/u';
                $replacements[96] = $city_en . '.' . $city_first_do_main . '/list/' . $dang_qian_ye_shu . '.html';
            }
        } else {
            $shang_yi_ye_temp = $dang_qian_ye_shu - 1;
            $xia_yi_ye_temp = $dang_qian_ye_shu + 1;
            $patterns[70] = '/<--list_article_title_1-->/u';
            $replacements[70] = $title_ready[$dang_qian_ye_shu * 8 + 1];
            $patterns[71] = '/<--list_article_title_2-->/u';
            $replacements[71] = $title_ready[$dang_qian_ye_shu * 8 + 2];
            $patterns[72] = '/<--list_article_title_3-->/u';
            $replacements[72] = $title_ready[$dang_qian_ye_shu * 8 + 3];
            $patterns[73] = '/<--list_article_title_4-->/u';
            $replacements[73] = $title_ready[$dang_qian_ye_shu * 8 + 4];
            $patterns[74] = '/<--list_article_title_5-->/u';
            $replacements[74] = $title_ready[$dang_qian_ye_shu * 8 + 5];
            $patterns[75] = '/<--list_article_title_6-->/u';
            $replacements[75] = $title_ready[$dang_qian_ye_shu * 8 + 6];
            $patterns[76] = '/<--list_article_title_7-->/u';
            $replacements[76] = $title_ready[$dang_qian_ye_shu * 8 + 7];
            $patterns[77] = '/<--list_article_title_8-->/u';
            $replacements[77] = $title_ready[$dang_qian_ye_shu * 8 + 8];

            $patterns[78] = '/<--list_article_href_1-->/u';
            $replacements[78] = $article_domain_url . $title_rand_num[$dang_qian_ye_shu * 8 + 1];
            $patterns[79] = '/<--list_article_href_2-->/u';
            $replacements[79] = $article_domain_url . $title_rand_num[$dang_qian_ye_shu * 8 + 2];
            $patterns[80] = '/<--list_article_href_3-->/u';
            $replacements[80] = $article_domain_url . $title_rand_num[$dang_qian_ye_shu * 8 + 3];
            $patterns[81] = '/<--list_article_href_4-->/u';
            $replacements[81] = $article_domain_url . $title_rand_num[$dang_qian_ye_shu * 8 + 4];
            $patterns[82] = '/<--list_article_href_5-->/u';
            $replacements[82] = $article_domain_url . $title_rand_num[$dang_qian_ye_shu * 8 + 5];
            $patterns[83] = '/<--list_article_href_6-->/u';
            $replacements[83] = $article_domain_url . $title_rand_num[$dang_qian_ye_shu * 8 + 6];
            $patterns[84] = '/<--list_article_href_7-->/u';
            $replacements[84] = $article_domain_url . $title_rand_num[$dang_qian_ye_shu * 8 + 7];
            $patterns[85] = '/<--list_article_href_8-->/u';
            $replacements[85] = $article_domain_url . $title_rand_num[$dang_qian_ye_shu * 8 + 8];
            $patterns[86] = '/<--list_article_desc_1-->/u';
            $replacements[86] = $article_ready[$dang_qian_ye_shu * 8 + 1];
            $patterns[87] = '/<--list_article_desc_2-->/u';
            $replacements[87] = $article_ready[$dang_qian_ye_shu * 8 + 2];
            $patterns[88] = '/<--list_article_desc_3-->/u';
            $replacements[88] = $article_ready[$dang_qian_ye_shu * 8 + 3];
            $patterns[89] = '/<--list_article_desc_4-->/u';
            $replacements[89] = $article_ready[$dang_qian_ye_shu * 8 + 4];
            $patterns[90] = '/<--list_article_desc_5-->/u';
            $replacements[90] = $article_ready[$dang_qian_ye_shu * 8 + 5];
            $patterns[91] = '/<--list_article_desc_6-->/u';
            $replacements[91] = $article_ready[$dang_qian_ye_shu * 8 + 6];
            $patterns[92] = '/<--list_article_desc_7-->/u';
            $replacements[92] = $article_ready[$dang_qian_ye_shu * 8 + 7];
            $patterns[93] = '/<--list_article_desc_8-->/u';
            $replacements[93] = $article_ready[$dang_qian_ye_shu * 8 + 8];
            $patterns[94] = '/<--list_url-->/u';
            $replacements[94] = $city_en . '.' . $city_first_do_main . '/list/';
            $patterns[95] = '/<--shang_yi_ye-->/u';
            $replacements[95] = $city_en . '.' . $city_first_do_main . '/list/' . $shang_yi_ye_temp . '.html';
            $patterns[96] = '/<--xia_yi_ye-->/u';
            $replacements[96] = $city_en . '.' . $city_first_do_main . '/list/' . $xia_yi_ye_temp . '.html';
        }
    }

    /*
     * 随机生成问题
     */

    protected function question_rand(&$patterns, &$replacements, $n, $title, $city_en, $city_first_do_main) {
        for ($i = 0; $i < $n; $i++) {
            $rand_num[$i] = rand(0, count($title) - 1);
        }
        $patterns[36] = '/<--index_article_href_1-->/u';
        $replacements[36] = 'http://' . $city_en . '.' . $city_first_do_main . '/article/' . $rand_num[0] . '.html';
        $patterns[37] = '/<--index_article_href_2-->/u';
        $replacements[37] = 'http://' . $city_en . '.' . $city_first_do_main . '/article/' . $rand_num[1] . '.html';
        $patterns[38] = '/<--index_article_href_3-->/u';
        $replacements[38] = 'http://' . $city_en . '.' . $city_first_do_main . '/article/' . $rand_num[2] . '.html';
        $patterns[39] = '/<--index_article_href_4-->/u';
        $replacements[39] = 'http://' . $city_en . '.' . $city_first_do_main . '/article/' . $rand_num[3] . '.html';
        $patterns[40] = '/<--index_article_href_5-->/u';
        $replacements[40] = 'http://' . $city_en . '.' . $city_first_do_main . '/article/' . $rand_num[4] . '.html';
        $patterns[41] = '/<--index_article_href_6-->/u';
        $replacements[41] = 'http://' . $city_en . '.' . $city_first_do_main . '/article/' . $rand_num[5] . '.html';
        $patterns[42] = '/<--index_article_href_7-->/u';
        $replacements[42] = 'http://' . $city_en . '.' . $city_first_do_main . '/article/' . $rand_num[6] . '.html';
        $patterns[43] = '/<--index_article_href_8-->/u';
        $replacements[43] = 'http://' . $city_en . '.' . $city_first_do_main . '/article/' . $rand_num[7] . '.html';
        $patterns[44] = '/<--index_article_href_9-->/u';
        $replacements[44] = 'http://' . $city_en . '.' . $city_first_do_main . '/article/' . $rand_num[8] . '.html';
        $patterns[45] = '/<--index_article_href_10-->/u';
        $replacements[45] = 'http://' . $city_en . '.' . $city_first_do_main . '/article/' . $rand_num[9] . '.html';
        $patterns[46] = '/<--index_article_href_11-->/u';
        $replacements[46] = 'http://' . $city_en . '.' . $city_first_do_main . '/article/' . $rand_num[10] . '.html';
        $patterns[47] = '/<--index_article_href_12-->/u';
        $replacements[47] = 'http://' . $city_en . '.' . $city_first_do_main . '/article/' . $rand_num[11] . '.html';

        $patterns[48] = '/<--index_article_1-->/u';
        $replacements[48] = $title[$rand_num[0]]['title'];
        $patterns[49] = '/<--index_article_2-->/u';
        $replacements[49] = $title[$rand_num[1]]['title'];
        $patterns[50] = '/<--index_article_3-->/u';
        $replacements[50] = $title[$rand_num[2]]['title'];
        $patterns[51] = '/<--index_article_4-->/u';
        $replacements[51] = $title[$rand_num[3]]['title'];
        $patterns[52] = '/<--index_article_5-->/u';
        $replacements[52] = $title[$rand_num[4]]['title'];
        $patterns[53] = '/<--index_article_6-->/u';
        $replacements[53] = $title[$rand_num[5]]['title'];
        $patterns[54] = '/<--index_article_7-->/u';
        $replacements[54] = $title[$rand_num[6]]['title'];
        $patterns[55] = '/<--index_article_8-->/u';
        $replacements[55] = $title[$rand_num[7]]['title'];
        $patterns[56] = '/<--index_article_9-->/u';
        $replacements[56] = $title[$rand_num[8]]['title'];
        $patterns[57] = '/<--index_article_10-->/u';
        $replacements[57] = $title[$rand_num[9]]['title'];
        $patterns[58] = '/<--index_article_11-->/u';
        $replacements[58] = $title[$rand_num[10]]['title'];
        $patterns[59] = '/<--index_article_12-->/u';
        $replacements[59] = $title[$rand_num[11]]['title'];
    }

    private function return_article_paragraph($article_id, $article) {
        for ($i = 0; $i < count($article); $i++) {
            if ($article[$i]['id'] == $article_id) {
                return $article[$i]['content_paragraph'];
            }
        }
    }

    /**
     * 文章段落更新
     * @access public
     * @param string  $patterns  需要替换的文本
     * @param string  $replacement  替换成的文本
     */
    protected function article(&$patterns, &$replacements, $title, $article) {
        $article_ids = explode('|', $title['article_ids']);
        $patterns[60] = '/<--content_1-->/u';
        $replacements[60] = $this->return_article_paragraph($article_ids[0], $article);
        $patterns[61] = '/<--content_2-->/u';
        $replacements[61] = $this->return_article_paragraph($article_ids[1], $article);
        $patterns[62] = '/<--content_3-->/u';
        $replacements[62] = $this->return_article_paragraph($article_ids[2], $article);
        $patterns[63] = '/<--content_4-->/u';
        $replacements[63] = $this->return_article_paragraph($article_ids[3], $article);
        $patterns[64] = '/<--content_5-->/u';
        $replacements[64] = $this->return_article_paragraph($article_ids[4], $article);
        $patterns[65] = '/<--content_6-->/u';
        $replacements[65] = $this->return_article_paragraph($article_ids[5], $article);
        $patterns[66] = '/<--content_title-->/u';
        $replacements[66] = $title['title'];

        $patterns[2000] = '/<--description-->/u';
        $replacements[2000] = $title['title'] . '，' . $this->return_article_paragraph($article_ids[0], $article);
    }

    protected function rand_key(&$patterns, &$replacements, $tpl_info, $city_cn) {
        $patterns[67] = '/<--rand_key_1-->/u';
        $replacements[67] = preg_replace('/{city}/u', $city_cn, $tpl_info['rand_key_1']);
        $patterns[68] = '/<--rand_key_2-->/u';
        $replacements[68] = preg_replace('/{city}/u', $city_cn, $tpl_info['rand_key_2']);
        $patterns[69] = '/<--rand_key_3-->/u';
        $replacements[69] = preg_replace('/{city}/u', $city_cn, $tpl_info['rand_key_3']);
    }

    protected function footer(&$patterns, &$replacements, $web_footer, $web_chat) {
        $patterns[97] = '/<--footer-->/u';
        $replacements[97] = $web_footer;
        $patterns[98] = '/<--chat-->/u';
        $replacements[98] = $web_chat;
    }

    protected function index_annotate(&$patterns, &$replacements, $index_annotate, $city_cn) {
        $patterns[99] = '/<--annotate--/u';
        $replacements[99] = preg_replace('/{city}/u', $city_cn, $index_annotate);
    }

}
