@extends('backend.layouts.master')

@section('pagetitle')
<b>Create Role</b>
@endsection

@section('admin.content')
   <!-- basic form start -->
   <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">New Role Create</h4>
                                        @include('backend.layouts.partials.messages')
                                
                                        <form action="{{route('roles.store')}}" method="post">
                                            @csrf
                                          
                                        
                                            <div class="form-group">
                                                <label for="name">Role Name</label>
                                                <input type="text"  class="form-control" name="name" id="name" placeholder="New Role">
                                            </div>


                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input"  id="permissionCheckAll">
                                                <label class="form-check-label" for="permissionCheckAll">All Permission</label>
                                        
                                            </div>
                                            <hr>

                                @php $i = 1; @endphp
                            @foreach ($permission_groups as $group)
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="{{ $i }}Management" value="{{ $group->name }}" onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)">
                                            <label class="form-check-label" for="checkPermission">{{ $group->name }}</label>
                                        </div>
                                    </div>

                                    <div class="col-9 role-{{ $i }}-management-checkbox">
                                        @php
                                            $permissions = App\Models\Admin::getpermissionsByGroupName($group->name);
                                            $j = 1;
                                        @endphp
                                        @foreach ($permissions as $permission)
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" name="permissions[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}">
                                                <label class="form-check-label" for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>
                                            </div>
                                            @php  $j++; @endphp
                                        @endforeach
                                        <br>
                                    </div>

                                </div>
                                @php  $i++; @endphp
                            @endforeach

                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
                             </div>
                                            

                                           
                                           
                                        </form>
                                    </div>
                                </div>
                            </div>
@endsection



@include('backend.layouts.partials.roleCheckerJs')