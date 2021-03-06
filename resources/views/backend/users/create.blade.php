@extends('layouts.backend.main')
@section('title','MyBlog|Add New User')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blog
        <small>Add New User</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{route('backend.users.index')}}">User</a></li>
        <li class="active">Add New</li>
       </ol>
    </section>
<section class="content container-fluid">
        <div class="row">
            {!!Form::model($user,[
                'method'=>'POST',
                'route'=>'backend.users.store',
                'files'=>TRUE,
                'id'=>'user-form'
            ])!!}
         
            @include('backend.users.form')
       
          {!!Form::close()!!}
        </div>
</section>
@endsection

