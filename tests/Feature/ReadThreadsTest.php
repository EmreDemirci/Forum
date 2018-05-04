<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReadThreadsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_browse_threads()
    {
        $thread = factory('App\Thread')->create();

        $this->get('/threads')
            ->assertSee($thread->title);
    }

    /** @test */
    public function a_user_can_view_any_thread()
    {
        $thread = factory('App\Thread')->create();

        $this->get('/threads/'.$thread->id)
            ->assertSee($thread->title);
    }

    /** @test */
    function a_thread_has_replies()
    {
        $threadsReply = factory('App\Reply')->create();
        $anotherReply = factory('App\Reply')->create(['thread_id', '=>', '2']);

        $this->get('/threads/1')
            ->assertSee($threadsReply->body)
            ->assertDontSee($anotherReply->body);
    }
}
