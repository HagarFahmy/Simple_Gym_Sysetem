<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\GymsDataTable;
use App\Http\Requests\GymRequest;
use App\Http\Traits\ImageTrait;
use App\Models\Admin;
use App\Models\City;
use App\Models\Gym;
use Illuminate\Http\Request;

class GymsController extends CommonController
{
    use ImageTrait;
    protected string $module = 'gyms';

    protected string $permissionGroup = 'gyms';

    public function __construct(GymsDataTable $modelDatatable)
    {
        $this->modelDatatable = $modelDatatable;
    }

    public function create()
    {
        $cityManagers=Admin::role('City Manager')->get();
        return view ('dashboard.gyms.create',['cityManagers'=>$cityManagers]);
       
    }
    public function store(GymRequest $request)
    {
        $data = $request->except(['cover_image']);
        $data['cover_image'] = $this->storeImage($request->cover_image, 'gyms');
        $city_manager= Admin::where('id',$data['city_manager_id'])->first();
        $data['city_id']=$city_manager->city_id;
       Gym::create($data);
       return to_route('dashboard.gyms.index');
    }

   
    public function show(Gym $gym)
    {
        $city_manager= Admin::where('id',$gym->city_manager_id)->first();
        return view('dashboard.gyms.show',['gym'=>$gym,'city_manager'=>$city_manager]);
    }

    public function edit(Gym $gym)
    {
        $cityManagers=Admin::role('City Manager')->pluck('name','id');
        return view ('dashboard.gyms.edit',['gym'=>$gym,'citymanagers'=>$cityManagers]);
    }

   
    public function update(GymRequest $request, Gym $gym)
    {
        $data = $request->except('cover_image');
        $data['cover_image'] = $this->updateImage($request->cover_image, $gym->cover_image,'gyms');
        $gym->update($data);
        return to_route('dashboard.gyms.index');
    }

    public function destroy(Gym $gym)
    {
        $gym->delete();
        return to_route('dashboard.gyms.index');
    }
}
