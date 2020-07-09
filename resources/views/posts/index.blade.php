@extends('layouts.app')

@section('content')
<div class="container">    
    @foreach($posts as $post)
    <div class="row bg-white px-5 pt-5">
        <div class="col-12">
            <div class="offset-3 pl-4 mb-3">
                <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle d-inline-block ml-1 mr-3" style="height: 30px; width:30px;">
                
                <span class="font-weight-bold">
                    <a href="/profile/{{ $post->user->id }}">
                        <span class="text-dark d-inline-block">{{ $post->user->username }}</span>
                    </a>
                </span>
            </div>

            <a href="/profile/{{ $post->user->id  }}">
                <img src="/storage/{{ $post->image }}" class="d-block m-auto" style="height: 450px;"> 
            </a>       
        </div>
    </div>

    <div class="row bg-white">         
        <div class="col-12 offset-3">
            <p class="pt-3 pl-5">
                <span>{{ $post->caption }}</span>
            </p>       
        </div>
    </div>        
    @endforeach
</div>
@endsection
