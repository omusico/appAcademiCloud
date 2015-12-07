<?php

namespace App\Repositories\Criteria\Config;

use Bosnadev\Repositories\Criteria\Criteria;
use Bosnadev\Repositories\Contracts\RepositoryInterface as Repository;

class UIFondosActivos extends Criteria {

    public function apply($model, Repository $repository)
    {
        $query = $model->where('activo', 1)->orderBy('denominacion');
        return $query;
    }
}