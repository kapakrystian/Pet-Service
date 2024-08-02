<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\PetService;
use App\Http\Requests\PetRequest;
use App\Enums\PetStatus;
use App\Exceptions\PetApiException;

class PetController extends Controller
{
    private PetService $petService;

    public function __construct(PetService $petService)
    {
        $this->petService = $petService;
    }

    public function index(Request $request)
    {
        //Status value from dropdown. Default value is available.
        $status = $request->input('status');

        try {
            $pets = $this->petService->getPetsByStatus($status);
        } catch (PetApiException $error) {
            dd($error);
            return back()->withErrors(['error' => $error->getMessage()]);
        }

        return view('pets.index', [
            'pets' => $pets,
            'status' => $status,
            'statuses' => PetStatus::cases()
        ]);
    }

    public function create()
    {
        return view('pets.create');
    }

    public function store(PetRequest $request)
    {
        try {
            $this->petService->storePet([
                'name' => $request->input('name'),
                'category' => $request->input('category'),
                'status' => $request->input('status'),
                'photo_url' => $request->input('photo_url')
               ]);
        } catch (PetApiException $error) {
            return back()->withErrors(['error' => $error->getMessage()]);
        }

        $request->session()->flash('message', 'Pet created successfully.');
        return redirect('pets');
    }

    public function show(string $id)
    {
        try {
            $pet = $this->petService->getPetById($id);
        } catch (PetApiException $error) {
            return back()->withErrors(['error' => $error->getMessage()]);
        }

        return view('pets.show', [
            'pet' => $pet
        ]);
    }

    public function edit(string $id)
    {
        try {
            $pet = $this->petService->getPetById($id);
        } catch (PetApiException $error) {
            return back()->withErrors(['error' => $error->getMessage()]);
        }

        return view('pets.edit', [
            'pet' => $pet
        ]);
    }

    public function update(PetRequest $request, string $id)
    {
        try {
            $this->petService->updatePet([
                'name' => $request->input('name'),
                'category' => $request->input('category'),
                'status' => $request->input('status'),
                'photo_url' => $request->input('photo_url')
            ]);
        } catch (PetApiException $error) {
            return back()->withErrors(['error' => $error->getMessage()]);
        }

        $request->session()->flash('message', 'Pet updated successfully.');
        return redirect('pets');
    }

    public function destroy(string $id, Request $request)
    {
        try {
            $this->petService->deletePet($id);
        } catch (PetApiException $error) {
            return back()->withErrors(['error' => $error->getMessage()]);
        }

        $request->session()->flash('message', 'Pet removed successfully.');
        return redirect('pets');
    }
}
