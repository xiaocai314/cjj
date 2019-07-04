<?php
namespace zhangchun\cjj;
class ZcHelper
{
    //二分法
    public static function bin_sch($array,  $low, $high, $k){
        if ( $low <= $high){
            $mid =  intval(($low+$high)/2 );
            if ($array[$mid] ==  $k){
                return $mid;
            }elseif ( $k < $array[$mid]){
                return  self::bin_sch($array, $low,  $mid-1, $k);
            }else{
                return  self::bin_sch($array, $mid+ 1, $high, $k);
            }
        }
        return -1;
    }

    //顺序查找（数组里查找某个元素）
    public static function  seq_sch($array, $n,  $k){
        $array[$n] =  $k;
        for($i=0;  $i<$n; $i++){
            if( $array[$i]==$k){
                break;
            }
        }
        if ($i<$n){
            return  $i;
        }else{
            return -1;
        }
    }

    //线性表的删除（数组中实现）
    public static function delete_array_element($array , $i)
    {
        $len =  count($array);
        for ($j= $i; $j<$len; $j ++){
            $array[$j] = $array [$j+1];
        }
        array_pop ($array);
        return $array ;
    }


    //冒泡排序（数组排序）
    public static function bubble_sort( $array)
    {
        $count = count( $array);
        if ($count <= 0 ) return false;
        for($i=0 ; $i<$count; $i ++){
            for($j=$count-1 ; $j>$i; $j--){
                if ($array[$j] < $array [$j-1]){
                    $tmp = $array[$j];
                    $array[$j] = $array[ $j-1];
                    $array [$j-1] = $tmp;
                }
            }
        }
        return $array;
    }
    //快速排序（数组排序）
    public  static function quick_sort($array )
    {
        if (count($array) <= 1) return  $array;
        $key = $array [0];
        $left_arr  = array();
        $right_arr = array();
        for ($i= 1; $i<count($array ); $i++){
            if ($array[ $i] <= $key)
                $left_arr [] = $array[$i];
            else
                $right_arr[] = $array[$i ];
        }
        $left_arr = self::quick_sort($left_arr );
        $right_arr = self::quick_sort( $right_arr);
        return array_merge($left_arr , array($key), $right_arr);
    }

    //简单编码函数（与php_decode函数对应）
    public static function php_encode($str)
    {
        $s = '';
        if ( $str=='' && strlen( $str)>128) return false;
        for( $i=0; $i<strlen ($str); $i++){
            $c = ord($str[$i ]);
            if ($c>31 && $c <107) $c += 20 ;
            if ($c>106 && $c <127) $c -= 75 ;
            $word = chr($c );
            $s .= $word;
        }
        return $s;
    }

    //简单解码函数（与php_encode函数对应）
    public static function php_decode($str)
    {
        $s = '';
        $word = '';
        if ( $str=='' && strlen($str )>128) return false;
        for( $i=0; $i<strlen ($str); $i++){
            $c  = ord($word);
            if ( $c>106 && $c<127 ) $c = $c-20;
            if ($c>31 && $c< 107) $c = $c+75 ;
            $word = chr( $c);
            $s .= $word ;
        }
        return $s;
    }

    //简单加密函数（与php_decrypt函数对应）
    public static function php_encrypt($str)
    {
        $enstr = '';
        $encrypt_key = 'abcdefghijklmnopqrstuvwxyz1234567890';
        $decrypt_key = 'ngzqtcobmuhelkpdawxfyivrsj2468021359';
        if ( strlen($str) == 0) return  false;
        for ($i=0;  $i<strlen($str); $i ++){
            for ($j=0; $j <strlen($encrypt_key); $j ++){
                if ($str[$i] == $encrypt_key [$j]){
                    $enstr .=  $decrypt_key[$j];
                    break;
                }
            }
        }
        return $enstr;
    }

    //简单解密函数（与php_encrypt函数对应）
    public static function php_decrypt($str)
    {
        $enstr = '';
        $encrypt_key = 'abcdefghijklmnopqrstuvwxyz1234567890';
        $decrypt_key = 'ngzqtcobmuhelkpdawxfyivrsj2468021359';
        if ( strlen($str) == 0) return  false;
        for ($i=0;  $i<strlen($str); $i ++){
            for ($j=0; $j <strlen($decrypt_key); $j ++){
                if ($str[$i] == $decrypt_key [$j]){
                    $enstr .=  $encrypt_key[$j];
                    break;
                }
            }
        }
        return $enstr;
    }

    /**
     * * 抽奖概率算法
     *
     * @param $proArr = array(
     * array('id'=>1,'name'=>'特等奖','v'=>1),
     * array('id'=>2,'name'=>'一等奖','v'=>5),
     * array('id'=>3,'name'=>'二等奖','v'=>10),
     * array('id'=>4,'name'=>'三等奖','v'=>12),
     * array('id'=>5,'name'=>'四等奖','v'=>22),
     * array('id'=>6,'name'=>'没中奖','v'=>50)
     * );
     * @return array
     */
    public static function getRand($proArr)
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
}
?>