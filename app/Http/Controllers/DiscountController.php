<?php

namespace App\Http\Controllers;

use App\Services\DiscountService;

class DiscountController extends Controller
{
    protected DiscountService $discountService;

    public function __construct(DiscountService $discountService)
    {
        parent::__construct(
            $discountService,
            [
                'plural' => 'discounts',
                'singular' => 'discount'
            ],
            [
                'storeRequest' => DiscountStoreRequest::class,
                'updateRequest' => DiscountUpdateRequest::class,
            ]
        );

        $this->discountService = $discountService;
    }
}
