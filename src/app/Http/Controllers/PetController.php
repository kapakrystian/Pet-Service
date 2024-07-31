<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\PetService;

class PetController extends Controller
{
    private PetService $petService;

    public function __construct(PetService $petService)
    {
        $this->petService = $petService;
    }

    public function index()
    {
        $pets = $this->petService->allPets('available');
        return view('pets.index', compact('pets'));
    }

    public function create()
    {
        return view('pets.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(int $id)
    {
        $pet = $this->petService->singlePet($id);
        return view('pets.show', compact('pet'));
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
