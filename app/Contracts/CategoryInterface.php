<?php


namespace App\Contracts;


interface CategoryInterface
{
    /**
     * @param $input
     * @return mixed
     */
    public function getAllCategories();
}
