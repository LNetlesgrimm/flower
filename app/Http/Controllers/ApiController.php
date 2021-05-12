<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flower;

class ApiController extends Controller
{
    public function getFlowers() {
        $flowers = Flower::all();
        return $flowers->toJson(JSON_PRETTY_PRINT);
    }

    public function getXflowers($x) {
        $flowers = Flower::take($x)->get();
        return $flowers->toJson(JSON_PRETTY_PRINT);
    }

    public function getThisFlower($id) {
        $flower = Flower::find($id);
        if ($flower)
            return $flower->toJson(JSON_PRETTY_PRINT);
        else
            return response(json_encode(['error' => 'Flower not found']), 404);
    }

    public function getFlowersByType($t) {
        $flowers = Flower::where('type', $t)->get();
        if (count($flowers) > 0)
            return $flowers->toJson(JSON_PRETTY_PRINT);
        else
            return response(json_encode(['error' => 'Type does not exist.']), 404);
    }
}
