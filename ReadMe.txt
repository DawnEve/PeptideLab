

devLog.txt ��¼�汾�仯��

�ص���Ŀ��
1.film�ļ����µ�Ľ������Ŀ
2.wjl>Vgph��Ŀ
3.sERP�µĳ��ڿ�����Ŀ��
3.weixinĿ¼�µ�΢����Ŀ�� 




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


