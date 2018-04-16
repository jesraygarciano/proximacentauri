@if ($errors->any())
	 <ul class="alert alert-danger">
	 	<h5 style="color: #900606;">Kindly fill in the following:</h5>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>

    <script type="text/javascript">
    	$(document).ready(function(){

    		$('.ui.form').append('<label class="error-label"></label>')

	    	var errors = JSON.parse('{{json_encode($errors->default->getMessages())}}'.replace(/&quot;/g,'"'));

	    	$.each(errors,function(i,v){
	    		var input = $('[name='+i+']');
	    		if(input[0])
	    		{
	    			input.closest('.ui.form').addClass('has-error');
	    			input.closest('.ui.form').find('.error-label').html(v);
		    		console.log($('[name='+i+']')[0].nodeName);
		    		console.log('[name='+i+']');
		    	}

		    	if(i == 'skills'){
		    		$('#skill_required').html(' - choose atleast one skill requirement');
		    	}
	    	});

	    	$('input,select,textarea').change(function(){
	    		$(this).closest('.ui.form').removeClass('has-error');
	    	});
	    });
    </script>
@endif
