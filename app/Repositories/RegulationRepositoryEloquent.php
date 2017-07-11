<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\regulationRepository;
use App\Entities\Regulation;
use App\Validators\RegulationValidator;

/**
 * Class RegulationRepositoryEloquent
 * @package namespace App\Repositories;
 */
class RegulationRepositoryEloquent extends BaseRepository implements RegulationRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Regulation::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return RegulationValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
