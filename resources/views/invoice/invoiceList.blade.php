@extends('layout.layout2')

@php
$title = 'Transaction List';
$subTitle = 'Transaction List';
@endphp

@section('content')

    @livewire('transaction.transaction-table')

@endsection