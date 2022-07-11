<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;
use App\Repositories\Read\UserReadRepository;
use App\Services\App\Write\UserWriteService;
use App\Services\Helpers\AjaxResponseNotification;
use App\Services\Helpers\RedirectResponseNotification;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected UserReadRepository $userReadRepository;
    protected UserWriteService $userWriteService;
    public function __construct(UserReadRepository $userReadRepository, UserWriteService $userWriteService)
    {
        $this->userReadRepository = $userReadRepository;
        $this->userWriteService = $userWriteService;
    }

    public function index()
    {
        return view('admin.user.index', ['users' => $this->userReadRepository->all()]);
    }

    public function show(User $user)
    {
        return view('admin.user.show', ['user' => $user->load('games')]);
    }

    public function create()
    {
        return view('admin.user.create');
    }


    public function store(StoreRequest $request)
    {
        if ($this->userWriteService->create($request->getDto())){
            return RedirectResponseNotification::successRoute('User successfully created.', 'admin.users.index');
        }
        return RedirectResponseNotification::errorBack('User not created.');
    }

    public function edit(User $user)
    {
        return view('admin.user.edit', ['user' => $user]);
    }

    public function update(UpdateRequest $request, User $user)
    {
        if ($this->userWriteService->update($request->getDto(), $user)){
            return RedirectResponseNotification::successRoute('User successfully updated.', 'admin.users.index');
        }
        return RedirectResponseNotification::errorBack('User not updated.');
    }

    public function destroy(User $user)
    {
        if ($this->userWriteService->delete($user)){
            return AjaxResponseNotification::success('User successfully deleted.');
        }
        return AjaxResponseNotification::error('User not deleted.');
    }
}
