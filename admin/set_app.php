<?php 
// +----------------------------------------------------------------------
// | Quotes [ 突破自己，极速前进！]
// +----------------------------------------------------------------------
// | By: 大彭Sir  <6283354@qq.com>
// +----------------------------------------------------------------------
// | Date: 2020年8月4日
// +----------------------------------------------------------------------
include("../includes/common.php");
$title='工具管理';
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
<div class="panel-heading"><h3 class="panel-title">新增工具</h3></div>';
echo '<div class="panel-body">';
echo '<form action="./set_app.php?my=add_submit" method="POST">
<div class="form-group">
<label>*标题:</label><br>
<input type="text" class="form-control" name="name" value="" required>
</div>
<div class="form-group">
<label>*简介:</label><br>
<input type="text" class="form-control" name="jianjie" value="" required>
</div>
<div class="form-group">
<label>*图片:</label><br>
<input type="text" readonly class="form-control" name="content" value="暂无" required/>
</div>
<div class="form-group">
<label>*工具URL:</label><br>
<input type="text" class="form-control" name="url" value="" required>
</div>
<div class="form-group">
<label>*是否显示:</label><br>
<select class="form-control" name="active"><option value="1">1_是</option><option value="0">0_否</option></select>
</div>
<br/>
</div>
<input type="submit" class="btn btn-primary btn-block" value="确定添加"></form>';
echo '<br/><a href="./set_app.php">>>返回工具列表</a>';
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
$row=$DB->get_row("select * from web_app where id='$id' limit 1");
echo '<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">修改工具信息</h3></div>';
echo '<div class="panel-body">';
echo '<form action="./set_app.php?my=edit_submit&id='.$id.'" method="POST">
<div class="form-group">
<label>标题:</label><br>
<input type="text" class="form-control" name="name" value="'.$row['name'].'" required>
</div>
<div class="form-group">
<label>简介:</label><br>
<input type="text" class="form-control" name="jianjie" value="'.$row['jianjie'].'" required>
</div>
<div class="form-group">
<label>图片:</label><br>
<input class="form-control" readonly id="xianshi" rows="10" name="content"/>
</div>
    <script>  
       document.getElementById("xianshi"). value="'.$row['content'].'"  
    </script> 
<div class="form-group">
<label>工具URL:</label><br>
<input type="text" class="form-control" name="url" value="'.$row['url'].'" required>
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
echo '<br/><a href="./set_app.php">>>返回工具列表</a>';
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
if($name==NULL or $url==NULL){
showmsg('保存错误,请确保每项都不为空!',3);
} else {
$sql="insert into `web_app` (`name`,`jianjie`,`content`,`url`,`active`) values ('".$name."','".$jianjie."','".$content."','".$url."','".$active."')";
if($DB->query($sql)){
	showmsg('添加工具成功！<br/><br/><a href="./set_app.php">>>返回工具列表</a>',1);
}else
	showmsg('添加工具失败！'.$DB->error(),4);
}
}
elseif($my=='edit_submit')
{
$id=$_GET['id'];
$rows=$DB->get_row("select * from web_app where id='$id' limit 1");
if(!$rows)
	showmsg('当前记录不存在！',3);
$name=$_POST['name'];
$jianjie=$_POST['jianjie'];
$content=$_POST['content'];
$url=$_POST['url'];
$active=$_POST['active'];
if($name==NULL or $url==NULL){
showmsg('保存错误,请确保每项都不为空!',3);
} else {
if($DB->query("update web_app set name='$name',content='$content',jianjie='$jianjie',url='$url',active='$active' where id='{$id}'"))
	showmsg('修改工具成功！<br/><br/><a href="./set_app.php">>>返回工具列表</a>',1);
else
	showmsg('修改工具失败！'.$DB->error(),4);
}
}
elseif($my=='delete')
{
$id=$_GET['id'];
$sql="DELETE FROM web_app WHERE id='$id'";
if($DB->query($sql))
	showmsg('删除成功！<br/><br/><a href="./set_app.php">>>返回工具列表</a>',1);
else
	showmsg('删除失败！'.$DB->error(),4);
}
else
{

$numrows=$DB->count("SELECT count(*) from web_app");
$sql=" 1";
$con='系统共有 <b>'.$numrows.'</b> 个工具<br/><a href="./set_app.php?my=add" class="btn btn-primary">新增工具</a>';

echo '<div class="alert alert-info">';
echo $con;
echo '</div>';

?>
      <div class="table-responsive">
        <table class="table table-striped">
          <thead><tr><th>ID</th><th>标题</th><th>简介</th><th>URL</th><th>操作</th></tr></thead>
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

$rs=$DB->query("SELECT * FROM web_app WHERE{$sql} order by id asc");
while($res = $DB->fetch($rs))
{
echo '<tr><td><b>'.$res['id'].'</b></td><td>'.$res['name'].'</b></td><td>'.$res['jianjie'].'</td><td>'.$res['url'].'</td><td>'.($res['active']==1?'<font color=green>显示中</font>':'<font color=red>未显示</font>').'</td><td><a href="./set_app.php?my=edit&id='.$res['id'].'" class="btn btn-info btn-xs">编辑</a>&nbsp;<a href="./set_app.php?my=delete&id='.$res['id'].'" class="btn btn-xs btn-danger" onclick="return confirm(\'你确实要删除此工具吗？\');">删除</a></td></tr>';
}
?>
          </tbody>
        </table>
      </div>
<?php }?>
    </div>
  </div>