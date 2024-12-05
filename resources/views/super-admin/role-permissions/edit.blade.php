@extends('super-admin.layouts.app')

@section('title')
    <title>Admin | Edit Role Management</title>
@endsection

@section('content')

    @php
        $modules = ['Manager', 'Orders', 'Customer', 'Role', 'Report', 'Content', 'Technician'];
        use Illuminate\Support\Str;
    @endphp


    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid"></div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title mr-6">Permission Update</h3>
                                    </div>
                                    <form id="adminProfileForm" method="POST"
                                        action="{{ route('manage-permission.update',$role->id) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="card-body row">
                                            <div class="form-group col-md-6">
                                                <h4>{{ @$role->name ?? '' }}'s Permission Manage</h4>
                                                
                                            </div>
                                        </div>
                                        
                                            <h3>Permission</h3>

                                        <input type="hidden" name="role_id" value="{{ @$role->id }}"  > 
                                        <input type="hidden" name="role_name" value="{{ @$role->name }}"  >  
                                        
                                        <div class="card-body row">
                                            <div class="container-fluid page__container">
                                                    <div class="col-lg-12 col-md-12 p-0">
                                                        <div class="table-responsive border-bottom" data-toggle="lists">
                                                            @if (!empty($role->permissions))
                                                                <table class="table mb-0 table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th style="width: 50px; text-align: center;">
                                                                                <div class="">
                                                                                    <input class="styled-checkbox"
                                                                                        id="styled-checkbox-1"
                                                                                        type="checkbox" value="value1">
                                                                                    <label for="styled-checkbox-1"></label>
                                                                                </div>
                                                                            </th>
                                                                            <th>Select All</th>
                                                                            <th>Manage</th>
                                                                            <th>Create</th>
                                                                            <th>Update</th>
                                                                            <th>Delete</th>
                                                                            <th>View</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody class="list">
                                                                        @foreach ($modules as $module)
                                                                            <tr>
                                                                                <td></td>
                                                                                <td>{{ ucfirst($module) }}</td>
                                                                                @foreach (['Manage', 'Create', 'Edit', 'Delete', 'View'] as $action)
                                                                                    <td>
                                                                                        @if (in_array($action . ' ' . $module, (array) $permissions))
                                                                                            @if ($key = array_search($action . ' ' . $module, $permissions))
                                                                                                <div class="toggle-check">
                                                                                                    <div
                                                                                                        class="button-switch">
                                                                                                        <input
                                                                                                            type="checkbox"
                                                                                                            id="switch-{{ $action }}-{{ Str::slug($module) }}"
                                                                                                            
                                                                                                            name="permissions[]"
                                                                                                            class="switch toggle-class-unbeatable"
                                                                                                            value="{{ $key }}"
                                                                                                            @if (in_array($key, $role->permissions()->pluck('id')->toArray())) checked @endif>
                                                                                                        <label
                                                                                                            for="switch-{{ $action }}-{{ Str::slug($module) }}"
                                                                                                            class="lbl-off"></label>
                                                                                                        <label
                                                                                                            for="switch-{{ $action }}-{{ Str::slug($module) }}"
                                                                                                            class="lbl-on"></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            @endif
                                                                                        @endif
                                                                                    </td>
                                                                                @endforeach
                                                                            </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            @else
                                                                <p>No permissions available</p>
                                                            @endif
                                                            <span class="text-danger" id="permissions_msg"></span>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                        @if ($errors->has('permissions'))
                                            <div class="error text-danger">
                                                {{ $errors->first('permissions') }}
                                            </div>
                                        @endif
                                        <div class="card-footer">
                                            <button type="submit" id="updateLoanSetting"
                                                class="btn btn-primary">Update</button>
                                            <a href="" id="updateLoanSetting" class="btn btn-primary">Back</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </section>
        <!-- /.content -->
    </div>

   
@endsection


@push('scripts')

@endpush
