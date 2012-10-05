<? if (!empty($choices)):?>

	<? foreach($choices as $choice):?>
	
	<form id="choice-<?= $choice['id'];?>" class="form-horizontal">
	<div class="row-fluid">

		<h4 class='title'><span class="uneditable"><?= $choice['title']?></span><input class='title span5' style="display:none;" type="text" name="title" value="<?= $choice['title']?>"> </h4>
		
		<a href="<?= base_url('video') .'/'. $choice['code'];?>"><img src="http://qrcode.kaywa.com/img.php?s=4&t=4&d=<?= base_url('video') .'/'. $choice['code'];?>"/></a>
		<div class="span9 pull-left">
		<? foreach ($choice['choices'] as $video):?>
			<div class="row-fluid">
				<div class="span3 verb">
					<span class="uneditable"><?= $video['verb'];?></span>
					<input type="text" style="display:none" name="verb" value="<?= $video['verb']?>">
				</div>
				<div class="span3 url">
					<span class="uneditable">
					<a href='http://www.vimeo.com/<?= $video['url'];?>'><?= $video['url'];?></a>
					</span>
					<input type="text" style="display:none" name="url" value="<?= $video['url']?>">

				</div>
				<div class="span2">
					<div class="btn-group">
						<input type="hidden" name="verb" value="<?= $video['verb'];?>">
						<input type="hidden" name="url" value="<?= $video['url'];?>">
						<input type="hidden" name="id" value="<?= $video['id'];?>">
						<?php if ($video['first']):?>
							<button class='btn btn-mini firstpage btn-success pop-help' data-content="This video will be shown on the front page.  It's the starter video." data-original-title="First Video"><i class='icon-star'></i></a>
						<?php else:?>
							<button class='btn btn-mini firstpage' title="Make first video"><i class='icon-star'></i></a>

						<?php endif;?>
	
						<button class='btn btn-mini edit' ;><i class='icon-pencil'></i></a>
						<button class='btn btn-mini save' style="display:none"><i class='icon-save'></i></a>

						<button class='btn btn-mini trash'><i class='icon-trash'></i></a>
					</div>
				</div>
			</div>
		<? endforeach;?>
		
			<div class="row-fluid">
				<div class="span3 verb">
					<input type="text" name="verb" clas="input-small" placeholder="Title">
				</div>
				<div class="span3 url">
					<input type="text" name="url" class="input-small" placeholder="Vimeo ID">

				</div>
				<div class="span2">	
					<button class='btn btn-mini add'><i class='icon-plus'></i></a>
				</div>
			</div>
			
			<hr style="margin-right:20px">
			<input name="choice" type="hidden" value="<?= $choice['id'];?>">
			<button class="btn btn-danger remove-choice pull-right" style="margin-right:20px"><i class="icon-trash"></i> Remove</a>
		</div>
	</div>
		</form>	
	<? endforeach;?>
	
	
<? else:?>
<div class="row-fluid">

	<h4>No Videos</h4>
</div>
<? endif;?>

<script>

	$('button.add').click( function() {
		event.preventDefault();
		var newVideo = $(this).parent().parent();
		var verb = newVideo.children(".verb").children("input").val();
		var url = newVideo.children(".url").children("input").val();
		var choice = $('input[name="choice"]').val();
		$.post("<?=base_url('admin/video/add');?>", {cid:choice, title: verb, vurl: url});
		document.location.reload(true);		
	});

	$('button.edit').click( function() {
		event.preventDefault();
		var video = $(this).parent().parent().parent();
		$(this).hide();
		$(this).parent().children("button.save").show();
		video.children(".verb").children("input").show();
		video.children(".url").children("input").show();
		video.children(".verb").children(".uneditable").hide();
		video.children(".url").children(".uneditable").hide();
		
	});

	$('button.firstpage').click(function() {
		event.preventDefault();
		var vid = $(this).parent().children("input[name='id']").val();
		$.post("<?=base_url('admin/video/first');?>", {id:vid});
		document.location.reload(true);		
	
	});
	
	$('button.save').click( function() {
		event.preventDefault();
		$(this).hide();
		var video = $(this).parent().parent().parent();
		var verb = video.children(".verb").children("input").val();
		var url = video.children(".url").children("input").val();
		video.children(".verb").children("input").hide();
		video.children(".url").children("input").hide();
		video.children(".verb").children(".uneditable").html(verb);
		video.children(".url").children(".uneditable").html("<a href='http://www.vimeo.com/" + url + "'>"+url+"</a>");
		video.children(".verb").children(".uneditable").show();
		video.children(".url").children(".uneditable").show();
		
		var vid = $(this).parent().children("input[name='id']").val();
		
		$.post("<?=base_url('admin/video/change');?>", {id:vid, title: verb, vurl: url});
		
		$(this).parent().children("button.edit").show();
		

	});

	$('button.remove-choice').click( function() {
		event.preventDefault();
		var cid = $(this).parent().children("input[name='choice']").val();
		$.post("<?=base_url('admin/video/trashgroup');?>", {id:cid});
		$(this).parent().parent().remove();
	});


	$('button.trash').click( function() {
		event.preventDefault();
		var vid = $(this).parent().children("input[name='id']").val();
		$.post("<?=base_url('admin/video/trash');?>", {id:vid});
		$(this).parent().parent().parent().remove();
	});


</script>