<?php

namespace App\Http\OpenApi\Schemas\Objects\Report;

/**
 * @OA\Schema(
 *     schema="sale_object",
 *     @OA\Property(
 *         property="id",
 *         type="int",
 *         description="sale id",
 *     ),
 *     @OA\Property(
 *         property="sold_date",
 *         type="date",
 *         description="Sold date",
 *     ),
 *     @OA\Property(
 *         property="price",
 *         type="number",
 *         description="Price",
 *     ),
 *     @OA\Property(
 *         property="vat",
 *         type="number",
 *         description="VAT",
 *     ),
 *     @OA\Property(
 *         property="total_price",
 *         type="number",
 *         description="Total sales price",
 *     ),
 *     @OA\Property(
 *         property="buyer",
 *         description="Buyer information",
 *         ref="#/components/schemas/buyer_object",
 *     ),
 *     @OA\Property(
 *         property="sales_items",
 *         description="Sales items information",
 *         ref="#/components/schemas/sales_items_object",
 *     ),
 *     @OA\Property(
 *         property="delivery",
 *         description="Delivery information",
 *         ref="#/components/schemas/delvery_object",
 *     ),
 *     @OA\Property(
 *         property="carrying",
 *         description="Carrying information",
 *         ref="#/components/schemas/carrying_object",
 *     ),
 * )
 */
class SaleObjectOA
{
}
