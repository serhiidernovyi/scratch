<?php

namespace App\Http\OpenApi\Schemas\Objects\Report;

/**
 * @OA\Schema(
 *     schema="report_sales_items_object",
 *     required={
 *         "id",
 *         "sold_date",
 *         "price",
 *         "vat",
 *         "total_price",
 *         "seller_name",
 *         "seller_type",
 *         "buyer_name",
 *         "buyer_type",
 *         "created_at",
 *     },
 *     @OA\Property(
 *         property="id",
 *         type="int",
 *         description="Sales item id",
 *     ),
 *     @OA\Property(
 *         property="sold_date",
 *         type="date",
 *         description="Sold date of sales item",
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
 *         description="Total price with vat",
 *     ),
 *     @OA\Property(
 *         property="buyer_name",
 *         type="string",
 *         description="Buyer name",
 *     ),
 *     @OA\Property(
 *         property="buyer_type",
 *         type="string",
 *         description="Buyer type",
 *     ),
 *     @OA\Property(
 *         property="seller_name",
 *         type="string",
 *         description="Seller name",
 *     ),
 *     @OA\Property(
 *         property="Seller_type",
 *         type="string",
 *         description="Seller type",
 *     ),
 *     @OA\Property(
 *         property="created_at",
 *         type="date",
 *         description="Created at",
 *     ),
 * )
 */
class ReportSalesItemsObjectOA
{
}
