@extends('backend.layouts.master')

@section('styles')
   <!-- Start datatable css -->
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
@endsection
@section('pagetitle')
<b>Users</b>
@endsection

@section('admin.content')
 <!-- Primary table start -->
 <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                <h4 class="header-title">Users</h4>
                                <a class="btn btn-sm btn-info float-right mb-1" href="{{route('admin.users.create')}}">create user</a>
                                </div>
                                <div class="data-tables datatable-primary">
                                    <table id="dataTable2" class="text-center">
                                        <thead class="text-capitalize">
                                            <tr>
                                            <th width="15%">Name</th>
                                            <th width="30%">Phone</th>
                                            <th width="10%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        @foreach ($users as $user )
                                        <tr>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->phone}}</td>
                                                <td>
                                                
                                                    <a class="btn btn-success text-white" href="{{ route('admin.users.edit', $user->id) }}">Edit</a>

                                        <a class="btn btn-danger text-white" href="{{ route('admin.users.destroy', $user->id) }}"
                                        onclick="event.preventDefault(); 
                                      

                                        if(  confirm('Are you sure you want to delete {{$user->name}} user'))
                                        document.getElementById('delete-form-{{ $user->id }}').submit();">
                                            Delete
                                        </a>

                                        <form id="delete-form-{{ $user->id }}" action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: none;">
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