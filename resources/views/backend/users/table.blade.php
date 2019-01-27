<table class="table table-bordered">
                     <thead>
                         <tr>
                             <td>Name</td>
                             <td width='120'>Email</td>
                             <td>Role</td>
                            <td width='80'>Action</td>
                         </tr>
                     </thead>
                     <tbody>
                     <?php $currentUser=Auth::user()->id?>
                        @foreach($users as $user)
                         <tr>
                             <td>{{$user->name}}</td>
                             <td>{{$user->email}}</td>
                             <td>{{$user->role}}</td>
                             </td>
                             <td>
                             <a href="{{route('backend.users.edit',$user->id)}}" class="btn btn-xs btn-default">
                                    <i class="fa fa-edit"></i>  
                                </a>
                                @if($user->id==config('cms.default_user_id')|| $user->id==$currentUser)
                                <button onclick="return false" type="submit" class="btn btn-xs btn-danger disabled">
                                    <i clas="fa fa-times"></i>  
                                </button>
                                @else
                                    <a href="{{route('backend.users.confirm',$user->id)}}" type="submit" class="btn btn-xs btn-danger">
                                        <i class="fa fa-times"></i>  
                                    </a>
                                @endif
                         
                             </td>
                         </tr>
                        @endforeach
                     </tbody>
                 </table>