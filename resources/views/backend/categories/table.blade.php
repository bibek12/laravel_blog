<table class="table table-bordered">
                     <thead>
                         <tr>
                             <td>Title</td>
                             <td width='120'>Post Count</td>
                            <td width='80'>Action</td>
                         </tr>
                     </thead>
                     <tbody>
                        @foreach($categories as $category)
                         <tr>
                             <td>{{$category->title}}</td>
                             <td>{{$category->posts->count()}}</td>
                             </td>
                             <td>
                             {!!Form::open(['method'=>'delete','route'=>['backend.categories.destroy',$category->id]])!!}
                                <a href="{{route('backend.categories.edit',$category->id)}}" class="btn btn-xs btn-default">
                                    <i class="fa fa-edit"></i>  
                                </a>
                                @if($category->id==config('cms.default_category_id'))
                                <button onclick="return false" type="submit" class="btn btn-xs btn-danger disabled">
                                    <i clas="fa fa-times"></i>  
                                </button>
                                @else
                                    <button onclick="return confirm('Are You Sure?')" type="submit" class="btn btn-xs btn-danger">
                                        <i class="fa fa-times"></i>  
                                    </button>
                                @endif
                            {!!Form::close()!!}
                             </td>
                         </tr>
                        @endforeach
                     </tbody>
                 </table>