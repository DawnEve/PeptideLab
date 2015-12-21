ERP方案


1.需求

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
	
	为什么php中写的js不执行？
	http://www.oschina.net/question/176226_143359
	<script>应为<script type="text/javascript">。
	
	
	
