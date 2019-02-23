<?php
/**
 * Created by PhpStorm.
 * User: CoDe
 * Date: 19.02.2019
 * Time: 21:25
 */

namespace App\Http\Repositories\Eloquent;


use App\Contracts\PageContract;
use App\Page;

class PageRepository implements PageContract
{

    /**
     * @var Page
     */
    private $page;

    public function __construct(Page $page)
    {

        $this->page = $page;
    }

    public function store($request)
    {
        // TODO: Implement store() method.
        return $this->page->create($request);
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
        $page = $this->page->findOrFail($id);
        return $page->delete();
    }

    public function update($id, $request)
    {
        // TODO: Implement update() method.
        $page = $this->page->findOrFail($id);
        return $page->update($request);
    }

    public function show($slug)
    {
        // TODO: Implement show() method.
        $page = $this->page->where('slug', $slug)->firstOrFail();
        return $page;
    }

    public function listAll()
    {
        $pageAll = $this->page->all();
        return $pageAll;
    }

    public function getById($id)
    {
        $page = $this->page->findOrFail($id);
        return $page;
    }
}