@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{ $post->image }}" class="w-100" alt="">
        </div>
        <div class="col-4">
            <div>
                <div class="d-flex align-items-center">
                    <div class="pr-3">
                        <img src="{{ $post->user->profile->profileImage() }}" style="max-width:40px;" class="rounded-circle w-100 pr-3">
                    </div>
                    <div>
                        <div> <a href="/profile/show/{{ $post->user->id }}" style="text-decoration: none; margin: 2px;"><span class="font-weight-bold ml-2" style="text-decoration: none; margin: 2px;"><span class="text-dark" style="text-decoration: none; margin: 2px;">{{ $post->user->username}}</span></span></a></div>
                    </div>
                    <a href="#" class="pl-3" style="text-decoration: none; margin: 2px;">Follow</a>
                </div>
                <hr>
                <p><a href="/profile/show/{{ $post->user->id }}" style="text-decoration: none; font:bold; margin: 2px;"><span class="font-weight-bold text"><span class="text-dark" style="text-decoration: none; margin: 2px;">{{ $post->user->username}}</span></span></a>{{$post->caption}}</p>
            </div>
        </div>
    </div>
</div>
@endsection