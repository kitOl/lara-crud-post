@extends('./master-layout')
@section('title')Show Post @endsection
@section('content')

<div class="row">
    <div class="col-xl-6 col-lg-6 col-12 m-auto">
        <a href="{{ route('post.index') }}" class="btn btn-danger btn-sm float-right"> Back to Posts </a>
    </div>
</div>

<div class="row mt-2">
    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-2 col-12 m-auto">
        <div class="card shadow">
            <div class="card-header">
                <h5 class="card-title"> Laravel CRUD Application </h5>
            </div>

            <div class="card-body">
                <div class="form-group">
                    <label for="title"> Post Title <span class="text-danger">*</span> </label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title" readonly value="@if (!empty($post)){{ $post->title }}@else {{ old('title') }} @endif" />
                </div>

                <div class="form-group">
                    <label for="category"> Category <span class="text-danger">*</span> </label>
                    <input type="text" name="category" id="category" class="form-control" placeholder="Enter Category" readonly value="@if (!empty($post)) {{ $post->category }} @else {{ old('category') }} @endif" />
                </div>

                <div class="form-group">
                    <label for="description"> Description <span class="text-danger">*</span> </label>
                    <textarea name="description" id="description" class="form-control" readonly placeholder="Enter Description"> @if (!empty($post)) {{ $post->description }} @else {{ old('description') }} @endif </textarea>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
