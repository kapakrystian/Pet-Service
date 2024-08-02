<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use App\Http\Services\PetService;
use App\Exceptions\PetApiException;

class PetServiceTest extends TestCase
{
    private PetService $petService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->petService = new PetService();
    }

    public function testStorePetThrowsExceptionOnFailure()
    {
        // Mockowanie odpowiedzi HTTP jako niepowodzenia
        Http::fake([
            'https://petstore.swagger.io/v2/pet/' => Http::response(['error' => 'Invalid input'], 405),
        ]);

        $formData = [
            'name' => 'Test Pet',
            'category' => 'Test Category',
            'status' => 'available',
            'photo_url' => 'http://example.com/photo.jpg',
        ];

        $this->expectException(PetApiException::class);
        $this->expectExceptionMessage('Failed to store pet');

        $this->petService->storePet($formData);
    }
}
