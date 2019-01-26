@extends('layouts.backend.main')
@section('title','MyBlog|Index')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blog
        <small>Display All BLog Posts</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{route('backend.blog.index')}}">Blog</a></li>
        <li class="active">All Posts</li>
       </ol>
    </section>
<section class="content container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="box">
                <div class="box-header clearfix">
                    <div class="pull-left">
                        <a href="{{route('backend.blog.create')}}" class="btn btn-success"><i class="fa fa-plus"></i>  Add New</a>
                    </div>
                    <div class="pull-right" style="padding:7px 0;">
                    <?php $links=[] ?>
                    @foreach($statusList as $key => $value)
                        @if($value)
                            <?php $selected=Request::get('status')==$key?'selected-status':'' ?>
                            <?php $links[]= "<a class=\"{$selected}\" href=\"?status={$key}\">".ucwords($key)."({$value})</a>" ?>
                        @endif
                    @endforeach
                       {!! implode('|',$links) !!}
                    </div>
                </div>
               <div class="box-body">
                @include('backend.blog.message')
                @if(! $posts->count())
                    <div class="alert alert-danger">
                        <strong>Record Not Found</strong>
                    </div>
                @else
                    @if($onlyTrashed)
                        @include('backend.blog.table-trash')
                    @else
                        @include('backend.blog.table')
                    @endif
                @endif
              </div><!--box body -->
                <div class="box-footer clearfix">
                    <div class="pull-left">
                        {{$posts->appends(Request::query())->render()}}
                    </div>
                    <div class="pull-right">
                     <small>
                            {{$postCount}} {{str_plural('Posts',$postCount)}}
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
