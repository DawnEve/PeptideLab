

devLog.txt ��¼�汾�仯��

�ص���Ŀ��
1.film�ļ����µ�Ľ������Ŀ
2.wjl>Vgph��Ŀ
3.sERP�µĳ��ڿ�����Ŀ��
3.weixinĿ¼�µ�΢����Ŀ�� 

4.̽����Ϊ�˵����������ͬ��������Ҫ��Ƶ��http://tieba.baidu.com/p/4234602481?pid=81281570729
5.ǰ̨����ȫ��ajax������
http://tieba.baidu.com/p/4230703885?pid=81283455997





�ÿ���UI:http://electron.atom.io/

================================
[19:40 2015/11/29]
--�����Ĺ���git�йܵ�����������ͬʱ���͵�2���ط�
================================
github:
$git remote add github git@github.com:DawnEve/PeptideLab.git
$git push github master
#��Ҫ��������

oschina:
$https://git.oschina.net/dawnEve/PeptideLab
$git push origin master
#��Ҫ�����û���������

---------------------
ͬʱ�Ѵ����ύ������git�����йܵķ������ϣ�
http://www.v2ex.com/t/37919#reply8

git remote add origin xxx 
git remote add another yyy 
git push origin master 
git push another master 

���޸�git�����ļ�
vim .git/config

[remote "web"] 
url = ssh://server.example.org/home/ams/website.git 
url = ssh://other.exaple.org/home/foo/website.git

����ֻ��Ҫ git push web ��������������
================================








---------------------
���ù���Git������2

����ǿ�ҽ������е�git�ֿⶼ��һ��README, LICENSE, .gitignore�ļ�
https://git.oschina.net/dawnEve/PeptideLab


���׵����������Ž̳�:

Git ȫ������:

git config --global user.name "dawnEve"
git config --global user.email "jimmymall@live.com"

���� git �ֿ�:

mkdir PeptideLab
cd PeptideLab
git init
touch README.md
git add README.md
git commit -m "first commit"
git remote add origin https://git.oschina.net/dawnEve/PeptideLab.git
git push -u origin master

������Ŀ?

cd existing_git_repo
git remote add origin https://git.oschina.net/dawnEve/PeptideLab.git
git push -u origin master



==============================================
----------------------------------------------
Ϊ�����䱸�����������

1.
erp.dawnEve.cc����ERP�ļ��У�sERP
weixin.dawnEve.cc����΢���ļ��У�weixin
dawnEve.cc������Ӱ�ļ��У�film

peptide.xyz�������Ĺ�����Ŀ:peptide


��innerForum.tk���ף�������������
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
[failed]��ô�������䱸����������apache rewrite��.htaccess�����á�


�򵥿��ٵ�Apache��������ʵ�ַ�������

http://www.jb51.net/article/21022.htm
.htaccess�����ã�http://www.php1.cn/article/9583.html


����Apache�������Ķ�������֧�֣�
http://www.cnblogs.com/derrck/archive/2010/08/04/1791704.html





=============================



=============================


















----------------------------------------------
==============================================