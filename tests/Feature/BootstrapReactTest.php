<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Bootstrap;

class BootstrapReactTest extends TestCase
{
    use RefreshDatabase;

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_can_list_bootstraps()
    {
        Bootstrap::factory()->count(3)->create();

        $response = $this->get('/api/bootstraps');

        $response->assertStatus(200);
        $this->assertCount(3, $response->json());
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_can_create_a_bootstrap()
    {
        $data = ['campo1' => 'valor1', 'campo2' => 'valor2'];

        $response = $this->post('/api/bootstraps', $data);

        $response->assertStatus(201);
        $this->assertDatabaseHas('bootstraps', $data);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_can_update_a_bootstrap()
    {
        $bootstrap = Bootstrap::factory()->create();

        $data = ['campo1' => 'novo_valor1', 'campo2' => 'novo_valor2'];

        $response = $this->put("/api/bootstraps/{$bootstrap->id}", $data);

        $response->assertStatus(200);
        $this->assertDatabaseHas('bootstraps', $data);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_can_delete_a_bootstrap()
    {
        $bootstrap = Bootstrap::factory()->create();

        $response = $this->delete("/api/bootstraps/{$bootstrap->id}");

        $response->assertStatus(204);
        $this->assertDatabaseMissing('bootstraps', ['id' => $bootstrap->id]);
    }
}
