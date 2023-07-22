@extends('backend.layouts.master')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('pagetitle')
<b>Edit Admin</b>
@endsection

@section('admin.content')
   <!-- basic form start -->
   <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Edit Admin </h4>
                                        
                                        @include('backend.layouts.partials.messages')
                                        <form action="{{route('admin.admins.update',$admin)}}" method="post">
                                            @method('PUT')
                                            @csrf
                    
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label for="name">Name</label>
                                                <input type="text"  class="form-control" name="name" id="name" placeholder="Full Name" value="{{$admin->name}}">
                                            </div>

                                            <div class="form-group col-sm-6">
                                                <label for="email">Email</label>
                                                <input type="email"  class="form-control" name="email" id="email" placeholder="Email" value="{{$admin->email}}">
                                            </div> 
                                                </div>

                                                <div class="row">
                                             <div class="form-group col-sm-6">
                                                <label for="phone">Phone Number</label>
                                                <input type="text"  class="form-control" name="phone" id="phone" placeholder="phone" value="{{$admin->phone}}">
                                            </div>

                                            <div class="form-group col-sm-6">
                                                <label for="password">Password</label>
                                                <input type="text"  class="form-control" name="password" id="password" placeholder="password" value="" >
                                            </div>
                                        </div>
                                            
                        
                                            <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="roles">Assign Roles</label>
                                <select name="roles[]" id="roles" class="form-control select2" multiple>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}" {{ $admin->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>




                                           

                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
                             </div>
                                            

                                           
                                           
                                        </form>
                                    </div>
                                </div>
                            </div>
@endsection



@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>

$(document).ready(function() {
    $('.select2').select2();
});
</script>
@endsection


