<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Http;


class PetService
{
    private const BASE_URL = 'https://petstore.swagger.io/v2/';

    public function allPets(string $status)
    {
        $response = Http::get(self::BASE_URL . 'pet/findByStatus', [
            'status' => $status
        ]);

        return $response->json();
    }

    public function singlePet(int $id)
    {
        $response = Http::get(self::BASE_URL . "pet/{$id}");
        return $response->json();
    }

    public function createPet(array $data)
    {
        $response = Http::post(self::BASE_URL . 'pet', $data);
    }
}
