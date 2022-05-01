@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="" class="rounded-circle">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{ $user->username }}</h1>
                <a href="#">Add Post</a>
            </div>
            <div class="d-flex">
                <div class="pr-5" style="margin-right: 10px;"><strong>153</strong> posts</div>
                <div class="pr-5" style="margin-right: 10px;"><strong>123k</strong> followers</div>
                <div class="pr-5" style="margin-right: 10px;"><strong>212</strong> following</div>
            </div>
            <div style="padding-top: 5px; font-weight:bold;">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description }}</div>
            <div><a href="#">{{ $user->profile->url }}</a></div>
        </div>
    </div>
    <div class="row pt-8">
        <div class="col-4">
            <img src="https://images.pexels.com/photos/11710660/pexels-photo-11710660.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" class="w-100">
        </div>
        <div class="col-4">
            <img src="https://images.pexels.com/photos/5029929/pexels-photo-5029929.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" class="w-100">
        </div>
        <div class="col-4">
            <img src="https://images.pexels.com/photos/11689684/pexels-photo-11689684.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" class="w-100">
        </div>
    </div>
</div>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
@endsection