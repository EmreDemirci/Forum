@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 m-auto col-md-offset-2">
                <div class="card">
                    <div class="card-header">
                        {{$thread->title}}
                        <a href="#">{{$thread->creator->name}}</a> Posted:
                    </div>

                    <div class="card-body">
                            <div class="body">{{$thread->body}}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-8 m-auto col-md-offset-2">
                @foreach($thread->replies as $reply)
                    @include('threads.reply')
                @endforeach
            </div>
        </div>
        @if(auth()->check())
        <div class="row mt-5">
            <div class="col-md-8 m-auto col-md-offset-2">
                <form method="POST" action="{{$thread->path()}}/replies">
                    @csrf
                    <div class="form-group">
                        <textarea name="body" id="body" class="form-control" rows="3" placeholder="Have something to say?"></textarea>
                    </div>

                    <input type="submit" class="btn btn-primary" value="Post">
                </form>
            </div>
        </div>
            @else
        <p class="text-center">Please <a href="{{route('login')}}">sign in</a>to participate in this thread.</p>
        @endif
    </div>
    @endsection