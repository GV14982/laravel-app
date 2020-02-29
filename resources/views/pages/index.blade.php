@extends('layouts.app')

@section('content')
    <h1>
        All Pages    
    </h1>
    @if (count($pages) > 0)
        @foreach ($pages as $page)
            @can('view-any', $page)
            <div class="mb-3 card text-white bg-dark">
                <div class="card-body">
                    <h4 class="card-title"><a href="/pages/{{$page->id}}">{{$page->title}}</a></h4>
                    <p class="card-text text-truncate">{{$page->body}}</p>
                    <small class="text-white-50">Published by {{$page->user->name}} on {{$page->created_at}}</small>
                </div>
            </div>
            @endcan
        @endforeach
        <div>
            {{$pages->links()}}
        </div>
    @else
        <p>No Posts Found</p>
    @endif    
@endsection