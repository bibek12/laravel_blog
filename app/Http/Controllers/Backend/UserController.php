<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users=User::orderBY('name')->paginate($this->limit);
        $userCount=User::count();
        return view("backend.users.index",compact('users','userCount'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user=new User();
        return view('backend.users.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\UserStoreRequest $request)
    {
        //
        $user=User::create($request->all());
        return redirect('/backend/users')->with('message','New user is created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user=User::findOrFail($id);
        return view('backend.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\UserUpdateRequest $request, $id)
    {
        //
        User::findOrFail($id)->update($request->all());
        return redirect('/backend/users')->with('message','User was  updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requests\UserDestoryRequest $request,$id)
    {
        //
        $user=User::findOrFail($id);
        $deleteOption=$request->delete_option;
        $selectedUser=$request->selected_user;
        if($deleteOption=='delete'){
            //delete user post
            $user->posts()->withTrashed()->forceDelete();
        }elseif($deleteOption=='attribute'){
            $user->posts()->update(['user_id'=>$selectedUser]);
        }
        $user->delete();
        return redirect('/backend/users')->with('message','user was  deleted successfully');
    }

    public function confirm(Requests\UserDestoryRequest $request,$id)
    {
        //
        $user=User::findOrFail($id);
        $users=User::where('id', '!=', $user->id)->pluck('name','id');
       return view('backend.users.confirm',compact('user','users'));
    }
}
