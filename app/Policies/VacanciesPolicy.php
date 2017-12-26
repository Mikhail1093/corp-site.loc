<?php

namespace Nova\Policies;

use Nova\Models\CorpSite\Vacancy;
use Nova\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class VacanciesPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the vacancy.
     *
     * @param  \Nova\User  $user
     * @param  \Nova\Vacancy  $vacancy
     * @return mixed
     */
    public function view(User $user, Vacancy $vacancy)
    {
        //
    }

    /**
     * Determine whether the user can create vacancies.
     *
     * @param  \Nova\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the vacancy.
     *
     * @param  \Nova\User  $user
     * @param  \Nova\Vacancy  $vacancy
     * @return mixed
     */
    public function update(User $user, Vacancy $vacancy)
    {
        //
    }

    /**
     * Determine whether the user can delete the vacancy.
     *
     * @param  \Nova\User  $user
     * @param  \Nova\Vacancy  $vacancy
     * @return mixed
     */
    public function delete(User $user, Vacancy $vacancy)
    {
        //
    }
}
