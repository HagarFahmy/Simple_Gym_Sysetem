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
    public function remainingTrainingSessionsOfTheUser()
    {
        // Setting the id of the login user.
        $userId = Auth::id();
        // Initializing variable.
        $totalTrainingSessions = 0;
        // Getting all training packages that user already bought.
        $packages = Revenue::with('training_packages')->where('user_id', $userId)->get();
        // If the user have packages.
        if ($packages != null) {
            foreach ($packages as $package) {
                // Fetching all total sessions count by this user.
                $totalTrainingSessions += $package->training_packages[0]->sessions_number;
            }
            // Fetching all the user attendance
            $attendedSessions = Attendance::where('user_id', $userId)->count();
            $remainingTrainingSessions = $totalTrainingSessions - $attendedSessions;
        } else {
            // If the user did'nt bought any packages yet.
            return "Buy training packages first to proceed.";
        }

        // Returning JSON object of the info.
        return response()->json([
            'Total training sessions' => $totalTrainingSessions,
            'Remaining training sessions' => $remainingTrainingSessions,
        ]);
    }

    public function getAttendanceHistoryOfTheUser()
    {
        // Get the user id who logged in to fetch his data.
        $userID = Auth::id();
        // Returning user attendance history.
        return AttendanceResource::collection(User::where('id', $userID)->first()->attendances_sessions);
    }
}
