@extends('layouts.backend.main')
@section('title','MyBlog|Add New Category')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blog
        <small>Add New Category</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{route('backend.categories.index')}}">Category</a></li>
        <li class="active">Add New</li>
       </ol>
    </section>
<section class="content container-fluid">
        <div class="row">
            {!!Form::model($category,[
                'method'=>'POST',
                'route'=>'backend.categories.store',
                'files'=>TRUE,
                'id'=>'category-form'
            ])!!}
         
            @include('backend.categories.form')
       
          {!!Form::close()!!}
        </div>
</section>
@endsection

@include('backend.categories.script')