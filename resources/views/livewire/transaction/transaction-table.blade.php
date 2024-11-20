<div class="card">
    <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-3">
        <div class="d-flex flex-wrap align-items-center gap-3">
            <div class="d-flex align-items-center gap-2">
                <span>Show</span>
                <select wire:model.live="perPage" class="form-select form-select-sm w-auto">
                    <option value="10">10</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
            <div class="icon-field">
                <input type="text" name="#0" class="form-control form-control-sm w-auto" placeholder="Search"
                    wire:model.live.debounce.500ms="query">
                <span class="icon">
                    <iconify-icon icon="ion:search-outline"></iconify-icon>
                </span>
            </div>
        </div>
        <div class="d-flex flex-wrap align-items-center gap-3">
            <select wire:model.live="sort" class="form-select form-select-sm w-auto">
                <option value="all">All</option>
                <option value="paid">Paid</option>
                <option value="pending">Pending</option>
            </select>
        </div>
    </div>
    <div class="card-body"
        style="overflow-x: auto; padding: 0; border-top: 1px solid #e5e7eb; border-bottom: 1px solid #e5e7eb;">
        <table class="table bordered-table mb-0">
            <thead>
                <tr>
                    <th scope="col">
                        <div class="form-check style-check d-flex align-items-center">
                            <input class="form-check-input" type="checkbox" value="" id="checkAll">
                            <label class="form-check-label" for="checkAll">
                                S.L
                            </label>
                        </div>
                    </th>
                    <th scope="col">PointPurchase Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Issued Date</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    @if ($transactions->count() == 0)
                        <tr>
                            <td>
                                <div class="form-check style-check d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" value="" id="check110">
                                    <label class="form-check-label" for="check110">
                                        {{ $loop->index + 1 }}
                                    </label>
                                </div>
                            </td>
                            <td><a href="javascript:void(0)" class="text-primary-600">
                                    {{ Str::limit($transaction->purchase_id, 15) }}
                                </a></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset($transaction->user->profile_image) }}" alt=""
                                        width="40" class="flex-shrink-0 me-12 radius-8">
                                    <h6 class="text-md mb-0 fw-medium flex-grow-1">
                                        {{ $transaction->user->name }}
                                    </h6>
                                </div>
                            </td>
                            <td>
                                {{ $transaction->created_at->format('d M Y') }}
                            </td>
                            <td>
                                <span
                                    class="text-primary-600 fw-medium">{{ number_format($transaction->amount) }}</span>
                            </td>
                            <td> <span
                                    class="
                                {{ $transaction->success ? 'bg-success-focus text-success-main ' : 'bg-warning-focus text-warning-main ' }}
                                px-24 py-4 rounded-pill fw-medium text-sm">
                                    {{ $transaction->success ? 'Paid' : 'Pending' }}
                                </span>
                            </td>
                            <td>
                                <a href="javascript:void(0)"
                                    class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                                </a>
                                <a href="javascript:void(0)"
                                    class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                </a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>

        <div class="">
            {{ $transactions->links('vendor.livewire.bootstrap') }}
        </div>
    </div>
</div>
