<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\user_types_userRepository;
use App\Entities\UserTypesUser;
use App\Validators\UserTypesUserValidator;

/**
 * Class UserTypesUserRepositoryEloquent
 * @package namespace App\Repositories;
 */
class UserTypesUserRepositoryEloquent extends BaseRepository implements UserTypesUserRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UserTypesUser::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return UserTypesUserValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
