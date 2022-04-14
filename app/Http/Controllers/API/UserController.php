<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller as Controller;
use App\Http\Resources\AttendanceResource;
use Illuminate\Support\Facades\Auth;
use App\Models\Revenue;
use App\Models\User;
use App\Models\Attendance;



class UserController extends Controller
{
    public function remainingTrainingSessions(){

        // Setting the id of the login user
        $userId = Auth::id();
        // Initializing variable
        $totalTrainingSessions = 0;
        // Getting all training packages that user already bought
        $packages = Revenue::with('training_packages')->where('user_id', $userId)->get();
        // if he already has training packages
        if ($packages != null){
            foreach($packages as $package){
                // dd($package->package_id);
                $totalTrainingSessions += $package->training_packages[0]->sessions_number;
            }
            $attendedSessions = Attendance::where('user_id',$userId)->count();
            $remainingTrainingSessions = $totalTrainingSessions - $attendedSessions;
        }else {
            // The user did'nt bought packages yet
            return "Buy training packages first to proceed.";
        }

        // Json object of the info
      return response()->json([
          'Total training sessions' => $totalTrainingSessions,
          'Remaining training sessions' => $remainingTrainingSessions,
      ]);
    }

    public function getAttendanceHistory()
    {
        $userID = Auth::id();
        return AttendanceResource::collection(User::where('id', $userID)->first()->attendances_sessions);
    }
}
