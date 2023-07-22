@extends('backend.layouts.master')

@section('styles')
   <!-- Start datatable css -->
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
@endsection
@section('pagetitle')
<b>Roles</b>
@endsection

@section('admin.content')
 <!-- Primary table start -->
 <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                <h4 class="header-title">Roles</h4>
                                <a class="btn btn-sm btn-info float-right mb-1" href="{{route('roles.create')}}">create role</a>
                                </div>
                                <div class="data-tables datatable-primary">
                                    <table id="dataTable2" class="text-center">
                                        <thead class="text-capitalize">
                                            <tr>
                                            <th width="5%">Serial</th>
                                            <th width="10%">Name</th>
                                            <th width="50%">Permissions</th>
                                            <th width="15%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        @foreach ($roles as $role )
                                        <tr>
                                                <td>{{$loop->index+1}}</td>
                                                <td>{{$role->name}}</td>
                                                <td>
                                                    @foreach ($role->permissions as $permission)
                                                       <span class="badge badge-info mr-1">{{$permission->name}}</span>
                                                    @endforeach
                                                </td>
                                                <td>
                                                
                                                    <a class="btn btn-success text-white" href="{{ route('roles.edit', $role->id) }}">Edit</a>

                                        <a class="btn btn-danger text-white" href="{{ route('roles.destroy', $role->id) }}"
                                        onclick="event.preventDefault(); 
                                      

                                        if(  confirm('Are you sure you want to delete {{$role->name}} role'))
                                        document.getElementById('delete-form-{{ $role->id }}').submit();">
                                            Delete
                                        </a>

                                        <form id="delete-form-{{ $role->id }}" action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display: none;">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                                </td>
                                                
                                            </tr>
                                           
                                        @endforeach
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Primary table end -->

@endsection

@section('scripts')
   <!-- Start datatable js -->
   <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>

    <script>

 /*================================
    datatable active
    ==================================*/
    if ($('#dataTable').length) {
        $('#dataTable').DataTable({
            responsive: true
        });
    }
    if ($('#dataTable2').length) {
        $('#dataTable2').DataTable({
            responsive: true
        });
    }
    if ($('#dataTable3').length) {
        $('#dataTable3').DataTable({
            responsive: true
        });
    }



    </script>
@endsection