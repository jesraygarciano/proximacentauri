@extends('layouts.app')

@section('content')

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

<script type="text/javascript">
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
    });
</script>

@endsection
