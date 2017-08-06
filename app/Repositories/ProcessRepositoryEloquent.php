<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\processRepository;
use App\Entities\Process;
use App\Validators\ProcessValidator;

/**
 * Class ProcessRepositoryEloquent
 * @package namespace App\Repositories;
 */
class ProcessRepositoryEloquent extends BaseRepository implements ProcessRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Process::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ProcessValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
