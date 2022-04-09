<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\TrainingSessionDataTable;
use App\Http\Requests\TrainingSessionRequest;
use App\Models\Coach;
use App\Models\Gym;
use App\Models\TrainingSession;

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
        $gyms= Gym::all()->pluck('name','id');
        $coaches = Coach::all()->pluck('name', 'id');
        return view('dashboard.trainingSession.create', ['coaches' => $coaches,'gyms'=>$gyms]);
    }


    public function store(TrainingSessionRequest $request)
    {
        $trainingSession= TrainingSession::create($request->validated());
        $trainingSession->coaches()->attach($request->coach_id);
        return to_route('dashboard.training-sessions.index');
    }


    public function edit(TrainingSession $trainingSession)
    {
        $arr=TrainingSession::doesntHave('users')->get();
        $gyms = Gym::all()->pluck('name', 'id');
        return view('dashboard.trainingSession.edit', ['gyms' => $gyms, 'trainingSession' => $trainingSession,'arr'=>$arr]);
    }


    public function update(TrainingSessionRequest $request, TrainingSession $trainingSession)
    {
        $trainingSession->update($request->validated());
        return to_route('dashboard.training-sessions.index');
    }

    public function destroy(TrainingSession $trainingSession)
    {
        $arr=TrainingSession::doesntHave('users')->get();
        if ($arr->contains('id',$trainingSession->id))
        $trainingSession->delete();
        return to_route('dashboard.training-sessions.index');
    }
}
