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

    /**
     * Добавить в конец цепочки навигации элемент
     *
     * @param string $elementChain
     *
     * @param string $link
     *
     * @return array
     */
    public function addInChain(string $elementChain, string $link = '#'): array
    {
        $this->breadCrumbs[] = [
            'name' => $elementChain,
            'path' => $link
        ];

        return $this->breadCrumbs;
    }
}
