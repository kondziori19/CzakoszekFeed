@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center gx-5">
        <div class="col-8">     
            @foreach ($articles as $article)
                @include('components.article')
            @endforeach 
        </div>
        <div class="col-4">
            <div class="border rounded"> 
                test2
            </div>
        </div>
    </div>
</div>
@endsection
