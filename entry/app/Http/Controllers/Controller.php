<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\ResponseMessages;
use App\Models\Other\BadMessages;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

/**
 * @see ControllerOA
 */
class Controller extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    protected function notFoundResponse()
    {
        return response(['message' => trans(ResponseMessages::NOT_FOUND)], Response::HTTP_NOT_FOUND);
    }

    protected function getForbiddenResponse()
    {
        return response(['message' => trans(BadMessages::HAS_NO_ACCESS)], Response::HTTP_FORBIDDEN);
    }
}
