<?php
	$title = array();
	$project_name	= $this->config->item('project_name');
	array_push($title, $project_name);
	if (isset($page_title)) array_push($title, $page_title);
	
	$loginname	= (isset($login_username))? "{$login_username}さんログイン中" : "";
	
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset=UTF-8 />
  <title><?php echo implode("|",$title) ?></title>
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="robots" content="index,follow" />
  <meta name="author" content="Shunsuke Ito" />
  <meta name="application-name" content="<?php echo $project_name ?>" />
  <link href="<?php echo base_url();?>css/import.css" rel="stylesheet" type="text/css" media="all" />
  <link href="<?php echo base_url();?>javascript/jquery/css/excite-bike/jquery-ui-1.8.23.custom.css" rel="stylesheet" type="text/css" media="all" />
  <!-- link href="./favicon.gif" rel="shortcut icon" type="image/gif" / -->
  <script type="text/javascript" src="<?php echo base_url();?>javascript/jquery/jquery-1.8.0.min.js" charset="utf-8"></script>
  <script type="text/javascript" src="<?php echo base_url();?>javascript/jquery/jquery-ui-1.8.23.custom.min.js" charset="utf-8"></script>
  <script type="text/javascript" src="<?php echo base_url();?>javascript/common.js" charset="utf-8"></script>
</head>
<body>
  <header>
    <h1><a href="<?php echo site_url(); ?>"><?php echo $project_name ?></a></h1>
    <p class="loginname"><?php echo $loginname ?></p>
  </header>

