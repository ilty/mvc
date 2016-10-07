<?php
namespace app\ctrl;
use core\lib\model;

class indexCtrl extends \core\tian{
    public function index(){
        $data = 'hello word';
        $this->assign('data',$data);
        $this->display('index.html');die;
        //$model = new \app\model\cModel();
       /* $data = array(
            'name'=>'佑哥',
            'ps'=>'aha'
        );*/
        /*$arr=$model->lists();
        print_r($arr);die;
        $this->assign('data',$data);
        $this->display('index.html');
        die;*/
        /*$aa=new \core\lib\model();
        print_r($aa);
        $temp = \core\lib\conf::get('CTRL','route');
        $action = \core\lib\conf::get('ACTION','route');
        print_r($action);die;*/
    }
    public function test(){
        $data = 'test';
        $this->assign('data',$data);
        $this->display('index.html');
    }
    public function jie(){
        $arr=$_POST;
        $model = new \app\model\cModel();
        $a=$model->chaOne('tp',$arr);
        print_r($a);
    }
}

