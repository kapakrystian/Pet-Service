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
        //TODO: validation

        $this->petService->createPet([
        'name' => $request->input('name'),
        'category' => $request->input('category'),
        'status' => $request->input('status'),
        'photo_url' => $request->input('photo_url')
       ]);

        return redirect('pets');
    }

    public function show(string $id)
    {
        $pet = $this->petService->singlePet($id);
        return view('pets.show', compact('pet'));
    }

    public function edit(string $id)
    {
        $pet = $this->petService->singlePet($id);

        return view('pets.edit', [
            'pet' => $pet
        ]);
    }

    public function update(Request $request, string $id)
    {
        //TODO: validation

        $this->petService->updatePet([
            'name' => $request->input('name'),
            'category' => $request->input('category'),
            'status' => $request->input('status'),
            'photo_url' => $request->input('photo_url')
        ]);

        return redirect('pets');
    }

    public function destroy(string $id)
    {
        //TODO: id exsist

        $this->petService->deletePet($id);
        return redirect('pets');
    }
}
