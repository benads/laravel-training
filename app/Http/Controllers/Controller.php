<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

/**
 * @SWG\Swagger(
 *     schemes={"http","https"},
 *     host="laravel.local",
 *     basePath="/",
 *     @SWG\Info(
 *         version="1.0.0",
 *         title="Laravel-training docs",
 *         description="This API is for training",
 *      )
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
