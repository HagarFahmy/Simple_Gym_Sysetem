<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\TrainingPackagesDataTable;
use App\Http\Controllers\Controller;
use App\Models\TrainingPackage;
use Illuminate\Http\Request;

class TrainingPackagesController extends Controller
{
    protected string $module = 'training-packages';

    protected string $permissionGroup = 'trainingPackages';

    public function __construct(TrainingPackagesDataTable $modelDatatable)
    {
        $this->modelDatatable = $modelDatatable;
    }
    public function index(){
        $packages =TrainingPackage::get();
        return view('dashboard.trainingPackages.index', compact('packages'));
    }
    public function show($id)
    {
        $package = TrainingPackage::findOrFail($id);
        return view('dashboard.trainingPackages.show', compact('package'));
    }
    public function create(){
        return view('dashboard.trainingPackages.create');
    }
    public function store(Request $request){
        TrainingPackage::create([
            'name' => $request->name,
            'price' => $request->price,
            'sessions_number' => $request->sessions_number,
        ]);
        return redirect(route('dashboard.training-packages.index'));
    }
    public function edit($id){
        $package = TrainingPackage::findOrFail($id);
        return view('dashboard.trainingPackages.edit', compact('package'));
    }
    public function update(Request $request, $id){
        TrainingPackage::findOrFail($id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'sessions_number' => $request->sessions_number,
        ]);
        return redirect(route('dashboard.training-packages.show', $id));
    }
    public function destroy($id)
    {
        TrainingPackage::findOrFail($id)->delete();
        return back();
    }
}
