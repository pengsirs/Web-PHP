<?php
/**
 * 图片上传处理
 */
include("../includes/common.php");
if($islogin==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
header("Content-type:text/html;charset=utf-8");

// 配置文件需要上传到服务器的路径，需要允许所有用户有可写权限，否则无法上传成功
$uploadPath = '../img/';

// 获取提交的图片数据
$file = $_FILES['opus'];

// 获取图片回调路径
$callbackUrl = $_POST['callbackUrl'];

if($file['error'] > 0)
{

    $msg = '传入参数错误' . $file['error'] . "  ";
    exit($msg);
}
else
{

   // chmod($uploadPath, 0666);

    if(file_exists($uploadPath.$file['name'])){
       $msg = $file['name'] . "文件已经存在！";
       echo "<script>alert('文件已经存在！');</script>";
       exit();
    }
    else
    {
        if(move_uploaded_file($file['tmp_name'], $uploadPath.$file['name']))
        {

          $img_url = "img/".$file['name'];
          $img_url = urlencode($img_url);

          $url = $callbackUrl."?img_url={$img_url}";

          // 跳转
          header("location:{$url}");
          exit();

        }
        else
        {
            echo "<script>alert('上传失败！');</script>";
          exit("上传失败！");

        }

    }}?>