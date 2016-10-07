<?php
define('LTY',realpath('./'));//当前项目的目录
define('CORE',LTY.'/core');//框架的核心文档所处的目录
define('APP',LTY.'/app');//我们的项目目录
define('MODULE','app');
define('DEBUG',true);
include "vendor/autoload.php";
if(DEBUG){
    $whoops = new \Whoops\Run;
    $errorTitle = '框架出错了';
    $option = new \Whoops\Handler\PrettyPageHandler;
    $option->setPageTitle($errorTitle);
    $whoops->pushHandler($option);
    $whoops->register();
    ini_set('display_error','On');
}else{
    ini_set('display_error','Off');
}
//ssssss();

include CORE.'/common/function.php';
include CORE.'/tian.php';

spl_autoload_register('\core\tian::load'); //调用一个不存在的类的时候会调用他
\core\tian::run();
?>