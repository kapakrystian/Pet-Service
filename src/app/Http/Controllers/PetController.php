<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\PetService;
use App\Http\Requests\PetRequest;

class PetController extends Controller
{
    private PetService $petService;

    public function __construct(PetService $petService)
    {
        $this->petService = $petService;
    }

    public function index()
    {
        $pets = $this->petService->getPetsByStatus('available');
        return view('pets.index', ['pets' => $pets]);
    }

    public function create()
    {
        return view('pets.create');
    }

    public function store(PetRequest $request)
    {
        $this->petService->storePet([
        'name' => $request->input('name'),
        'category' => $request->input('category'),
        'status' => $request->input('status'),
        'photo_url' => $request->input('photo_url')
       ]);

        return redirect('pets');
    }

    public function show(string $id)
    {
        $pet = $this->petService->getPetById($id);
        return view('pets.show', compact('pet'));
    }

    public function edit(string $id)
    {
        $pet = $this->petService->getPetById($id);

        return view('pets.edit', [
            'pet' => $pet
        ]);
    }

    public function update(PetRequest $request, string $id)
    {
        $this->petService->updatePet([
            'name' => $request->input('name'),
            'category' => $request->input('category'),
            'status' => $request->input('status'),
            'photo_url' => $request->input('photo_url')
        ]);

        $request->session()->flash('message', 'Pet updated successfully');
        return redirect('pets');
    }

    public function destroy(string $id)
    {
        //TODO: id exsist

        $this->petService->deletePet($id);
        return redirect('pets');
    }
}
