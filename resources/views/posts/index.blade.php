@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 blog-list">
                    <table class="table table-striped">
                        <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <td><h3><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h3></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                {{ $posts->links('components.paginate') }}
            </div>
        </div>
    </div>
@endsection
