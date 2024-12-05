<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pagination;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class ManagePermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Role::where('name', '!=', 'SUPER-ADMIN')
        ->where('name', '!=', 'TECHNICIAN')
        ->where('name', '!=', 'CUSTOMER');

        if (isset($request->search) && $request->search != '') {
            $search = $request->search;
            $query->where('name', 'like', '%' . $search . '%');
        }

        // Call paginate directly on the query
        $role_list = $query->paginate(Pagination::PERPAGE);
        return view('super-admin.role-permissions.view', compact('role_list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::findorFail($id);
        $permissions = Permission::all()->pluck('name','id')->toArray();

        return view('super-admin.role-permissions.edit', compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'role_name' => 'required|unique:roles,name,'. $id,
            'permissions' => 'required'
        ]);
   
        $role = Role::findorFail($id);
        $role->name = $request->role_name;
        $permissions = $request['permissions'];
        $role->update();

        $all_permission = Permission::all();

        foreach($all_permission as $permission)
        {
            $role->revokePermissionTo($permission);
        }

        foreach($permissions as $vall)
        {
            $permission = Permission::where('id','=',$vall)->firstOrFail();
            $role->givePermissionTo($permission);
        }

        return back()->with('message','Role permission updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
