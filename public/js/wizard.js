// uelmar wizard Jan. 22, 2018
// resume validation

unickwizard = function($this,options){

	var rules = options.rules;

	init();

	function init(){

		$this.find('input,select,textarea').change(function(){
			if($(this).parent().hasClass('parent-form-group')){
				$(this).parent().removeClass('error-border');
				$(this).parent().parent().find('.'+$(this).attr('name')).remove();

				if($(this).parent().parent().find('.error-border').length < 1){
					$(this).parent().parent().removeClass('has-error');
				}
			}
			else if($(this).parent().parent().parent().hasClass('input-group')){
				$(this).parent().parent().parent().parent().removeClass('has-error');
			}
			else
			{
				$(this).parent().removeClass('has-error');
			}
		});

		$this.find('form').submit(function(){
			var last_step = $this.find('.tab-content .wizard-step:last-child');

			if(!last_step.hasClass('active')){
				return false;
			}
		});

		$this.find('.wizard-step input,.wizard-step textarea').keypress(function(ev){

			var wizar_step = $(this).closest('.wizard-step');

			if(ev.key == "Enter")
			{
				if(validateForm($(wizar_step))){
					var index = $this.find('.tab-content .tab-pane').index($(wizar_step));

					displayPane(index+1);
				}
			}

		});

		$this.find('.next-step').click(function(){
			var wizar_step = $(this).closest('.wizard-step');
			if(validateForm($(wizar_step))){
				var index = $this.find('.tab-content .tab-pane').index($(wizar_step));

				displayPane(index+1);
			}
		});

		$this.find('.prev-step').click(function(){

			var index = $this.find('.progress-nav-tabs li').index($this.find('.progress-nav-tabs li.active'));

			displayPane(index-1);
		});

		$this.find('.progress-nav-tabs li a').click(function(){

			var li_index = $this.find('.progress-nav-tabs li').index($(this).parent());
			var active_li_index = $this.find('.progress-nav-tabs li').index($this.find('.progress-nav-tabs .active'));

			if(li_index > active_li_index)
			{
				return false;
			}

			displayPane(li_index);

		});
	}

	function validateForm( form ){
		var no_error = true;

		form.find('.error-label').html('');
		form.find('*').removeClass('has-error');
		form.find('*').removeClass('error-border');

		$.each(rules,function(k,v){
			var input = form.find('[name='+v.identifier+']');

			if(input.length > 0)
			{
				for(var x = 0; x < v.rules.length; x++){
					switch(v.rules[x].type){
						case 'empty':
							if(input.val().length == 0)
							{
								addClassHassError(input,v.rules[x].prompt,v.identifier);
								no_error = false;
							}
						break;
						case 'lower':
							if(input.val().length != 0)
							{
								if(isNaN(input.val()))
								{
									addClassHassError(input,'invalid',v.identifier);
									no_error = false;
								}
								else
								{
									var c_val = parseInt(form.find('[name='+v.rules[x].c_input+']').val());
									var val = parseInt(input.val());

									if(c_val <= val)
									{
										addClassHassError(input,v.rules[x].prompt,v.identifier);
										no_error = false;
									}
								}
							}
							else
							{
								addClassHassError(input,'Field required',v.identifier);
								no_error = false;
							}
						break;
						case 'higher':
							if(input.val().length != 0)
							{
								if(isNaN(input.val()))
								{
									addClassHassError(input,'invalid',v.identifier);
									no_error = false;
								}
								else
								{
									var c_val = parseInt(form.find('[name='+v.rules[x].c_input+']').val());
									var val = parseInt(input.val());
									if(c_val >= val)
									{
										addClassHassError(input,v.rules[x].prompt,v.identifier);
										no_error = false;
									}
								}
							}
							else
							{
								addClassHassError(input,'Field required',v.identifier);
							}
						break;
						case 'email':
							if(!ValidateEmail(input.val()))
							{
								addClassHassError(input,v.rules[x].prompt,v.identifier);
								no_error = false;
							}
						break;
						case 'phone':
							if(!validatePhonenumber(input.val()))
							{
								addClassHassError(input,v.rules[x].prompt,v.identifier);
								no_error = false;
							}
						break;
						case 'file':
							if(input[0].files.length == 0){
								addClassHassError(input,v.rules[x].prompt,v.identifier);
								no_error = false;
							}
						break;
					}

					if(!input.parent().hasClass('parent-form-group') && !input.parent().parent().parent().hasClass('input-group')){
						if($(input).parent().find('.error-label').length < 1){
							$(input).parent().append('<label class="error-label"></label>');
						}
						$(input).parent().find('.error-label').html(v.rules[x].prompt);
					}
				}
			}
		});

		if(no_error){
			$(form).find('.date-range').each(function(){
				var start_month = $(form).find('[name=ed_from_month]').val();
				var start_year = $(form).find('[name=ed_from_year]').val();

				var end_month = $(form).find('[name=ed_to_month]').val();
				var end_year = $(form).find('[name=ed_to_year]').val();

				console.log(start_month + ', '+start_year+' - '+end_month+', '+end_year);

				if(start_year > end_year || (start_year == end_year && start_month >= end_month)){
					no_error = false;
					$(form).find('.date-range').addClass('has-error');
					if($(form).find('.date-range').find('.error-label').length < 1){
						$(form).find('.date-range').append('<label class="error-label">Start Date should be lesser than End Date</label>');
					}
					$(form).find('.date-range').find('.error-label').html('Start Date should be lesser than End Date.');
				}
			});
		}

		return no_error;
	}

	function displayPane(index){
		$(window).scrollTop(0);
		$this.find('.active').removeClass('active');
		$this.find('.progress-nav-tabs li').eq(index).addClass('active');
		$this.find('.tab-pane').eq(index).addClass('active');

		$this.find('.progress-nav-tabs li').removeClass('disabled');

		for(var i = index+1; i < $this.find('.progress-nav-tabs li').length; i++){
			$this.find('.progress-nav-tabs li').eq(i).addClass('disabled');
		}
	}

	function addClassHassError( element, prompt, identifier){
		if(element.parent().hasClass('parent-form-group')){
			if($(element).parent().parent().find('.error-label').length < 1){
				$(element).parent().parent().append('<label class="error-label">Please input the following : </label>');
			}

			if($(element).parent().parent().find('.error-label').html().length < 1){
				$(element).parent().parent().find('.error-label').html('Please input the following : ');
			}

			$(element).parent().parent().find('.error-label').append('<span class="'+identifier+'">'+prompt+', </span>');
			$(element).parent().addClass('error-border');
			$(element).parent().parent().addClass('has-error');
		}
		else if(element.parent().parent().parent().hasClass('input-group')){
			$(element).parent().parent().parent().parent().addClass('has-error');
			if($(element).parent().parent().parent().parent().find('.error-label').length < 1){
				$(element).parent().parent().parent().parent().append('<label class="error-label"></label>');
			}

			$(element).parent().parent().parent().parent().find('.error-label').append(prompt);
		}
		else{
			$(element).parent().addClass('has-error');
			window.scrollTo(0, 0);
	        swal('Please fill in required data', 'Missing data...', 'warning');
		}
	}
}
