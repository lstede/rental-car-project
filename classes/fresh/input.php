<?php
/**
 * Created by PhpStorm.
 * User: Zico
 * Date: 06-Sep-17
 * Time: 14:24
 */

class input
{
    public static function get($item){
        if(isset($_POST[$item])){
            return $_POST[$item];
        }elseif(isset($_GET[$item])){
            return $_GET[$item];
        }
        return '';
    }
}