<?php

namespace Tests\Feature;
use Illuminate\Support\Str;
use Tests\TestCase;

class PostTest extends TestCase
{
    /** @test */
    public function it_should_get_all_posts()
    {
        $response = $this->get('posts');
        $response->assertStatus(200);
        $posts = $response->original->getData()['posts'];
        $this->assertNotNull($posts);
        $this->assertCount(6, $posts);
        $this->assertIsArray($posts);
        foreach ($posts as $post){
            $this->assertArrayHasKey('id', $post);
            $this->assertArrayHasKey('name', $post);
            $this->assertArrayHasKey('year', $post);
            $this->assertArrayHasKey('color', $post);
        }

    }

    /** @test */
    public function it_should_get_single_posts()
    {
        $response = $this->get('posts');
        $post = $response->original->getData()['posts'][0];

        $postResponse = $this->get('posts/' . $post['id']);
        $postResponse->assertStatus(200);

        $this->assertIsArray($post);
        $this->assertArrayHasKey('id', $post);
        $this->assertArrayHasKey('name', $post);
        $this->assertArrayHasKey('year', $post);
        $this->assertArrayHasKey('color', $post);
    }

    /** @test */
    public function it_should_get_not_found_error_if_invalid_post_id_provided()
    {
        $response = $this->get('posts/' . Str::uuid());
        $response->assertStatus(404);
    }
}
