<?php

namespace App\Policies;

use App\User;
use App\AccountType;
use Illuminate\Auth\Access\HandlesAuthorization;

class AccountTypePolicy
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

    // public function update(User $user, AccountType $accountType)
    // {
    //     return $user->id === $accountType->user_id;
    // }

    // public function delete(User $user, AccountType $accountType)
    // {
    //     return $user->id === $accountType->user_id;
    // }
}
