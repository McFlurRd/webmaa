<?php

namespace App\Policies;

use App\User;
use App\Account;
use Illuminate\Auth\Access\HandlesAuthorization;

class AccountPolicy
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

    public function update(User $user, Account $account)
    {
        return $user->id === $account->user_id;
    }

    public function delete(User $user, Account $account)
    {
        return $user->id === $account->user_id;
    }
}
