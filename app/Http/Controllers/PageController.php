<?php

namespace App\Http\Controllers;

use App\Http\Repositories\Eloquent\PageRepository;
use App\Http\Requests\PageRequest;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * @var PageRepository
     */
    private $pageRepository;

    public function __construct(PageRepository $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    public function store(PageRequest $pageRequest)
    {
        $this->pageRepository->store($pageRequest->all());
        return redirect()->route('admin.listPageView');
    }

    public function update($id, PageRequest $pageRequest)
    {
        $this->pageRepository->update($id, $pageRequest->all());
        return $this->backWithSuccess();
    }

    public function destroy($id)
    {
        $this->pageRepository->destroy($id);
        return redirect()->route('admin.listPageView');
    }

    public function show($slug)
    {
        $page = $this->pageRepository->show($slug);
        return view('pageDetail', compact('page'));
    }

    public function viewAdd()
    {
        return view('admin.addPage');
    }

    public function list()
    {
        $pages = $this->pageRepository->listAll();
        return view('admin.listPage', compact('pages'));
    }

    public function edit($id)
    {
        $page = $this->pageRepository->getById($id);
        return view('admin.editPage', compact('page'));
    }
}
