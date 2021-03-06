@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="{{ $user->profile->profileImage() }}" class="rounded-circle w-100">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex">
                    <div class="h4">{{ $user->username }}</div>

                    <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                </div>

                @can ('update', $user->profile)
                <a href="{{ route('post.create') }}">Add Post</a>
                @endcan
            </div>

            @can ('update', $user->profile)
            <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
            @endcan
            <div class="d-flex">
                <div class="pr-5" style="margin-right: 10px;"><strong>{{ $postCount }}</strong> posts</div>
                <div class="pr-5" style="margin-right: 10px;"><strong>{{ $followersCount() }}</strong> followers</div>
                <div class="pr-5" style="margin-right: 10px;"><strong>{{ $followingCount }}</strong> following</div>
            </div>
            <div style="padding-top: 5px; font-weight:bold;">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description }}</div>
            <div><a href="#">{{ $user->profile->url }}</a></div>
        </div>
    </div>
    <div class="row pt-8">
        @foreach($user->posts as $post)
        <div class="col-4 mt-4">
            <a href="/p/{{ $post->id }}">
                <img src="/storage/{{ $post->image }}" class="w-100">
            </a>
        </div>
        @endforeach

    </div>
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
    @endsection
</div>
