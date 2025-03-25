<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use App\Interfaces\ControllerInterface;
use App\Services\MemberTypeService;

class MemberTypeController implements ControllerInterface
{
    protected MemberTypeService $memberTypeService;

    public function __construct(MemberTypeService $memberTypeService)
    {
        $this->memberTypeService = $memberTypeService;
    }

    /**
     * @inheritDoc
     */
    public function index(): View
    {
        $member_types = $this->memberTypeService->getAll();

        return view('panel.member_types.index', compact('member_types'));
    }

    public function create(): View
    {
        return view('panel.member_types.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->memberTypeService->create($request->all());

        return redirect()->route('member_types.index');
    }

    /**
     * @inheritDoc
     */
    public function edit($id): View
    {
        $member_type = $this->memberTypeService->getById($id);

        return view('panel.member_types.edit', compact('member_type'));
    }

    /**
     * @inheritDoc
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $this->memberTypeService->update($id, $request->all());

        return redirect()->route('member_types.index');
    }

    /**
     * @inheritDoc
     */
    public function show(int $id): View
    {
        $member_type = $this->memberTypeService->getById($id);

        return view('panel.member_types.show', compact('member_type'));
    }

    /**
     * @inheritDoc
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->memberTypeService->delete($id);

        return redirect()->route('member_types.index');
    }
}
