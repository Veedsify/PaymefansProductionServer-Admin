<div class="card h-100 p-0 radius-12">

    <div
        class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
        <div class="d-flex align-items-center flex-wrap gap-3">
            <span class="text-md fw-medium text-secondary-light mb-0">Show</span>
            <select class="form-select form-select-sm w-auto ps-12 py-6 radius-12 h-40-px">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
                <option>9</option>
                <option>10</option>
            </select>
            <form class="navbar-search">
                <input type="text" class="bg-base h-40-px w-auto" name="search" placeholder="Search"
                    wire:model.live.debounce.500ms="query">
                <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
            </form>
        </div>
        <a href="{{ route('addUser') }}"
            class="btn btn-primary text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center gap-2">
            <iconify-icon icon="ic:baseline-plus" class="icon text-xl line-height-1"></iconify-icon>
            Add New User
        </a>
    </div>
    <div class="card-body p-24">
        @if($users->isEmpty())
            <div class="text-center">
                <h3 class="text-xl text-secondary-light">No users found</h3>
            </div>
        @endif
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row gy-4">
            @foreach ($users as $user)
                <div class="col-xxl-3 col-md-6 user-grid-card   ">
                    <div class="position-relative border radius-16 overflow-hidden">
                        <img src="{{ asset($user->profile_banner) }}" alt="" class="w-100 object-fit-cover">

                        <div class="dropdown position-absolute top-0 end-0 me-16 mt-16">
                            <button type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                class="bg-white-gradient-light w-32-px h-32-px radius-8 border border-light-white d-flex justify-content-center align-items-center text-white">
                                <iconify-icon icon="entypo:dots-three-vertical" class="icon "></iconify-icon>
                            </button>
                            <ul class="dropdown-menu p-12 border bg-base shadow">
                                <li>
                                    <a class="dropdown-item px-16 py-8 rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-10"
                                        href="#">
                                        Edit
                                    </a>
                                </li>
                                <li>
                                    <button type="button" onclick="deleteThisUser({{ $user->id }}, '{{$user->name}}')"
                                        class="delete-btn dropdown-item px-16 py-8 rounded text-secondary-light bg-hover-danger-100 text-hover-danger-600 d-flex align-items-center gap-10">
                                        Delete
                                    </button>
                                </li>
                            </ul>
                        </div>

                        <div class="ps-16 pb-16 pe-16 text-center mt--50">
                            <img src="{{ asset($user->profile_image) }}" alt="" width="100"
                                class="border br-white border-width-2-px w-100-px h-100-px rounded-circle object-fit-cover">
                            <h6 class="text-lg mb-0 mt-4">
                                {{ $user->name }}
                            </h6>
                            <span class="text-secondary-light mb-16">
                                {{ $user->email }}
                            </span>

                            <div
                                class="center-border position-relative bg-danger-gradient-light radius-8 p-12 d-flex align-items-center gap-4">
                                <div class="text-center w-50">
                                    <h6 class="text-md mb-0">Model</h6>
                                    <span class="text-secondary-light text-sm mb-0">
                                        {{ $user->is_model ? 'Model' : 'Not Model' }}
                                    </span>
                                </div>
                                <div class="text-center w-50">
                                    <h6 class="text-md mb-0">Followers</h6>
                                    <span class="text-secondary-light text-sm mb-0">
                                        {{ $user->follows->count() }}
                                    </span>
                                </div>
                            </div>
                            <a href="{{ route('viewProfile', [$user->username]) }}"
                                class="bg-primary-50 text-primary-600 bg-hover-primary-600 hover-text-white p-10 text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center justify-content-center mt-16 fw-medium gap-2 w-100">
                                View Profile
                                <iconify-icon icon="solar:alt-arrow-right-linear"
                                    class="icon text-xl line-height-1"></iconify-icon>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div>
            {{ $users->links('vendor.livewire.bootstrap') }}
        </div>
    </div>
</div>
