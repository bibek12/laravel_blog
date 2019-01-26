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
                                {!! $post->publicationLabel() !!}
                             </td>
                             <td>
                             {!!Form::open(['method'=>'delete','route'=>['backend.blog.destroy',$post->id]])!!}
                                <a href="{{route('backend.blog.edit',$post->id)}}" class="btn btn-xs btn-default">
                                    <i class="fa fa-edit"></i>  
                                </a>
                                <button type="submit" class="btn btn-xs btn-danger">
                                    <i class="fa fa-times"></i>  
                                </button>
                            {!!Form::close()!!}
                             </td>
                         </tr>
                        @endforeach
                     </tbody>
                 </table>