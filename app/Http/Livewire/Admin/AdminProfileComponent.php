<?php

namespace App\Http\Livewire\Admin;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminProfileComponent extends Component
{
    public function render()
    {
        $userProfile = Profile::where('user_id',Auth::user()->id)->first();
        if(!$userProfile)
        {
            $profile = new Profile();
            $profile->user_id = Auth::user()->id;
            $profile->save();
        }
        $user  = User::find(Auth::user()->id);
        return view('livewire.admin.admin-profile-component',['user'=>$user]);
    }
}
