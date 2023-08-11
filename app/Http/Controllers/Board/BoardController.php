<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Carbon\Carbon;
use App\Models\User;
use App\Models\District;
use App\Models\City;
use App\Models\Area;
use App\Models\FieldSurvey;
use App\Models\MeterReplacement;
use App\Models\OtherReplacement;

use App\Http\Requests\Board\UpdateProfileRequest;
use App\Http\Requests\Board\UpdatePasswordRequest;
class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users_count = User::where('type' , 1 )->count();
        $workers_count = User::where('type' , 2 )->count();
        $districts_count = District::count();
        $cities_count = City::count();
        $areas_count = Area::count();

        $field_survey_count = FieldSurvey::whereDate('created_at' , Carbon::today() )->count();
        $meter_replacements_count = MeterReplacement::whereDate('created_at' , Carbon::today() )->count();
        $other_replacements_count = OtherReplacement::whereDate('created_at' , Carbon::today() )->count();

        return view('board.index' , compact('workers_count' , 'meter_replacements_count' , 'other_replacements_count'  , 'field_survey_count' , 'cities_count' , 'areas_count' , 'districts_count' , 'users_count' ) );
    }

    public function logout() {
        Auth::logout();
        return redirect(url('/'));
    }


    public function show_profile() {

        $user = Auth::user();
        return view('board.profile' , compact('user'));
    }


    public function update_profile(UpdateProfileRequest $request)
    {
        $user = Auth::user();
        if ($request->hasFile('image')) {
            $user->image = basename($request->file('image')->store('users'));
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->back()->with('success' , 'تم تعديل الملف الشخصى بنجاح' );
    }


    public function show_password() {
        return view('board.password');
    }


    public function update_password(UpdatePasswordRequest $request)
    {
        if (!Hash::check($request->current_password, Auth::user()->password )) {
            return back()->with('error' , 'كلمه المرور الحالهي غير صحيحه لا يمكن تعديل كلمه المرور' );
        }

        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();
        return back()->with('success' , 'تم تعديل كلمه المرور بنجاح' );
    }




}
