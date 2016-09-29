<?php
define('LTY',realpath('./'));//当前项目的目录
define('CORE',LTY.'/core');//框架的核心文档所处的目录
define('APP',LTY.'/app');//我们的项目目录
define('MODULE','app');
define('DEBUG',true);
if(DEBUG){
    ini_set('display_error','On');
}else{
    ini_set('display_error','Off');
}

include CORE.'/common/function.php';
include CORE.'/tian.php';

spl_autoload_register('\core\tian::load'); //调用一个不存在的类的时候会调用他
\core\tian::run();
?>