@extends('layouts.app')

@section('content')

<div class="container">
    <div class="manage-portal">
        <h1>Management Users</h1>

        <ul class="nav nav-pills">
        <li class="active">
            <a data-toggle="pill" href="#manageusers">
                <i class="fa fa-users" aria-hidden="true"></i>
                Manage Users
            </a>
        </li>  
        </ul>

        <div class="tab-content">
            <div id="manageusers" class="tab-pane fade in active"> {{-- START MANAGE USERS --}}
                <h3>

                <i class="fa fa-users" aria-hidden="true"></i>
                Manage users

                </h3>

                <table class="table table-bordered" id="openings-table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Details</th>
                            <th>Requirements</th>
                            <th>Openings Address</th>
                            <th>Opening created</th>
                            <th>Active openings</th>
                        </tr>
                    </thead>
                </table>

                <script type="text/javascript">
                $(function() {
                    $('#openings-table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: '{!! route('datatables.openings') !!}',
                        columns: [
                            { data: 'id', name: 'id', },
                            { data: 'title', name: 'title' },
                            { data: 'details', name: 'details' },
                            { data: 'requirements', name: 'requirements' },
                            { data: 'address1', name: 'address1' },
                            { data: 'created_at', name: 'created_at' },
                            { data: 'is_active', name: 'is_active' }
                        ]
                    });
                });
                </script>
            </div> {{-- END TAB CONTENT --}}
        </div> {{-- END MANAGE PORTAL --}}
    </div>
</div>

@endsection