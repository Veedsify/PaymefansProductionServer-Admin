<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class UserGrid extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $query = '';

    #[On('deleteUser')]
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        // session()->flash('success', 'User deleted successfully.');
    }

    public function render()
    {
        $query = strtolower($this->query);
        $users = User::where('admin', 0)
            ->when($this->query, function ($q) use ($query) {
                $q->where(function ($q) use ($query) {
                    $q->whereRaw('LOWER(name) LIKE ?', ['%' . $query . '%'])
                        ->orWhereRaw('LOWER(email) LIKE ?', ['%' . $query . '%'])
                        ->orWhereRaw('LOWER(phone) LIKE ?', ['%' . $query . '%'])
                        ->orWhereRaw('LOWER(username) LIKE ?', ['%' . $query . '%']);
                });
            })
            ->orderBy('name', 'asc')
            ->paginate(12);

        return view('livewire.user.user-grid', [
            'users' => $users,
        ]);
    }
}
