@extends('layouts.app')
{{-- @extends('layouts.layout') --}}

@section('content')

    <style>
        html, body{
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
        }

        .video-container{
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }

        .background-video{
            position:absolute;
            top: 50%;
            left: 50%;
            width: 100vw;
            height: 100vh;
            object-fit: cover;
            transform: translate(-50%, -50%);
        }

        #background-video.full-fit {
        object-fit: contain;
        background: black;
}
    </style>

<div class="container animated-background">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- <div class="card"> --}}
                {{-- <div class="card-header">{{ __('Dashboard') }}</div> --}}

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="video-container">
                        <video autoplay muted loop id="background-video">
                        <source src="{{ asset('videos/tutorial.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                        </video>
                    </div>
                    {{-- {{ __('You are logged in!') }} --}}
                {{-- </div> --}}
            {{-- </div> --}}
        </div>
    </div>
</div>
@endsection
