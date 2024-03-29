<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

/**
 *  Class App\Repositories
 *
 *  @package App\Repositories
 *
 *  Репозиторий работы с сущностью
 *  Может выдавать наборы данных.
 *  Не можетсоздавать/изменять сущности
 */
abstract class CoreRepository
{
    /**
     * @var Model
     */
    protected $model;
    /**
     * CoreRepository constructor.
     */
    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }
    /**
     * @return mixed
     */
    abstract protected function getModelClass();

    /**
     * @return Model
     */
    public function startConditions()
    {
        return clone $this->model;
    }
}