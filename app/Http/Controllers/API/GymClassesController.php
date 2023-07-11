<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClassScheduleResource;
use App\Http\Resources\GymClassResource;
use App\Models\ClassSchedule;
use App\Models\GymClass;
use Illuminate\Http\Request;

class GymClassesController extends Controller
{
    private $gym_class;
    private $class_schedule;

    public function __construct(GymClass $gym_class, ClassSchedule $class_schedule)
    {
        $this->gym_class = $gym_class;
        $this->class_schedule = $class_schedule;
    }

    public function __invoke(Request $request)
    {
        try {
            $gym_classes = GymClassResource::collection($this->gym_class->active()->latest('id')->get());
            $class_schedules = $this->class_schedule->active()->get();
            $data['gym_classes'] = GymClassResource::collection($gym_classes);
            $data['class_schedules'] = ClassScheduleResource::collection($class_schedules);
            return successResponse($data, 'success', 200);
        } catch (\Exception $e) {
            return failureResponse([], __('message.something_wrong'), 400);
        }
    }
}
