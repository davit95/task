<?php


namespace App\Services;
use App\Models\Category;
use App\Contracts\CategoryInterface;


class CategoryService implements CategoryInterface
{
    /**
     * @var
     */
    public $category;

    /**
     * Create a new post instance.
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * @return mixed|void
     */
    public function getAllCategories()
    {
        return $this->category->pluck('name', 'id');
    }
}
