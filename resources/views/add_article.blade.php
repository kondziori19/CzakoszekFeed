@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col text-center">
            <h1>Dodaj nowy kontencik byczku!</h1>
        </div> 
    </div>

    <form action="">
        <div class="row">
            <div class="col text-center">
                <input type="text" class="form-control my-2" id="article_title" placeholder="Dawaj tu kozacki tytuł">
            </div> 
        </div>
    
        <textarea id="default-editor">
    
        </textarea>
       
    </form>
    <button id='submit-article'>SUBMIT</button>
</div>
@endsection


@section('scripts')
<script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
<script type="module">
  tinymce.init({
    selector: 'textarea#default-editor',
    plugins: 'table lists save media',
    toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright |  bullist numlist | table',
    menubar: 'insert',
    statusbar: false,
  });

$('#submit-article').on('click', function(){
console.debug(tinymce.activeEditor.getContent());
});

</script>
@endsection