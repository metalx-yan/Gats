@extends('majors.main')

@section('title', 'Jurusan') 

@section('content')

<div class="container">
     <div class="main">
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="#">
                        <em class="fa fa-home"></em>
                    </a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </div><!--/.row-->

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Dashboard</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            You are logged in! <b>{{ Auth::user()->name }}</b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
  </div>
@endsection
