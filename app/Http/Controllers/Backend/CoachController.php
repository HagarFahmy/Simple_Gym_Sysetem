<?php

namespace App\Http\Controllers\Backend;
use App\DataTables\CoachesDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\CoachRequest;
use App\Models\Coach;
use App\Models\Gym;

class CoachController extends CommonController
{  protected string $module = 'coaches';

    protected string $permissionGroup = 'coaches';

    public function __construct(CoachesDataTable $modelDatatable)
    {
        $this->modelDatatable = $modelDatatable;
    }
    public function create()
    {
        $gyms= Gym::all()->pluck('name', 'id');
        return view('dashboard.coach.create',['gyms'=>$gyms]);
    }
    
    public function store(CoachRequest $request)
    {
         Coach::create($request->validated());
        return to_route('dashboard.coaches.index');
    }

    
    public function show(Coach $coach)
    {
       return view('dashboard.coach.show',['coach'=>$coach]);
    }

    public function edit(Coach $coach)
    {
        $gyms=Gym::all()->pluck('name','id');
        return view('dashboard.coach.edit',['coach'=>$coach,'gyms'=>$gyms]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CoachRequest $request,Coach $coach)
    {
        $coach->update($request->validated());
        return to_route('dashboard.coaches.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coach $coach)
    {
        $coach->delete();
        return to_route('dashboard.coaches.index');
    }
}
