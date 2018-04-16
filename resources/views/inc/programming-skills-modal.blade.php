<style type="text/css">
	#skills-modal .skills_list .label{
		font-size: 15px;
		margin: 3px;
	}
</style>

<div class="ui modal" id="skills-modal" style="height: fit-content;">
  <div class="header job-title ellipsis">Programming skills</div>
  <div class="content" style="min-height: 200px;">
    <div class="skills_list" style="margin-top:20px;"></div>

    <div class="row">
    	<div class="col-md-4">
    		<div class="job-card">
		    	<div class="header swift">sample</div>
		    	<div class="body">
		    		<div>asdasd</div>
		    		<div>asdasd</div>
		    		<div>asdasd</div>
		    		<div>asdasd</div>
		    	</div>
		    </div>
    	</div>
    	<div class="col-md-4"></div>
    	<div class="col-md-4"></div>
    </div>
  </div>
  <div class="actions">
    <button type="button" class="btn deny btn-secondary" data-dismiss="modal">Close</button>
  </div>
</div>

<script type="text/javascript">
	var skills_modal = $('#skills-modal');
	var main_language = JSON.parse("{{json_encode(main_languages())}}".replace(/&quot;/g,'"'));
	function display_skills(json,elm){
		console.log(json)
		var opening = JSON.parse(json.replace(/&quot;/g,'"'));
		var skills = opening.skill_requirements;

		console.log(opening)

		skills_modal.modal('show');

		skills_modal.find('.col-md-4').html('');

		skills_modal.find('.job-title').html('<a href="{{url('openings')}}/'+opening.id+'">'+opening.title+'</a> Skill Requirements')

		var language_added = [];

		var z = 0;

		for(var i = 0; i < skills.length; i++){

			var match = $.grep(main_language,function(v,_i){
				return v == skills[i].language;
			});

			if(z > 2) z = 0;

			if(match.length > 0)
			{

				var lang = skills[i].language.toLowerCase() == 'c++' ? 'cplus2' : (skills[i].language.toLowerCase() == "c#" ? 'csharp' : (skills[i].language.toLowerCase() == 'node.js' ? 'node-js' : skills[i].language.toLowerCase()) );

				if(language_added.includes(lang))
				{
					var a = skills_modal.find('.'+lang).parent().find('.body');

					if(a){
						a.append('<div class="ellipsis">'+skills[i].category+'</div>');
					}
				}
				else
				{
					// skills_modal.find('.skills_list .col-md-4').eq(z).append('<a href="#!" role="button" class="btn label label-warning '+lang+'" data-toggle="tooltip" data-placement="bottom" data-html="true" title="<div>'+skills[i].category+'</div>">'+skills[i].language+'</a>');

					skills_modal.find('.col-md-4').eq(z).append('<div class="job-card">'
									    +'	<div class="header  ellipsis '+lang+'">'+skills[i].language+'</div>'
									    +'	<div class="body">'
									    +'		<div class="ellipsis">'+skills[i].category+'</div>'
									    +'	</div>'
									    +'</div>');
					language_added.push(lang);

					z++;
				}
			}
		}

		$('#skills-modal [data-toggle="tooltip"]').tooltip();
	}
</script>