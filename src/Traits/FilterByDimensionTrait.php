<?php

namespace AkkiIo\LaravelGoogleAnalytics\Traits;

use Google\Analytics\Data\V1beta\Filter;
use Google\Analytics\Data\V1beta\Filter\InListFilter;
use Google\Analytics\Data\V1beta\Filter\StringFilter;
use Google\Analytics\Data\V1beta\FilterExpression;
use Google\Analytics\Data\V1beta\FilterExpressionList;

trait FilterByDimensionTrait
{
    public ?FilterExpression $dimensionFilter = null;

    /**
     * Apply where dimension filter.
     *
     * @param  string  $name
     * @param  int  $matchType
     * @param  string|int  $value
     * @param  bool  $caseSensitive
     * @return $this
     */
    public function whereDimension(string $name, int $matchType, $value, bool $caseSensitive = false): self
    {
        $stringFilter = (new StringFilter())->setCaseSensitive($caseSensitive)
            ->setMatchType($matchType)
            ->setValue($value);

        $filter = (new Filter())->setStringFilter($stringFilter)
            ->setFieldName($name);

        $this->dimensionFilter = (new FilterExpression())
            ->setFilter($filter);

        return $this;
    }

    /**
     * Apply whereIn dimension filter.
     *
     * @param  string  $name
     * @param  array  $values
     * @param  bool  $caseSensitive
     * @return $this
     */
    public function whereDimensionIn(string $name, array $values, bool $caseSensitive = false): self
    {
        $inListFilter = (new InListFilter())->setCaseSensitive($caseSensitive)
            ->setValues($values);

        $filter = (new Filter())->setInListFilter($inListFilter)
            ->setFieldName($name);

        $this->dimensionFilter = (new FilterExpression())
            ->setFilter($filter);

        return $this;
    }

    /**
     * Apply where dimension filter using 'and_group'.
     *
     * @param  array  $dimensions
     * @return $this
     */
    public function whereAndGroupDimensions($dimensions): self
    {
        $this->dimensionFilter = (new FilterExpression())->setAndGroup(
            (new FilterExpressionList)
                ->setExpressions(
                    $this->createDimensionGroup($dimensions)
                )
        );

        return $this;
    }

    /**
     * Apply where dimension filter using 'or_group'.
     *
     * @param  array  $dimensions
     * @return $this
     */
    public function whereOrGroupDimensions($dimensions): self
    {
        $this->dimensionFilter = (new FilterExpression())->setOrGroup(
            (new FilterExpressionList)
                ->setExpressions(
                    $this->createDimensionGroup($dimensions)
                )
        );

        return $this;
    }

    /**
     * Create an array of dimension filters.
     *
     * @param  array  $dimensions
     * @return void
     */
    protected function createDimensionGroup($dimensions): array
    {
        $filterExpressionList = [];

        foreach ($dimensions as $dimension) {
            $stringFilter = (new StringFilter())->setCaseSensitive($dimension[3] ?? false)
                ->setMatchType($dimension[1])
                ->setValue($dimension[2]);

            $filter = (new Filter())->setStringFilter($stringFilter)->setFieldName($dimension[0]);

            $filterExpressionList[] = (new FilterExpression())->setFilter($filter);
        }

        return $filterExpressionList;
    }
}
