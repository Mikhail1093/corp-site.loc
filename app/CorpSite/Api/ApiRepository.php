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
use Nova\Http\Controllers\CorpSite\PortfolioController;

/**
 * Class ApiRepository
 *
 * @package Nova\CorpSite\Api
 */
class ApiRepository implements RepositoryApiInterface
{
    /**
     * @var Model
     */
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
        return $this->model->where(self::ACTIVE_FILTER)->get($columns)->toArray();
    }

    /**
     * @param int   $paginateCount
     * @param array $columns
     *
     * @return mixed
     * @throws \InvalidArgumentException
     * @throws \Nova\Exceptions\IncorrectInputDataException
     */
    public function paginate(int $paginateCount = 50, array $columns = ['*'])
    {
        if (0 === \count($columns)) {
            throw new IncorrectInputDataException('Input array not must be empty');
        }

        /** @var Model */
        return $this->model->select($columns)->where(self::ACTIVE_FILTER)->paginate($paginateCount);
    }

    /**
     * @param array $attributes
     *
     * @return mixed
     * @throws \Nova\Exceptions\IncorrectInputDataException
     */
    public function create(array $attributes)
    {
        if (0 === \count($attributes)) {
            throw new IncorrectInputDataException('Input array not must be empty');
        }

        return $this->model->create($attributes);
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
     * @return int
     */
    public function delete(int $id): int
    {
        return $this->model::destroy($id);
    }

    /**
     * @param int   $id
     *
     * @param array $columns
     *
     * type PUT
     * @return mixed
     */
    public function update(int $id, array $columns)
    {
        //todo проверка что массив не пуст
        //todo вырезать из массива id, есть он есть ?
        $this->model->where('id', $id)->update($columns);
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
