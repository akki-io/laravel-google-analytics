<?php

namespace AkkiIo\LaravelGoogleAnalytics\Traits;

use Google\Analytics\Data\V1beta\Dimension;

trait DimensionTrait
{
    /**
     * Set the dimension.
     *
     * @param string $name
     * @return $this
     */
    public function dimension(string $name): self
    {
        $this->dimensions[] = (new Dimension())
            ->setName($name);

        return $this;
    }

    /**
     * Set the dimensions.
     *
     * @param string ...$items
     * @return $this
     */
    public function dimensions(string ...$items): self
    {
        foreach ($items as $item) {
            $this->dimension($item);
        }

        return $this;
    }
}
