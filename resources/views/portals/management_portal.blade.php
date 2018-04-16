@extends('layouts.app')

@section('content')

<div class="container">
    <div class="manage-portal">
    <h1>Management Portal</h1>

      <ul class="nav nav-pills">
        <li class="active">
            <a data-toggle="pill" href="#manageusers">
                <i class="fa fa-users" aria-hidden="true"></i>
                Manage Users
            </a>
        </li>

        <li>
            <a data-toggle="pill" href="#managecompany">
                <i class="fa fa-building-o" aria-hidden="true"></i>
                Manage Companies
            </a>
        </li>

        <li>
            <a data-toggle="pill" href="#manageopening">
                <i class="fa fa-list-alt" aria-hidden="true"></i>
                Manage opening
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
                    ajax: '{!! route('datatables.data') !!}',
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

        </div> {{-- END Manage users --}}

        <div id="managecompany" class="tab-pane fade">
            <h3>
                <i class="fa fa-building-o" aria-hidden="true"></i>
                Manage companies

            </h3>
            <table class="table table-bordered" id="companies-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Company names</th>
                        <th>Active Companies</th>
                        <th>CEO Names</th>
                        <th>Address:</th>
                        <th>Email addresses</th>
                        <th>Number of employee</th>
                        <th>Date of company Established</th>
                        <th>Country</th>
                    </tr>
                </thead>
            </table>

            <script type="text/javascript">
            $(function() {
                $('#companies-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('datatables.companies') !!}',
                    columns: [
                        { data: 'id', name: 'id', },
                        { data: 'company_name', name: 'company_name' },
                        { data: 'is_active', name: 'is_active' },
                        { data: 'ceo_name', name: 'ceo_name' },
                        { data: 'address1', name: 'address1' },
                        { data: 'email', name: 'email' },
                        { data: 'number_of_employee', name: 'number_of_employee' },
                        { data: 'established_at', name: 'established_at' },
                        { data: 'country', name: 'country' }
                    ]
                });
            });
            </script>

        </div> {{-- END manage companies  --}}


        <div id="manageopening" class="tab-pane fade in"> {{-- START MANAGE OPENINGS --}}
            <h3>
                <i class="fa fa-list-alt" aria-hidden="true"></i>
                Manage opening
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
                        { data: 'address', name: 'address' },
                        { data: 'created_at', name: 'created_at' },
                        { data: 'is_active', name: 'is_active' }
                    ]
                });
            });
            </script>

        </div> {{-- END Manage Openings --}}
      </div> {{-- END TAB CONTENT --}}
    </div> {{-- END MANAGE PORTAL --}}
</div>

@endsection