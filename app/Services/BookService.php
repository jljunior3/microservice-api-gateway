<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class BookService
{
    use ConsumesExternalService;

    /**
     * Url para ser usada para o serviço de Livros
     * @var string
     */
    public $baseUri;

    /**
     * Key para ser usada para o serviço de Livros
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.books.base_uri');
        $this->secret = config('services.books.secret');
    }

    /**
     * @return string
     */
    public function obtainBooks()
    {
        return $this->performRequest('GET', '/books');
    }

    /**
     * @param $book
     * @return string
     */
    public function obtainBook($book)
    {
        return $this->performRequest('GET', "/books/{$book}");
    }

    /**
     * @param $data
     * @return string
     */
    public function createBooks ($data)
    {
        return $this->performRequest('POST', '/books', $data);
    }

    /**
     * @param $data
     * @param $book
     * @return string
     */
    public function editBook($data, $book)
    {
        return $this->performRequest('PUT', "/books/{$book}", $data);
    }

    /**
     * @param $book
     * @return string
     */
    public function deleteBook($book)
    {
        return $this->performRequest('DELETE', "/books/{$book}");
    }
}