@extends('layouts.app')

@section('content')
<style>
img{
object-fit: cover;
width: 100% !important;
height: 500px !important;
}
iframe{
    object-fit: fill;
    display:block;
    width:100% !important;
    height: 500px !important;
}
</style>
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
            <a href='{{route('article')}}' class="btn btn-success btn-lg" style='width:100%'>Create Post</a>
            <div class="border rounded my-5">
                test2
            </div>
        </div>
    </div>
</div>
@endsection
