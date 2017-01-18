<?php


const path= "111";

class test
{
    public $name;
    public $sex;
    private $age;

    public function __construct($name="",$sex="男",$age=22)
    {
        $this->name = $name;
        $this->sex = $sex;
        $this->age = $age;
    }

    public function __get($propertyName)
    {
        if ($propertyName == 'age'){
            if ($this->age > 30 ){
                return $this->age."一般看不出来";
            }else{
                return $this->$propertyName;
            }
        }else{
            return $this->$propertyName;
        }
    }
    //todo 二个参数对应【属性】和要赋予属性的【值】
    public function __set($property,$value)
    {
        if ($property == "age"){
            if ($value>150 || $value<0){
                return;
            }
        }
        $this->$property = $value;
    }


    //todo arguments是函数的形参与值，以数组形式存在
    public function __call($funName,$arguments)
    {
        echo "你所调用的函数名是".$funName.",参数是：";
        echo print_r($arguments)."但是他们在此类中不存在或私有！！";
    }
    
    public function say()
    {
        echo "我叫:".$this->name.",性别：".$this->sex.",今年".$this->age."岁";
    }


}