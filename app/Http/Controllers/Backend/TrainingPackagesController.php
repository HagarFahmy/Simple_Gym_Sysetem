<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TrainingPackage;

class TrainingPackagesController extends Controller
{
    public function index(){
        $packages =TrainingPackage::get();
        return view('dashboard.trainingPackages.index', compact('packages'));
    }
}
