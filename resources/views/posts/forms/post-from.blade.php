@if ( isset ($post ) )
    {!! Form::model($post, [ 'url' => url('posts/'.$post->id), 'method' => 'PUT', 'files' => true ]) !!}
@else
    {!! Form::open([ 'url' => url('/posts'), 'method' => 'POST', 'files' => true ]) !!}
@endif
<div class="form-group">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', isset($post) ? $post->name : null ,  ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('description', 'Description') !!}
    {!! Form::textarea('description', isset($post) ? $post->descriptiom : null ,  ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {{ Form::label('category_id', 'Category') }}
    {!! Form::select('category_id', $categories , null, ['class' => 'form-control']) !!}
</div>
@if( isset( $post ) )
    <img src="{{asset('/images/posts/'. $post->image )}}"  width="70px"><br><br>
@endif
<div class="form-group">
    {!! Form::label('image', 'Image') !!}
    {!! Form::file('image', null ,  ['class' => 'form-control']) !!}
</div>
{!! Form::hidden('user_id', auth()->user()->id) !!}
<button type="submit" class="btn btn-success right">Submit</button>
{!! Form::close() !!}
