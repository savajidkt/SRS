<?php

namespace App\Http\Controllers\Admin\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\CreateRequest;
use App\Repositories\ProjectRepository;
use Illuminate\Http\JsonResponse;

class ProjectController extends Controller
{
    /** \App\Repository\ProjectRepository $projectRepository */
    protected $projectRepository;

    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

     /**
     * Method update
     *
     * @param \App\Http\Requests\Question\EditRequest $request
     * @param \App\Models\Question $question
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function update(EditRequest $request, Admin $admin)
    {
        dd('test');
        $this->projectRepository->update($request->all(), $admin);

        return redirect()->route('profile')->with('success', "Profile updated successfully!");
    }
}
