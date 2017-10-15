<?php
/**
 * Created by PhpStorm.
 * User: grishi
 * Date: 15.10.2017
 * Time: 15:05
 */
declare(strict_types = 1);

namespace Nova\CorpSite\Api;

use Illuminate\Database\Eloquent\Model;

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
     */
    public function getAll(array $columns)
    {
        // TODO: Implement getAll() method.
        //dump($this->model::where('id', 1)->get()->toArray());
        //dump($this->model->get()->toArray());
    }

    /**
     * @param int   $paginateCount
     * @param array $columns
     *
     * @return mixed
     */
    public function paginate(int $paginateCount = 50, array $columns = [])
    {
        // TODO: Implement paginate() method.
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
    protected function setModel($model)
    {
        $this->model = $model;

        return $this;
    }
}
