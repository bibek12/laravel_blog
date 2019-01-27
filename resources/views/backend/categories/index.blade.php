@extends('layouts.backend.main')
@section('title','MyBlog|Categories')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        
        <small>Display All Categories Posts</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{route('backend.categories.index')}}">Category</a></li>
        <li class="active">All Categories</li>
       </ol>
    </section>
<section class="content container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="box">
                <div class="box-header clearfix">
                    <div class="pull-left">
                        <a href="{{route('backend.categories.create')}}" class="btn btn-success"><i class="fa fa-plus"></i>  Add New</a>
                    </div>
                    <div class="pull-right">
                    
                    </div>
                </div>
               <div class="box-body">
                @include('backend.partials.message')
                @if(! $categories->count())
                    <div class="alert alert-danger">
                        <strong>Record Not Found</strong>
                    </div>
                @else
                     @include('backend.categories.table')
                @endif
              </div><!--box body -->
                <div class="box-footer clearfix">
                    <div class="pull-left">
                        {{$categories->appends(Request::query())->render()}}
                    </div>
                    <div class="pull-right">
                     <small>
                            {{$categoryCount}} {{str_plural('Posts',$categoryCount)}}
                        </small>
                    </div>
                </div>
                
            </div>
          </div>
        </div>
</section>
@endsection

@section('script')
    <script type="text/javascript">
        $('ul.pagination').addClass('no-margin pagination-sm');
    </script>
@endsection
