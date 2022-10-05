@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col text-center">
            <h1>Adding new post!</h1>
        </div>
    </div>

    <form action="/article/save" method="POST">
        @csrf
        @isset($article)
        <input type="hidden" name="id" value="{{$article->id}}">
        @endisset
        <div class="row">
            <div class="col text-center">
                <input type="text" name='title' class="form-control my-2" id="article_title" placeholder="Enter interesting title here!" value="@isset($article){{$article->title}}@endisset" required>
            </div>
        </div>

        <textarea id="default-editor" name='content' style='height: 60vh;'>
            @isset($article)
            {{$article->content}}
            @endisset
        </textarea>
        <div class="row">
            <div class="col text-end">
                <button id='submit-article' class='btn btn-primary mt-2'>Send</button>
            </div>
        </div>
    </form>

</div>
@endsection


@section('scripts')
<script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
<script type="module">
  tinymce.init({
    selector: 'textarea#default-editor',
    plugins: 'table lists save media',
    toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright |  bullist numlist | table | media',
    menubar: false,
    statusbar: false,
  });
</script>
@endsection
