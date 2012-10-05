<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   	<link href="<?= base_url('assets/css/video.css') ?>" rel="stylesheet">


</head>
<body>
<? if (!empty($the_user)):?>
	<a class='button' style="float: right; margin-right: 30px" href="<?= base_url('admin/video');?>">Administration Dashboard</a>
<? endif;?>
	<div class="container">
<? if (!empty($first)):?>

		<h1 class="remove-bottom" style="margin-top: 40px"><?= $first['headline'];?></h1>
		<hr />
		<iframe src="http://player.vimeo.com/video/<?= $first->video_url;?>?title=0&amp;byline=0&amp;portrait=0&amp;autoplay=1" width="500" height="500" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
<? else:?>
	<h1 class="remove-bottom" style="margin-top: 40px">The first video hasn't been selected</h1>
<? endif;?>
	</div><!-- container -->


</body>
</html>