@extends('./master-layout')
@section('title')Posts Listing | CRUD Application Laravel @endsection
@section('content')

<div class="row mb-2">
    <div class="col-xl-12 col-lg-12 col-2 m-auto">
        <a href="{{ route('post.create') }}" class="btn btn-primary btn-sm float-right"> Add New Post </a>
    </div>
</div>

<table class="table.table-striped">
    <thead>
        <tr>
            <th> ID </th>
            <th> Title </th>
            <th> Category </th>
            <th> Description </th>
            <th> Created on </th>
            <th> Status </th>
            <th> Action </th>
        </tr>
    </thead>
    <tbody>
        @if (!empty($post))
            @foreach ($posts as $post)
                <tr>
                    <td> {{ $post->id }} </td>
                    <td> {{ $post->title }} </td>
                    <td> {{ $post->category }} </td>
                    <td> {{ $post->description }} </td>
                    <td> {{ $post->created_at }} </td>
                    <td> @if ($post->published == 1) <span class="badge badge-success">Published</span> @else NA @endif </td>
                    <td>
                        <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                        <a href="{{ route('post.show'), $post->id }}" class="btn btn-info btn-sm"> View </a>
                        <a href="{{ route('post.edit'), $post->id }}" class="btn btn-success btn-sm"> Edit </a>
                        @csrf
                        @method('DELETE')
                            <button type="submit" class="btn.btn-danger.btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
@endsection
