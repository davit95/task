<tr>
    <th scope="row">1</th>
    <td>{{ $post->name  }}</td>
    <td>{{ $post->description  }}</td>
    <td><img src="{{asset('/images/posts/'. $post->image )}}"  width="30px"></td>
    <td>
        {!! Form::open([ 'url' => url('/posts/'. $post->id), 'method' => 'DELETE', 'files' => true ]) !!}
            <a href="{{ route('posts.edit', $post->id)  }}"><button type="button" class="btn btn-primary">Edit</button></a>
            <a href="{{ route('posts.show', $post->id)  }}"><button type="button" class="btn btn-primary">Show</button></a>
            <button type="submit" class="btn btn-danger right">Delete</button>
        {!! Form::close() !!}
    </td>
</tr>
