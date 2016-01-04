

devLog.txt 记录版本变化。

============================
重点项目：
1.film文件夹下的慕课网项目. --项目独立了
2.wjl>Vgph项目
3.sERP下的出勤考核项目。——项目独立了
3.weixin目录下的微信项目。--项目独立了
4.sERP下的domainPriceAPI是用cURL采集数据的。 --项目独立了
	已经备份到github我的库中：
	https://github.com/DawnEve/DawnPHPTools/tree/master/19-php_cURL_domainPriceAPI
5.jsonBlog目录下的博客系统。--项目独立了
6.think目录下的thinkPHP学习。 --项目独立了


----------------------------
问题探讨：

1.探讨因为人的理解能力不同，所以需要视频：http://tieba.baidu.com/p/4234602481?pid=81281570729
	不行，以后劝别人千万别看视频，看视频是有害的。文档都看不懂的，可以退出别干了。
2.前台数据全部ajax可以吗？http://tieba.baidu.com/p/4230703885?pid=81283455997
============================


===================================
-----------------------------------
js收藏
不可错过的javascript迷你库：http://yanhaijing.com/js/2015/12/29/mini-js-lib/
js加载器：https://github.com/yanhaijing/lodjs
抛物线讲解：http://www.zhangxinxu.com/wordpress/2013/12/javascript-js-%E5%85%83%E7%B4%A0-%E6%8A%9B%E7%89%A9%E7%BA%BF-%E8%BF%90%E5%8A%A8-%E5%8A%A8%E7%94%BB/
抛物线例子：http://www.zhangxinxu.com/study/201312/js-parabola.html


-----------------------------------
前端

用户为什么看不见？
http://isux.tencent.com/why-people-cannot-see.html


腾讯isux团队：
http://isux.tencent.com/
http://isux.tencent.com/front-end-development-for-year-and-a-half.html

腾讯 CDC，ISUX，WSD 这几个设计团队之间的区别是什么？各自的职责有哪些不同之处？
http://www.zhihu.com/question/20091143

-----------------------------------
===================================


Nginx开发从入门到精通
http://tengine.taobao.org/book/
http://www.cnblogs.com/skynet/p/4146083.html
http://nginx.org/

-----------------------------------
===================================

好看的UI:http://electron.atom.io/

================================
[19:40 2015/11/29]
--不放心国内git托管的质量，决定同时推送到2个地方
================================
github:
$git remote add github git@github.com:DawnEve/PeptideLab.git
$git push github master
#需要输入密码

oschina:
$https://git.oschina.net/dawnEve/PeptideLab
$git push origin master
#需要输入用户名和密码

---------------------
同时把代码提交到两个git代码托管的服务器上？
http://www.v2ex.com/t/37919#reply8

git remote add origin xxx 
git remote add another yyy 
git push origin master 
git push another master 

或修改git配置文件
vim .git/config

[remote "web"] 
url = ssh://server.example.org/home/ams/website.git 
url = ssh://other.exaple.org/home/foo/website.git

这样只需要 git push web 就两个都更新了
================================








---------------------
试用国内Git服务器2

我们强烈建议所有的git仓库都有一个README, LICENSE, .gitignore文件
https://git.oschina.net/dawnEve/PeptideLab


简易的命令行入门教程:

Git 全局设置:

git config --global user.name "dawnEve"
git config --global user.email "jimmymall@live.com"

创建 git 仓库:

mkdir PeptideLab
cd PeptideLab
git init
touch README.md
git add README.md
git commit -m "first commit"
git remote add origin https://git.oschina.net/dawnEve/PeptideLab.git
git push -u origin master

已有项目?

cd existing_git_repo
git remote add origin https://git.oschina.net/dawnEve/PeptideLab.git
git push -u origin master



==============================================
----------------------------------------------
为主机配备多个域名解析

1.
erp.dawnEve.cc解析ERP文件夹：sERP
weixin.dawnEve.cc解析微信文件夹：weixin
dawnEve.cc解析电影文件夹：film

peptide.xyz解析多肽管理项目:peptide


由innerForum.tk兜底，解析主域名。
-------------

NameVirtualHost *:80

<VirtualHost *:80>
    ServerAdmin JimmyMall@live.com
    DocumentRoot "F:/xampp/htdocs/"
    ServerName localhost
	ServerAlias localhost
    ErrorLog "logs/localhost-error.log"
    CustomLog "logs/localhost-access.log" common
</VirtualHost>


<VirtualHost *:80>
    ServerAdmin JimmyMall@live.com
    DocumentRoot "F:/xampp/htdocs/sERP"
    ServerName erp.dawnEve.cc
	ServerAlias erp.dawnEve.cc
    ErrorLog "logs/dawnEve.cc-erp-error.log"
    CustomLog "logs/dawnEve.cc-erp-access.log" common
</VirtualHost>

<VirtualHost *:80>
    ServerAdmin JimmyMall@live.com
    DocumentRoot "F:/xampp/htdocs/weixin"
    ServerName weixin.dawnEve.cc
    ErrorLog "logs/dawnEve.cc-weixin-error.log"
    CustomLog "logs/dawnEve.cc-weixin-access.log" common
</VirtualHost>

<VirtualHost *:80>
    ServerAdmin JimmyMall@live.com
    DocumentRoot "F:/xampp/htdocs/film"
    ServerName dawnEve.cc
	ServerAlias www.dawnEve.cc, dawnEve.cc, *.dawnEve.cc
    ErrorLog "logs/dawnEve.cc-film-error.log"
    CustomLog "logs/dawnEve.cc-film-access.log" common
</VirtualHost>







<VirtualHost *:80>
    ServerAdmin JimmyMall@live.com
    DocumentRoot "F:/xampp/htdocs/peptide"
    ServerName peptide.xyz
	ServerAlias peptide.xyz, www.peptide.xyz
    ErrorLog "logs/peptide.xyz-error.log"
    CustomLog "logs/peptide.xyz-access.log" common
</VirtualHost>

<VirtualHost *:80>
    ServerAdmin JimmyMall@live.com
    DocumentRoot "F:/xampp/htdocs/"
    ServerName innerforum.tk
	ServerAlias innerforum.tk,www.innerforum.tk
    ErrorLog "logs/innerforum.tk-error.log"
    CustomLog "logs/innerforum.tk-access.log" common
</VirtualHost>

----------------------------------------------
==============================================



==============================================
----------------------------------------------
[failed]怎么更灵活的配备子域名？【apache rewrite和.htaccess的配置】


简单快速的Apache二级域名实现方法介绍

http://www.jb51.net/article/21022.htm
.htaccess的配置：http://www.php1.cn/article/9583.html


配置Apache服务器的二级域名支持：
http://www.cnblogs.com/derrck/archive/2010/08/04/1791704.html





=============================



=============================


















----------------------------------------------
==============================================