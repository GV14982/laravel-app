@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Your Pages</h5>
                        <a href="/pages/create" class='btn btn-dark'>Create New Page</a>
                        @if (count($pages) > 0)
                            @foreach ($pages as $page)
                                <div class="mt-2 mb-2 card text-white bg-dark">
                                    <div class="card-body">
                                        <h4 class="card-title"><a href="/pages/{{$page->id}}">{{$page->title}}</a></h4>
                                        <p class="card-text text-truncate">{{$page->body}}</p>
                                        <small class="text-white-50">Published by {{$page->user->name}} on {{$page->created_at}}</small>
                                        <a href="/pages/{{$page->id}}/edit" class="btn btn-light">Edit</a>
                                        {{Form::open(['action' => ['PageController@destroy', $page->id], 'method' => 'POST'])}}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger btn-lg'])}}
                                        {{Form::close()}}
                                    </div>
                                </div>
                            @endforeach
                            {{-- <div>
                                {{$pages->links()}}
                            </div> --}}
                        @else
                            <p>No Posts Found</p>
                        @endif
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
