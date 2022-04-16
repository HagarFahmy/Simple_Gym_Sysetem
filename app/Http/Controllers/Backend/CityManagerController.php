<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\CityManagersDataTable;
use App\Http\Requests\CityManagerRequest;
use App\Http\Traits\ImageTrait;
use App\Models\Admin;
use App\Models\City;
use Illuminate\Support\Str;


class CityManagerController extends CommonController
{
    use ImageTrait;
    protected string $module = 'city-managers';

    protected string $permissionGroup = 'cityManagers';

    public function __construct(CityManagersDataTable $modelDatatable)
    {
        $this->modelDatatable = $modelDatatable;
    }

   public function create()
   {
        $cities = City::doesnthave('cityManager')->pluck('name', 'id');
       return view('dashboard.cityManager.create',['cities'=>$cities]);
   }

   public function store(CityManagerRequest $request)
   {
       $data = $request->except(['image']);
       $data['image'] = $this->storeImage($request->image, 'admins');
       $admin = Admin::create($data);
       $admin->assignRole('City Manager');
       return to_route('dashboard.city-managers.index');
   }

   public function show(Admin $cityManager)
   {
       return view('dashboard.cityManager.show',['cityManager'=>$cityManager]);
   }

   public function edit(Admin $cityManager )
   {
       $cities = City::doesnthave('cityManager')->pluck('name', 'id');
       return view('dashboard.cityManager.edit',['cityManager'=>$cityManager, 'cities' => $cities]);
   }

   public function update(CityManagerRequest $request, Admin $cityManager)
   {
       $data = $request->except('image');
       $data['image'] = $this->updateImage($request->image, $cityManager->image,'admins');
       $cityManager->update($data);
       return to_route('dashboard.city-managers.index');
   }

   public function destroy(Admin $cityManager)
   {
       $this->deleteImage($cityManager->image, 'admins');
       $cityManager->delete();
       return response()->json(['status' => 0]);

   }


}
