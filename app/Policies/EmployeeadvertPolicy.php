<?php

namespace App\Policies;

use App\Models\Employeeadvert;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmployeeadvertPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */

    public function update( User $user, Employeeadvert $advert )
    {
        return (
            $advert->deleted_at == null && (
                $user->isAdmin() ||
                $user->id == $advert->profile->user_id
            )
        )
            ? Response::allow()
            : Response::deny('Operacja zabroniona. Możesz edytować tylko i wyłącznie swoje ogłoszenia!');
    }

    public function delete( User $user, Employeeadvert $advert )
    {
        return (
            $advert->deleted_at == null && (
                $user->isAdmin() ||
                $user->id == $advert->profile->user_id
            )
        )
            ? Response::allow()
            : Response::deny('Operacja zabroniona. Możesz usuwać tylko i wyłącznie swoje ogłoszenia!');
    }
}
