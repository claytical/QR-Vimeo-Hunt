<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   	<link href="<?= base_url('assets/css/video.css') ?>" rel="stylesheet">
	<script src="<?= base_url('assets/js/froogaloop.min.js') ?>"></script>
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

</head>
<body>
<? if (!empty($the_user)):?>
	<a class='button' style="float: right; margin-right: 30px" href="<?= base_url('admin/video');?>">Back to Administration Dashboard</a>
<? endif;?>
	<div class="container">
		<h1 class="remove-bottom" style="margin-top: 40px"><?php echo $title ?></h1>
		<hr />
		<iframe id="intro" src="http://player.vimeo.com/video/<?= $intro['video_url'] ?>?title=0&amp;byline=0&amp;portrait=0&amp;autoplay=1&api=1&player_id=intro" width="100" height="100" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
		
		<? foreach ($videos as $video):?>

			<div class="one-third column choices" style="display:none">
		
				<div class="button">
				<iframe src="http://player.vimeo.com/video/<?= $video->video_url ?>?title=0&amp;byline=0&amp;portrait=0&amp;autoplay=0" width="100" height="100" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
				</div>
				<h6><?= $video->verb ?></h6>
			</div>
		<? endforeach;?>

	</div><!-- container -->
<script>

$(document).ready(function() {
var iframe = $('#intro')[0],
    player = $f(iframe);
// When the player is ready, add listeners for pause, finish, and playProgress
player.addEvent('ready', function() {
    
//    player.addEvent('pause', onPause);
    player.addEvent('finish', onFinish);
//    player.addEvent('playProgress', onPlayProgress);
});

function onPause(id) {
//    status.text('paused');
}

function onFinish(id) {
    $('#intro').hide();
    $('.choices').show();
}

function onPlayProgress(data, id) {
  //  status.text(data.seconds + 's played');
}});


</script>
</body>
</html>