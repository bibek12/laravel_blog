@extends('layouts.backend.main')
@section('title','MyBlog|Users')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        
        <small>Display All Users</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{route('backend.users.index')}}">User</a></li>
        <li class="active">All Users</li>
       </ol>
    </section>
<section class="content container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="box">
                <div class="box-header clearfix">
                    <div class="pull-left">
                        <a href="{{route('backend.users.create')}}" class="btn btn-success"><i class="fa fa-plus"></i>  Add New</a>
                    </div>
                    <div class="pull-right">
                    
                    </div>
                </div>
               <div class="box-body">
                @include('backend.partials.message')
                @if(! $users->count())
                    <div class="alert alert-danger">
                        <strong>Record Not Found</strong>
                    </div>
                @else
                     @include('backend.users.table')
                @endif
              </div><!--box body -->
                <div class="box-footer clearfix">
                    <div class="pull-left">
                        {{$users->appends(Request::query())->render()}}
                    </div>
                    <div class="pull-right">
                     <small>
                            {{$userCount}} {{str_plural('Posts',$userCount)}}
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
