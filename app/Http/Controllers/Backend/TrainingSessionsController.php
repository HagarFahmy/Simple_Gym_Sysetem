<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\TrainingSessionDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\TrainingSessionRequest;
use App\Models\Gym;
use App\Models\TrainingSession;
use Illuminate\Http\Request;

class TrainingSessionsController extends CommonController
{
    protected string $module = 'training-sessions';

    protected string $permissionGroup = 'trainingSession';

    public function __construct(TrainingSessionDataTable $modelDatatable)
    {
        $this->modelDatatable = $modelDatatable;
    }

    public function create()
    {
        $gyms=Gym::all()->pluck('name','id');
       return view('dashboard.trainingSession.create',['gyms'=>$gyms]);
    }


    public function store(TrainingSessionRequest $request)
    {
       TrainingSession::create($request->validated());
       return to_route('dashboard.training-sessions.index');
    }


    public function edit(TrainingSession $trainingSession)
    {
        $gyms=Gym::all()->pluck('name','id');
       return view('dashboard.trainingSession.edit',['gyms'=>$gyms,'trainingSession'=>$trainingSession]);
    }


    public function update(TrainingSessionRequest $request, TrainingSession $trainingSession)
    {
        $trainingSession->update($request->validated());
        return to_route('dashboard.training-sessions.index');
    }
    
    public function destroy(TrainingSession $trainingSession)
    {
        $trainingSession->delete();
        return to_route('dashboard.training-sessions.index');
        
    }
}
