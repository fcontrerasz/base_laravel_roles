<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Gate;
use App\Exports\PlantillaExport;
use App\MenuRole;
use Auth;

class RolesController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin|superadmin');
    }

    public function index(Request $request)
    {	

	/*	if (! Gate::allows('users_manage')) {
            return abort(401);
        }*/
        $roles = Role::all();
        return view('registros.roles.listar', compact('roles'));
    }

    public function massDestroy(Request $request)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Role::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

    public function create()
    {
        /*if (! Gate::allows('users_manage')) {
            return abort(401);
        }*/
        $permissions = Permission::get()->pluck('name', 'name');
        return view('registros.roles.nuevo', compact('permissions'));
    }

     public function store(Request $request)
    {
        /*if (! Gate::allows('users_manage')) {
            return abort(401);
        }*/
        $request->validate([
            'name' => 'required|max:50',
            'permission' => 'required|exists:permissions,name',
        ]);
        $role = Role::create($request->except('permission'));
        $permissions = $request->input('permission') ? $request->input('permission') : [];
        $role->givePermissionTo($permissions);

        return redirect()->route('roles.listar')->with(['success' => 'Role Creado']);
    }

    public function edit($id)
    {
      /*  if (! Gate::allows('users_manage')) {
            return abort(401);
        }*/
        $permissions = Permission::get()->pluck('name', 'name');
        $role = Role::findOrFail($id);

        return view('registros.roles.edita', compact('role', 'permissions'));
    }

    public function update(Request $request, $id)
    {
      /*  if (! Gate::allows('users_manage')) {
            return abort(401);
        }*/
        $request->validate([
            'name' => 'required|max:50',
            'permission' => 'required|exists:permissions,name',
        ]);
        $role = Role::findOrFail($id);
        $role->update($request->except('permission'));
        $permissions = $request->input('permission') ? $request->input('permission') : [];
        $role->syncPermissions($permissions);

        return redirect()->route('roles.listar')->with(['success' => 'Rol Actualizado']);
    }


    public function exportar()
    {
        return Excel::download(new PlantillaExport(), 'plantilla_123123_.xlsx');
    }


}
