<?php
/**
 * 自动加载类库
 */
namespace core;

class autoload{
    public static function load($class_name){
        $os = strtoupper(substr(PHP_OS,0,3))==='WIN'? 'windows':'linux';  //判断操作系统
        if($os == 'linux'){
            $class_name = str_replace('\\','/',$class_name); //转义下划线
        }
        if(file_exists($class_name.'.php')){
            require_once $class_name.'.php';
            return true;
        }
    }
}