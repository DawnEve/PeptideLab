<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
	
		echo '<pre>', C('name');
		$this->show('wjl');
		echo '<pre>', C('email');
		echo '<pre>', C('my_config2', null, 'default_config');//可以设置默认值
		
		echo '<hr>',C('DATA_CACHE_TIME');//动态配置赋值仅对当前请求有效，不会对以后的请求造成影响。
		echo '<hr>',C('USER_CONFIG.USER_TYPE',null,100);//动态配置赋值仅对当前请求有效，不会对以后的请求造成影响。
		dump(C());//获取所有结果
		
        //$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }
	
	public function Read(){
		echo 'from index->read';
		dump( C('URL_CASE_INSENSITIVE') );
	
	}
	
	function router(){
		dump( C('URL_ROUTER_ON') );
	}
	

}

/*
http://localhost/?m=home&c=user&a=login&var=value


*/