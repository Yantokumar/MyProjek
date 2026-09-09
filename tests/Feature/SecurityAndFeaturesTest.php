<?php

namespace Tests\Feature;

use App\Models\Feedback;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SecurityAndFeaturesTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_cannot_access_admin_panel(): void
    {
        $response = $this->get('/admin');
        $response->assertRedirect('/login');
    }

    public function test_regular_user_cannot_access_admin_panel(): void
    {
        $user = User::factory()->create(['role' => 'user']);

        $response = $this->actingAs($user)->get('/admin');
        $response->assertStatus(403);
    }

    public function test_admin_can_access_admin_panel(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($admin)->get('/admin');
        $response->assertStatus(200);
    }

    public function test_user_can_submit_feedback_and_admin_can_delete_it(): void
    {
        $submitResponse = $this->post('/feedback', [
            'nama' => 'Otaku Tester',
            'pesan' => 'Tampilan webnya sangat keren dan responsif!',
        ]);

        $submitResponse->assertSessionHas('success');
        $this->assertDatabaseHas('feedback', ['nama' => 'Otaku Tester']);

        $feedback = Feedback::where('nama', 'Otaku Tester')->first();

        // Guest cannot delete feedback
        $guestDelete = $this->delete("/admin/feedback/{$feedback->id}");
        $guestDelete->assertRedirect('/login');

        // Admin can delete feedback
        $admin = User::factory()->create(['role' => 'admin']);
        $adminDelete = $this->actingAs($admin)->delete("/admin/feedback/{$feedback->id}");
        $adminDelete->assertSessionHas('success');
        $this->assertDatabaseMissing('feedback', ['id' => $feedback->id]);
    }

    public function test_user_cannot_add_duplicate_favorite(): void
    {
        $user = User::factory()->create();

        // First add
        $res1 = $this->actingAs($user)->post('/add-favorite', [
            'mal_id' => 1234,
            'judul' => 'Attack on Titan',
            'gambar' => 'https://example.com/aot.jpg',
        ]);
        $res1->assertSessionHas('success');
        $this->assertDatabaseCount('favorites', 1);

        // Duplicate add
        $res2 = $this->actingAs($user)->post('/add-favorite', [
            'mal_id' => 1234,
            'judul' => 'Attack on Titan',
            'gambar' => 'https://example.com/aot.jpg',
        ]);
        $res2->assertSessionHas('error');
        $this->assertDatabaseCount('favorites', 1);
    }
}
