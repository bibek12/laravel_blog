@extends('layouts.backend.main')
@section('title','MyBlog|Dashboard')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
       </ol>
 </section>
<section class="content container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="box-body">
                  <h3>Welcome To My Blog</h3>
                  <p class="lead text-muted">Hello {{Auth::user()->name}}, Welcome To My Blog</p>
                  <h4>Get Strated</h4>
                  <p><a href="{{route('blog.create')}}" class="btn btn-primary">Write Your First Blog Post</a></p>
              </div>
            </div>
          </div>
        </div>
</section>
@endsection
