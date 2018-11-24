<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class AuthorService
{
    use ConsumesExternalService;

    /**
     * Url para ser usada para o serviço de Autor
     * @var string
     */
    public $baseUri;

    /**
     * Key para ser usada para o serviço de Livros
     * @var string
     */
    public $secret;

    /**
     * AuthorService constructor.
     */
    public function __construct()
    {
        $this->baseUri = config('services.authors.base_uri');
        $this->secret = config('services.authors.secret');
    }

    /**
     * @return string
     */
    public function obtainAuthors()
    {
        return $this->performRequest('GET', '/authors');
    }

    /**
     * @param $author
     * @return string
     */
    public function obtainAuthor($author)
    {
        return $this->performRequest('GET', "/authors/{$author}");
    }

    /**
     * @param $data
     * @return string
     */
    public function createAuthors ($data)
    {
        return $this->performRequest('POST', '/authors', $data);
    }

    /**
     * @param $data
     * @param $author
     * @return string
     */
    public function editAuthor($data, $author)
    {
        return $this->performRequest('PUT', "/authors/{$author}", $data);
    }

    /**
     * @param $author
     * @return string
     */
    public function deleteAuthor($author)
    {
        return $this->performRequest('DELETE', "/authors/{$author}");
    }
}