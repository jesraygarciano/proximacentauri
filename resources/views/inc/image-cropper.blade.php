<!-- uelmar's -->

<!-- semantic modal -->
<div class="ui modal" style="height: fill-content;" id="crop-modal">
  <div class="header">Crop Image</div>
  <div class="content">
    <div style="position: relative;" class="ccc">
        <div class="cropper-container"></div>
  	</div>
  </div>
  <div class="actions">
		<div class="range-container" style="
				padding: 10px;
				background: #ffffff;
				border-radius: 5px;
				margin-bottom: 30px;
		"></div>
    <button type="button" class="btn btn-primary save">Save changes</button>
    <button type="button" class="btn deny btn-secondary" data-dismiss="modal">Close</button>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function(){

	// locally accessable variables	
	var basic;
	var result_image;
	var current_elm;
	var img_height;
	var img_width;

	$('.crop-control').each(function(){
		var $this = $(this);

		var input_name = $this.find('input').prop('name');
		// create new hidden input with the name of the file input
		$this.append('<input type="hidden" name="'+input_name+'"/>');
		// rename original file so that the new file input will be passed to server with intended name
		$this.find('input[type=file]').prop('name','old_'+input_name);

		// set event for file input change detection and processing
		setInputEvent($this);

		
	});

	function setInputEvent(elm){
		img_height = $(elm).data('dim') ? $(elm).data('height') : 200;
		img_width = $(elm).data('dim') ? $(elm).data('width') : 200;

		console.log(img_width);

		var border_width = img_width
		var border_height = img_height

		if(img_width > 400){
			border_width = 400;
			border_height = (img_height / img_width) * border_width;
		}

		elm.find('[type=file]').change(function(evt){
			current_elm = elm;
			var tgt = evt.target || window.event.srcElement,
			    files = tgt.files;

			// FileReader support
			if (FileReader && files && files.length) {

				$('#crop-modal').modal('show');

				// refresh cropper container
				$('#crop-modal .ccc').html('<div class="cropper-container"></div>');

				// initialize new cropie
				basic = $('#crop-modal .cropper-container').croppie({
				  viewport: {
				      width: border_width,
				      height: border_height,
				      type: 'square'
				  },
				  boundary: { width: border_width, height: border_height },
				});

				basic.croppie('result', 'html').then(function(html) {
					$('#crop-modal .range-container').html('');
					$('#crop-modal .cr-boundary').css({overflow:'initial'});
					$('#crop-modal .content').css({overflow:'hidden', padding:'100px'});
					$('#crop-modal .cr-slider-wrap').prependTo('#crop-modal .range-container');
				});

				current_elm = elm;
			    var fr = new FileReader();
			    fr.onload = function () {
			    	result_image = fr.result;
			    }
			    fr.readAsDataURL(files[0]);
			}
		});
	}

	// crop modal show hide events
	$('#crop-modal.ui.modal').modal({
	    onVisible: function () {
	      basic.croppie('bind', {
	          url: result_image,
	          // points: [77,469,280,739]
	      });

			var input_container = current_elm.find('.input-container').html();

			current_elm.find('[type=file]').remove();
			current_elm.find('.input-container').html(input_container);

			setInputEvent(current_elm);

			$('#crop-modal').css({'margin-top':'initial','transform':'translateY(-50%)'});
	    },
	    onApprove: function () {
	      console.log('approved');
	    }
	  });

	$('#crop-modal .save').click(function(){
		console.log(img_height)
		$('#crop-modal').modal('hide');
		basic.croppie('result', {
				type : 'rawcanvas',
				format : 'jpeg',
				quality: '1',
				size:{
					width: img_width,
					height: img_height
				},
			}).then(function(canvas){
				current_elm.find('img').prop('src',canvas.toDataURL());
				current_elm.find('img').prop('need-save',1);
				current_elm.find('[type=hidden]').val(canvas.toDataURL());
			});
	});
});
</script>