<?php

namespace AkkiIo\LaravelGoogleAnalytics\Traits;

trait RowOperationTrait
{
    public ?bool $keepEmptyRows = null;

    public ?int $limit = null;

    public ?int $offset = null;

    /**
     * Set the keep empty rows.
     * If false or unspecified, each row with all metrics equal to 0 will not be returned.
     * If true, these rows will be returned if they are not separately removed by a filter.
     *
     * @param bool $keepEmptyRows
     * @return $this
     */
    public function keepEmptyRows(bool $keepEmptyRows = false): self
    {
        $this->keepEmptyRows = $keepEmptyRows;

        return $this;
    }

    /**
     * Set the limit.
     *
     * @param int|null $limit
     * @return $this
     */
    public function limit(int $limit = null): self
    {
        $this->limit = $limit;

        return $this;
    }

    /**
     * Set the offset.
     *
     * @param int|null $offset
     * @return $this
     */
    public function offset(int $offset = null): self
    {
        $this->offset = $offset;

        return $this;
    }
}
