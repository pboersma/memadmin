<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberTypeStoreRequest;
use App\Http\Requests\MemberTypeUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use App\Interfaces\ControllerInterface;
use App\Services\MemberTypeService;

class MemberTypeController extends Controller
{
    protected MemberTypeService $memberTypeService;

    public function __construct(MemberTypeService $memberTypeService)
    {
        parent::__construct(
            $memberTypeService,
            [
                'plural' => 'member_types',
                'singular' => 'member_type'
            ],
            [
                'storeRequest' => MemberTypeStoreRequest::class,
                'updateRequest' => MemberTypeUpdateRequest::class,
            ]
        );

        $this->memberTypeService = $memberTypeService;
    }
}
