

devLog.txt 记录版本变化。


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


