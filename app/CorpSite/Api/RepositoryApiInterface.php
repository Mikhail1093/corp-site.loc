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
}
