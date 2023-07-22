@extends('backend.layouts.master')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('pagetitle')
<b>Create Admin</b>
@endsection

@section('admin.content')
   <!-- basic form start -->
   <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">New Admin Create</h4>
                                        
                                        @include('backend.layouts.partials.messages')
                                        
                                        <form action="{{route('admin.admins.store')}}" method="post">
                                            @csrf
            
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label for="name">Name</label>
                                                <input type="text"  class="form-control" name="name" id="name" placeholder="Full Name">
                                            </div>

                                            <div class="form-group col-sm-6">
                                                <label for="email">Email</label>
                                                <input type="email"  class="form-control" name="email" id="email" placeholder="Email">
                                            </div> 
                                                </div>

                                                <div class="row">
                                             <div class="form-group col-sm-6">
                                                <label for="phone">Phone Number</label>
                                                <input type="text"  class="form-control" name="phone" id="phone" placeholder="phone">
                                            </div>

                                            <div class="form-group col-sm-6">
                                                <label for="password">Password</label>
                                                <input type="text"  class="form-control" name="password" id="password" placeholder="password">
                                            </div>
                                        </div>
                                            
                        
                                            <div class="row">

                                            <div class="form-group col-sm-6">
                                            <label for="role">Role</label>
                                            <select class="custom-select js-example-basic-multiple"  id="role" name="roles[]" multiple>
                                                @foreach ($roles as $role )
                                                <option value="{{$role->name}}">{{$role->name}}</option>
                                                @endforeach
                
                                            </select>
                                            </div></div>




                                           

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
    $('.js-example-basic-multiple').select2();
});
</script>
@endsection


