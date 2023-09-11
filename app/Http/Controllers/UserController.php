<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Livewire\WithPagination;

class UserController extends Controller
{

    use WithPagination;

    protected $paginationTheme = "bootstrap";

    
    public function index()
    {
        $users = User::paginate();

        return view('livewire.admin.users-index', ['users' => $users]);
    }

    public function render()
    {
        $users = User::where(function($query) {
            $query->where('name', 'LIKE', '%' . $this->search . '%')
                ->orWhere('email', 'LIKE', '%' . $this->search . '%');
        })->paginate();
    
        return view('livewire.admin.users-index', ['users' => $users]);
    }

    public function create()
    {
        
        
    }
    public function store(Request $request)
    {
   
    }

    public function show($id)
    {
         
    }

    public function download()
    {
   
    }

    
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuario eliminado exitosamente.');
    }

    public function update(Request $request, User $user)
{
    
    /*$request->validate([
        'roles' => 'array',
        'roles.*' => 'exists:roles,id',
    ]);

    
    $user->roles()->sync($request->input('roles'));

    
    return redirect()->route('users.index')->with('success', 'Roles actualizados correctamente');*/

    $user->roles()->sync($request->roles);

    return redirect()->route('users.index', $user)->with('info','Se asignó el rol correctamente');
}
    public function edit(User $user)
    {
        $users = User::find($user);

        $roles = Role::all();
        
        return view('users.edit', compact('user','roles'));
        
    }

}
