// uelmar wizard Jan. 22, 2018
// resume validation

unickwizard = function($this,options){

	var rules = options.rules;

	init();

	function init(){

		$this.find('input,select,textarea').change(function(){
			if($(this).parent().hasClass('parent-form-group')){
				$(this).parent().removeClass('error-border');
				$(this).parent().parent().find('.error-label .'+$(this).attr('name')).remove();

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
				if(v.identifier == 'educational_backgrounds')
				{
					// 
					var educational_backgrounds = $('#'+v.identifier);

					educational_backgrounds.find('.ed-margin').each(function(){
						var _this = $(this);
						var university = _this.find('.ed_university');
						var field_study = _this.find('.ed_field_of_study');
						var program_of_study = _this.find('.ed_program_of_study');
						var from_month = _this.find('[name=ed_from_month]');
						var from_year = _this.find('[name=ed_from_year]');
						var to_month = _this.find('[name=ed_to_month]');
						var to_year = _this.find('[name=ed_to_year]');

						var has_content = false;

						_this.find('input, select').each(function(){
							if($(this).val().length > 0){
								has_content = true;
							}
						});

						if(has_content){
							if(university.val().length == 0){
								// 
								addClassHassError(university,'Field required',university.prop('id'));
								no_error = false;
							}
							if(field_study.val().length == 0){
								// 
								addClassHassError(field_study,'Field required',field_study.prop('id'));
								no_error = false;
							}
							if(program_of_study.val().length == 0){
								// 
								addClassHassError(program_of_study,'Field required',program_of_study.prop('id'));
								no_error = false;
							}
							if(from_month.val().length == 0){
								// 
								addClassHassError(from_month,'Start month required',from_month.prop('name'));
								no_error = false;
							}
							if(from_year.val().length == 0){
								// 
								addClassHassError(from_year,'Start year required',from_year.prop('name'));
								no_error = false;
							}
							if(to_month.val().length == 0){
								// 
								addClassHassError(to_month,'End month required',to_month.prop('name'));
								no_error = false;
							}
							if(to_year.val().length == 0){
								// 
								addClassHassError(to_year,'End year required',to_year.prop('name'));
								no_error = false;
							}

							if(no_error){
								// 
								console.log(from_month.val() + ', '+from_year.val()+' - '+to_month.val()+', '+to_year.val());
								console.log((parseInt(from_month.val()) >= parseInt(to_month.val())))
								if(from_year.val() > to_year.val() || (from_year.val() == to_year.val() && parseInt(from_month.val()) >= parseInt(to_month.val())))
								{
									//
									no_error = false;
									$(_this).find('.ed_from_month').parent().addClass('has-error');
									if($(_this).find('.ed_from_month').parent().find('.error-label').length < 1){
										$(_this).find('.ed_from_month').parent().append('<label class="error-label">Start Date should be lesser than End Date</label>');
									}
									$(_this).find('.ed_from_month').parent().find('.error-label').html('Start Date should be lesser than End Date.');

									window.scrollTo(0, 0);
	        						swal('Please fill in required data', 'Missing data...', 'warning');
								}
							}
						}
					});

					if(no_error){
						// 
						var edu_back = $('[name=educational_backgrounds]');
						var arr = [];
						educational_backgrounds.find('.ed-margin').each(function(){
							var _this = $(this);
							var university = _this.find('.ed_university');
							var field_study = _this.find('.ed_field_of_study');
							var program_of_study = _this.find('.ed_program_of_study');
							var from_month = _this.find('[name=ed_from_month]');
							var from_year = _this.find('[name=ed_from_year]');
							var to_month = _this.find('[name=ed_to_month]');
							var to_year = _this.find('[name=ed_to_year]');
							var edu_id = _this.find('[name=edu_id]');
							if(university.val().length != 0){
								arr.push({
									ed_university:university.val(),
									ed_program_of_study:program_of_study.val(),
									ed_field_of_study:field_study.val(),
									ed_from_year:from_year.val(),
									ed_from_month:from_month.val(),
									ed_to_year:to_year.val(),
									ed_to_month:to_month.val(),
									id:edu_id.val(),
								});
							}
						});

						edu_back.val(JSON.stringify(arr));
					}
				}
				else if(v.identifier == 'experiences'){
					// 
					var educational_backgrounds = $('#'+v.identifier);

					educational_backgrounds.find('.ex-margin').each(function(){
						var _this = $(this);
						var ex_company = _this.find('.ex_company');
						var ex_position = _this.find('.ex_position');
						var ex_explanation = _this.find('.ex_explanation');
						var ex_from_month = _this.find('[name=ex_from_month]');
						var ex_from_year = _this.find('[name=ex_from_year]');
						var ex_to_month = _this.find('[name=ex_to_month]');
						var ex_to_year = _this.find('[name=ex_to_year]');

						var has_content = false;

						_this.find('input, select').each(function(){
							if($(this).val().length > 0){
								has_content = true;
							}
						});

						if(has_content){
							if(ex_company.val().length == 0){
								// 
								addClassHassError(ex_company,'Field required',ex_company.prop('id'));
								no_error = false;
							}
							if(ex_position.val().length == 0){
								// 
								addClassHassError(ex_position,'Field required',ex_position.prop('id'));
								no_error = false;
							}
							if(ex_explanation.val().length == 0){
								// 
								addClassHassError(ex_explanation,'Field required',ex_explanation.prop('id'));
								no_error = false;
							}
							if(ex_from_month.val().length == 0){
								// 
								addClassHassError(ex_from_month,'Start month required',ex_from_month.prop('name'));
								no_error = false;
							}
							if(ex_from_year.val().length == 0){
								// 
								addClassHassError(ex_from_year,'Start year required',ex_from_year.prop('name'));
								no_error = false;
							}
							if(ex_to_month.val().length == 0){
								// 
								addClassHassError(ex_to_month,'End month required',ex_to_month.prop('name'));
								no_error = false;
							}
							if(ex_to_year.val().length == 0){
								// 
								addClassHassError(ex_to_year,'End year required',ex_to_year.prop('name'));
								no_error = false;
							}

							if(no_error){
								// 
								console.log(ex_from_month.val() + ', '+ex_from_year.val()+' - '+ex_to_month.val()+', '+ex_to_year.val());
								console.log((parseInt(ex_from_month.val()) >= parseInt(ex_to_month.val())))
								if(ex_from_year.val() > ex_to_year.val() || (ex_from_year.val() == ex_to_year.val() && parseInt(ex_from_month.val()) >= parseInt(ex_to_month.val())))
								{
									//
									no_error = false;
									$(_this).find('.ex_from_month').parent().addClass('has-error');
									if($(_this).find('.ex_from_month').parent().find('.error-label').length < 1){
										$(_this).find('.ex_from_month').parent().append('<label class="error-label">Start Date should be lesser than End Date</label>');
									}
									$(_this).find('.ex_from_month').parent().find('.error-label').html('Start Date should be lesser than End Date.');

									window.scrollTo(0, 0);
	        						swal('Please fill in required data', 'Missing data...', 'warning');
								}
							}
						}
					});

					if(no_error){
						// 
						var edu_back = $('[name=experiences]');
						var arr = [];
						educational_backgrounds.find('.ex-margin').each(function(){
							var _this = $(this);
							var ex_company = _this.find('.ex_company');
							var ex_position = _this.find('.ex_position');
							var ex_explanation = _this.find('.ex_explanation');
							var ex_from_month = _this.find('[name=ex_from_month]');
							var ex_from_year = _this.find('[name=ex_from_year]');
							var ex_to_month = _this.find('[name=ex_to_month]');
							var ex_to_year = _this.find('[name=ex_to_year]');
							var exp_id = _this.find('[name=exp_id]');
							if(ex_company.val().length != 0){
								arr.push({
									ex_company:ex_company.val(),
									ex_position:ex_position.val(),
									ex_explanation:ex_explanation.val(),
									ex_from_year:ex_from_year.val(),
									ex_from_month:ex_from_month.val(),
									ex_to_year:ex_to_year.val(),
									ex_to_month:ex_to_month.val(),
									id:exp_id.val(),
								});
							}
						});

						edu_back.val(JSON.stringify(arr));
					}
				}
				else
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
			$(element).parent().find('.error-label').html(prompt);
			window.scrollTo(0, 0);
	        swal('Please fill in required data', 'Missing data...', 'warning');
		}
	}
}
