@extends('layouts.app')

@section('content')

<style type="text/css">
    /* USER PROFILE PAGE */
 .card {
    /*margin-top: 20px;*/
    padding: 30px;
    background-color: rgba(214, 224, 226, 0.2);
    -webkit-border-top-left-radius:5px;
    -moz-border-top-left-radius:5px;
    border-top-left-radius:5px;
    -webkit-border-top-right-radius:5px;
    -moz-border-top-right-radius:5px;
    border-top-right-radius:5px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.card.hovercard {
    position: relative;
    /*padding-top: 0;*/
    overflow: hidden;
    text-align: center;
    background-color: #fff;
    background-color: rgba(255, 255, 255, 1);
}
.card.hovercard .card-background {
    height: 130px;
}
.card-background img {
    -webkit-filter: blur(7px);
    -moz-filter: blur(7px);
    -o-filter: blur(7px);
    -ms-filter: blur(7px);
    filter: blur(7px);
    margin-left: -100px;
    margin-top: -200px;
    min-width: 130%;
}
.card.hovercard .useravatar {
    position: absolute;
    top: 45px;
    left: 0;
    right: 0;
}
.card.hovercard .useravatar img {
    width: 100px;
    height: 100px;
    max-width: 100px;
    max-height: 100px;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    border: 5px solid rgba(255, 255, 255, 0.5);
}
.card.hovercard .card-info {
    position: absolute;
    bottom: 14px;
    left: 0;
    right: 0;
}
.card.hovercard .card-info .card-title {
    padding:0 5px;
    font-size: 20px;
    line-height: 1;
    color: #d8d8d8;
    background-color: rgba(255, 255, 255, 0.1);
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
}
.card.hovercard .card-info {
    overflow: hidden;
    font-size: 12px;
    line-height: 20px;
    color: #737373;
    text-overflow: ellipsis;
}
.card.hovercard .bottom {
    padding: 0 20px;
    margin-bottom: 17px;
}
.btn-pref .btn {
    -webkit-border-radius:0 !important;
}

#batch-cont{
    /*margin: 2rem;*/
    padding: 3.5rem 0rem;
    background: #fff;
    box-shadow: 0 2px 4px 0 rgba(0,0,0,0.16),0 2px 3px 0 rgba(0,0,0,0.12)!important;
    border: 1px solid #dddddd;
    position: relative;    
}


#batch-cont .edit-bttn{
    position: absolute;
    top: 10px;
    right: 10px;
    width: 0px;
    overflow: hidden;
    display: block;
    transition: 200ms ease all;
}

#batch-cont:hover .edit-bttn{
    opacity: 1;
    width: 30px;
}


.app-basic-info{
    margin: 2rem 2rem 0rem 2rem;
    padding: 3.5rem 0px 0 0;
    background: #fff;
    box-shadow: 0 2px 4px 0 rgba(0,0,0,0.16),0 2px 3px 0 rgba(0,0,0,0.12)!important;
    border: 1px solid #dddddd;
    position: relative;    
}

#app-batch-number{
    padding: .5rem 2rem;
    position: absolute;
    background: #1679a3;
    top: 0;
    left: -1px;
    color: #fff;
}
.app-objt-p{
    padding: 1rem;
}
#app-batch-border-left{
    background: #1679a3;
    height: 100%;
    width: 9px;
    position: absolute;
    top: 0;
    right: 0;    
}
.app-basic-info-2{
    height: 100px;
}
</style>
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-sm-6">
            <div class="card hovercard">
                <div class="card-background">
                    <img class="card-bkimg" alt="" src="https://avatars1.githubusercontent.com/u/17306535?s=400&u=823ef75959d37a5f740998f65e3293067191628a&v=4">
                    <!-- http://lorempixel.com/850/280/people/9/ -->
                </div>
                <div class="useravatar">
                    <img alt="" src="https://avatars1.githubusercontent.com/u/17306535?s=400&u=823ef75959d37a5f740998f65e3293067191628a&v=4">
                </div>
                <div class="card-info"> <span class="card-title">Pamela Anderson</span>
                </div>
            </div>

    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab">
                <!-- <span class="glyphicon glyphicon-star" aria-hidden="true"></span> -->
                <i class="fa fa-calendar"></i>
                <div class="hidden-xs">Schedule</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab">
                <!-- <span class="glyphicon glyphicon-heart" aria-hidden="true"></span> -->
                <i class="fa fa-code"></i>

                <div class="hidden-xs">Skills</div>
            </button>
        </div>
    </div>

    @foreach($student as $students)
    <div class="well">
      <div class="tab-content">
        <div class="tab-pane fade in active" id="tab1">
            <div class="row">
                <div class="col-sm-12" id="batch-cont">
                    <div class="col-sm-4">
                        <h3>{{  $students->batches  }}</h3>                                
                    </div> 
                    <div class="col-sm-4">
                        <h3></h3>
                    </div> 
                    <div class="col-sm-4">
                        <h3></h3>
                    </div>
                    <div id="app-batch-number">
                        Batch 1
                    </div>
                    <div id="app-batch-border-left">
                    </div>

                    <a href="{{ url('itp/applicant/edit').'/?student_id='.$students->id }}" class="edit-bttn">
                        <i class="fa fa-2x fa-edit"></i>
                    </a>

                </div>
            </div>
        </div>
        <div class="tab-pane fade in" id="tab2">
            <h3>Skills</h3>
            <div class="row" id="skill_required">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                </div>
            </div> 
        </div>
      </div>
    </div>


        </div> <!--col-md-6-->
        <div class="col-lg-6 col-sm-6" id="schedulenskills">


            <div class="row">
                <div class="col-sm-5 app-basic-info app-basic-info-2">
                    <p class="app-objt-p">
                        {{  $students->school  }}
                    </p>
                    <div id="app-batch-number">
                        School
                    </div>
                </div>
                <div class="col-sm-5 app-basic-info app-basic-info-2">
                    <p class="app-objt-p">
                        {{  $students->course  }}
                    </p>
                    <div id="app-batch-number">
                        Course
                    </div>
                </div>                            
            </div>

            <div class="row">
                <div class="col-sm-12 app-basic-info">
                    <p class="app-objt-p">
                        {{  $students->objectives  }}
                    </p>
                    <div id="app-batch-number">
                        Objective for applying
                    </div>
                </div>
            </div> 
            @endforeach


            <script type="text/javascript">
            $(function(){
                var skill_requirements = JSON.parse("{{json_encode($students->skills)}}".replace(/&quot;/g,'"'));

                var skills_container = $('#skill_required');
                skills_container.find('.col-md-4').html('');
                var language_added = [];
                var x = 0;

                for(var i = 0; i < skill_requirements.length; i++){
                    if(x > 2){
                        x = 0;
                    }

                    var lang = skill_requirements[i].language.toLowerCase() == 'c++' ? 'cplus2' : (skill_requirements[i].language.toLowerCase() == "c#" ? 'csharp' : (skill_requirements[i].language.toLowerCase() == 'node.js' ? 'node-js' : skill_requirements[i].language.toLowerCase()) );

                    if(language_added.includes(lang)){
                        skills_container.find('.'+lang).parent().find('.body').append('<div class="ellipsis">'+skill_requirements[i].category+'</div>');
                    }
                    else
                    {
                        skills_container.find('.col-md-4').eq(x).append(
                            '<div class="job-card">'
                            +'    <div class="header ellipsis '+lang+'">'+skill_requirements[i].language+'</div>'
                            +'    <div class="body"><div class="ellipsis">'+skill_requirements[i].category+'</div> </div>'
                            +'</div>'
                        );
                        language_added.push(lang)
                        x++;
                    }
                }

                if(skill_requirements.length < 1){
                    skill_requirements.html('<div class="col-md-4" style="color:gray;">No skill requirements.</div>');
                }
            });
            </script>
        </div>
    </div>
</div>

<div class="container" style="padding-top:20px;">
    <table class="table table-bordered" id="applications-table" style="width: 100%;">
        <thead>
            <tr>
                <th>Name</th>
                <th>School</th>
                <th>Course</th>
                <th>Preffered training date</th>
            </tr>
        </thead>
    </table>
</div> 

<script>
$(document).ready(function(){
    $('#applications-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('json_get_itp_application') !!}',
        columns: [
            { data: 'applicant_name', name: 'applicant_name', searchable:false, orderable:false},
            { data: 'school', name: 'school', },
            { data: 'course', name: 'course', },
            { data: 'preffered_training_date', name: 'preffered_training_date', }
        ],
        order: [[ 1, 'asc' ]]
    });

    $(".btn-pref .btn").click(function () {
        $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
        // $(".tab").addClass("active"); // instead of this do the below 
        $(this).removeClass("btn-default").addClass("btn-primary");   
    });

});

//         $(document).ready(function() {
// $(".btn-pref .btn").click(function () {
//     $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
//     // $(".tab").addClass("active"); // instead of this do the below 
//     $(this).removeClass("btn-default").addClass("btn-primary");   
// });
// });
</script>

@endsection    