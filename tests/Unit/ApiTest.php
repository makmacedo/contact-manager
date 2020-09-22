<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Laravel\Passport\Passport;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Check a user can see its own details
     *
     * @return void
     */
    public function test_user_can_check_details()
    {
        Passport::actingAs(User::factory()->make());
    
        $this->get('/api/user')->assertSuccessful();
    }

    /**
     * Check a user can see contacts
     *
     * @return void
     */
    public function test_user_can_list_contacts()
    {
        Passport::actingAs(User::factory()->make());
    
        $response = $this->get('/api/contact')->assertSuccessful();

        // assert the response is a paginated list
        $response->assertJson(['current_page' => 1]);
    }

}
