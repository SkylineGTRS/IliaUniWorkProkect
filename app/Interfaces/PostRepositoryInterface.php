<?php
namespace App\Interfaces;

/**
 * Interface PostRepositoryInterface
 * @package App\Repositories\Interfaces
 */
interface PostRepositoryInterface
{
    /**
     * @return array
     */
    public function getAllPosts(): array;

    /**
     * @param int $postId
     * @return array
     */
    public function getPostById(int $postId): array;
}
