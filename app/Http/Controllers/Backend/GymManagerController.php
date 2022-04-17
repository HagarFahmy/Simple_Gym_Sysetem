<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\GymManagersDataTable;
use App\Http\Requests\GymManagerRequest;
use App\Http\Traits\ImageTrait;
use App\Models\Admin;
use App\Models\Gym;
use Illuminate\Support\Str;


class GymManagerController extends CommonController
{
    use ImageTrait;
    protected string $module = 'gym-managers';

    protected string $permissionGroup = 'GymManagers';

    public function __construct(GymManagersDataTable $modelDatatable)
    {
        $this->modelDatatable = $modelDatatable;
    }

    
   public function create()
   {
        $gyms = Gym::all()->pluck('name', 'id');
       return view('dashboard.gymManager.create',['gyms'=>$gyms]);
   }

   public function store(GymManagerRequest $request)
   {
       $data = $request->except(['image']);
       $data['image'] = $this->storeImage($request->image, 'admins');
       $admin = Admin::create($data);
       $admin->assignRole('Gym Manager');
       return to_route('dashboard.gym-managers.index');
   }

   public function show(Admin $gymManager)
   {
       return view('dashboard.gymManager.show',['gymManager'=>$gymManager]);
   }

   public function edit(Admin $gymManager )
   {
       $gyms = Gym::all()->pluck('name', 'id');
       return view('dashboard.gymManager.edit',['gymManager'=>$gymManager, 'gyms' => $gyms]);
   }

   public function update(GymManagerRequest $request, Admin $gymManager)
   {
       $data = $request->except('image');
       $data['image'] = $this->updateImage($request->image, $gymManager->image,'admins');
       $gymManager->update($data);
       return to_route('dashboard.gym-managers.index');
   }

   public function destroy(Admin $gymManager)
   {
       $this->deleteImage($gymManager->image, 'admins');
       $gymManager->delete();
       return response()->json(['status' => 0]);

   }


}
