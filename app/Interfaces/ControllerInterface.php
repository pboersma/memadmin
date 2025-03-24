<?php

namespace App\Interfaces;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

interface ControllerInterface
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View;

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View;

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse;

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return View
     */
    public function edit(int $id): View;

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     *
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse;

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return View
     */
    public function show(int $id): View;

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse;
}
