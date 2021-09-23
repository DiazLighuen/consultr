<?php

namespace App\Http\Controllers;

use App\Imports\HeroImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Hero;

class HeroController extends Controller
{
    public function import()
    {
        Excel::import(new HeroImport, '../../' . 'csv/superheros.csv');

        $response = [
            'response' => 'success',
            'message' => 'All good!'
        ];

        return response()->json($response);
    }

    public function getAll(Request $request)
    {

        $query = Hero::query()
            ->select('heroes.*', 'races.name as race', 'publishers.name as publisher')
            ->leftJoin('races', 'heroes.race_id', '=', 'races.id')
            ->leftJoin('publishers', 'heroes.publisher_id', '=', 'publishers.id');

        $columnsStrings = [
            'name',
            'fullName',
            'height0',
            'height1',
            'weight0',
            'weight1',
            'eyeColor',
            'hairColor'

        ];

        $columnsInteger = [
            'strength',
            'speed',
            'durability',
            'power',
            'combat'
        ];

        $orderBy = 'heroes.name';

        foreach ($columnsStrings as $column) {
            if (request()->has($column)) {
                $query->where($column, request($column));
            }
        }

        foreach ($columnsInteger as $column) {
            if (request()->has($column) && is_numeric(request($column))) {
                $query->where($column, request($column));
            }
        }

        if ($request->has('race')) {
            $query->where('races.name', request('race'));
        }

        if ($request->has('publisher')) {
            $query->where('publishers.name', request('publisher'));
        }

        if ($request->has('orderBy')
            && (in_array(request('orderBy'), $columnsStrings)
                || in_array(request('orderBy'), $columnsInteger)
                || in_array(request('orderBy'),['race','publisher'])
            )) {
            $orderBy = request('orderBy');
        }


        if ($request->has('sort') && (request('sort') == 'asc' || request('sort') == 'desc')) {
            $query->orderBy($orderBy, request('sort', 'asc'));
        }

        $heroesPerPage = 10;
        if ($request->has('page') && is_numeric(request('page'))) {
            $page = $request->input('page', 1);
        } else {
            $page = 1;
        }

        $total = $query->count();

        $heroes = $query->offset(($page - 1) * $heroesPerPage)->limit($heroesPerPage)->get();

        $response = [
            'response' => 'success',
            'data' => $heroes,
            'total' => $total,
            'page' => $page,
            'last_page' => ceil($total / $heroesPerPage)
        ];

        return response()->json($response);
    }

    public function visual(Request $request)
    {
        $heroes = json_decode($this->getAll($request)->content())->data;
        return view('heroes')->with('heroes', $heroes);
    }
}
