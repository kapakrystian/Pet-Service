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
}
