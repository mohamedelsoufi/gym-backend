<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\GymClassResource;
use App\Models\GymClass;
use Illuminate\Http\Request;

class GymClassesController extends Controller
{
   private $gym_class;
   public function __construct(GymClass $gym_class)
   {
       $this->gym_class = $gym_class;
   }

    public function __invoke(Request $request)
    {
        try {
            $gym_classes = GymClassResource::collection($this->gym_class->active()->latest('id')->get());
            return successResponse($gym_classes, 'success', 200);
        } catch (\Exception $e) {
            return failureResponse([], __('message.something_wrong'), 400);
        }
    }
}
