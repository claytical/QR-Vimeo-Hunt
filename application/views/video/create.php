        <div class="span10">
		
			<?php
				$attributes = array('class' => 'well form-inline');
				echo form_open_multipart('', $attributes);
  			?>
  			<?php if(validation_errors()):?>
				<div class="alert">
				<button class="close" data-dismiss="alert">x</button>
				<?php echo validation_errors();?>
				</div>
			<?php endif;?>
  		<h1>Create Group</h1>
  		<p class="lead"></p>
  			<fieldset>
  				<div class="control-group">
					<div class="controls">
						<input type="text" id="title" name="title" class="span6" placeholder="Group Title">  <a class='badge badge-info pop-help' data-content="This text will be shown at the top of the page after the user scans the qr code." data-original-title="Headline"><i class='icon-question-sign'></i></a>
					</div>
				</div>
					<h3>Videos</h3>
					<div class="controls first">
						<div class="control-group">
							<input type="text" name="verb[]" class="span3" placeholder="Verb"/> 
							<input type="text" name="video_url[]" class="span3"  placeholder="Vimeo ID"/> <a href='#' class='btn addvideo'><i class='icon-plus'></i></a>
						</div>
						</div>
				

			</fieldset>

			<div class="form-actions">
				<div class="pull-right">
			  		<button type="submit" class="btn-primary">Create</button>
				</div>
			</div>
		</form>
        
        
      <hr>
<script>
$(".addvideo").click(function() {
	event.preventDefault();
	$('.controls.first').append("<div class='control-group'><input type='text' name='verb[]' class='span3' placeholder='Verb'/> <input type='text' name='video_url[]' class='span3'  placeholder='Vimeo URL'/></div>");
});

						
</script>