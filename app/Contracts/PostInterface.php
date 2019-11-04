<?php


namespace App\Contracts;


interface PostInterface
{
    /**
     * @param $input
     * @return mixed
     */
    public function getAllPosts();

    /**
     * @param $file
     * @return mixed
     */
    public function uploadPostImage( $file );

    /**
     * @param $data
     * @return mixed
     */
    public function createPost( $data );

    /**
     * @param $id
     * @return mixed
     */
    public function findPostById( $id );

    /**
     * @param $id
     * @param $data
     * @return mixed
     */
    public function updatePost( $id, $data );

    /**
     * @param $id
     * @param $data
     * @return mixed
     */
    public function deletePost( $id );
}
