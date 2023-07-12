<?php

namespace App\Http\Controllers;

use App\Http\Resources\TeamResource;
use App\Models\Team;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    private $trainer;

    public function __construct(Team $trainer)
    {
        $this->trainer = $trainer;
    }

    public function __invoke()
    {
        try {
            $trainers = TeamResource::collection($this->trainer->active()->get());
            return successResponse($trainers, 'success', 200);
        } catch (\Exception $e) {
            return failureResponse([], __('message.something_wrong'), 400);
        }
    }
}
