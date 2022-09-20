@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center gx-5">
        <div class="col-8">
            <div style="max-height: inherit; max-width:inherit">
            @foreach ($articles as $article)
                @include('components.article')
            @endforeach
            </div>
        </div>
        <div class="col-4">
            <div class="sticky-top" style="top: 80px;">
                <a href='{{route('article')}}' class="btn btn-success btn-lg" style='width:100%'>Create Post</a>
                <div class="border rounded my-5">
                    test2
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
