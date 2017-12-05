<?php
declare(strict_types = 1);

namespace Nova\CorpSite\Api;

use Illuminate\Database\Eloquent\Model;

/**
 * Created by PhpStorm.
 * User: grishi
 * Date: 15.10.2017
 * Time: 15:00
 */
interface RepositoryApiInterface
{
    /**
     * @var array active filter for items
     */
    const ACTIVE_FILTER = ['active' => 1];
    /**
     * RepositoryApiInterface constructor.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     */
    public function __construct(Model $model);

    /**
     * @param array $columns
     *
     * @return mixed
     */
    public function getAll(array $columns);

    /**
     * @param int   $paginateCount
     * @param array $columns
     *
     * @return mixed
     */
    public function paginate(int $paginateCount = 50, array $columns = []);

    /**
     * @param array $attributes
     *
     * @return mixed
     */
    public function create(array $attributes);

    /**
     * @param        $value
     * @param string $columnName
     *
     * @return mixed
     */
    public function findOne($value, string $columnName);

    /**
     * @param int $id
     *
     * @return mixed
     */
    public function getById(int $id);

    /**
     * @param int $id
     *
     * @return mixed
     */
    public function delete(int $id);

    /**
     * @param int $id
     *
     * @return mixed
     */
    public function update(int $id);
}
