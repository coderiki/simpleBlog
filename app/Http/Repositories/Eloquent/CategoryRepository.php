<?php
/**
 * Created by PhpStorm.
 * User: CoDe
 * Date: 07.02.2019
 * Time: 19:34
 */

namespace App\Http\Repositories\Eloquent;


use App\Category;
use App\Contracts\CategoryContract;

class CategoryRepository implements CategoryContract
{

    /**
     * @var Category
     */
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function store($datas)
    {
        return $this->category->create($datas);
        // TODO: Implement store() method.
    }

    public function destroy($id)
    {
        return $this->category->findOrFail($id)->delete();
        // TODO: Implement destroy() method.
    }

    public function update($datas, $id)
    {
        $category = $this->category->findOrFail($id);
        $category->slug = null;
        return $category->update($datas);
        // TODO: Implement update() method.
    }

    public function getCategoryInfoWithSlug($categorySlug)
    {
        return $this->category->where("slug", $categorySlug)->firstOrFail();
    }
}