<?php

declare(strict_types=1);

namespace App\Http\Controllers\ApiDoc;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;

class ApiDocController extends Controller
{
    /**
     * Return api documentation view
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('API');
    }
}
