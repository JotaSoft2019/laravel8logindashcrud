<?php

namespace App\Http\Livewire\Admin;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;


class UsersIndex extends Component
{

    use WithPagination;

    public $search;

    protected $paginationTheme = "bootstrap";

    public function render()
    {
        $users = $this->searchUsers();
    
        return view('livewire.admin.users-index', ['users' => $users]);
    }
    
    public function searchUsers()
    {
        $users = User::where(function($query) {
            $query->where('name', 'LIKE', '%' . $this->search . '%')
                ->orWhere('email', 'LIKE', '%' . $this->search . '%');
        })->paginate();
    
        return $users;
    }
}