<?php
//index_do
//==================��֤�û����������Ƿ���ȷ
//��ȡ����
if(isset($_REQUEST['dopost'])){
	$dopost=$_REQUEST['dopost'];
}else{
	$dopost='';
}

if(isset($_GET['fmdo'])){
	$fmdo=$_GET['fmdo'];
}else{
	$fmdo='';
}

if(isset($_GET['cktype'])){
	$cktype=$_GET['cktype'];
}else{
	$cktype='';
}

if(isset($_GET['uid'])){
	$uid=$_GET['uid'];
}else{
	$uid='';
}


//��֤�ж�
if($dopost=='checkuser'){
	if($fmdo=='user'){
		if($cktype==0){
			//txtUsername check
			$uid=0;
		}elseif($cktype==1){
			//uname check
			$uid=1;
		}
	}
}else if($dopost=='checkmail'){
	if($fmdo=='user'){
		//email check
		$email=1;
	}
}


echo '<b style="color:blue">ok ok ok?</b>';

if('resetpassword'==$dopost){
	echo 'resetpassword';
}

//==================��������
if(isset($_POST['mysubmit'])){
	$mysubmit=$_POST['mysubmit'];
}else{
	$mysubmit='';
}

if(isset($_POST['txtUsername'])){
	$txtUsername=$_POST['txtUsername'];
}else{
	$txtUsername='';
}

if(isset($_POST['email'])){
	$email=$_POST['email'];
}else{
	$email='';
}


?>