@extends('layout.layout2')

@php
    $title = 'Chat';
    $subTitle = 'Chat';
@endphp

@section('content')
    <div class="chat-wrapper">
        <div class="chat-main card">
            <div class="chat-sidebar-single active">
                <div class="img">
                    <img src="{{ asset($user->profile_image) }}" alt="image" class="rounded-pill">
                </div>
                <div class="info">
                    <h6 class="text-md mb-0">
                        {{$user->name}}
                    </h6>
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
                        <button type="button" class="text-primary-light text-xl" data-bs-toggle="dropdown"
                            data-bs-display="static" aria-expanded="false">
                            <iconify-icon icon="tabler:dots-vertical"></iconify-icon>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-lg-end border">
                            <li>
                                <button
                                    class="dropdown-item rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-2"
                                    type="button">
                                    <iconify-icon icon="mdi:clear-circle-outline"></iconify-icon>
                                    Clear All
                                </button>
                            </li>
                            <li>
                                <button
                                    class="dropdown-item rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-2"
                                    type="button">
                                    <iconify-icon icon="ic:baseline-block"></iconify-icon>
                                    Block
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- chat-sidebar-single end -->
            <div class="chat-message-list">
                @foreach ($messages as $message)
                    @if ($message->sender_id == Auth::user()->user_id)
                        <div class="chat-single-message right">
                            <div class="chat-message-content">
                                <p class="mb-3">
                                    {!! $message->message !!}
                                </p>
                                <p class="chat-time mb-0">
                                    <span>
                                        {{ date('h:i a', strtotime($message->created_at)) }}
                                    </span>
                                </p>
                            </div>
                        </div><!-- chat-single-message end -->
                    @else
                        <div class="chat-single-message left">
                            <img src="{{ asset($message->user->profile_image) }}" alt="image"
                                class="avatar-lg object-fit-cover rounded-circle">
                            <div class="chat-message-content">
                                <p class="mb-3">
                                    {{ $message->message }}
                                </p>
                                <p class="chat-time mb-0">
                                    <span>
                                        {{ date('h:i a', strtotime($message->created_at)) }}
                                    </span>
                                </p>
                            </div>
                        </div><!-- chat-single-message end -->
                    @endif
                @endforeach
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
                    <button type="submit"
                        class="btn btn-sm btn-primary-600 radius-8 d-inline-flex align-items-center gap-1">
                        Send
                        <iconify-icon icon="f7:paperplane"></iconify-icon>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
