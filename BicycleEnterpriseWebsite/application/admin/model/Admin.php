<?php
namespace app\admin\model;
use think\Model;

class Admin extends Model
{

    /**
     * [增加管理员]
     * @param [type] $data [传入管理员信息数组]
     */
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

    /**
     * [查询管理员]
     * @return [type] [description]
     */
    public function selectAdmin(){
        return $this->paginate(3);
    } 


    /**
     * [删除管理员]
     * @param  [type] $data [管理员id]
     * @return [type]       [description]
     */
    public function deleteAdmin($data){
        return $this->where('id',$data)->delete();
    }

    /**
     * 根据管理员id查找数据
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function findAdmin($id){
        $data=$this->find($id);
        // dump($data);die;
        return $data;
    }

    /**
     * 将修改好的数据写进数据库
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function editAdmin($data){
        //如果密码不为空，说明要修改密码，所以对密码进行md5加密
        if($data['password']){
            $data['password']=md5($data['password']);
            //将数据写进数据库
            $res=$this->update($data);
            // dump($res);die;
            //表示插入成功，0表示插入失败
            return $res;
        }else{
            //密码字段为空说明不修改密码
            $res=$this->allowField(['username'])->save($data,['id']);
            // dump($res);die;
            return $res;
        }
    }

}
