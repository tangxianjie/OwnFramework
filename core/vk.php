<?php

namespace core; //先定义空间

class vk{
    public static function run(){   //静态方法
        include CORE.'/autoload.php';
        spl_autoload_register('\core\autoload::load'); //（自动加载）注册  没有控制器的方法情况下运行该函数
        // include CORE.'/route.php';
        $route = new \core\route();

        $dir = $route->dir;
        $ctrl = $route->ctrl;
        $action = $route->action;
        $params = $route->params;
        $http_get_params = $route->http_get_params;
        if($dir == ''){
            $ctrl_file = APP.'/ctrl/'.$ctrl.'_ctrl.php';
            $ctrl_class = '\\app\\ctrl\\'.$ctrl.'_ctrl';
        }else{
            $ctrl_file = APP.'/ctrl/'.$dir.'/'.$ctrl.'_ctrl.php';
            $ctrl_class = '\\app\\ctrl\\'.$dir.'\\'.$ctrl.'_ctrl';
        }
        
        if(is_file($ctrl_file)){
            include $ctrl_file;
            $ctrl_obj = new $ctrl_class;
            $ctrl_obj->$action();
        }else {
            throw new \Exception('找不到控制器'.$ctrl_file);
        }
    }
}