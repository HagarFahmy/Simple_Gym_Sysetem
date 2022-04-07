<?php

namespace App\Http\Controllers\Backend;
use App\DataTables\CitiesDataTable;
use App\Http\Requests\CityRequest;
use App\Models\City;

class CitiesController extends CommonController
{
    protected string $module = 'cities';
    protected string $permissionGroup = 'city';

    public function __construct(CitiesDataTable $modelDatatable)
    {
        $this->modelDatatable = $modelDatatable;
    }

    public function create()
    {
        return view('dashboard.cities.create');
    }

    public function show()
    {
        return view('dashboard.cities.create');
    }

    public function store(CityRequest $request)
    {
        City::create($request->validated());
        return redirect()->route('dashboard.cities.index');
    }

    public function edit(City $city)
    {
        return view('dashboard.cities.edit', compact('city'));
    }

    public function update(CityRequest $request, City $city)
    {
        $city->update($request->validated());
        return redirect()->route('dashboard.cities.index');
    }

    public function destroy(City $city)
    {
        if($city->cityManager!=null)
        $city->cityManager->update(['status' => false]);
        $city->delete();
        return redirect()->route('dashboard.cities.index');
    }
}
