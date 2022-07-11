<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\App\Write\UserWriteService;
use App\Services\Helpers\AjaxResponseNotification;
use Illuminate\Http\Request;

class AccessController extends Controller
{
    protected UserWriteService $userWriteService;
    public function __construct(UserWriteService $userWriteService)
    {
        $this->userWriteService = $userWriteService;
    }

    public function renew(User $user)
    {
        if ($this->userWriteService->renew($user)){
            return AjaxResponseNotification::success('Account renew completed', [], route('user.dashboard', ['user' => $user]));
        }
        return AjaxResponseNotification::error('Account not');
    }

    public function deactivate(User $user)
    {
        if ($this->userWriteService->deactivate($user)){
            return AjaxResponseNotification::success('Account successfully deactivated', ['reload' => true]);
        }
        return AjaxResponseNotification::error('Account not deactivated');
    }
}
