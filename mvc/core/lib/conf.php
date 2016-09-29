<?php
namespace core\lib;
class conf{
    static public $conf = array();
    static public function get($name,$file){
        /*1
        1，判断配置文件是否存在
        2. 判断对应的配置是否存在
        3. 缓存配置
        2*/
        if(isset(self::$conf[$file])){
            return self::$conf[$file][$name];
        }else {
            //p(1);
            $path = LTY . '\core\config\\' . $file . '.php';
            if (is_file($path)) {
                $conf = include $path;
                //p($conf[$name]);die;
                if (isset($conf[$name])) {
                    self::$conf[$file] = $conf; //缓存配置
                    return $conf[$name]; //缓存成功后返回配置项
                } else {
                    throw new \Exception('没有这个配置项'.$name);
                }
            } else {
                throw  new  \Exception('找不到配置文件'.$file);
            }
        }
    }
    static public function all($file)
    {
        if (isset(self::$conf[$file])) {
            return self::$conf[$file];
        } else {
            //p(1);
            $path = LTY . '\core\config\\' . $file . '.php';
            if (is_file($path)) {
                $conf = include $path;
                self::$conf[$file] = $conf;
                return $conf;
            } else {
                throw  new  \Exception('找不到配置文件' . $file);
            }
        }
    }
}
