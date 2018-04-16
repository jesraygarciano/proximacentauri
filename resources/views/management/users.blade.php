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
            <table class="table table-bordered" id="users-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>First name</th>
                        <th>Middle name</th>
                        <th>Last name</th>
                        <th>Email address</th>
                        <th>Role</th>
                        <th>Phone number</th>
                        <th>City</th>
                        <th>Country</th>
                        <th>Active members</th>
                        <th>Date registered</th>
                    </tr>
                </thead>
            </table>

            <script type="text/javascript">
            $(function() {
                $('#users-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('datatables.users') !!}',
                    columns: [
                        { data: 'id', name: 'id', },
                        { data: 'f_name', name: 'f_name' },
                        { data: 'm_name', name: 'm_name' },
                        { data: 'l_name', name: 'l_name' },
                        { data: 'email', name: 'email' },
                        { data: 'role', name: 'role' },
                        { data: 'phone_number', name: 'phone_number' },
                        { data: 'city', name: 'city' },
                        { data: 'country', name: 'country' },
                        { data: 'is_active', name: 'is_active' },
                        { data: 'created_at', name: 'created_at' },
                    ]
                });
            });
            </script>
      </div> {{-- END TAB CONTENT --}}
    </div> {{-- END MANAGE PORTAL --}}
</div>
@endsection