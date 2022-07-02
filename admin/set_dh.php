<?php 
// +----------------------------------------------------------------------
// | Quotes [ 突破自己，极速前进！]
// +----------------------------------------------------------------------
// | By: 大彭Sir  <6283354@qq.com>
// +----------------------------------------------------------------------
// | Date: 2020年8月4日
// +----------------------------------------------------------------------
include("../includes/common.php");
$title='作品管理';
include './head.php';
if($islogin==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
?>
  <div class="container" style="padding-top:70px;">
    <div class="col-sm-12 col-md-10 center-block" style="float: none;">
<?php
$my=isset($_GET['my'])?$_GET['my']:null;

if($my=='add')
{
echo '<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">新增作品</h3></div>';
echo '<div class="panel-body">';
echo '<label>*上传作品图片:</label><form action="upload_img.php" target="post_frame"  enctype="multipart/form-data" method="post">
<div class="form-group" style="display:flex">
<input type="file" id="file" name="opus" value="" width="200" />
<input  type="submit" value="上传" name="submit" />
<input type="hidden" name="callbackUrl" value="/admin/callback.php"  />
<iframe  name="post_frame" style="display:none;"> </iframe>
</div>
</form>';
echo '<form action="./set_dh.php?my=add_submit" method="POST">
<div class="form-group">
<label>*作品图片:</label>
<br>
<textarea rows="5" id="fileimg" type="text" class="form-control" name="content" value="" required></textarea>
</div>
<div class="form-group">
<label>*作品标题:</label><br>
<input type="text" class="form-control" name="name" value="" required>
</div>
<div class="form-group">
<label>*作品简介:</label><br>
<input type="text" class="form-control" name="jianjie" value="" required>
</div>
<div class="form-group">
<label>*下载链接:</label><br>
<input type="text" class="form-control" name="downn" value="">
</div>
<div class="form-group">
<label>*演示链接:</label><br>
<input type="text" class="form-control" name="url" value="">
</div>
<div class="form-group">
<label>*是否显示:</label><br>
<select class="form-control" name="active"><option value="1">1_是</option><option value="0">0_否</option></select>
</div>
<br/>
</div>
<input type="submit" class="btn btn-primary btn-block" value="确定添加"></form>';
echo '<br/><a href="./set_dh.php">>>返回作品列表</a>';
echo '</div></div>
<script>
$("select[name=\'is_curl\']").change(function(){
	if($(this).val() == 1){
		$("#curl_display").css("display","inherit");
	}else{
		$("#curl_display").css("display","none");
	}
});
function Addstr(id, str) {
	$("#"+id).val($("#"+id).val()+str);
}
</script>';
}
elseif($my=='edit')
{
$id=$_GET['id'];
$row=$DB->get_row("select * from web_dh where id='$id' limit 1");
echo '<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">修改作品信息</h3></div>';
echo '<div class="panel-body">';
echo '<form action="./set_dh.php?my=edit_submit&id='.$id.'" method="POST">
<div class="form-group">
<label>作品标题:</label><br>
<input type="text" class="form-control" name="name" value="'.$row['name'].'" required>
</div>
<div class="form-group">
<label>作品简介:</label><br>
<input type="text" class="form-control" name="jianjie" value="'.$row['jianjie'].'" required>
</div>
<div class="form-group">
<label>作品图片:</label><br>
<textarea class="form-control" id="xianshi" rows="10" name="content" required>
</textarea>
</div>
<script>  
   document.getElementById("xianshi"). value="'.$row['content'].'"  
</script> 
<div class="form-group">
<label>下载链接:</label><br>
<input type="text" class="form-control" name="downn" value="'.$row['downn'].'">
</div>
<div class="form-group">
<label>演示链接:</label><br>
<input type="text" class="form-control" name="url" value="'.$row['url'].'">
</div>
<div class="form-group">
<label>是否显示:</label><br>
<select class="form-control" name="active" default="'.$row['active'].'"><option value="1">1_是</option><option value="0">0_否</option></select>
</div>
<br/>
</div>
<input type="submit" class="btn btn-primary btn-block"
value="确定修改"></form>
';
echo '<br/><a href="./set_dh.php">>>返回作品列表</a>';
echo '</div></div>
<script>
$("select[name=\'is_curl\']").change(function(){
	if($(this).val() == 1){
		$("#curl_display").css("display","inherit");
	}else{
		$("#curl_display").css("display","none");
	}
});
function Addstr(id, str) {
	$("#"+id).val($("#"+id).val()+str);
}
var items = $("select[default]");
for (i = 0; i < items.length; i++) {
	$(items[i]).val($(items[i]).attr("default")||0);
}
</script>';
}
elseif($my=='add_submit')
{
$name=$_POST['name'];
$jianjie=$_POST['jianjie'];
$url=$_POST['url'];
$content=$_POST['content'];
$active=$_POST['active'];
$price=$_POST['price'];
$downn=$_POST['downn'];
if($name==NULL){
showmsg('保存错误,请确保每项都不为空!',3);
} else {
$sql="insert into `web_dh` (`name`,`jianjie`,`content`,`url`,`active`,`price`,`downn`) values ('".$name."','".$jianjie."','".$content."','".$url."','".$active."','".$price."','".$downn."')";
if($DB->query($sql)){
	showmsg('添加作品成功！<br/><br/><a href="./set_dh.php">>>返回作品列表</a>',1);
}else
	showmsg('添加作品失败！'.$DB->error(),4);
}
}
elseif($my=='edit_submit')
{
$id=$_GET['id'];
$rows=$DB->get_row("select * from web_dh where id='$id' limit 1");
if(!$rows)
	showmsg('当前记录不存在！',3);
$name=$_POST['name'];
$jianjie=$_POST['jianjie'];
$content=$_POST['content'];
$url=$_POST['url'];
$active=$_POST['active'];
$price=$_POST['price'];
$downn=$_POST['downn'];
if($name==NULL){
showmsg('保存错误,请确保每项都不为空!',3);
} else {
if($DB->query("update web_dh set name='$name',content='$content',jianjie='$jianjie',url='$url',active='$active',price='$price',downn='$downn' where id='{$id}'"))
	showmsg('修改作品成功！<br/><br/><a href="./set_dh.php">>>返回作品列表</a>',1);
else
	showmsg('修改作品失败！'.$DB->error(),4);
}
}
elseif($my=='delete')
{
$id=$_GET['id'];
$sql="DELETE FROM web_dh WHERE id='$id'";
if($DB->query($sql))
	showmsg('删除成功！<br/><br/><a href="./set_dh.php">>>返回作品列表</a>',1);
else
	showmsg('删除失败！'.$DB->error(),4);
}
else
{

$numrows=$DB->count("SELECT count(*) from web_dh");
$sql=" 1";
$con='系统共有 <b>'.$numrows.'</b> 个作品<br/><a href="./set_dh.php?my=add" class="btn btn-primary">新增作品</a>';

echo '<div class="alert alert-info">';
echo $con;
echo '</div>';

?>
      <div class="table-responsive">
        <table class="table table-striped">
          <thead><tr><th>ID</th><th>标题</th><th>简介</th><th>链接</th><th>操作</th></tr></thead>
          <tbody>
<?php
$pagesize=30;
$pages=intval($numrows/$pagesize);
if ($numrows%$pagesize)
{
 $pages++;
 }
if (isset($_GET['page'])){
$page=intval($_GET['page']);
}
else{
$page=1;
}
$offset=$pagesize*($page - 1);

$rs=$DB->query("SELECT * FROM web_dh WHERE{$sql} order by id asc");
while($res = $DB->fetch($rs))
{
echo '<tr><td><b>'.$res['id'].'</b></td><td>'.$res['name'].'</b></td><td>'.$res['jianjie'].'</td><td>'.$res['url'].'</td><td>'.($res['active']==1?'<font color=green>显示中</font>':'<font color=red>未显示</font>').'</td><td><a href="./set_dh.php?my=edit&id='.$res['id'].'" class="btn btn-info btn-xs">编辑</a>&nbsp;<a href="./set_dh.php?my=delete&id='.$res['id'].'" class="btn btn-xs btn-danger" onclick="return confirm(\'你确实要删除此作品链接吗？\');">删除</a></td></tr>';
}
?>
          </tbody>
        </table>
      </div>
<?php }?>
    </div>
  </div>