<?php
namespace app\ctrl;
class indexCtrl extends \core\tian{
    public function index(){
        //p('it is index');
        /*$model = new \core\lib\model();
        $sql='select *  from user';
        $arr = $model->query($sql);
        p($arr->fetchAll());*/

       /* $data = 'hello word';
        $title= '这是试图文件';
        $this->assign('data',$data);
        $this->assign('title',$title);
        $this->display('index.html');*/
        $aa=new \core\lib\model();
        print_r($aa);

        $temp = \core\lib\conf::get('CTRL','route');
        $action = \core\lib\conf::get('ACTION','route');
        print_r($action);die;
    }
}

