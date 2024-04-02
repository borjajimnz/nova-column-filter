<?php

namespace philperusse\Filters;

use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;
use Laravel\Nova\Http\Requests\NovaRequest;

class ColumnFilter extends Filter
{
    public $component = 'column-filter-selector';

    public function apply(NovaRequest $request, $query, $value)
    {
        $args = collect($value)->values()->filter();
        return $args->count() !== 3 ?
            $query :
            $query->where(...$args->all());
    }
    
    public function columns(): array
    {
        return [
            //bud l
        ];
    }

    public function operators(): array
    {
        return [
            '=' => '&equals;',
            '>' => '&gt;',
            '>=' => '&ge;',
            '<' => '&lt;',
            '<=' => '&le;',
        ];
    }
    
    public function options(NovaRequest $request): array
    {
        return [
            'columns' => $this->columns(),
            'operators' => $this->operators(),
            'data' => '',
        ];
    }
}
