<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\solicitationRepository;
use App\Entities\Solicitation;
use App\Validators\SolicitationValidator;

/**
 * Class SolicitationRepositoryEloquent
 * @package namespace App\Repositories;
 */
class SolicitationRepositoryEloquent extends BaseRepository implements SolicitationRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Solicitation::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return SolicitationValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
