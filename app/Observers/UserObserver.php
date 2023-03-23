<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserObserver
{
    /**
     * Handle the User "saving" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function saving(User $user)
    {
        $changes = $user->getDirty();
        $changesPassword = data_get($changes, 'password');

        if ($changesPassword) {
            $user->password = Hash::make($changesPassword);
        }

        return $user;
    }
}
