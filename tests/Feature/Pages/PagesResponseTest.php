<?php

namespace Tests\Feature\Pages;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PagesResponseTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_gives_a_successful_response_for_dashboard_page()
    {
        $user = User::factory()->create();


        $this->actingAs($user)
            ->get(route('dashboard'))
            ->assertOk();
    }
}
