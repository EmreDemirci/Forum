@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 m-auto col-md-offset-2">
                <div class="card">
                    <div class="card-header">Create A Threads</div>

                    <div class="card-body">
                        <form action="/threads" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="title" class="form-control" placeholder="Title">
                            </div>
                            <div class="form-group">
                                <textarea name="body" id="body" class="form-control" placeholder="Body" rows="5"></textarea>
                            </div>
                            <input type="submit" class="btn-primary btn" value="Post">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection