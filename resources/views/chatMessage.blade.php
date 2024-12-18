@extends('layout.layout2')

@php
$title = 'Chat';
$subTitle = 'Chat';
@endphp 
@section('content')

<div class="chat-wrapper">
    <div class="chat-sidebar card overflow-hidden">
        <div class="chat-sidebar-single active top-profile">
            <div class="img">
                <img src="{{ asset(auth()->user()->profile_image) }}" alt="image" style="border-radius: 100vmax;">
            </div>
            <div class="info">
                <h6 class="text-md mb-0">
                    {{ auth()->user()->name }}
                </h6>
                <p class="mb-0">Available</p>
            </div>
            <div class="action">
                <div class="btn-group">
                    <button type="button" class="text-secondary-light text-xl" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                        <iconify-icon icon="bi:three-dots"></iconify-icon>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-lg-end border">
                        <li>
                            <a href="{{ route('chatProfile') }}" class="dropdown-item rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-2">
                                <iconify-icon icon="fluent:person-32-regular"></iconify-icon>
                                Profile
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('chatProfile') }}" class="dropdown-item rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-2">
                                <iconify-icon icon="carbon:settings"></iconify-icon>
                                Settings
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div><!-- chat-sidebar-single end -->
        <div class="chat-search">
            <span class="icon">
                <iconify-icon icon="iconoir:search"></iconify-icon>
            </span>
            <input type="text" name="#0" autocomplete="off" placeholder="Search...">
        </div>
        <div class="chat-all-list" id="conversations_list">
        
        </div>
    </div>
    {{-- <div class="chat-main card">
        <div class="chat-sidebar-single active">
            <div class="img">
                <img src="{{ asset('assets/images/chat/11.png') }}" alt="image">
            </div>
            <div class="info">
                <h6 class="text-md mb-0">Kathryn Murphy</h6>
                <p class="mb-0">Available</p>
            </div>
            <div class="action d-inline-flex align-items-center gap-3">
                <button type="button" class="text-xl text-primary-light">
                    <iconify-icon icon="mi:call"></iconify-icon>
                </button>
                <button type="button" class="text-xl text-primary-light">
                    <iconify-icon icon="fluent:video-32-regular"></iconify-icon>
                </button>
                <div class="btn-group">
                    <button type="button" class="text-primary-light text-xl" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                        <iconify-icon icon="tabler:dots-vertical"></iconify-icon>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-lg-end border">
                        <li>
                            <button class="dropdown-item rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-2" type="button">
                                <iconify-icon icon="mdi:clear-circle-outline"></iconify-icon>
                                Clear All
                            </button>
                        </li>
                        <li>
                            <button class="dropdown-item rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-2" type="button">
                                <iconify-icon icon="ic:baseline-block"></iconify-icon>
                                Block
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div><!-- chat-sidebar-single end -->
        <div class="chat-message-list">
            <div class="chat-single-message left">
                <img src="{{ asset('assets/images/chat/11.png') }}" alt="image" class="avatar-lg object-fit-cover rounded-circle">
                <div class="chat-message-content">
                    <p class="mb-3">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.</p>
                    <p class="chat-time mb-0">
                        <span>6.30 pm</span>
                    </p>
                </div>
            </div><!-- chat-single-message end -->
            <div class="chat-single-message right">
                <div class="chat-message-content">
                    <p class="mb-3">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.</p>
                    <p class="chat-time mb-0">
                        <span>6.30 pm</span>
                    </p>
                </div>
            </div><!-- chat-single-message end -->
            <div class="chat-single-message left">
                <img src="{{ asset('assets/images/chat/11.png') }}" alt="image" class="avatar-lg object-fit-cover rounded-circle">
                <div class="chat-message-content">
                    <p class="mb-3">The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default.Contrary to popular belief, Lorem Ipsum is not simply random text is the model text for your company.</p>
                    <p class="chat-time mb-0">
                        <span>6.30 pm</span>
                    </p>
                </div>
            </div><!-- chat-single-message end -->
        </div>
        <form class="chat-message-box">
            <input type="text" name="chatMessage" placeholder="Write message">
            <div class="chat-message-box-action">
                <button type="button" class="text-xl">
                    <iconify-icon icon="ph:link"></iconify-icon>
                </button>
                <button type="button" class="text-xl">
                    <iconify-icon icon="solar:gallery-linear"></iconify-icon>
                </button>
                <button type="submit" class="btn btn-sm btn-primary-600 radius-8 d-inline-flex align-items-center gap-1">
                    Send
                    <iconify-icon icon="f7:paperplane"></iconify-icon>
                </button>
            </div>
        </form>
    </div> --}}
</div>

@endsection