@extends('layouts.app')

@section('content')

<div class="container">
	<h3 class="page-header">Notifications</h3>
	<div class="col-md-10">
		<ul class="nav nav-tabs" role="tablist">
			@if(\Auth::user()->role == 0)
	        <li role="presentation" class="{{$_GET['tab'] == 'scout_notifications' ? 'active' : ''}}">
	            <a href="#scout_notifications" role="tab" onclick="showScouts()" data-toggle="tab" aria-expanded="true">
	                Scouts
	            </a>
	        </li>
	        @endif
	    	@if(\Auth::user()->role == 1)
	        <li role="presentation" class="{{$_GET['tab'] == 'application_nofications' ? 'active' : ''}}">
	            <a href="#application_nofications" role="tab" onclick="showApplications()" data-toggle="tab" aria-expanded="false">
	                Applications
	            </a>
	        </li>
	        @endif
	    	@if(\Auth::user()->role == 0)
	        <li role="presentation" class="{{$_GET['tab'] == 'opening_notifications' ? 'active' : ''}}">
	            <a href="#opening_notifications" role="tab" data-toggle="tab" onclick="showOpenings()" aria-expanded="false">
	                Openings
	            </a>
	        </li>
	        @endif
	    </ul>
	    <div class="tab-content">
	    	<div role="tabpanel" class="tab-pane {{$_GET['tab'] == 'scout_notifications' ? 'active' : ''}} in" id="scout_notifications">
	    		<div class="notification-panel" style="display: none;">
	    			<div class="row">
	    				<div class="col-sm-3 col-md-2">
	    					<div style="padding:10px;">
		    					<div class="photo-wrapper">
		                            <img src="http://localhost:8000/img/bg-img.png" class="bg-img">
		                            <img class="_image" src="http://localhost:8000/storage/WIN_20180111_14_20_57_Pro_1517276058.jpg">
		                        </div>
	                        </div>
	    				</div>
	    				<div class="col-sm-9 col-md-10 pd-35px body">
	    					<p>
	    						<h5><b class="name">Unick ltd</b></h5>
	    					</p>
	    					<i class="message">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	    					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	    					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	    					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	    					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	    					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</i>
	    				</div>
	    			</div>
	    			<div class="footer">
	    				<label class="_date">Created: July 19, 1995</label>
	    			</div>
	    		</div>
	    	</div>
	    	<div role="tabpanel" class="tab-pane {{$_GET['tab'] == 'application_nofications' ? 'active' : ''}} in" id="application_nofications"></div>
	    	<div role="tabpanel" class="tab-pane {{$_GET['tab'] == 'opening_notifications' ? 'active' : ''}} in" id="opening_notifications"></div>
	    </div>
	</div>
	<div class="col-md-2">
		<div class="well">Advertisement</div>
	</div>
</div>
<div id="dummy-job-container" style="display: none;">
	<div class="job-tile">
	    <div>
	        <ul class="ribbon_style_list hiring_type">
	            <li class="job-position featured">Featured</li>
	            <li class="job-position intern _intern">Intern</li>
	            <li class="job-position regular">Regular</li>
	            <li class="job-position intern temporary">Temporary</li>
	        </ul>
	    </div>
	    <div class="job-title">
	        <a href="#" class="ellipsis padding-right-110 opening_title" style="display: block;"> </a>
	        {{-- <img class="pull-right" src="{{ $opening->company->company_logo }}" alt="" border="0" height="100" width="130" style="max-width: 130px;"> --}}
	        <span class="contain pull-right photo-adjust _image" style="background-image: url('/')"></span>
	        {{-- <div class="clear"></div> --}}
	    </div>
	    <div class="company-name_opening_list ellipsis padding-right-110 company_name"><a href="#">  &nbsp; </a>
	    </div>
	    <ul class="opening-feature-info-list">
	        <li class="ellipsis padding-right-110"><i class="fa fa-map-marker" aria-hidden="true"></i> <span class="address1"></span>
	        </li>
	        <li class="ellipsis padding-right-110"><i class="fa fa-dollar" aria-hidden="true"></i>                                    
	            <!-- Salary range -->
	            <span class="salary_range"></span>
	        </li>
	        <li>
	            <i class="fa fa-code" aria-hidden="true"></i>
	            <span class="skills_list"></span>
	        </li>
	    </ul>
	    <hr class="opening-top-date-hr" style="margin-top: 7px; margin-bottom: 7px;">
	    <div class="footer">
	        <div class="pull-right">
	            <div class="foggy-text">
	            	<a class="bookmark_opening_bttn" data-id="" style="color:#ff9a0b;">
				        <i class="fa fa-bookmark" aria-hidden="true"></i> <span class="_text"><span class="marked">Unbookmark</span> (<b class="bookmar_count"></b>)</span>
				    </a>
	            </div>
	        </div>
	    </div>
	</div>
</div>
<script type="text/javascript">

	var scout_panel = $('#scout_notifications');
	var application_panel = $('#application_nofications');
	var opening_panel = $('#opening_notifications');

	var notification_panel = $('.notification-panel').html();
	var _opening_panel = $('#dummy-job-container').html();

	// initialize
	$(document).ready(function(){
		switch('{{$_GET['tab']}}'){
			case 'scout_notifications':
			showScouts();
			break;
			case 'application_nofications':
			showApplications();
			break;
			case 'opening_notifications':
			showOpenings();
			break;
		}
	});

	function showScouts(){
		scout_panel.html('<br><br><center><div class="loader"></div></center>');
		$.ajax({
			url:'{{route("json_get_scout_notification")}}',
			data:{'user_id':"{{\Auth::user()->id}}"},
			success:function(data){
				scout_panel.html('')
				for(var i = 0; i < data.length; i++){
					var panel = document.createElement('div')
					$(panel).addClass('notification-panel');
					$(panel).html(notification_panel);
					$(panel).find('.name').html(data[i].company.company_name);
					$(panel).find('._image').attr('src',data[i].company.company_logo);
					$(panel).find('.message').html(data[i].description);
					$(panel).find('._date').html('Created : '+data[i].scouted_date);
					scout_notifications.append(panel);
				}

				if(data.length < 1){
					scout_panel.html('<br><br><center><h2>No Scouts</h2></center>');
				}
			},
			error:function(){}
		});
	}

	function showApplications(){
		application_panel.html('<br><br><center><div class="loader"></div></center>');
		$.ajax({
			url:'{{route("json_get_application_notification")}}',
			data:{'company_id':"{{\Auth::user()->companies()->latest('companies.created_at')->where('companies.is_active', 1)->first()->id ?? 0}}"},
			success:function(data){
				application_panel.html('')
				for(var i = 0; i < data.length; i++){
					var panel = document.createElement('div')
					$(panel).addClass('notification-panel');
					$(panel).html(notification_panel);
					$(panel).find('.name').html(data[i].user.name);
					$(panel).find('._image').attr('src',data[i].user.photo);
					$(panel).find('.message').html(data[i].description);
					$(panel).find('._date').html('Sumitted : '+data[i].submitted_date);
					$(panel).find('.body').append('<br><br><a href="{{url("hiring_portal/application")}}/'+data[i].id+'" class="btn btn-primary">Details</a>');
					application_panel.append(panel);
				}

				if(data.length < 1){
					scout_panel.html('<br><br><center><h2>No Applications</h2></center>');
				}
			},
			error:function(){}
		});
	}

	var main_language = JSON.parse("{{json_encode(main_languages())}}".replace(/&quot;/g,'"'));

	function showOpenings(){
		opening_panel.html('<br><br><center><div class="loader"></div></center>');
		$.ajax({
			url:'{{route("json_get_opening_notification")}}',
			data:{'user_id':"{{\Auth::user()->id}}"},
			success:function(data){
				opening_panel.html('')

				var openings = data.openings;
				var bookmarks = data.bookmarks;

				for(var i = 0; i < openings.length; i++){
					var panel = document.createElement('div');
					$(panel).html(_opening_panel);
					$(panel).find('.opening_title').html(openings[i].title);
					$(panel).find('.opening_title').attr('href','{{url('/openings')}}/'+openings[i].id);
					$(panel).find('.bookmark_opening_bttn').data('id',openings[i].id);
					$(panel).find('.company_name').html(openings[i].company.company_name);
					$(panel).find('.address1').html(openings[i].company.address1);
					$(panel).find('.salary_range').html(openings[i].salary_range_words);
					$(panel).find('._image').css('background-image',"url('"+openings[i].company.company_logo+"')");

					var _bookmarkds = $.grep(bookmarks,function(v,_i){
							return v.opening_id == openings[i].id;
						});

					var user_bookmarked = $.grep(bookmarks,function(v,_i){
							return v.user_id == {{\Auth::user()->id}};
						});

					$(panel).find('.bookmark_opening_bttn').css('color',user_bookmarked.length > 0 ? '#ff9a0b' : '#808080');
					$(panel).find('.marked').html(user_bookmarked.length < 1 ? 'Bookmark' : 'Unbookmark');
					$(panel).find('.bookmar_count').html(_bookmarkds.length);

					$(panel).find('.hiring_type li').hide();

					if(openings[i].featured_status)
						$(panel).find('.featured').show();

					switch(openings[i].hiring_type){
						case 0 :
						$(panel).find('._intern').show();
						break;
						case 1 :
						$(panel).find('.regular').show();
						break;
						case 2 :
						$(panel).find('.temporary').show();
						break;
					}

					var skills = openings[i].skill_requirements;
					var language_added = [];
					for(var x = 0; x < (skills.length > 3 ? 4 : skills.length); x++){
					console.log(skills[x])
					console.log(x)

						var match = $.grep(main_language,function(v,_i){
							return v == skills[x].language;
						});
						if(match.length > 0)
						{
							var lang = skills[x].language.toLowerCase() == 'c++' ? 'cplus2' : (skills[x].language.toLowerCase() == "c#" ? 'csharp' : skills[x].language.toLowerCase() );
							if(language_added.includes(lang))
							{
								var a = $(panel).find('.'+lang);
								if(a){
									a.prop('title',a.prop('title')+'<div>'+skills[x].category+'</div>');
								}
							}
							else
							{
								$(panel).find('.skills_list').append('<a href="#!" role="button" class="btn label label-warning '+lang+'" data-toggle="tooltip" data-placement="bottom" data-html="true" title="<div>'+skills[x].category+'</div>">'+skills[x].language+' <span class="caret"></span></a> ');
								language_added.push(lang);
							}
						}
					}

					if(skills.length > 3){
						$(panel).find('.skills_list').append(
							'<a href="#!" role="button" class="more-skills btn label label-default"'
							+'"btn label label-default"> ... </a>'
							);

						$(panel).find('.more-skills').data('data',openings[i]);

						$(panel).find('.more-skills').click(function(){
							display_skills(JSON.stringify($(this).data('data')),this);
						});
					}

					$(panel).find('.job-tile').find('[data-toggle="tooltip"]').tooltip();
					button_bookmark_event($(panel).find('.bookmark_opening_bttn'));
					opening_panel.append($(panel).find('.job-tile'));
				}

				if(openings.length < 1){
					opening_panel.html('<br><br><center><h2>No Opening Notifications</h2></center>');
				}
			},
			error:function(){}
		});
	}


	// var skills_modal = $('#skills-modal');
	// var main_language = JSON.parse("{{json_encode(main_languages())}}".replace(/&quot;/g,'"'));
	// function display_skills(json,elm){
	// 	var opening = JSON.parse(json.replace(/&quot;/g,'"'));
	// 	var skills = opening.skill_requirements;
	// 	console.log(opening)
	// 	skills_modal.modal('show');
	// 	skills_modal.find('.skills_list').html('');
	// 	skills_modal.find('.job-title').html('<a href="{{url('openings')}}/'+opening.id+'">'+opening.title+'</a> Skill Requirements')
	// 	var language_added = [];
	// 	for(var i = 0; i < skills.length; i++){
	// 		var match = $.grep(main_language,function(v,_i){
	// 			return v == skills[i].language;
	// 		});
	// 		if(match.length > 0)
	// 		{
	// 			var lang = skills[i].language.toLowerCase() == 'c++' ? 'cplus2' : (skills[i].language.toLowerCase() == "c#" ? 'csharp' : skills[i].language.toLowerCase() );
	// 			if(language_added.includes(lang))
	// 			{
	// 				var a = skills_modal.find('.'+lang);
	// 				if(a){
	// 					a.prop('title',a.prop('title')+'<div>'+skills[i].category+'</div>');
	// 				}
	// 			}
	// 			else
	// 			{
	// 				skills_modal.find('.skills_list').append('<a href="#!" role="button" class="btn label label-warning '+lang+'" data-toggle="tooltip" data-placement="bottom" data-html="true" title="<div>'+skills[i].category+'</div>">'+skills[i].language+'</a>');
	// 				language_added.push(lang);
	// 			}
	// 		}
	// 	}
	// 	$('#skills-modal [data-toggle="tooltip"]').tooltip();
	// }
</script>

@endsection
