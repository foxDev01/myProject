<?php

namespace Tests\Feature;

use App\Models\Comment;
use App\Models\Proj;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CommentAccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_cannot_store_comment(): void
    {
        $proj = Proj::factory()->create();

        $this->post(route('proj.comment.store', $proj), ['message' => 'Привет'])
            ->assertRedirect(route('login'));

        $this->assertDatabaseCount('comments', 0);
    }

    public function test_guest_cannot_like_project(): void
    {
        $proj = Proj::factory()->create();

        $this->post(route('proj.like.store', $proj))
            ->assertRedirect(route('login'));

        $this->assertDatabaseCount('project_user_likes', 0);
    }

    public function test_owner_can_update_comment(): void
    {
        $owner = User::factory()->create();
        $comment = Comment::factory()->for($owner)->create(['message' => 'Старый текст']);

        $this->actingAs($owner)
            ->patch(route('personal.comment.update', $comment), ['message' => 'Новый текст'])
            ->assertRedirect(route('personal.comment.index'));

        $this->assertSame('Новый текст', $comment->fresh()->message);
    }

    public function test_user_cannot_update_foreign_comment(): void
    {
        $owner = User::factory()->create();
        $other = User::factory()->create();
        $comment = Comment::factory()->for($owner)->create(['message' => 'Старый текст']);

        $this->actingAs($other)
            ->patch(route('personal.comment.update', $comment), ['message' => 'Взлом'])
            ->assertForbidden();

        $this->assertSame('Старый текст', $comment->fresh()->message);
    }

    public function test_user_cannot_edit_foreign_comment(): void
    {
        $owner = User::factory()->create();
        $other = User::factory()->create();
        $comment = Comment::factory()->for($owner)->create();

        $this->actingAs($other)
            ->get(route('personal.comment.edit', $comment))
            ->assertForbidden();
    }

    public function test_user_cannot_delete_foreign_comment(): void
    {
        $owner = User::factory()->create();
        $other = User::factory()->create();
        $comment = Comment::factory()->for($owner)->create();

        $this->actingAs($other)
            ->delete(route('personal.comment.delete', $comment))
            ->assertForbidden();

        $this->assertDatabaseHas('comments', ['id' => $comment->id]);
    }

    public function test_owner_can_delete_own_comment(): void
    {
        $owner = User::factory()->create();
        $comment = Comment::factory()->for($owner)->create();

        $this->actingAs($owner)
            ->delete(route('personal.comment.delete', $comment))
            ->assertRedirect(route('personal.comment.index'));

        $this->assertModelMissing($comment);
    }
}
