<?php
namespace app\model;
use core\lib\model;

class cModel extends model{
    //public $table = 'tp';
    public function lists(){
        $ret = $this->select($this->table,'*');
        return $ret;
    }
    public function getOne($id){
        $arr = $this->get($this->table,'*',array(
            'id'=>$id
        ));
        return $arr;
    }
    public function setOne($id,$data){
        return $this->update($this->table,$data,array(
            'id' => $id
        ));
    }
    public function delOne($id){
        return $this->delete($this->table,array(
            'id'=>$id
        ));
    }
    public function chaOne($table,$data){
        return $this->insert($table,$data);
    }
}