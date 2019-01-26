<table class="table table-bordered">
        <thead>
            <tr>
                <td>Title</td>
                <td width='120'>Author</td>
                <td width='140'>Category</td>
                <td >Date</td>
                <td width='80'>Action</td>
            </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{$post->title}}</td>
                <td>{{$post->user->name}}</td>
                <td>{{$post->category->title}}</td>
                <td>
                <abbr title="{{$post->dateFormatted(true)}}">{{$post->dateFormatted()}}</abbr>
                
                </td>
                <td>
                {!!Form::open(['style'=>'display:inline-block','method'=>'PUT','route'=>['backend.blog.restore',$post->id]])!!}
                    <button title="Restore" class="btn btn-xs btn-default">
                        <i class="fa fa-refresh"></i>  
                    </button>
                {!!Form::close()!!}
                {!!Form::open(['style'=>'display:inline-block','method'=>'delete','route'=>['backend.blog.force-destroy',$post->id]])!!}
                    <button title="Perment Delete" type="submit" onclick="return confirm('You are about to delete a post permanently.Are You Sure?')" class="btn btn-xs btn-danger">
                        <i class="fa fa-times"></i>  
                    </button>
                {!!Form::close()!!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>