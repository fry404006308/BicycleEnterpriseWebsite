<?php
namespace app\admin\model;
use think\Model;

class Admin extends Model
{
	public function addAdmin($data){
        //传到控制器的数据，不为空且为数组才处理
        if(empty($data)||!is_array($data)){
           return false; 
        }else{
            //密码加密
            //不为空才加密
            if($data['password']){
                $data['password']=md5($data['password']);
            }
            $res=$this->save($data);
            if($res){
               return true; 
            } 
            else{
                return flase;
            } 
        }  
    }
    public function getAdmin(){
        return $this->select();
    } 

}
