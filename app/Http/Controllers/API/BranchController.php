<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\BranchResource;
use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    private $branch;

    public function __construct(Branch $branch)
    {
        $this->branch = $branch;
    }

    public function __invoke()
    {
        try {
            $branches = BranchResource::collection($this->branch->active()->get());
            return successResponse($branches, 'success', 200);
        } catch (\Exception $e) {
            return failureResponse([], __('message.something_wrong'), 400);
        }
    }
}
