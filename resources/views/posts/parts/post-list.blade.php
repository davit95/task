<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Dsecription</th>
        <th scope="col">Image</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    @forelse ($posts as $post)
        @include('posts.parts.post-item')
    @empty
        @include('alerts.no-data-table')
    @endforelse
    </tbody>
</table>
