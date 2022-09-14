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
        <div class="card-body" style="padding: 5px 5px;">
           {!! $article->content !!}
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-2">Upvote Buttons</div>
                <div class="col-10"><span class="float-end">Created by: <a href='{{route('profile',['id' => $article->id_user])}}'><strong>{{$article->user_name}}</strong></a>, {{$article->time_till_creation}} ago</span></div>
                {{-- <div class="col-1"><span class="float-end"></span></div> --}}
            </div>
        </div>
    </div>
</div>
