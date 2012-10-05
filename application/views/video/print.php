<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <link href="<?= base_url('assets/css/bootstrap.default.min.css') ?>" rel="stylesheet">

<style>
@media print {
.noPrint {
    display:none;
}
}
</style>
</head>
<body>
<div class="container-fluid">
	<? if (!empty($the_user)):?>
	<div class="row noPrint">
		<a class='btn pull-right' style="margin-top: 10px; margin-right: 30px" href="<?= base_url('admin/video');?>">Back to Administration Dashboard</a>
	</div>
	<? endif;?>
		<? foreach ($choices as $choice):?>

				<div class="span5">
					<h4><?=$choice->title?></h4>
					<img src="http://qrcode.kaywa.com/img.php?s=10&t=4&d=<?= base_url('video') .'/'. $choice->code;?>"/>	
				</div>
		<? endforeach;?>
</div>


</body>
</html>