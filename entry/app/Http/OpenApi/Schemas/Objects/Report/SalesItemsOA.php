<?php

declare(strict_types=1);

namespace App\Http\OpenApi\Schemas\Objects\Report;

/**
 * @OA\Schema(
 *     schema="sales_items_object",
 *     @OA\Property(
 *         property="sales_item_id",
 *         type="int",
 *         description="Sales item id",
 *     ),
 *     @OA\Property(
 *         property="item_id",
 *         type="int",
 *         description="Item id",
 *     ),
 *     @OA\Property(
 *         property="item_name",
 *         type="string",
 *         description="Item name",
 *     ),
 *     @OA\Property(
 *         property="seller_name",
 *         type="string",
 *         description="Seller name",
 *     ),
 *     @OA\Property(
 *         property="seller_type",
 *         type="string",
 *         description="Seller type",
 *     ),
 *     @OA\Property(
 *         property="cost_price",
 *         type="number",
 *         description="Cost price",
 *     ),
 *     @OA\Property(
 *         property="amount",
 *         type="int",
 *         description="Amount",
 *     ),
 *     @OA\Property(
 *         property="price",
 *         type="number",
 *         description="Price",
 *     ),
 *     @OA\Property(
 *         property="vat",
 *         type="number",
 *         description="Vat",
 *     ),
 *     @OA\Property(
 *         property="include_vat",
 *         type="bool",
 *         description="Include vat",
 *     ),
 *     @OA\Property(
 *         property="total_price",
 *         type="number",
 *         description="Price",
 *     ),
 * )
 */
class SalesItemsOA
{
}
