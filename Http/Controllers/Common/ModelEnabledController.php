<?php

namespace Modules\Backend\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Backend\Http\Requests\Common\ModelEnabledRequest;
use Modules\Backend\Services\Authorization\UserService;

class ModelEnabledController extends Controller
{
    /**
     * @var UserService
     */
    protected $userService;

    /**
     * FrontendController constructor.
     *
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Change a model status from enabled to disabled ro vise-versa.
     *
     * @param ModelEnabledRequest $request
     * @return JsonResponse
     */
    public function __invoke(ModelEnabledRequest $request): JsonResponse
    {
        return response()->json();
    }
}
