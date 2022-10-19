<?php

namespace App\Http\OpenApi\Requests\Product;

/**
 * @OA\Schema(
 *     schema="filters_request",
 *     @OA\Property(
 *         property="type",
 *         type="string",
 *         enum={"ITEM","PURCHASE"},
 *     ),
 * )
 */
class FiltersRequestOA
{

}
