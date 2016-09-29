<?php
namespace core\lib;
use core\lib\conf;
class route{
    public $ctrl;
    public $action;
    public function __construct(){
//        p('route ok');
        /*
         *隐藏index.php
         *获取URL 参数部分
         * 返回对应控制器和方法
         * */
        //p($_SERVER);
        if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI']!='/'){
            $path=$_SERVER['REQUEST_URI'];
            $patharr=explode('/',trim($path,'/'));
            if(isset($patharr[0])){
                $this->ctrl=$patharr[0];
            }
            unset($patharr[0]);
            if(isset($patharr[1])){
                $this->action=$patharr[1];
                unset($patharr[1]);
            }else{
                $this->action= conf::get('ACTION','route');
            }
            //p($patharr);die;
            //把url多余的部分转换成GET；
            $count = count($patharr) + 2;
            $i = 2;
            while($i<$count){
                if(isset($patharr[$i+1])){
                    $_GET[$patharr[$i]] = $patharr[$i+1];
                }
                $i = $i +2;
            }
            //p($_GET);die;
        }else{
            $this->ctrl = conf::get('CTRL','route');
            $this->action = conf::get('ACTION','route');
        }
    }
}