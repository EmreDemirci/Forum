@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 m-auto col-md-offset-2">
                <div class="card">
                    <div class="card-header">{{$thread->title}}</div>

                    <div class="card-body">
                            <div class="body">{{$thread->body}}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-8 m-auto col-md-offset-2">
                <div class="card">
                    <div class="card-header">Replies</div>

                    <div class="card-body">
                        @foreach($thread->replies as $reply)
                        <div class="body">{{$reply->body}}</div>
                            <hr>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection