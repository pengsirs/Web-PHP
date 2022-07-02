<?php 
// +----------------------------------------------------------------------
// | Quotes [ 突破自己，极速前进！]
// +----------------------------------------------------------------------
// | By: 大彭Sir  <6283354@qq.com>
// +----------------------------------------------------------------------
// | Date: 2020年8月4日
// +----------------------------------------------------------------------
include("../includes/common.php");
$title='管理中心';
include './head.php';
if($islogin==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
?>
<?php
$count1=$DB->count("SELECT count(*) from web_dh");
$count2=$DB->count("SELECT count(*) from web_dh where active=1");
$mysqlversion=$DB->count("select VERSION()");
?>
  <div class="container" style="padding-top:70px;">
    <div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
      <div class="panel panel-primary">
        <div class="panel-heading"><h3 class="panel-title">后台管理首页</h3></div>
          <ul class="list-group">
            <li class="list-group-item"><span class="glyphicon glyphicon-time"></span> <b>现在时间：</b> <?=$date?></li>
			<li class="list-group-item"><span class="glyphicon glyphicon-home"></span> <a href="../" class="btn btn-xs btn-primary">返回首页</a>&nbsp;<a href="./set.php?mod=site" class="btn btn-xs btn-success">系统设置</a>
			<a href="./set_dh.php?mod=site" class="btn btn-xs btn-danger">作品管理</a>
			<a href="./set_app.php?mod=site" class="btn btn-xs btn-info">工具管理</a>
			<a href="./set_gxjl.php?mod=site" class="btn btn-xs btn-info">更新记录管理</a>
			</li>
          </ul>
      </div>
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">服务器信息</h3>
	</div>
	<ul class="list-group">
		<li class="list-group-item">
			<b>PHP 版本：</b><?php echo phpversion() ?>
			<?php if(ini_get('safe_mode')) { echo '线程安全'; } else { echo '非线程安全'; } ?>
		</li>
		<li class="list-group-item">
			<b>MySQL 版本：</b><?php echo $mysqlversion ?>
		</li>
		<li class="list-group-item">
			<b>服务器软件：</b><?php echo $_SERVER['SERVER_SOFTWARE'] ?>
		</li>
		<li class="list-group-item">
			<b>系统名称：</b>个人主页管理
		</li>
		<li class="list-group-item">
			<b>当前程序版本：</b>1.2
		</li>
		<li class="list-group-item">
			<b>作者：</b>大彭Sir
		</li>
		<li class="list-group-item">
			<b>版权所有：</b>HK工作室
		</li>
		
	</ul>
</div>
    </div>
  </div>