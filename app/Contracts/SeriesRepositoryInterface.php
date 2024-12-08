<?php

namespace App\Contracts;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;

interface SeriesRepositoryInterface
{
    public function add(SeriesFormRequest $request): Series;
}
