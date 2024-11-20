<?php

namespace App\Livewire\Transaction;

use App\Models\UserPointsPurchase;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class TransactionTable extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $query = '';
    public $sort = 'all';
    public $perPage = 10;

    public function render()
    {
        $query = UserPointsPurchase::query();

        // Apply success filter based on sort
        if ($this->sort === 'paid') {
            $query->where('success', 1);
        } elseif ($this->sort === 'pending') {
            $query->where('success', 0);
        }

        // Apply search query if present
        if ($this->query !== '') {
            $query->where(function($q) {
                $q->where('user_id', 'like', '%' . $this->query . '%')
                    ->orWhere('purchase_id', 'like', '%' . $this->query . '%')
                    ->orWhere('points', 'like', '%' . $this->query . '%')
                    ->orWhere('amount', 'like', '%' . $this->query . '%')
                    ->orWhere('userPointsId', 'like', '%' . $this->query . '%')
                    ->orWhereHas('user_point', function ($query) {
                        $query->where('points', 'like', '%' . $this->query . '%');
                    })
                    ->orWhereHas('user', function ($query) {
                        $query->where('name', 'like', '%' . $this->query . '%');
                    });
            });
        }

        $transactions = $query->latest()->paginate($this->perPage);

        return view('livewire.transaction.transaction-table', [
            'transactions' => $transactions,
        ]);
    }
}
