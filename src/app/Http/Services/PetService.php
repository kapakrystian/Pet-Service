<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Http;


class PetService
{
    private const BASE_URL = 'https://petstore.swagger.io/v2/';

    private function apiData(array $formData): array
    {
        return $apiData = [
            'name' => $formData['name'],
            'status' => $formData['status'],
            'category' => [
                'name' => $formData['category']
            ],
            'photoUrls' => [$formData['photo_url']]
        ];
    }

    public function getPetsByStatus(string $status)
    {
        $response = Http::get(self::BASE_URL . 'pet/findByStatus', [
            'status' => $status
        ]);

        return $response->json();
    }

    public function getPetById(string $id)
    {
        $response = Http::get(self::BASE_URL . "pet/{$id}");
        return $response->json();
    }

    public function storePet(array $formData)
    {
        $response = Http::post(self::BASE_URL . 'pet/', $this->apiData($formData));
        return $response->json();
    }

    public function updatePet(array $formData)
    {
        $response = Http::put(self::BASE_URL . 'pet/', $this->apiData($formData));
        return $response->json();
    }

    public function deletePet(string $id)
    {
        $response = Http::delete(self::BASE_URL . "pet/{$id}");
        return $response->json();
    }

}
