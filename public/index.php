<?php

//定义常量
define('ROOT' , dirname(__FILE__) . '/../');

//实现类的自动加载
function autoload($class)
{
    // controller\UserController;
    $path = str_replace('\\' , '/' , $class);

    require(ROOT . $path . '.php');
}
spl_autoload_register('autoload');
if( isset($_SERVER['PATH_INFO'])){
     $pathInfo = $_SERVER['PATH_INFO'];
     $pathInfo = explode('/', $pathInfo);
    $controller = ucfirst($pathInfo[1]) . 'Controller';
    $action = $pathInfo[2];
}else {
    $controller = 'IndexController';
    $action = 'index';
}

$fullController = 'controllers\\'.$controller;

$_C = new $fullController;
$_C->$action();

//加载视图
function view($viewFileName,$date = []){
    extract($date);

    $path  = str_replace('.','/',$viewFileName) . '.html';
    //加载视图 
    require(ROOT .'views/' . $path);
}
