<?php

namespace App\Services;

use App\Repositories\DiscountRepository;

class DiscountService extends BaseService
{
    public function __construct(DiscountRepository $repository)
    {
        parent::__construct($repository);
    }
}
