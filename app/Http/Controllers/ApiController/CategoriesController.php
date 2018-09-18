<?php

namespace App\Http\Controllers\ApiController;

use App\Services\Repositories\Interfaces\CategoryInterface;
use Illuminate\Http\Request;

class CategoriesController extends BaseController
{
    protected $categoryRepository;

    public function __construct(CategoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {

    }

    public function store(Request $request)
    {
        dd($request->all());
    }

}
