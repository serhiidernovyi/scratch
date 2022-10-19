<?php

namespace App\Http\OpenApi\Responses\Report;

/**
 * @OA\Response(
 *     response="report_sales_items_response",
 *     description="List of sales items",
 *     @OA\JsonContent(
 *         allOf={
 *             @OA\Schema(
 *                 @OA\Property(
 *                     property="data",
 *                     type="array",
 *                     @OA\Items(ref="#/components/schemas/report_sales_items_object"),
 *                 ),
 *             ),
 *             @OA\Schema(ref="#/components/schemas/links"),
 *             @OA\Schema(ref="#/components/schemas/meta"),
 *         }
 *     ),
 * )
 */
class ReportSalesItemsResponseOA
{

}
