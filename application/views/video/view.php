<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   	<link href="<?= base_url('assets/css/video.css') ?>" rel="stylesheet">


</head>
<body>
<? if (!empty($the_user)):?>
	<a class='button' style="float: right; margin-right: 30px" href="<?= base_url('admin/video');?>">Back to Administration Dashboard</a>
<? endif;?>
	<div class="container">
		<h1 class="remove-bottom" style="margin-top: 40px"><?php echo $title ?></h1>
		<hr />
		<? foreach ($videos as $video):?>

			<div class="one-third column">
		
				<div class="button">
				<iframe src="http://player.vimeo.com/video/<?= $video->video_url ?>?title=0&amp;byline=0&amp;portrait=0&amp;autoplay=0" width="100" height="100" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
				</div>
				<h6><?= $video->verb ?></h6>
			</div>
		<? endforeach;?>

	</div><!-- container -->


</body>
</html>