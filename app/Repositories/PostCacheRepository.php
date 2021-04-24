<?php

namespace App\Repositories;

use Illuminate\Contracts\Cache\Repository as CacheContract;
use App\Interfaces\PostRepositoryInterface;
use Psr\SimpleCache\InvalidArgumentException;


/**
 * Class PostCacheRepository
 * @package App\Repositories
 */
class PostCacheRepository extends CacheRepository implements PostRepositoryInterface
{
    /**
     * @var PostRepository
     */
    private PostRepository $repository;

    /**
     * PostCacheRepository constructor.
     * @param CacheContract $cache
     * @param PostRepository $postRepository
     */
    public function __construct(CacheContract $cache,PostRepository $postRepository)
    {
        $this->cache = $cache;
        $this->repository = $postRepository;
    }

    //getting all posts

    /**
     * @return array
     * @throws InvalidArgumentException
     */
    public function getAllPosts(): array
    {
        $key = 'post_data';
        return $this->remember($key, function () {
            return $this->repository->getAllPosts();
        },5);
    }
    //getting all posts by id

    /**
     * @param int $postId
     * @return array
     * @throws InvalidArgumentException
     */
    public function getPostById(int $postId): array
    {
        $key = 'post_' . $postId;
        return $this->remember($key, function () use ($postId) {
            return $this->repository->getPostById($postId);
        },5);
    }
}
