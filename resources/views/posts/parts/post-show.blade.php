<table class="table table-striped table-bordered" id="cards">
    <tbody>
    <tr>
        <th><b>id</b></th>
        <td>{{ $post->id }}</td>
    </tr>
        <tr>
            <th><b>name</b></th>
            <td>{{ $post->name }}</td>
        </tr>
        <tr>
            <th><b>description</b></th>
            <td>{{ $post->description }}</td>
        </tr>
        <tr>
            <th><b>image</b></th>
            <td><img src="{{asset('/images/posts/'. $post->image )}}"  width="30px"></td>
        </tr>
        <tr>
            <th><b>category</b></th>
            <td>{{ $post->category->name }}</td>
        </tr>
    </tbody>
</table>
