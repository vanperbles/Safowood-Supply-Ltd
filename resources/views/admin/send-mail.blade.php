@extends('admin.adminlayout')

@section('content')
<div class="page-header">
    <h3 class="page-title">Send Email to {{$data->name}}</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="">Mail</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                    Mail
            </li>
        </ol>
    </nav>
</div>
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Create Mail to Customer </h4>
            <form action="{{url('send_user_mail',$data->id)}}" method="post">
                @csrf
                <div class="form-group">
                    <label  class="col-sm-3 col-form-label">Email Greeting</label>
                    <input type="text" name="greeting" class="form-control" fdprocessedid="brllum">
                    @error('greeting')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>              
                               
                <div class="form-group">
                    <label class="col-sm-3 col-form-label">Email First line</label>
                    <input type="text" name="firstline" class="form-control" fdprocessedid="brllum" >
                    @error('firstline')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="col-sm-3 col-form-label">Email Body</label>
                    <input type="textarea" name="body" class="form-control" fdprocessedid="brllum">
                    @error('body')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                                </div>
                <div class="form-group">
                    <label class="col-sm-3 col-form-label">Email Button Name</label>
                    <input type="text" name="button" class="form-control" fdprocessedid="brllum">
                    @error('button')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="form-group">
                    <label class="col-sm-3 col-form-label">Email URL</label>
                    <input type="text" name="url" class="form-control" fdprocessedid="brllum">
                    @error('url')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                                </div>
                <div class="form-group">
                    <label class="col-sm-3 col-form-label">Email Last Line</label>
                    <input type="text" name="lastline" class="form-control" fdprocessedid="brllum">
                    @error('lastline')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>
           
                
                <button type="submit" class="btn btn-primary me-2" >Send Mail</button>
            </form>
        </div>
    </div>
</div>
</div>
         
@stop