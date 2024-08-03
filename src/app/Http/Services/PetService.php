<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Http;
use App\Exceptions\PetApiException;
use App\Enums\PetStatus;


class PetService
{

    private const BASE_URL = 'https://petstore.swagger.io/v2/';


    public function getPetsByStatus(string|null $status = null)
    {
        $status = $status ?? PetStatus::Available->value;

        $response = Http::get(self::BASE_URL . 'pet/findByStatus', [
            'status' => $status
        ]);

        if ($response->failed()) {
            throw new PetApiException('Failed to get pets by status', $response->json(), $response->status());
        }

        return $response->json();
    }


    public function getPetById(string $id)
    {
        $response = Http::get(self::BASE_URL . "pet/{$id}");

        if ($response->failed()) {
            throw new PetApiException('Failed to get pet by ID', $response->json(), $response->status());
        }

        return $response->json();
    }


    public function storePet(array $formData)
    {
        $response = Http::post(self::BASE_URL . 'pet/', [
            'name' => $formData['name'],
            'status' => $formData['status'],
            'category' => [
                'name' => $formData['category']
            ],
            'photoUrls' => [$formData['photo_url']]
        ]);

        if ($response->failed()) {
            throw new PetApiException('Failed to store pet', $response->json(), $response->status());
        }

        return $response->json();
    }


    public function updatePet(array $formData)
    {
        $response = Http::put(self::BASE_URL . 'pet/', [
                'id' => $formData['id'],
                'name' => $formData['name'],
                'status' => $formData['status'],
                'category' => [
                    'id' => 0,
                    'name' => $formData['category']
                ],
                'photoUrls' => [$formData['photo_url']]
        ]);

        if ($response->failed()) {
            throw new PetApiException('Failed to update pet', $response->json(), $response->status());
        }

        return $response->json();
    }

    
    public function deletePet(string $id)
    {
        $response = Http::delete(self::BASE_URL . "pet/{$id}");

        if ($response->failed()) {
            throw new PetApiException('Failed to delete pet', $response->json(), $response->status());
        }

        return $response->json();
    }

}
