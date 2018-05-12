<?php
namespace app\admin\controller;
use think\Controller;

use app\admin\model\Article as ModelArticle;
use app\admin\model\Cate as ModelCate;


use app\admin\controller\Base;

class Article extends Base
{
    public function lst(){
        $dataout=db('article')->alias('a')->field('a.*,c.catename')->join('bk_cate c','a.acateid=c.id')->paginate(2);
        $this->assign('dataout',$dataout);
        return view('list');
    }

    public function add(){
        if(request()->isPost()){
            $datain=input('post.');
            $datain['time']=time();
            $modelArticle=new ModelArticle();
            //2、获取传入的文件数据
            if($_FILES['athumb']['tmp_name']){
                // 获取表单上传文件 例如上传了001.jpg
                $file = request()->file('athumb');
                // 移动到框架应用根目录/public/uploads/ 目录下
                $info = $file->move(ROOT_PATH . 'public' . DS . 'static/uploads/admin');
                // 已经上传成功，我们要把文件的路径写进数据库
                $datain['athumb']='/static/uploads/admin/'.$info->getSaveName();
            }
            if($modelArticle->save($datain)){
                $this->success('添加文章成功！！','article/lst');
            }else{
                $this->error('添加文章失败！！');
            }
            // dump($datain);die;
            return;
        }
        //将栏目信息显示回增加界面
        //catetree方法新增了栏目的level字段
        $modelCate=new ModelCate();
        $data=$modelCate->catetree();
        $this->assign('data',$data);

        return view();
    }



}
