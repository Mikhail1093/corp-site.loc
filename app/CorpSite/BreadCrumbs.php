<?php
declare(strict_types=1);

namespace Nova\CorpSite;

/**
 * Class OrdersReports
 *
 * @package Nova\CorpSite
 */
class BreadCrumbs
{
    /**
     * @var array
     */
    protected $breadCrumbs;

    /**
     * @return mixed
     */
    public function getBreadCrumbs()
    {
        return $this->breadCrumbs;
    }

    /**
     * @param mixed $breadCrumbs
     *
     * @return BreadCrumbs
     */
    public function setBreadCrumbs($breadCrumbs): BreadCrumbs
    {
        $this->breadCrumbs = $breadCrumbs;

        return $this;
    }
}
