<div class="pb-4">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6"><h3>{{$article->title}}</h3></div>
                <div class='col-6'>
                    <div class="float-end">
                    <a  href='{{route('article_delete', ['id' => $article->id])}}' class="btn btn-danger">Delete</a>
                    <a  href='{{route('article_edit', ['id' => $article->id])}}' class="btn btn-primary">Edit</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
           {!! $article->content !!}
        </div>
    </div>
</div>
