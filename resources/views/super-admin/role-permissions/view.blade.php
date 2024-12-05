@extends('super-admin.layouts.app')

@section('title')
    <title>Admin | Role & Permission Management</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Manage Role & Permission</h3>
                                    </div>
                                    {{-- table start --}}
                                    <section class="content">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <div
                                                                class="w-100  d-flex justify-content-between align-items-center">
                                                                <h3 class="card-title">Role & Permissions List</h3>
                                                                <form class="d-flex" action="{{ url()->current() }}"
                                                                    method="GET">
                                                                    <input type="text" class="form-control"
                                                                        name="search" value="{{ request('search') }}"
                                                                        placeholder="Search role & permissions...">
                                                                    <button class="btn btn-primary  ml-4"
                                                                        type="submit">Search</button>
                                                                    {{-- <a href="" class="btn btn-primary ml-4"
                                                                        type="button">Add</a> --}}
                                                                </form>

                                                            </div>
                                                        </div>
                                                        <!-- /.card-header -->
                                                        <div class="card-body">
                                                            <table id="example2" class="table table-bordered table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Sl No.</th>
                                                                        <th>Role</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                {{-- <tbody> --}}
                                                                <tbody>
                                                                    @if ($role_list->isNotEmpty())
                                                                        @foreach ($role_list as $role)
                                                                            <tr>

                                                                                <td>
                                                                                    {{ ($role_list->currentPage() - 1) * $role_list->perPage() + $loop->index + 1 }}
                                                                                </td>
                                                                                <td>
                                                                                    {{ $role->name }}</td>


                                                                                <td class="">
                                                                                    <div class="action_btn_row d-flex">
                                                                                        <a href="{{ route('manage-permission.edit', $role->id) }}"
                                                                                            class="btn btn-info align-self-center"><i
                                                                                                class="fas fa-edit"></i></a>

                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    @else
                                                                        <tr class="text-center">
                                                                            <td colspan="7">No Data Found</td>
                                                                        </tr>
                                                                    @endif

                                                                </tbody>


                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                        <!-- /.card-body -->
                                                    </div>
                                                    {{ @$role_list->appends(['search' => request('search')])->links() }}
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>

                    </div>
                </section>

            </div>
        </section>
        <!-- /.content -->
    </div>

@endsection
