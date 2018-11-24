<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use App\Services\AuthorService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthorController extends Controller
{
    use ApiResponser;

    /**
     * O serviço para consumir o Autor
     * @var AuthorService
     */
    public $authorService;

    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    public function index()
    {
        return $this->successResponse($this->authorService->obtainAuthors());
    }

    public function show($author)
    {
        return $this->successResponse($this->authorService->obtainAuthor($author));
    }

    public function store(Request $request)
    {
        return $this->successResponse($this->authorService->createAuthors($request->all()), Response::HTTP_CREATED);
    }

    public function update(Request $request, $author)
    {
        return $this->successResponse($this->authorService->editAuthor($request->all(), $author));

    }

    public function destroy($author)
    {
        return $this->successResponse($this->authorService->deleteAuthor($author));
    }
}
