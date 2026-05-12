<?php

namespace App\Platform\Base;

use App\Http\Controllers\Controller;
use App\Platform\Traits\ApiResponse;

abstract class BaseController extends Controller
{
    use ApiResponse;
}
