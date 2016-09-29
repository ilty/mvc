<?php
namespace core;
class tian{
    public static $classMap = array();
    public $assign;
    static public function run(){
        \core\lib\log::init();
        $route=new \core\lib\route();
        //p($route);die;
        $ctrlClass = $route->ctrl;
        $action = $route->action;
        $ctrlfile = APP.'\\ctrl\\'.$ctrlClass.'Ctrl.php';
        //p($ctrlfile);die;
        $cltrlClass = '\\'.MODULE.'\ctrl\\'.$ctrlClass.'Ctrl';
        //p($cltrlClass);die;
        if(is_file($ctrlfile)){
            include $ctrlfile;
            $ctrl = new $cltrlClass;
            //p($ctrl);die;
            $ctrl->$action();
        }else{
            throw new \Exception('找不到控制器'.$ctrlClass);
        }
        //p($route);
    }
    static public function load($class){
        //自动加载类库;
        if(isset($classMap[$class])){//判断是已经引入类库
            return true;
        }else{
            $class = str_replace('\\', '/', $class);
            $file = LTY.'/'. $class.'.php';
            if (is_file($file)) {//如果加数组载成功，就加入到存放类库的中
                include $file;
                self::$classMap[$class]=$class;
            }else{
                return false;
            }
        }
    }
    public function assign($name,$value){
        $this->assign[$name]=  $value;
    }
    public function display($file){
        $file = APP.'/view/'.$file;
        if(is_file($file)){
            extract($this->assign);
            include $file;
        }
    }
}
?>