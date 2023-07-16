<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Models\User;
use App\Models\Service;
use App\Models\Project;
use App\Models\Product;
use App\Models\Review;
use App\Models\Offer;

use App\Http\Requests\Board\UpdateProfileRequest;
use App\Http\Requests\Board\UpdatePasswordRequest;
class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products_count = Product::count();
        $services_count = Service::count();
        $projects_count = Project::count();
        $offers_count = Offer::count();
        return view('board.index' , compact('products_count' , 'offers_count' , 'projects_count' , 'services_count' ) );
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
