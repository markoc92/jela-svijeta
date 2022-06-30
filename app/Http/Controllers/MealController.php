<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Http\Requests\MealRequest;
use Illuminate\Http\Request;
use App\Http\Resources\MealCollection;

class MealController extends Controller
{
    public function index(MealRequest $request)
    {
        return new MealCollection(
            Meal::filter($request)->paginate($request->per_page, ['*'], 'page', $request->page)->withQueryString()
        );
    }
}
