@extends('./master-layout')
@section('title')Create New Post @endsection
@section('content')

<div class="row">
    <div class="col-xl-6 col-lg-6 col-12 m-auto">
        <a href="{{ route('post.index') }}" class="btn btn-danger btn-sm float-right"> Back to Posts </a>
    </div>
</div>

<form action="{{ route('post.store') }}" method="POST">
@csrf
<div class="row mt-2">
    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-2 col-12 m-auto">
        <div class="card shadow">

            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    {{ Session::get('success') }}
                </div>

                @elseif (Session::has('failed'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    {{ Session::get('failed') }}
                </div>
            @endif

            <div class="card-header">
                <h5 class="card-title"> Laravel CRUD Application </h5>
            </div>

            <div class="card-body">
                <div class="form-group">
                    <label for="title"> Post Title <span class="text-danger">*</span> </label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title" value="{{ old('title') }}" />
                    {!! $errors->first('title', '<small class="text-danger"> :message </small>') !!}
                </div>

                <div class="form-group">
                    <label for="category"> Category <span class="text-danger">*</span> </label>
                    <input type="text" name="category" id="category" class="form-control" placeholder="Enter Category" value="{{ old('category') }}" />
                    {!! $errors->first('category', '<small class="text-danger"> :message </small>') !!}
                </div>

                <div class="form-group">
                    <label for="description"> Description <span class="text-danger">*</span> </label>
                    <textarea name="description" id="description" class="form-control" placeholder="Enter Description"> {{ old('description') }} </textarea>
                    {!! $errors->first('description', '<small class="text-danger"> :message </small>') !!}
                </div>
            </div>

            <div class="cart-footer">
                <button class="btn btn-success" type="submit"> Publish Post </button>
            </div>
        </div>
    </div>
</div>
</form>
@endsection
