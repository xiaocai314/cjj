<?php
/**
 * Created by PhpStorm.
 * User: zhangchun
 * Date: 2019/6/4
 * Time: 9:56
 */
require './ZcHelper.php';

$array = [1,3,4,6,2,9,65,12,34];
$qq = 'zhangchun';
$test = new ZcHelper();
$res = $test->php_encrypt($qq);
$r = $test->php_decrypt($res);
var_dump($res);
?>