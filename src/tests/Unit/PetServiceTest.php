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
        // Mocking HTTP responses as failures
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

    public function testStorePetSuccess()
    {
        $formData = [
            'name' => 'Simba',
            'category' => 'Dog',
            'status' => 'sold',
            'photo_url' => 'http://example.com/photo.jpg',
        ];

        // Mocking HTTP response as success
        Http::fake([
            'https://petstore.swagger.io/v2/pet/' => Http::response([
                'id' => 1,
                'name' => 'Simba',
                'status' => 'sold',
                'category' => [
                    'name' => 'Dog'
                ],
                'photoUrls' => ['http://example.com/photo.jpg']
            ], 200),
        ]);

        $expectedResponse = [
            'id' => 1,
            'name' => 'Simba',
            'status' => 'sold',
            'category' => [
                'name' => 'Dog'
            ],
            'photoUrls' => ['http://example.com/photo.jpg']
        ];

        $response = $this->petService->storePet($formData);

        $this->assertEquals($expectedResponse, $response);
    }
}
