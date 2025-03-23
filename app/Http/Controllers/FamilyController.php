<?php

namespace App\Http\Controllers;

use App\Services\FamilyService;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class FamilyController implements ControllerInterface
{
    protected FamilyService $familyService;

    public function __construct(FamilyService $familyService)
    {
        $this->familyService = $familyService;
    }

    public function index(): View
    {
        $families = $this->familyService->getAllFamilies();

        return view('panel.families.index', compact('families'));
    }

    public function create(): View
    {
        return view('panel.families.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->familyService->createFamily($request->all());

        return redirect()->route('families.index');
    }

    public function edit($id): View
    {
        $family = $this->familyService->getFamily($id);

        return view('panel.families.edit', compact('family'));
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $this->familyService->updateFamily($id, $request->all());

        return redirect()->route('families.index');
    }

    public function show(int $id): View
    {
        $family = $this->familyService->getFamily($id);

        return view('panel.families.show', compact('family'));
    }

    public function destroy(int $id): RedirectResponse
    {
        $this->familyService->deleteFamily($id);

        return redirect()->route('families.index');
    }
}
