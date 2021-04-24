<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Http;
use App\Interfaces\PostRepositoryInterface;
use stdClass;


/**
 * Class PostRepository
 * @package App\Repositories
 */
class PostRepository implements PostRepositoryInterface
{
    private $apiEndPoint;

    public function __construct()
    {
        $this->apiEndPoint = config('app.api_endpoint');
    }
    /**
     * @return array
     */
    public function getAllPosts(): array
    {
        return json_decode(Http::get($this->apiEndPoint . 'posts'), true);
    }

    /**
     * @param int $postId
     * @return array
     */
    public function getPostById(int $postId): array
    {
        return json_decode(Http::get($this->apiEndPoint . 'posts/'.$postId), true);
    }
}
