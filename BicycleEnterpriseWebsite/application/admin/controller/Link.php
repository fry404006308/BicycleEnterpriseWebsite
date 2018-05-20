<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Link as ModelLink;

use app\admin\controller\Base;

class Link extends Base
{
    //链接列表
    public function lst(){
        $linkres=db('link')->order('lid asc')->paginate(10);
        $this->assign('linkres',$linkres);
        return view('list');
    }
    public function index(){
        $linkres=db('link')->order('lid asc')->paginate(10);
        $this->assign('linkres',$linkres);
        return view('list');
    }

    //新增链接
    public function add(){
        if(request()->ispost()){
            $data=input('post.');
            $res=db('link')->insert($data);
            if($res){
                $this->success('添加链接成功！！','link/lst');
            }else{
                $this->error('添加链接失败！！');
            }
        }
        return view();
    }


    //链接排序
    public function lsort(){
        if(request()->ispost()){
            $data=input('post.');
            $lids=$data['lids'];
            $lsortnum=$data['lsortnum'];
            for ($i=0;$i<count($lids);$i++) {
                db('link')->where('lid',$lids[$i])->update(['lsort'=>$lsortnum[$i]]);
            }
        }
        $linkres=db('link')->order('lsort asc')->paginate(10);
        $this->assign('linkres',$linkres);
        return view('list');
    }

    //删除链接
    public function del(){
        $id=input('id');
        $res=db('link')->delete($id);
        if($res){
            $this->success('删除链接成功！！','link/lst');
        }else{
            $this->error('删除链接失败！！');
        }
    }


    //修改链接
    public function edit(){
        $id=input('id');
        $linkres=db('link')->find($id);
        $this->assign('linkres',$linkres);
        if(request()->ispost()){
            $datain=input('post.');
            $res=db('link')->update($datain);
            if($res){
                $this->success('添加链接成功！！','link/lst');
            }else{
                $this->error('添加链接失败！！');
            }
        }
        return view();
    }
}
