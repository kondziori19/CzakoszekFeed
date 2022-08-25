@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center gx-5">
        <div class="col-8">
            <div class="border rounded"> 
                @include('components.article')
                @include('components.article')
            </div>
        </div>
        <div class="col-4">
            <div class="border rounded"> 
                test2
            </div>
        </div>
    </div>
</div>
@endsection
