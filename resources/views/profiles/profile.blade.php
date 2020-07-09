@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5 text-center">
            <img src="{{ $user->profile->profileImage() }}" class="rounded-circle" style="height: 85px; width:85px;">
            <div class="pt-3">
                @can('update', $user->profile)
                    <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
                @endcan
            </div>
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex align-items-center">               
                <div class="h4 mb-0 mr-4">{{ $user->username }}</div> <!--Parse data from profile controller-->
               
                <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>             
            </div>          

            <div class="d-flex pt-3">
                <div class="pr-5"><strong>{{ $user->posts->count() }}</strong> posts</div>
                <div class="pr-5"><strong>{{ $user->profile->followers->count() }}</strong> followers</div>
                <div class="pr-5"><strong>{{ $user->following->count() }}</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div> <!--Fetch data forward and backward dynamically from create_profiles_table database-->
            <div>{{ $user->profile->description }}</div> <!--Fetch data forward and backward dynamically from create_profiles_table database-->
            <div class="pb-4"><a href="#">{{ $user->profile->url ?? 'N/A' }}</a></div> <!--Fetch data forward and backward dynamically from create_profiles_table database-->
        
            @can('update', $user->profile)
                <a href="/p/create" class="btn btn-primary btn-sm">Add New Post</a>
            @endcan
        </div>
    </div>

    <div class="row pt-5">
        @foreach($user->posts as $post)
             <div class="col-4 pb-4">
                <a href="/p/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}" class="w-100">
                </a>
            </div>
        @endforeach
    </div>  
</div>
@endsection
