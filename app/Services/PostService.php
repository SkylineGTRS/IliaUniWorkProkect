<?php

namespace App\Services;

use App\Interfaces\PostRepositoryInterface;
use stdClass;

/**
 * Class PostService
 * @package App\Services
 */
class PostService
{
    //post repository
    /**
     * @var PostRepositoryInterface
     */
    private PostRepositoryInterface $postRepository;

    /**
     * PostService constructor.
     * @param PostRepositoryInterface $postRepository
     */
    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * @return array
     */
    public function getAllPosts(): array
    {
        $data = $this->postRepository->getAllPosts();
        return $data['data'] ?? [];
    }

    /**
     * @param int $postId
     * @return array
     */
    public function getPostById(int $postId): array
    {
        $data = $this->postRepository->getPostById($postId);
        return $data['data'] ?? [];
    }
}
