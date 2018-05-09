<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 5.05.2018
 * Time: 10:24
 */

namespace Tests\Feature;


use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ParticipateInForumTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function guests_cant_participate_in_threads()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $this->post('threads/some-slug/1/replies', []);
    }

    /** @test */
    function auth_can_participate_in_threads()
    {
        $this->be($user=factory('App\User')->create());

        $thread = factory('App\Thread')->create();

        $reply = factory('App\Reply')->make();
        $this->post($thread->path(). '/replies', $reply->toArray() );

        $this->get($thread->path())
            ->assertSee($reply->body);
    }
}
