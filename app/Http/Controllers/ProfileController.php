<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function show(){
        $user=auth()->user();
        return view('profile.edit',["user" => $user]);
    }

    public function update(Request $request){
        $valide=$request->validate([
            'name' => 'required',
            'email' => 'required',
            'specialite' => 'required',
            'bio' => 'required',
            'lieu' => 'required',
            'password' => ['nullable', Password::defaults()],
            'ancienPassword' => ['required_with:password'],
            'photo'=>['nullable','url']
            ]);
            
            $user=auth()->user();
            
            // $pw=User::where('id',auth()->user()->id)->where('password',$request->password);
            // if (!Hash::check($request->ancienPassword,$user->password)) {
            //     return back()->withErrors(['password'=>'le mot de pass est incorrect']);
            // }
            // $user->update([

            if (!empty($request->password)) {
                if (!Hash::check($request->ancienPassword,$user->password)) {
                return back()->withErrors(['password'=>'le mot de pass est incorrect']);
            }
                $user->password=Hash::make($request->password);
            }
            $user->name=$request->name;
            $user->email=$request->email;
            $user->specialite=$request->specialite;
            $user->bio=$request->bio;
            $user->lieu=$request->lieu;
            $user->photo=$request->photo;
            
            // ]);

        $user->save();
        return redirect()->route('profile.edit');

    }
    // public function edit(Request $request): View
    // {
    //     return view('profile.edit', [
    //         'user' => $request->user(),
    //     ]);
    // }

    /**
     * Update the user's profile information.
     */
    // public function update(ProfileUpdateRequest $request): RedirectResponse
    // {
    //     $request->user()->fill($request->validated());

    //     if ($request->user()->isDirty('email')) {
    //         $request->user()->email_verified_at = null;
    //     }

    //     $request->user()->save();

    //     return Redirect::route('profile.edit')->with('status', 'profile-updated');
    // }

    /**
     * Delete the user's account.
     */
    // public function destroy(Request $request): RedirectResponse
    // {
    //     $request->validateWithBag('userDeletion', [
    //         'password' => ['required', 'current_password'],
    //     ]);

    //     $user = $request->user();

    //     Auth::logout();

    //     $user->delete();

    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();

    //     return Redirect::to('/');
    // }
    // upload img
}
