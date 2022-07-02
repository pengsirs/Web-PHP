<?php 
// +----------------------------------------------------------------------
// | Quotes [ 突破自己，极速前进！]
// +----------------------------------------------------------------------
// | By: 大彭Sir  <6283354@qq.com>
// +----------------------------------------------------------------------
// | Date: 2020年8月4日
// +----------------------------------------------------------------------
include("../includes/common.php");
$title='后台管理';
include './head.php';
if($islogin==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
?>
  <div class="container" style="padding-top:70px;">
    <div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
<?php
$mod=isset($_GET['mod'])?$_GET['mod']:null;
if($mod=='site_n'){
	$sitename=$_POST['sitename'];
	$title=$_POST['title'];
	$keywords=$_POST['keywords'];
	$description=$_POST['description'];
	$modal=$_POST['modal'];
	$url=$_POST['url'];
	$music=$_POST['music'];
	$kfqq=$_POST['kfqq'];
	$tsid=$_POST['tsid'];
	$qqjump=$_POST['qqjump'];
	$pwd=$_POST['pwd'];
	$admin_user=$_POST['admin_user'];
	$email_pw=$_POST['email_pw'];
	$email_user=$_POST['email_user'];
	saveSetting('email_pw',$email_pw);
	saveSetting('admin_user',$admin_user);
	saveSetting('email_user',$email_user);
	saveSetting('sitename',$sitename);
	saveSetting('title',$title);
	saveSetting('keywords',$keywords);
	saveSetting('description',$description);
	saveSetting('modal',$modal);
	saveSetting('url',$url);
	saveSetting('music',$music);
	saveSetting('kfqq',$kfqq);
	saveSetting('tsid',$tsid);
	saveSetting('qqjump',$qqjump);
	if(!empty($pwd))saveSetting('admin_pwd',$pwd);
	$ad=$CACHE->clear();
	if($ad)showmsg('修改成功！',1);
	else showmsg('修改失败！<br/>'.$DB->error(),4);
}elseif($mod=='site'){
?>
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">系统设置</h3></div>
<div class="panel-body">
  <form action="./set.php?mod=site_n" method="post" class="form-horizontal" role="form">
	<div class="form-group">
	  <label class="col-sm-2 control-label">网站标题</label>
	  <div class="col-sm-10"><input type="text" name="sitename" value="<?php echo $conf['sitename']; ?>" class="form-control" required/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">站点副标题</label>
	  <div class="col-sm-10"><input type="text" name="title" value="<?php echo $conf['title']; ?>" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">站点SEO</label>
	  <div class="col-sm-10"><input type="text" name="keywords" value="<?php echo $conf['keywords']; ?>" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">站点描述</label>
	  <div class="col-sm-10"><input type="text" name="description" value="<?php echo $conf['description']; ?>" class="form-control"></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">网站介绍</label>
	  <div class="col-sm-10"><textarea type="text" id="jieshao" rows="5" name="modal" class="form-control"></textarea></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">网站备案</label>
	  <div class="col-sm-10"><input type="text" name="music" value="<?php echo $conf['music']; ?>" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">站长QQ</label>
	  <div class="col-sm-10"><input type="text" name="kfqq" value="<?php echo $conf['kfqq']; ?>" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">发信账号</label>
	  <div class="col-sm-10"><input type="text" name="email_user" value="<?php echo $conf['email_user']; ?>" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">发信密码</label>
	  <div class="col-sm-10"><input type="text" name="email_pw" value="<?php echo $conf['email_pw']; ?>" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">用户名</label>
	  <div class="col-sm-10"><input type="text" name="admin_user" value="<?php echo $conf['admin_user']; ?>" class="form-control" placeholder="不修改请留空"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">密码重置</label>
	  <div class="col-sm-10"><input type="text" name="pwd" value="" class="form-control" placeholder="不修改请留空"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">选择项</label>
	  <div class="col-sm-10"><select class="form-control" name="qqjump" default="<?php echo $conf['qqjump']?>"><option value="0">关闭</option><option value="1">开启</option></select></div>
	</div><br/>
	<div class="form-group">
	  <div class="col-sm-offset-2 col-sm-10"><input type="submit" name="submit" value="修改" class="btn btn-primary form-control"/><br/>
	 </div>
	</div>
  </form>
</div>
</div>
<?php
}
?>
<script>
document.getElementById("jieshao").value="<?php echo $conf['modal']; ?>";
var items = $("select[default]");
for (i = 0; i < items.length; i++) {
	$(items[i]).val($(items[i]).attr("default")||0);
}
</script>
    </div>
  </div>