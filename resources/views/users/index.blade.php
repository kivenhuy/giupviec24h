@extends('layouts.app')

@section('title', 'Users List')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Users</h1>
            <div class="row">
                <div class="col-md-6">
                    <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-plus"></i> Add New
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('users.export') }}" class="btn btn-sm btn-success">
                        <i class="fas fa-check"></i> Export To Excel
                    </a>
                </div>
                
            </div>

        </div>

        {{-- Alert Messages --}}
        {{-- @include('common.alert') --}}

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All Users</h6>

            </div>
            <div class="card-body">
                <div class="card-body" style="overflow-x: scroll;">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                {{-- <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead> --}}
                        {{-- <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->full_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->mobile_number }}</td>
                                    <td>{{ $user->roles ? $user->roles->pluck('name')->first() : 'N/A' }}</td>
                                    <td>
                                        @if ($user->status == 0)
                                            <span class="badge badge-danger">Inactive</span>
                                        @elseif ($user->status == 1)
                                            <span class="badge badge-success">Active</span>
                                        @endif
                                    </td>
                                    <td style="display: flex">
                                        @if ($user->status == 0)
                                            <a href="{{ route('users.status', ['user_id' => $user->id, 'status' => 1]) }}"
                                                class="btn btn-success m-2">
                                                <i class="fa fa-check"></i>
                                            </a>
                                        @elseif ($user->status == 1)
                                            <a href="{{ route('users.status', ['user_id' => $user->id, 'status' => 0]) }}"
                                                class="btn btn-danger m-2">
                                                <i class="fa fa-ban"></i>
                                            </a>
                                        @endif
                                        <a href="{{ route('users.edit', ['user' => $user->id]) }}"
                                            class="btn btn-primary m-2">
                                            <i class="fa fa-pen"></i>
                                        </a>
                                        <a class="btn btn-danger m-2" href="#" data-toggle="modal" data-target="#deleteModal">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody> --}}
                    {{-- </table> --}}

                    {{-- {{ $users->links() }} --}}
                {{-- </div> --}}
            </div>
        </div>

    </div>

    {{-- @include('users.delete-modal') --}}

@endsection


{{-- this for vue --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/vue@2.7.4"></script> --}}
{{-- <link rel="stylesheet" href="{{asset('css/bootstrap-theme.min.css')}}"> --}}

  <!-- DataTables  & Plugins -->
  @push('scripts')
  <script src="{{asset('jquery/jquery.min.js')}}"></script>

  <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
  <script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
  <script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
  <script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
  <script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
  <script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
  <script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
  <script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
  <script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

  <script>
    $(document).ready(function(){
    // fill_datatable();
    // function fill_datatable()
    // {
        $("#example1").DataTable({
            lengthChange: true,
            responsive: true,
            processing: true,
            searching: false,
            serverSide: true,
            ajax:{
                url: "{{ route('users.dtajax') }}",
                timeout: 5000,
                data:{},
            },

            columns: [
                {data: 'full_name', name: 'Name'},
                {data: 'email', name: 'Email'},
                {data: 'mobile_number', name: 'Mobile'},
                {data: 'role_id', name: 'Role'},
                {data: 'Status', name: 'status', render: function(data){
                return (data==1)?"<span class='badge bg-danger'> Inactive</span>":"<span class='badge bg-success'> Active</span>";
                }},
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true,
                },
            ],
            columnDefs: [
                // {
                // targets: '_all',
                // defaultContent: ""
                // }
            ],
            // drawCallback:function(setting)
            // {
            //     $('[data-toggle="tooltip"]').tooltip();
            // }
        })
        // .buttons().container().appendTo('#example1 .col-md-6:eq(0)');
    // }
});
</script>
@endpush

