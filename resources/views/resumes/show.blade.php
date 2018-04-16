@extends('layouts.app')

@section('content')

<div class="container">

    @include('inc.message')

    <div class="row">
        <div class="col-md-5">
            <div class="row">
                <div id="photo_name">
                    <div class="col-md-12">
                        <div id="headshot" class="quickFade">
                            <img style="width:100%; max-width: 150px; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3); border-radius: 4px;" class="_image" src="{{ $resume->photo }}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div id="name">
                            <h2 class="" style="color:#838383;">{{$resume->f_name}} {{$resume->m_name}} {{$resume->l_name}}</h2>
                            <h3 class="" style="color:#838383;">{{$resume->job_title}}</h3>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div style="margin-top:10px; margin-bottom:10px;" id="resume_update_btn">
                            {!! link_to(action('ResumesController@edit', $resume->id) , 'resume update', ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="other_profile">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="contactDetails">
                                    <div class="sectionTitle">
                                        <h1>Personal Profile&nbsp;</h1>
                                    </div>
                                    <div class="personal-detail">
                                        <ul>
                                            <li>
                                                <a href="mailto:{{$resume->email}}" target="_blank">
                                                    {{$resume->email}}
                                                </a>
                                                &nbsp;&nbsp;
                                                <i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp;&nbsp;
                                            </li>
                                            <li>
                                                {{$resume->phone_number}}
                                                &nbsp;&nbsp;
                                                <i class="fa fa-phone" aria-hidden="true"></i>&nbsp;&nbsp;
                                            </li>
                                            <li>
                                                {{$resume->address1}}
                                                {{$resume->address2}}&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp;
                                            </li>
                                            <li>
                                                {{$resume->city}}
                                                {{$resume->country}}
                                                {{$resume->postal}}
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="contactDetails">
                                    <div class="sectionTitle">
                                        <h1>Languages</h1>
                                    </div>
                                    <div class="personal-detail">
                                        <ul>
                                            <li>
                                                {{$resume->spoken_language}}
                                                &nbsp;&nbsp;
                                                <i class="fa fa-language" aria-hidden="true"></i>&nbsp;&nbsp;
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            {{-- <div class="clear"></div> --}}
        </div>



        <div  class="col-md-7">
            <div class="row">
                <div class="col-md-12">
                    <div id="mainArea-inner">
                        <section>
                            <article>
                                <div class="sectionTitle">
                                    <h1>Personal Profile</h1>
                                </div>


                                <div class="sectionContent">
                                    <p>{{$resume->summary}}</p>
                                </div>
                            </article>
                            <div class="clear"></div>
                        </section>

                        <section>
                            <article>
                                <div class="sectionTitle">
                                    <h1>Educational Background</h1>
                                </div>

                                <div class="sectionContent">
                                    @foreach($resume->educations as $education)
                                    <div class="education">
                                        <h2>{{$education->ed_university}}</h2>
                                        @if($education->ed_program_of_study != '' && $education->ed_field_of_study != '')
                                            <h4>{{$education->ed_program_of_study}}&nbsp;&nbsp;{{$education->ed_field_of_study}}</h4>
                                        @elseif($education->ed_program_of_study == '' && $education->ed_field_of_study != '')
                                            <h4>{{$education->ed_field_of_study}}</h4>
                                        @else
                                            <h4>{{$education->ed_program_of_study}}</h4>
                                        @endif
                                        <p class="subDetails">{{return_month($education->ed_from_month)}}, {{$education->ed_from_year}}&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;{{return_month($education->ed_to_month)}}, {{$education->ed_to_year}}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="clear"></div>
                            </article>
                        </section>

                        <section>
                            <article>
                                <div class="sectionTitle">
                                    <h1>Work Experience</h1>
                                </div>
                                <div class="sectionContent">
                                    @foreach($resume->experiences as $experience)
                                        <h2>{{$experience->ex_company}}</h2>
                                        <h4>{{$experience->ex_postion}}</h4>
                                        <p class="subDetails">{{ return_month($experience->ex_from_month) }}, {{$experience->ex_from_year}}&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;{{return_month($experience->ex_to_month)}}, {{$experience->ex_to_year}}</p>
                                        <p>{{$experience->ex_explanation}}</p>
                                    @endforeach
                                </div>
                                <div class="clear"></div>
                            </article>
                        </section>


                        <section>
                            <article>
                                <div class="sectionTitle">
                                    <h1>Key Skills</h1>
                                </div>

                                <div class="sectionContent">
                                    <div id="skill-wrapper">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4"></div>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </article>
                        </section>

                        <section>
                            <article>
                                <div class="sectionTitle">
                                    <h1>Objective</h1>
                                </div>

                                <div class="sectionContent">
                                    <p>{{$resume->objective}}</p>
                                </div>
                            </article>
                            <div class="clear"></div>
                        </section>

                        <section>
                            <article>
                                <div class="sectionTitle">
                                    <h1>Other Skill</h1>
                                </div>

                                <div class="sectionContent">
                                    <p>{{$resume->other_skills}}</p>
                                </div>
                            </article>
                            <div class="clear"></div>
                        </section>

                        <section>
                            <article>
                                <div class="sectionTitle">
                                    <h1>Websites</h1>
                                </div>

                                <div class="sectionContent">
                                    <p>{{$resume->websites}}</p>
                                </div>
                            </article>
                            <div class="clear"></div>
                        </section>

                        <section>
                            <article>
                                <div class="sectionTitle">
                                    <h1>Seminars Attended</h1>
                                </div>

                                <div class="sectionContent">
                                    <p>{{$resume->seminars_attended}}</p>
                                </div>
                            </article>
                            <div class="clear"></div>
                        </section>

                        <section>
                            <article>
                                <div class="sectionTitle">
                                    <h1>Awards</h1>
                                </div>

                                <div class="sectionContent">
                                    <p>{{$resume->awards}}</p>
                                </div>
                            </article>
                            <div class="clear"></div>
                        </section>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <script type="text/javascript">
        $(function(){
            console.log("skill1","{{json_encode($resume->has_skill)}}");
            var skill = JSON.parse("{{json_encode($resume->has_skill)}}".replace(/&quot;/g,'"'));
            console.log("skill","{{json_encode($resume->has_skill)}}".replace(/&quot;/g,'"'));
            console.log(skill);
            var skill_wrapper = $("#skill-wrapper").html();
            // console.log(skill_wrapper);
            var lang = [];
            var x = 0;

            for (var i = 0; i < skill.length; i++) {

                if (x > 2) {
                    x = 0;
                }

                var lang_lang = skill[i].language.toLowerCase() == 'c++' ? 'cplus2' : (skill[i].language.toLowerCase() == "c#" ? 'csharp' : (skill[i].language.toLowerCase() == 'node.js' ? 'node-js' : skill[i].language.toLowerCase()) );

                if (lang.includes(lang_lang)) {
                    // $("#skill-wrapper").find(".col-md-4").has("." + lang_lang).append(
                    $(".col-md-4").find("." + lang_lang).parent().find(".body").append(
                        '<div class="ellipsis">'+skill[i].category+'</div>'
                    );
                    console.log(x);
                }else{
                    $("#skill-wrapper").find(".col-md-4").eq(x).append(
                        '<div class="job-card">'
                        +'    <div class="header ellipsis '+ lang_lang +'">'+skill[i].language+'</div>'
                        +'    <div class="body"><div class="ellipsis">'+skill[i].category+'</div> </div>'
                        +'</div>'
                    );

                    x += 1;
                    lang.push(lang_lang);
                }
                // skill[i].language
            }
        });
    </script>

</div>
@endsection
