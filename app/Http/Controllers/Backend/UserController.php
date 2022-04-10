<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\UsersDataTable;
use App\Http\Requests\UserRequest;
use App\Http\Traits\ImageTrait;
use App\Models\User;
use App\Models\Gym;
use Illuminate\Support\Str;


class UserController extends CommonController
{
    use ImageTrait;
    protected string $module = 'users';

    protected string $permissionGroup = 'Users';

    public function __construct(UsersDataTable $modelDatatable)
    {
        $this->modelDatatable = $modelDatatable;
    }

   public function create()
   {
        $gyms = Gym::pluck('name', 'id');
       return view('dashboard.users.create',['gyms'=>$gyms]);
   }

   public function store(UserRequest $request)
   {
       $data = $request->except(['profile_image']);
       $data['profile_image'] = $this->storeImage($request->profile_image, 'users');
       $user = User::create($data);
       return to_route('dashboard.users.index');
   }

   public function show(User $user)
   {
       return view('dashboard.users.show',['user'=>$user]);
   }

   public function edit(User $user)
   {
       $gyms = Gym::pluck('name', 'id');
       return view('dashboard.users.edit',['user'=>$user, 'gyms' => $gyms]);
   }

   public function update(UserRequest $request, User $user)
   {
       $data = $request->except('profile_image');
       $data['profile_image'] = $this->updateImage($request->profile_image, $user->profile_image,'users');
       $user->update($data);
       return to_route('dashboard.users.index');
   }

   public function destroy(User $user)
   {
       $this->deleteImage($user->profile_image, 'users');
       $user->delete();
       return to_route('dashboard.users.index');

   }


}
