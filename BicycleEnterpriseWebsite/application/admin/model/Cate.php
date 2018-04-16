<?php
namespace app\admin\model;
use think\Model;

class Cate extends Model
{
    //处理栏目cate无线分类
    public function catetree(){
    	//获取栏目数据
    	$cateres=$this->select();
    	$res=$this->sort($cateres);
    	// dump($res);die;
    	return $res;
    }




    /**
     * 无线分类重新排序：使得那些栏目的顺序是对的，父级栏目在子级标题之上
     * 这其实是一个再简单的递归也没有了，作为递归，访问标签页没有加
     * @param  [type]  $data  传入的栏目数组
     * @param  integer $pid   父级栏目id，顶级栏目的id为0
     * @param  integer $level 栏目等级，初始等级为0
     * @return [type]         排序好的栏目的数据
     */
    public function sort($data,$pid=0,$level=0){
    	static $arr=array();
    	foreach ($data as $k => $v) {
    		//如果子级的父级id等于传传过来要查找的父级id，说明自己是这个父级id的孩子
    		if($v['pid']==$pid){
    			$v['level']=$level;
    			$arr[]=$v;
    			//在这个$data数组中去递归找它的孩子
    			$this->sort($data,$v['id'],$level+1);
    		}
    	}
    	return $arr;
    }



    /**
     * 判断一个栏目是否还有孩子
     * @param  [type]  $data 所有栏目的数据
     * @param  [type]  $id   当前栏目id
     * @return boolean       true表示还有孩子
     */
    public function hasChild($id){
        $data=$this->select();
        foreach ($data as $k => $v) {
            if($v['pid']==$id) return true;
        }
        return false;
    }


    //获得指定id的所有孩子的数组
    public function getChilden($id){
        $data=$this->select();
        $res=$this->getChildenId($data,$id);
        // dump($res);die;
        return $res;
    }

    //获得指定id的所有孩子的数组
    public function getChildenId($data,$id){
        static $arr=array();
        foreach ($data as $k => $v) {
            if($v['pid']==$id){
                $arr[]=$v['id'];
                $this->getChildenId($data,$v['id']);
            }
        }
        return $arr;
    }
}
