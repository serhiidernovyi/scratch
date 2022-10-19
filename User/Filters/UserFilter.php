<?php

declare(strict_types=1);

namespace User\Filters;

use App\Http\Filter\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class UserFilter extends AbstractFilter
{
    public const NAME = 'name';
    public const SURNAME = 'surname';
    public const NAME_SORT = 'name_sort';
    public const SURNAME_SORT = 'surname_sort';
    public const DELETED_SEARCH = 'deleted_search';


    protected function getCallbacks(): array
    {
        return [
            self::NAME => [$this, 'name'],
            self::SURNAME => [$this, 'surname'],
            self::NAME_SORT => [$this, 'nameSort'],
            self::SURNAME_SORT => [$this, 'surnameSort'],
            self::DELETED_SEARCH => [$this, 'deletedSearch'],
        ];
    }

    public function name(Builder $builder, $value): void
    {
        $builder->where('name', 'like', "%$value%");
    }

    public function surname(Builder $builder, $value): void
    {
        $builder->where('surname', 'like', "%$value%");
    }

    public function nameSort(Builder $builder, $value): void
    {
        $builder->orderBy('name', $value);
    }

    public function surnameSort(Builder $builder, $value): void
    {
        $builder->orderBy('surname', $value);
    }

    public function deletedSearch(Builder $builder): void
    {
        $builder->onlyTrashed();
    }
}
