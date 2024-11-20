@extends('layout.layout')

@php
    $title = 'Users';
    $subTitle = 'Users';
@endphp

@section('scripts')
    <script>
        // $(".delete-btn").on("click", function() {
        //     $(this).closest(".user-grid-card").addClass("d-none")
        // });
        // // Custom Js
        function deleteThisUser(id, name) {
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this user!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    swal("Poof! " + name + " has been deleted!", {
                        icon: "success",
                    });
                    // Delete the user
                    Livewire.dispatch("deleteUser", [id]);
                } else {
                    swal("Your user is safe!");
                }
            });
        }
    </script>
@endsection

@section('content')
    @livewire('user.user-grid')
@endsection
