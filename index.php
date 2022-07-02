<?php
// +----------------------------------------------------------------------
// | Web个人主页项目
// +----------------------------------------------------------------------
// | By: 大彭Sir  <6283354@qq.com>
// +----------------------------------------------------------------------
// | Date: 2022年4月10日
// +----------------------------------------------------------------------
include("./includes/common.php");
include("./includes/txprotect.php");
?>
<!DOCTYPE HTML>
<html>

<head>
	<meta charset="utf-8">
	<!--网页名称-->
	<title><?php echo $conf['sitename'] ?> - <?php echo $conf['title'] ?></title>
	<meta name="baidu-site-verification" content="b9lOcChmbf">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
	<!--关键词-->
	<meta name="keywords" content="<?php echo $conf['keywords'] ?>">
	<!--描述-->
	<meta name="description" content="<?php echo $conf['description'] ?>">
	<!--浏览器小图标，如有，请上传-->
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<script src="js/jquery.js"></script>
	<script src="bootstrap/js/bootstrap.js"></script>
</head>

<body>
	<div id="app">
		<div class="phone-nav">
		<div class="blog-btn">BLOG</div>
			<div class="admin-btn">LOG IN</div>
		</div>
		<div class="kong center">

		</div>
		<div class="container-fluid nav-content">
			<div class="nav-box nav-content">
				<li>
					<div tab="#home" class="home-btn">首页</div>
				</li>
				<li>
					<div tab="#contact" class="contact-btn">联系</div>
				</li>
			</div>
			<div class="zw"></div>
			<div class="nav-box nav-content">
				<li>
					<div tab="#tools" class="tools-btn">工具</div>
				</li>
				<li>
					<div tab="#about" class="about-btn">关于</div>
				</li>
			</div>
		</div>
		<div class="logo center">
			<img src="http://q1.qlogo.cn/g?b=qq&amp;nk=<?php echo $conf['kfqq'] ?>&amp;s=100" alt="' . $res['name'] . '-logo">
		</div>
		<div class="center pengsir-title">
			<?php echo $conf['sitename'] ?>
		</div>
		<div class="center pengsir-jianjie">
			<?php echo $conf['title'] ?>
		</div>

	<div class="content">
		<div class="content-list clearfix" id="home">
			<h1 class="h1-big">首页</h1>

	<div class="big">
	<?php
			$rs = $DB->query("SELECT * FROM web_dh WHERE active=1 order by id desc");
			while ($res = $DB->fetch($rs)) {
				echo '<div class="col-xs-12 col-sm-6 col-md-3 list-box">
				<div class="works">
					<img src="' . $res['content'] . '" class="img-responsive works-img" alt="' . $res['name'] . '-logo">
					<div class="box-title">' . $res['name'] . '</div>
					<div class="box-jianjie">' . $res['jianjie'] . '</div>
					<div class="down">
						<div class="down-btn yanshi"  url="' . $res['url'] . '">查看演示</div>
						<div class="down-btn xiazai"  url="' . $res['downn'] . '">下载源码</div>
					</div>
				</div>
			</div>';
			}
			?>
	</div>
		</div>




		<div class="content-list clearfix" id="contact">
			<h1 class="h1-big">联系站长</h1>
			<form class="form" action="/mail/email.php" method="post" target="ifr">
            <input type="text" placeholder="您的联系方式" class="form-control" name="name"><br>
            <input style="display: none;" type="text" class="form-control" value="<?php echo $conf['email_user'] ?>" name="email_user">
            <input style="display: none;" type="text" class="form-control" value="<?php echo $conf['email_pw'] ?>" name="email_pw">
            <textarea name="message" class="form-control" rows="3" placeholder="请输入您想说的话！"></textarea>
            <input type="submit" class="form-control btn btn-success" value="提交">
            </form>
            <iframe style="display: none;" name="ifr"></iframe>
		</div>


		<div class="content-list clearfix" id="tools">
			<h1 class="h1-big">开发工具</h1>
			<?php
			$rs = $DB->query("SELECT * FROM web_app WHERE active=1 order by id desc");
			while ($res = $DB->fetch($rs)) {
				echo '<div class="col-xs-12 col-sm-6 col-md-3 list-box">
						<div url="' . $res['url'] . '" class="box">
							<div class="tools-logo"></div>
							<div class="box-content">
								<div class="box-title">' . $res['name'] . '</div>
								<div class="box-jianjie">' . $res['jianjie'] . '</div>
							</div>
						</div>
						</div>';
			}
			?>
		</div>
		<div class="content-list clearfix" id="about">
			<h1 class="h1-big">关于本站</h1>
			<div class="about">
            <div class="about-title">站点介绍</div>
            <div class="about-content">
            <div class="jieshao">
				<div>版本信息：3.1</div>
				<div>站点名称：<?php echo $conf['sitename'] ?></div>
				<div>网站备案：<?php echo $conf['music'] ?></div>
				<div>更多介绍：<?php echo $conf['modal'] ?></div>
				<div>站长统计：<script type="text/javascript">document.write(unescape("%3Cspan id='cnzz_stat_icon_1281098534'%3E%3C/span%3E%3Cscript src='https://s4.cnzz.com/z_stat.php%3Fid%3D1281098534%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script>
</div>
			    <div>听我一言：<div id="hitokoto"></div></div>
			</div>
            </div>
			<!-- 更新记录 -->
			<div class="about-title" style="background: #495A80;">更新记录</div>
            <div class="about-content">
            <div class="jieshao">
		<?php
			$rs = $DB->query("SELECT * FROM web_gxjl WHERE active=1 order by id desc");
			while ($res = $DB->fetch($rs)) {
				echo nl2br( '<ul id = "sale_list" class="lzc_timeline"><li class="time-line-item" ><div class="lzc_icon"></div><div class="lzc_label" data-scroll-reveal="enter right over 1s" ><span style="font-weight: 800;">' . $res['name'] . '</span><div style="margin-top:8px;font-weight:300">'.$res['content'].'</div></div></li></ul>');
			}
			?>
			</div>
            </div>
            </div>
		</div>

			


		</div>

		<footer>
			<div class="foot">
				<li>
					<div tab="#home" class="home-btn">首页</div>
				</li>
				<li>
					<div tab="#contact" class="contact-btn">联系</div>
				</li>
				<li>
					<div tab="#tools" class="tools-btn">工具</div>
				</li>
				<li>
					<div tab="#about" class="about-btn">关于</div>
				</li>
			</div>
		</footer>
	</div>

	<!-- 主题颜色修改 -->
	<div id="themeColor">
		<div class="coloricon">
			<img style="width: 100%;" src="img/yanse.png">
		</div>
		<div background="#9999ff" style="background-color: #9999ff;" class="color"></div>
		<div background="#f17c67" style="background-color: #f17c67;" class="color"></div>
		<div background="#70a19f" style="background-color: #70a19f;" class="color"></div>
		<div background="#495A80" style="background-color: #495A80;" class="color"></div>
	</div>

	
	<div class="bottom"></div>
</body>
<script>

</script>
<script src="js/index.js"></script>

</html>