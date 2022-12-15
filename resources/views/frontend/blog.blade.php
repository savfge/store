@extends('layouts.home')
@section('content')
<div class="breadcrumb-area bg-gray">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="{{route('blog')}}">Home</a>
                </li>
                <li class="active">Blog page</li>
            </ul>
        </div>
    </div>
</div>
<livewire:shop.blogshop>
@endsection