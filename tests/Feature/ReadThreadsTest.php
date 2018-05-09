<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReadThreadsTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp(){
        parent::setUp();
        $this->thread = factory('App\Thread')->create();
    }

    /** @test */
    public function a_user_can_browse_threads()
    {
        $this->get('/threads')
            ->assertSee($this->thread->title);
    }

    /** @test */
    public function a_user_can_view_any_thread()
    {
        $this->get($this->thread->path())
            ->assertSee($this->thread->title);
    }

    /** @test */
    function a_thread_has_replies()
    {
        $threadsReply = factory('App\Reply')->create(['thread_id' => $this->thread->id]);
        $anotherReply = factory('App\Reply')->create(['thread_id' => 2]);

        $this->get($this->thread->path())
            ->assertSee($threadsReply->body)
            ->assertDontSee($anotherReply->body);
    }
}
