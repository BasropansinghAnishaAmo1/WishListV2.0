@extends('posts.layout')

@section('content')
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <div class="justify-content-xl-center">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 style="margin-top: 50px;">Overzicht van WishList</h2>
            </div>
            <div class="pull-right">
                <a style="margin-top: 50px" class="btn btn-success" href="{{ route('posts.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Body</th>
            <th>Image</th>
            <th>Price</th>
            <th>URL</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($posts as $post)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->body }}</td>
                <td>{{ $post->image }}</td>
                <td>{{ $post->price }}</td>
                <td>{{ $post->url }}</td>
                <td>
                    <form action="{{ route('posts.destroy',$post->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('posts.show',$post->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $posts->links() !!}

@endsection
