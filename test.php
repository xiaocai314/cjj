<?php
/**
 * Created by PhpStorm.
 * User: zhangchun
 * Date: 2019/6/4
 * Time: 9:56
 */
require './ZcHelper.php';
$array = [1,3,4,6,2,9,65,12,34];
$test = new ZcHelper();
$res = $test->bubble_sort($array);
var_dump($res);
?>