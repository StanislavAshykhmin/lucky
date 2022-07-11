<?php

namespace App\Services\App\Write;

use App\Dtos\Admin\UserFormDto;
use App\Models\User;
use App\Repositories\Write\UserWriteRepository;

final class UserWriteService
{
    protected UserWriteRepository $userWriteRepository;

    public function __construct(UserWriteRepository $userWriteRepository)
    {
        $this->userWriteRepository = $userWriteRepository;
    }

    public function create(UserFormDto $dto)
    {
        return $this->userWriteRepository->create($dto->all());
    }

    public function update(UserFormDto $dto, User $user)
    {
        return $this->userWriteRepository->update($dto->all(), $user);
    }

    public function renew(User $user): bool
    {
        return $user->makeNewAccess();
    }

    public function deactivate(User $user): bool
    {
        return $user->resetAccess();
    }

    public function delete(User $user): bool
    {
        return $this->userWriteRepository->delete($user);
    }
}
