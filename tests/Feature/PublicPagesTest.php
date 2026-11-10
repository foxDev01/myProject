<?php

namespace Tests\Feature;

use App\Models\Proj;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicPagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_page_redirects_to_projects(): void
    {
        $this->get('/')->assertRedirect(route('proj.index'));
    }

    public function test_projects_page_is_available(): void
    {
        Proj::factory()->count(3)->create();

        $this->get(route('proj.index'))->assertOk();
    }

    public function test_project_page_is_available(): void
    {
        $proj = Proj::factory()->create();

        $this->get(route('proj.show', $proj))
            ->assertOk()
            ->assertSee($proj->title);
    }
}
