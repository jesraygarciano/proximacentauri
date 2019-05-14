// uelmar wizard Jan. 22, 2018
// profile editor

(function($){
	$.fn.profileEditor = function(options){
		var settings = $.extend({}, options);
		var currentSubmitFunction;
		this.current_panel;
		this.id;

		$this = this;

		this.setEvents = function(){
			this.setEditButtonEdit($this.find('.pr-edit-btn'));
			return $this;
		}

		this.setEditButtonEdit = function(elm){
			elm.click(function(){
				$this.id = $(this).data('id');
				var handler = settings.editHandlers[$(this).attr('id')];
				$this.current_panel = $(this).attr('id');
				if(handler){
					handler($this);
				}
				else{
					$this.prepUpdate(this);
				}
			});
		}

		this.prepUpdate = function(elm){
			var targetModal = $(elm).prop('edit-target');
			$(targetModal).modal('show');
			$(targetModal).find('.submit').unbind();
			$(targetModal).find('.submit').click(settings.submitHandlers[$(elm).attr('id')]);
		}

		$this.setEvents();
	}
})(jQuery)

function fillInfos(selector,data){
	$.each(data, function(index, val){
		selector.find('.'+index).html(val);
	});
}
// uelmar wizard April 25, 2018
// profile editor

(function($){
	$.fn.unickForm = function(options, successFunction){
		var settings = $.extend({}, options);
		var currentSubmitFunction;
		this.current_panel;
		this.id;

        var $this = this;

        $this.submit(function(e){
            e.preventDefault();

            if(validateInputs()){
                var ajaxData = new FormData( this );

                swal({
                    title: 'Saving',
                    text: 'Please wait...',
                    onOpen: () => {
                        swal.showLoading()
                    },
                    allowOutsideClick: () => !swal.isLoading()
                })

                // var ajax = new XMLHttpRequest();
                // ajax.open( $this[0].getAttribute( 'method' ), $this[0].getAttribute( 'action' ), true );
                // ajax.onload = function()
                // {
                //     swal.close();
                //     if( ajax.status >= 200 && ajax.status < 400 )
                //     {
                //         var data = JSON.parse( ajax.responseText );
                //         if( data.status == "success" ){
                //             successFunction(data);
                //         }
                //     }
                //     else alert( 'Error. Please, contact the webmaster!' );
                // };

                // ajax.onerror = function(err)
                // {
                //     throw err;
                // };

                // ajax.send( ajaxData );

                $.ajax({
                    url:$this[0].getAttribute( 'action' ),
                    type:$this[0].getAttribute( 'method' ),
                    data:ajaxData,
                    processData: false,
                    contentType: false,
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    success:function(data){
                        swal.close();
                        if( data.status == "success" ){
                            successFunction(data);
                        }
                    }
                });
            }
        });

        $this.find('input,select,textarea').change(function(){
            $(this).closest('.form-group').removeClass('has-error');
        });

        function validateInputs(){
            $this.find('.form-group').removeClass('has-error');
            $this.find('.error-label').html('');
            var no_error = true;
            $.each(settings.validations,function(k,v){
                var input = $this.find('[name='+k+']');
                console.log(input)
                switch(v.type){
                    case 'empty' : 
                        if(input.val().length == 0){
                            addClassHassError(input,v.prompt);                            
                            no_error = false;
                        }
                    break;
                    case 'start_end_date_range' :
                        var elm = $this.find('.'+k);
                        var from_month = elm.find('.from_month select');
                        var from_year = elm.find('.from_year select');
                        var to_month = elm.find('.to_month select');
                        var to_year = elm.find('.to_year select');

                        var range_has_error = false;

                        if(from_month.val().length == 0){
                            // 
                            addClassHassError(from_month,'Start month required',true);
                            no_error = false;
                            range_has_error = true;
                        }
                        if(from_year.val().length == 0){
                            // 
                            addClassHassError(from_year,'Start year required',true);
                            no_error = false;
                            range_has_error = true;
                        }
                        if(to_month.val().length == 0){
                            // 
                            addClassHassError(to_month,'End month required',true);
                            no_error = false;
                            range_has_error = true;
                        }
                        if(to_year.val().length == 0){
                            // 
                            addClassHassError(to_year,'End year required',true);
                            no_error = false;
                            range_has_error = true;
                        }

                        if(!range_has_error){
                            // 
                            if(from_year.val() > to_year.val() || (from_year.val() == to_year.val() && parseInt(from_month.val()) >= parseInt(to_month.val())))
                            {
                                //
                                no_error = false;
                                elm.addClass('has-error');
                                if(elm.find('.error-label').length < 1){
                                    elm.append('<label class="error-label">Start Date should be lesser than End Date</label>');
                                }
                                elm.find('.error-label').html('Start Date should be lesser than End Date.');
                            }
                        }
                    break;
                }
            });

            return no_error;
        }

        function addClassHassError(input, prompt, append){
            $(input).closest('.form-group').addClass('has-error');

            if(append){
                // 
                if($(input).closest('.form-group').find('.error-label').length < 1){
                    $(input).closest('.form-group').append('<label class="error-label">Please input the following : </label>');
                }
    
                if($(input).closest('.form-group').find('.error-label').html().length < 1){
                    $(input).closest('.error-label').html('Please input the following : ');
                }
    
                $(input).closest('.form-group').find('.error-label').append('<span class="'+input.attr('name')+'">'+prompt+', </span>');
                $(input).closest('.form-group').addClass('error-border');
            }
            else{
                if($(input).closest('.form-group').find('.error-label').length < 1){
                    $(input).closest('.form-group').append('<label class="error-label">Please input the following : </label>');
                }

                $(input).closest('.form-group').find('.error-label').html(prompt);
            }
        }
	}
})(jQuery)