<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class Home extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // Filtreleme
        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->input('search') . '%');
        }

        // Sıralama
        if ($request->has('sort')) {
            $sortField = $request->input('sort');
            $sortDirection = $request->input('sort_direction', 'asc');
            $query->orderBy($sortField, $sortDirection);
        }

        // Sayfalama
        $perPage = 10; // Her sayfada kaç öğe görüntüleneceğini belirleyin
        $results = $query->paginate($perPage);

        return view("pages.home")
            ->with('products', $results)
            ->with('mainUrl', $request->fullUrl());
    }
}
