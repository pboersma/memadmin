<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use App\Interfaces\ControllerInterface;
use App\Interfaces\ServiceInterface;

abstract class Controller implements ControllerInterface
{
    protected ServiceInterface $service;

    protected array $resourceKey;

    protected array $requests;

    public function __construct(ServiceInterface $service, array $resourceKey, array $requests)
    {
        $this->service = $service;
        $this->resourceKey = $resourceKey;
        $this->requests = $requests;
    }

    /**
     * @inheritDoc
     */
    public function index(): View
    {
        $model = $this->service->getAll();

        return view("panel.{$this->resourceKey['plural']}.index", [$this->resourceKey['plural'] => $model]);
    }

    /**
     * @inheritDoc
     */
    public function create(): View
    {
        return view("panel.{$this->resourceKey['plural']}.create");
    }

    /**
     * @inheritDoc
     */
    public function store(Request $request): RedirectResponse
    {
        $request = app($this->requests['storeRequest']);

        $this->service->create($request->all());

        return redirect()->route("{$this->resourceKey['plural']}.index");
    }

    /**
     * @inheritDoc
     */
    public function edit(int $id): View
    {
        $model = $this->service->getById($id);

        return view("panel.{$this->resourceKey['plural']}.edit", [$this->resourceKey['singular'] => $model]);
    }

    /**
     * @inheritDoc
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $request = app($this->requests['updateRequest']);

        $this->service->update($id, $request->all());

        return redirect()->route("{$this->resourceKey['plural']}.index");
    }

    /**
     * @inheritDoc
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->service->delete($id);

        return redirect()->route("{$this->resourceKey['plural']}.index");
    }

    /**
     * @inheritDoc
     */
    public function show(int $id): View
    {
        $model = $this->service->getById($id);

        return view("panel.{$this->resourceKey['plural']}.show", [$this->resourceKey['singular'] => $model]);
    }
}
