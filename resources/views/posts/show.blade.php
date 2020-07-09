@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row bg-white p-5">
        <div class="col-7">
            <img src="/storage/{{ $post->image }}" class="w-100" style="height: 450px;">        
        </div>

        <div class="col-5">
            <div>
                <div class="d-flex align-items-center">
                    <div>
                        <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle" style="height: 55px; width:55px;">
                    </div>
                    <div class="pl-3 font-weight-bold">
                        <a href="/profile/{{ $post->user->id }}">
                            <span class="text-dark pr-2">{{ $post->user->username }}</span>
                        </a> |

                        <a href="#" class="pl-2">Follow</a>
                    </div>
                </div>
                <hr>
                <p>
                    <span class="font-weight-bold mr-3">
                        <a href="/profile/{{ $post->user->id }}">
                            <span class="text-dark">{{ $post->user->username }}</span>
                        </a>
                    </span>
                    <span>{{ $post->caption }}</span>
                </p>       
            </div>
        </div>
    </div>
</div>
@endsection
