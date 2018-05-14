<?php
namespace app\admin\model;
use think\Model;

class Article extends Model
{
    protected static function init()
    {
        Article::event('before_insert', function ($datain) {
            if($_FILES['athumb']['tmp_name']){
                // 获取表单上传文件 例如上传了001.jpg
                $file = request()->file('athumb');
                // 移动到框架应用根目录/public/uploads/ 目录下
                $info = $file->move(ROOT_PATH . 'public' . DS . 'static/uploads/admin');
                // 已经上传成功，我们要把文件的路径写进数据库
                $datain['athumb']='/static/uploads/admin/'.$info->getSaveName();
            }
        });


        Article::event('before_update', function ($datain) {
            if($_FILES['athumb']['tmp_name']){
            	//1、删除原来的图片
	            $dataArticle = Article::find($datain->aid);
	            /*$_SERVER['DOCUMENT_ROOT'] string(129) "E:/2017-02-21--SoftWare/PHP/SOFTWARE/phpStudy_New/PHPTutorial/WWW/github/BicycleEnterpriseWebsite/BicycleEnterpriseWebsite/public"*/
	            $thumbpath=$_SERVER['DOCUMENT_ROOT'].$dataArticle->athumb;
	            if(file_exists($thumbpath)){
	            	@unlink($thumbpath);
	            }

	            //2、添加新图片
                // 获取表单上传文件 例如上传了001.jpg
                $file = request()->file('athumb');
                // 移动到框架应用根目录/public/uploads/ 目录下
                $info = $file->move(ROOT_PATH . 'public' . DS . 'static/uploads/admin');
                // 已经上传成功，我们要把文件的路径写进数据库
                $datain['athumb']='/static/uploads/admin/'.$info->getSaveName();
            }
        });

        Article::event('before_delete', function ($datain) {
            //1、删除原来的图片
            $dataArticle = Article::find($datain->aid);
            /*$_SERVER['DOCUMENT_ROOT'] string(129) "E:/2017-02-21--SoftWare/PHP/SOFTWARE/phpStudy_New/PHPTutorial/WWW/github/BicycleEnterpriseWebsite/BicycleEnterpriseWebsite/public"*/
            $thumbpath=$_SERVER['DOCUMENT_ROOT'].$dataArticle->athumb;
            if(file_exists($thumbpath)){
                @unlink($thumbpath);
            }
        });


    }
}    
