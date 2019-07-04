<?php
/**
 * Created by PhpStorm.
 * User: zhangchun
 * Date: 2019/6/4
 * Time: 9:56
 */

$test = array(
      array('id'=>1,'name'=>'特等奖','v'=>1),
      array('id'=>2,'name'=>'一等奖','v'=>5),
      array('id'=>3,'name'=>'二等奖','v'=>10),
      array('id'=>4,'name'=>'三等奖','v'=>12),
      array('id'=>5,'name'=>'四等奖','v'=>22),
      array('id'=>6,'name'=>'没中奖','v'=>50)
);
 var_dump(getRand($test));
function getRand($proArr)
{
    $result = array();
    foreach ($proArr as $key => $val) {
        $arr[$key] = $val['v'];
    }
    // 概率数组的总概率
    $proSum = array_sum($arr);
    asort($arr);
    // 概率数组循环
    foreach ($arr as $k => $v) {
        $randNum = mt_rand(1, $proSum);
        if ($randNum <= $v) {
            $result = $proArr[$k];
            break;
        } else {
            $proSum -= $v;
        }
    }
    return $result;
}
?>