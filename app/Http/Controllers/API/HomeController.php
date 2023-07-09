<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use App\Http\Resources\BranchPointResource;
use App\Http\Resources\ClassScheduleResource;
use App\Http\Resources\EventResource;
use App\Http\Resources\FeatureResource;
use App\Http\Resources\GalleryResource;
use App\Http\Resources\GymClassResource;
use App\Http\Resources\PackageResource;
use App\Http\Resources\PageResource;
use App\Http\Resources\PartnerResource;
use App\Http\Resources\SliderResource;
use App\Http\Resources\TeamResource;
use App\Models\Blog;
use App\Models\BranchPoint;
use App\Models\ClassSchedule;
use App\Models\Event;
use App\Models\Feature;
use App\Models\Gallery;
use App\Models\GymClass;
use App\Models\Package;
use App\Models\Page;
use App\Models\Partner;
use App\Models\Slider;
use App\Models\Team;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $slider;
    private $page;
    private $feature;
    private $gym_class;
    private $class_schedule;
    private $branchPoint;
    private $team;
    private $gallery;
    private $package;
    private $partner;
    private $blog;
    private $event;

    public function __construct(Slider $slider, Page $page, Feature $feature,
                                GymClass $gym_class, ClassSchedule $class_schedule,
                                BranchPoint $branchPoint, Team $team, Gallery $gallery,
                                Package $package, Partner $partner, Blog $blog, Event $event)
    {
        $this->slider = $slider;
        $this->page = $page;
        $this->feature = $feature;
        $this->gym_class = $gym_class;
        $this->class_schedule = $class_schedule;
        $this->branchPoint = $branchPoint;
        $this->team = $team;
        $this->gallery = $gallery;
        $this->package = $package;
        $this->partner = $partner;
        $this->blog = $blog;
        $this->event = $event;
    }

    public function __invoke(Request $request)
    {
        try {
            $data = [];

            // get data
            $sliders = $this->slider->active()->get();
            $pages = $this->page->whereIn('identifier', ['join_member_now', 'opening_hours',
                'about_our_gym', 'video', 'our_classes', 'get_fit_in_less', 'our_gallery',
                'branch_view', 'our_trainers', 'our_package'])->get();
            $features = $this->feature->active()->get();
            $gym_classes = $this->gym_class->active()->take(3)->with('days','branches')->get();
            $class_schedules = $this->class_schedule->active()->get();
            $branchPoints = $this->branchPoint->active()->get();
            $teams = $this->team->active()->get();
            $galleries = $this->gallery->active()->get();
            $packages = $this->package->active()->get();
            $partners = $this->partner->active()->get();
            $blog = $this->blog->active()->first();
            $events = $this->event->active()->take(3)->get();

            // resources
            $data['sliders'] = SliderResource::collection($sliders);
            $data['pages'] = PageResource::collection($pages);
            $data['features'] = FeatureResource::collection($features);
            $data['gym_classes'] = GymClassResource::collection($gym_classes);
            $data['class_schedules'] = ClassScheduleResource::collection($class_schedules);
            $data['branchPoints'] = BranchPointResource::collection($branchPoints);
            $data['trainers'] = TeamResource::collection($teams);
            $data['galleries'] = GalleryResource::collection($galleries);
            $data['packages'] = PackageResource::collection($packages);
            $data['partners'] = PartnerResource::collection($partners);
            $data['blog'] = new BlogResource($blog);
            $data['events'] = EventResource::collection($events);
            return successResponse($data, 'success', 200);
        } catch (\Exception $e) {
            return failureResponse([],$e->getMessage(), 400);
            return failureResponse([], __('message.something_wrong'), 400);
        }
    }
}
