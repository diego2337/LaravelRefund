<?php

namespace Alvo\Domain\Repository\Table;

use Alvo\Domain\Exceptions\System\RepositoryException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class RepositoryAbstract
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * Specify Model class name
     *
     * @return string
     */
    abstract public function model();

    public function createModel()
    {
        return $this->makeModel();
    }

    public function makeModel()
    {
        $model = app()->make($this->model());

        if (!$model instanceof Model) {
            throw (new RepositoryException())->setParams(['model' => $this->model()]);
        }

        return $this->model = $model;
    }

    public function create(array $attributes = [])
    {
        $instance = $this->makeModel();

        $instance->fill($attributes);

        $instance->save();

        return $instance;
    }

    public function update($id, array $attributes = [])
    {
        $instance = $id instanceof Model ? $id : $this->find($id);

        if ($instance) {
            $instance->fill($attributes);

            $instance->save();
        }

        return $instance;
    }

    public function delete($id)
    {
        $instance = $id instanceof Model ? $id : $this->find($id);

        if ($instance) {
            $instance->delete();
        }

        return $instance;
    }

    public function find($id)
    {
        return $this->makeModel()::find($id);
    }

    public function query()
    {
        return $this->makeModel()::query();
    }

    public function findBy($key, $values): ?Model
    {
        return $this->createModel()->where($key, '=', $values)->first();
    }

    public function findAll(): Collection
    {
        return $this->createModel()->get();
    }

    public function all(): Collection
    {
        return $this->findAll();
    }

    public function findWhere(array $where): Collection
    {
        list($attribute, $operator, $value, $boolean) = array_pad($where, 4, null);
        return $this->createModel()->where($attribute, $operator, $value, $boolean)->get();
    }

    public function findWhereIn(array $where): Collection
    {
        list($attribute, $operator, $value, $boolean) = array_pad($where, 4, null);
        return $this->createModel()->whereIn($attribute, $operator, $value, $boolean)->get();
    }
}
