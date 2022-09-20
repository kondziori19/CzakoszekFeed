@extends('layouts.app')
@section('content')
<div class="containter">
    <div class="row justify-content-center gx-5">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12"><h1>{{$user->name}}'s posts:</h1></div>
                    </div>
                </div>
                <div class="card-body" style="padding: 5px 5px;">
                    @foreach ($articles as $article)
                    @include('components.article')
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


@endsection