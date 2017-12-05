<?php
/**
 * Created by PhpStorm.
 * User: grishi
 * Date: 15.10.2017
 * Time: 15:05
 */
declare(strict_types=1);

namespace Nova\CorpSite\Api;

use Illuminate\Database\Eloquent\Model;
use Nova\Exceptions\IncorrectInputDataException;

/**
 * Class ApiRepository
 *
 * @package Nova\CorpSite\Api
 */
class ApiRepository implements RepositoryApiInterface
{
    protected $model;

    /**
     * RepositoryApiInterface constructor.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     */
    public function __construct(Model $model)
    {
        $this->setModel($model);
    }

    /**
     * @param array $columns
     *
     * @return mixed
     * @throws \Nova\Exceptions\IncorrectInputDataException
     */
    public function getAll(array $columns = ['*'])
    {
        if (0 === count($columns)) {
            throw new IncorrectInputDataException('Input array not must be empty');
        }

        /** @var Model */
        return $this->model::where(self::ACTIVE_FILTER)->get($columns)->toArray();
    }

    /**
     * @param int   $paginateCount
     * @param array $columns
     *
     * @return mixed
     * @throws \Nova\Exceptions\IncorrectInputDataException
     */
    public function paginate(int $paginateCount = 50, array $columns = ['*'])
    {
        if (0 === count($columns)) {
            throw new IncorrectInputDataException('Input array not must be empty');
        }
        /** @var Model */
        return $this->model->select($columns)->where(self::ACTIVE_FILTER)->paginate($paginateCount);
    }

    /**
     * @param array $attributes
     *
     * @return mixed
     */
    public function create(array $attributes)
    {
        // TODO: Implement create() method.
    }

    /**
     * @param        $value
     * @param string $columnName
     *
     * @return mixed
     */
    public function findOne($value, string $columnName)
    {
        // TODO: Implement findOne() method.
    }

    /**
     * @param int $id
     *
     * @return mixed
     */
    public function getById(int $id)
    {
        // TODO: Implement getById() method.
    }

    /**
     * @param int $id
     *
     * @return mixed
     */
    public function delete(int $id)
    {
        // TODO: Implement delete() method.
    }

    /**
     * @param int $id
     *
     * @return mixed
     */
    public function update(int $id)
    {
        // TODO: Implement update() method.
    }
    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     *
     * @return ApiRepository
     */
    protected function setModel($model): ApiRepository
    {
        $this->model = $model;

        return $this;
    }
}
