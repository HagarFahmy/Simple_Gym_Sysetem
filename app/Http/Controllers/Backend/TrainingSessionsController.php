<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\TrainingSessionDataTable;
use App\Http\Controllers\Controller;
use App\Models\TrainingSession;
use Illuminate\Http\Request;

class TrainingSessionsController extends Controller
{
    protected string $module = 'trainin-session';

    protected string $permissionGroup = 'TrainingSession';

    public function __construct(TrainingSessionDataTable $modelDatatable)
    {
        $this->modelDatatable = $modelDatatable;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TrainingSession  $trainingSession
     * @return \Illuminate\Http\Response
     */
    public function show(TrainingSession $trainingSession)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TrainingSession  $trainingSession
     * @return \Illuminate\Http\Response
     */
    public function edit(TrainingSession $trainingSession)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TrainingSession  $trainingSession
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrainingSession $trainingSession)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TrainingSession  $trainingSession
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrainingSession $trainingSession)
    {
        //
    }
}
