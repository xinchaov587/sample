<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    // 用户更新时权限验证
    public function update(User $currentUser, User $user)
    {
        return $currentUser->id === $user->id;
    }

    // 管理员删除权限限制(限制不能删除自身)
    public function destroy(User $currentUser, User $user)
    {
        // 验证自身必须是管理员 并且 删除的用户不是自己
        return $currentUser->is_admin && $currentUser->id !== $user->id;
    }
}
