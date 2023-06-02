<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\EditRequest;
use App\Models\Admin;
use App\Models\User;
use App\Repositories\ProfileRepository;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProfileController extends Controller
{
	protected $profileRepository;

    public function __construct(ProfileRepository $profileRepository)
    {
        $this->profileRepository = $profileRepository;
    }
   
    public function edit(User $profile)
    {
        return view('Profile.edit',['model'=> $profile]);
    }

    /**
     * Method update
     *
     * @param \App\Http\Requests\Question\EditRequest $request
     * @param \App\Models\Question $question
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function update(EditRequest $request, User $profile)
    {
        $this->profileRepository->update($request->all(), $profile);

        return redirect()->route('profile.edit',auth()->user()->id)->with('success', "Profile updated successfully!");
    }
}
