<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\FamilyService;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class FamilyController extends Controller
{
    protected FamilyService $familyService;

    public function __construct(FamilyService $familyService)
    {
        $this->familyService = $familyService;
    }

    /**
     * @inheritDoc
     */
    public function index(): View
    {
        $families = $this->familyService->getAll();

        return view('panel.families.index', compact('families'));
    }

    /**
     * @inheritDoc
     */
    public function create(): View
    {
        return view('panel.families.create');
    }
    /**
     * @inheritDoc
     */
    public function store(Request $request): RedirectResponse
    {
        $this->familyService->create($request->all());

        return redirect()->route('families.index');
    }

    /**
     * @inheritDoc
     */
    public function edit($id): View
    {
        $family = $this->familyService->getById($id);

        return view('panel.families.edit', compact('family'));
    }

    /**
     * @inheritDoc
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $this->familyService->update($id, $request->all());

        return redirect()->route('families.index');
    }

    /**
     * @inheritDoc
     */
    public function show(int $id): View
    {
        $family = $this->familyService->getById($id);
        $family_members = $this->familyService->getFamilyMembers($id);

        return view('panel.families.show', compact(['family', 'family_members']));
    }

    /**
     * @inheritDoc
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->familyService->delete($id);

        return redirect()->route('families.index');
    }
}
