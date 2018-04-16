@extends('layouts.app')

@section('content')

<div class="container">
<div class="manage-portal">
    <h1>Manage companies</h1>
    
    <ul class="nav nav-pills">
        <li class="active">
            <a data-toggle="pill" href="#managecompanies">
                <i class="fa fa-users" aria-hidden="true"></i>
                Manage companies
            </a>
        </li>  
    </ul>

      <div class="tab-content">
            <div id="managecompanies" class="tab-pane fade in active">
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
      </div> {{-- END TAB CONTENT --}}
</div> {{-- END MANAGE PORTAL --}}
</div>

@endsection