<?php

namespace AkkiIo\LaravelGoogleAnalytics\Traits;

use Google\Analytics\Data\V1beta\OrderBy\DimensionOrderBy;
use Google\Analytics\Data\V1beta\OrderBy;

trait OrderByDimensionTrait
{
    /**
     * Set the order by dimension.
     *
     * @param string $name
     * @param string $order
     * @return $this
     */
    public function orderByDimension(string $name, string $order = 'ASC'): self
    {
        $dimensionOrderBy = (new DimensionOrderBy())
            ->setDimensionName($name);

        $this->orderBys[] = (new OrderBy())
            ->setDesc($order !== 'ASC')
            ->setDimension($dimensionOrderBy);

        return $this;
    }

    /**
     * Set the desc order by dimension.
     *
     * @param string $name
     * @return $this
     */
    public function orderByDimensionDesc(string $name): self
    {
        return $this->orderByDimension($name, 'DESC');
    }
}
