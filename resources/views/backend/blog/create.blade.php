@extends('layouts.backend.main')
@section('title','MyBlog|Add New Post')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blog
        <small>Add New Post</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{route('backend.blog.index')}}">Blog</a></li>
        <li class="active">Add New</li>
       </ol>
    </section>
<section class="content container-fluid">
        <div class="row">
            {!!Form::model($post,[
                'method'=>'POST',
                'route'=>'backend.blog.store',
                'files'=>TRUE,
                'id'=>'post-form'
            ])!!}
         
            @include('backend.blog.form')
       
          {!!Form::close()!!}
        </div>
</section>
@endsection

@include('backend.blog.script')