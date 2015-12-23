ERP方案

1.需求
http://tieba.baidu.com/p/4221052277
我想做一个出勤统计表，让每个员工自己统计每天的出勤情况。
比如：今天是在岗还是出差？出差的话，花了多少路费，多少住宿费。

然后每周自动把整个部门的差旅单打印出来。

同时统计每个人至今的差旅费有多少。

这样的小软件，用什么语言编最好？VB？VBA？C？C++？数据库？






2.数据表
create database serp;

--不要id了。
CREATE TABLE `worker` (
  `usr` varchar(40) DEFAULT NULL,
  `psw` varchar(40) DEFAULT NULL,
  `add_time` varchar(30) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `QQ` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `group` int(20) DEFAULT NULL,
	
  
  PRIMARY KEY (`usr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


----insert into worker values('wjl','123456',1450617215,15890149335,469004330,'wjl@163.com',1);
insert into worker values('wjl','7c4a8d09ca3762af61e59520943dc26494f8941b',1450617215,15890149335,469004330,'wjl@163.com',1);
insert into worker values('zyj','7c4a8d09ca3762af61e59520943dc26494f8941b',1450617215,15890149335,469004330,'zyj@163.com',1);
insert into worker values('jim','7c4a8d09ca3762af61e59520943dc26494f8941b',1450617215,15890149335,469004330,'zyj@163.com',1);


CREATE TABLE `status` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `usr` varchar(40) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  `add_time` varchar(30) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,

  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE `money` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `usr` varchar(40) DEFAULT NULL,
  `sid` varchar(20) DEFAULT NULL,
  `fee` varchar(20) DEFAULT NULL,
  `add_time` varchar(30) DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL,

  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into money(usr,sid,fee,add_time,category) values('wjl',11,100,1450672358,'路费');

3.开发功能
	[1] 可以登陆，退出。
	[2] 可以签到.
	
	<tips>为什么php中写的js不执行？
	http://www.oschina.net/question/176226_143359
	<script>应为<script type="text/javascript">。
	
	前台基本够用。
	
	[3]后台汇总计算金额，按照用户汇总金额；增加了activeRecord类class/db/activeRecord.class.php
	
	<tips>注意 group是mysql保留字，字段中使用需要加`顶层数字键最左端`的符号。
	update worker set group=2 where usr='wjl';
	
	[4] 增加了模板引擎类，TPL类class/tpl.class.php
	不过不会用模板引擎。
	目前用的是js传值，先把php的json字符串打印到js中，再用js解析成对象，再组装dom到文件中。
	
	可以浏览用户。
	[5] 删除用户。因为太关键，所以做了两次js确认。
		- [1] 不能删除自己
	[6] 增加用户。如果有该用户，则提示。
	[7] 按照日期汇总签到。
		事件绑定：myAddEvent(window,'load',myCalendar);

		
		
	修改用户。
	
	
