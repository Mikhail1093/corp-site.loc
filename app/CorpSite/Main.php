<?php
declare(strict_types = 1);

namespace Nova\CorpSite;

/**
 * Class Main
 *
 * @package Nova\CorpSite
 */
class Main
{
    /**
     * Main constructor.
     */
    public function __construct()
    {
        dump($this->getAll());
    }

    /**
     * @return mixed
     */
    public function getAll(): string
    {
        return __METHOD__;
    }

    /**
     * @return string
     */
    public static function getStatic(): string
    {
        return __METHOD__;
    }
}
