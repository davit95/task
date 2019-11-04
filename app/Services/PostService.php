<?php


namespace App\Services;
use App\Contracts\PostInterface;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;


class PostService implements PostInterface
{
    /**
     * @var
     */
    public $post;

    /**
     * Create a new post instance.
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * @return mixed|void
     */
    public function getAllPosts()
    {
        return $this->where($this->post)->get();
    }

    /**
     * @return mixed|void
     */
    public function uploadPostImage( $file )
    {
        if ( $file ) {
            $name = Str::random(20).".".$file->getClientOriginalExtension();
            $file->move(public_path().'/images/posts', $name);
            return $name;
        }
        return Post::DEFAULT_IMAGE;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function createPost( $data )
    {
        $data['image'] = isset($data['image']) ? $this->uploadPostImage( $data['image'] ) : Post::DEFAULT_IMAGE;
        return $this->post->create( $data );
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findPostById( $id )
    {
        return $this->where($this->post)->findOrfail($id);
    }

    /**
     * @param $id
     * @param $data
     * @return mixed
     */
    public function updatePost( $id, $data )
    {
        if (isset( $data['image'] )) {
            $data['image'] = $this->uploadPostImage( $data['image'] );
        }
        return $this->findPostById( $id )->update( $data );
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deletePost( $id )
    {
        $post = $this->findPostById( $id );
        if ( $post->hasImage() ) {
            if (File::exists( public_path(Post::POST_IMAGES_PATH . $post->image) )) {
                File::delete( public_path(Post::POST_IMAGES_PATH . $post->image) );
            }
        }
        return $post->delete();
    }

    /**
     * @param $query
     * @return mixed
     */
    public function where( $query )
    {
        return $query->where('user_id', auth()->user()->id);
    }
}
