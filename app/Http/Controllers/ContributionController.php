<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use App\Interfaces\ControllerInterface;
use App\Services\ContributionService;

class ContributionController implements ControllerInterface
{
    protected ContributionService $contributionService;

    public function __construct(ContributionService $contributionService)
    {
        $this->contributionService = $contributionService;
    }

    /**
     * @inheritDoc
     */
    public function index(): View
    {
        $contributions = $this->contributionService->getAll();

        return view('panel.contributions.index', compact('contributions'));
    }

    public function create(): View
    {
        return view('panel.contributions.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->contributionService->create($request->all());

        return redirect()->route('contributions.index');
    }

    /**
     * @inheritDoc
     */
    public function edit($id): View
    {
        $contribution = $this->contributionService->getById($id);

        return view('panel.contributions.edit', compact('contribution'));
    }

    /**
     * @inheritDoc
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $this->contributionService->update($id, $request->all());

        return redirect()->route('contributions.index');
    }

    /**
     * @inheritDoc
     */
    public function show(int $id): View
    {
        $contribution = $this->contributionService->getById($id);

        return view('panel.contributions.show', compact('contribution'));
    }

    /**
     * @inheritDoc
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->contributionService->delete($id);

        return redirect()->route('contributions.index');
    }
}
