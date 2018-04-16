@extends('layouts.app')

@section('content')

<div class="container" style="padding-top:20px;">
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active">
            <a href="#batches" role="tab" data-toggle="tab" aria-expanded="true">
                Batch
            </a>
        </li>
        <li role="presentation">
            <a href="#application" role="tab" data-toggle="tab" aria-expanded="false">
                Applications
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active in" id="batches">
            <div>
                <a href="{{route('get_create_batch')}}" class="ui blue button massive" >Create New Batch</a>
            </div>
            <br />
            <table class="table table-bordered" id="batch-table" style="width: 100%; text-align: center;">
                <thead>
                    <tr>
                        <th>Batch Name</th>
                        <th>Start Date</th>
                        <th>Schedule</th>
                        <th>Registration Deadline</th>
                        <th>Options</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div role="tabpanel" class="tab-pane in" id="application">
            <table class="table table-bordered" id="applications-table" style="width: 100%; text-align: center;">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Batch</th>
                        <th>Application Date</th>
                        <th>Status</th>
                        <th>Options</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<div class="ui mini modal" id="delete_batch_bttn">
    <div class="header">Delete Batch</div>
    <div class="content">
        <p>Are you sure you want to delete this batch?</p>
    </div>
    <div class="actions">
        <div class="ui negative button">
            No
        </div>
        <div class="ui delete positive right labeled icon button">
            Yes
            <i class="checkmark icon"></i>
        </div>
    </div>
</div>

<div class="ui modal" id="batch_applicants_modal">
    <div class="header">
        Batch Applicants
    </div>
    <div class="content">
        <div style="min-height: 300px;">
            <table class="table table-bordered" id="batch-applications-table" style="width: 100%; text-align: center;">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Application Date</th>
                        <th>Options</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div class="actions">
        <div class="ui black deny button">
          Close
        </div>
    </div>
</div>

<div class="ui modal" id="view_applicant_modal">
  <div class="header">
    Profile Picture
  </div>
  <div class="image content">
    <div class="ui medium image">
        <img src="/images/avatar/large/chris.jpg" style="min-width: 200px;" class="avatar">
    </div>
    <div class="description" style="flex: auto; word-break: break-word;">
          <div class="ui header name">We've auto-chosen a profile image for you.</div>
        <p>
            <b>Objective</b> : 
            <span class="objectives"></span>
        </p>
          <p>
            <b>Course</b> : 
            <span class="course"></span>
        </p>
        <p><b>Objective</b> : <span class="objectives">We've grabbed the following image from the <a href="https://www.gravatar.com" target="_blank">gravatar</a> image associated with your registered e-mail address.</span>
        </p>
        <p>
            <b>School</b> : <span class="school"></span>
        </p>
        <p>
            <b>Batch</b> : 
            <span class="batch"></span>
        </p>
        <p>
            <div class="ui header">Skills</div>
            <div class="skill_container">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4"></div>
                </div>
            </div>
        </p>
    </div>
  </div>
  <div class="actions">
    <div class="ui black deny button">
      Close
    </div>
    {{-- <div class="ui positive right labeled icon button">
      Yep, that's me
      <i class="checkmark icon"></i>
    </div> --}}
  </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        var table = $('#batch-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('json_get_batches_datatable') !!}',
            columns: [
                { data: 'name', name: 'name'},
                { data: 'start_date', name: 'start_date', },
                { data: 'schedule', name: 'schedule', },
                { data: 'regitration_deadline', name: 'regitration_deadline', },
                {
                    searchable: false,
                    "orderable": false,
                    "render": function ( data, type, row ) {
                        return '<a type="button" title="view applicants" onclick="view_batch_applicants('+row['id']+')" class="btn btn-primary btn-xs">'
                        +'<i class="fa fa-group"></i>'
                        +'</a> '
                        +'<a href="{{route('get_create_batch')}}/'+row['id']+'" title="edit" class="btn btn-primary btn-xs">'
                        +'<i class="fa fa-edit"></i>'
                        +'</a> '
                        +'<a type="button" onclick="prep_del_batch('+row['id']+')" title="delete" class="btn btn-danger btn-xs">'
                        +'<i class="fa fa-trash"></i>'
                        +'</a>'
                        +' <label class="switch" style="vertical-align:middle;">'
                        +'  <input type="checkbox" name="is_active">'
                        +'  <span class="slider"></span>'
                        +'</label>'
                    },
                }
            ],
            "createdRow": function ( row, data, index ) {
                $(row).find('[name=is_active]').prop('checked',data.is_active);
                console.log($(row).find('[name=is_active]'));
                $(row).find('[name=is_active]').change(function(){
                    $.ajax({
                        url:"{{route('json_edit_btach_is_active')}}",
                        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                        type:"POST",
                        data:{is_active:$(this).prop('checked'),batch_id:data.id},
                        success:function(data){
                            console.log(data);
                        }
                    });
                });
            },
            order: [[ 1, 'desc' ]]
        });

        $('#delete_batch_bttn .delete').click(function(){
            $.ajax({
                url:"{{route('json_delete_batch')}}",
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                type:"POST",
                data:{batch_id:$('#delete_batch_bttn').data('id')},
                success:function(data){
                    table.ajax.reload();
                },
                error:function(){}
            });
        });


        // 
        // 
        // 
        var applicants_table = $('#applications-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('json_get_applicants_datatable') !!}',
            columns: [
                { data: 'applicant_name', name: 'applicant_name'},
                { data: 'training_batch_name', name: 'training_batch_name' },
                { data: 'created_at', name: 'internship_applications.created_at' },
                {
                    searchable: false,
                    "orderable": false,
                    "render": function ( data, type, row ) {
                        return '<select class="form-control" name="status">'
                        +'<option value="under_consideration">Under Consideration</option>'
                        +'<option value="approved">Approved</option>'
                        +'<option value="declined">Declined</option>'
                        +'</select>';
                        ;
                    },
                },
                {
                    searchable: false,
                    "orderable": false,
                    "render": function ( data, type, row ) {
                        return '<button class="btn btn-primary view-button btn-xs">'
                        +'<i class="fa fa-eye"></i>'
                        +'</button>'
                        ;
                    },
                }
            ],
            "createdRow": function ( row, data, index ) {
                $(row).find('.view-button').click(function(){
                    view_applicant(data);
                });

                $(row).find('[name=status]').find('option[value='+data.status+']').prop('selected',true);

                $(row).find('[name=status]').change(function(){
                    $.ajax({
                        url:"{{route('json_update_application_status')}}",
                        type:"POST",
                        data:{
                            id:data.id,
                            status:$(row).find('[name=status]').val()
                        },
                        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                        success:function(data){}
                    });
                });
            },
            order: [[ 2, 'desc' ]]
        });
    });

    function view_applicant(data){
        $('body').append('<div class="front-drop" style="position:fixed; z-index:1000; width:100%; height:100%; top:0px; left:0px;"></div>');
        $.ajax({
            url:"{{route('json_view_application')}}",
            data:{
                id:data.id
            },
            type:"GET",
            success:function(data){
                load_applicant(data);
                $('body .front-drop').remove();
            }
        });
    }

    function load_applicant(data){
        $('#view_applicant_modal').find('.avatar').attr('src',data.user.photo);
        $('#view_applicant_modal').find('.name').html(data.user.name.replace(' ',"") ? data.user.name : "Unknown");

        var skills_container = $('#view_applicant_modal .skill_container');
        skills_container.find('.col-md-4').html('');

        var language_added = [];
        var x = 0;

        for(var i = 0; i < data.skills.length; i++){
            if(x > 2){
                x = 0;
            }

            var lang = data.skills[i].language.toLowerCase() == 'c++' ? 'cplus2' : (data.skills[i].language.toLowerCase() == "c#" ? 'csharp' : (data.skills[i].language.toLowerCase() == 'node.js' ? 'node-js' : data.skills[i].language.toLowerCase()) );

            if(language_added.includes(lang)){
                skills_container.find('.'+lang).parent().find('.body').append('<div class="ellipsis">'+data.skills[i].category+'</div>');
            }
            else
            {
                skills_container.find('.col-md-4').eq(x).append(
                    '<div class="job-card">'
                    +'    <div class="header ellipsis '+lang+'">'+data.skills[i].language+'</div>'
                    +'    <div class="body"><div class="ellipsis">'+data.skills[i].category+'</div> </div>'
                    +'</div>'
                );
                language_added.push(lang)
                x++;
            }
        }

        $('#view_applicant_modal').find('.course').html(data.course);
        $('#view_applicant_modal').find('.objectives').html(data.objectives);
        $('#view_applicant_modal').find('.batch').html(data.trainingBatch ? data.trainingBatch.name:'batch removed');
        $('#view_applicant_modal').find('.school').html(data.school);
        $('#view_applicant_modal').modal('show');
    }

    function view_batch_applicants(id){
        $('#batch_applicants_modal').modal('show');
        $('body').append('<div class="front-drop" style="position:fixed; z-index:1000; width:100%; height:100%; top:0px; left:0px;"></div>');

        var batch_applicant_tb = $('#batch-applications-table').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            ajax: '{!! route('json_get_applicants_datatable') !!}?training_batch_id='+id,
            columns: [
                { data: 'applicant_name', name: 'applicant_name'},
                { data: 'created_at', name: 'internship_applications.created_at' },
                {
                    searchable: false,
                    "orderable": false,
                    "render": function ( data, type, row ) {
                        return '<button class="btn btn-primary view-button btn-xs">'
                        +'<i class="fa fa-eye"></i>'
                        +'</button>';
                    },
                }
            ],
            "createdRow": function ( row, data, index ) {
                $(row).find('.view-button').click(function(){
                    view_applicant(data);
                });
            },
            "initComplete": function(settings, json) {
                $('body .front-drop').remove();
              },
            order: [[ 2, 'desc' ]]
        });
    }

    function prep_del_batch(id){
        $('#delete_batch_bttn').modal('show');
        $('#delete_batch_bttn').data('id',id);
    }
</script>

@endsection
