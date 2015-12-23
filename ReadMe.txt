

devLog.txt 记录版本变化。

重点项目：
1.film文件夹下的慕课网项目
2.wjl>Vgph项目
3.sERP下的出勤考核项目。
3.weixin目录下的微信项目。 




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


