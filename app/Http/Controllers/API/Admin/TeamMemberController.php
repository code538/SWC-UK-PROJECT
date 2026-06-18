<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Services\TeamMemberService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    use ApiResponse;

    protected TeamMemberService $teamMemberService;

    public function __construct(
        TeamMemberService $teamMemberService
    ) {
        $this->teamMemberService =
            $teamMemberService;
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',

            'designation' => 'nullable|string|max:255',

            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:20',

            'address' => 'nullable|string',

            'experience' => 'nullable|string|max:255',

            'short_desc' => 'nullable|string',
            'long_desc' => 'nullable|string',

            'expertise' => 'nullable|string',

            'desc2' => 'nullable|string',

            'button1_name' => 'nullable|string|max:255',
            'button1_url' => 'nullable|string|max:255',

            'button2_name' => 'nullable|string|max:255',
            'button2_url' => 'nullable|string|max:255',

            'button3_name' => 'nullable|string|max:255',
            'button3_url' => 'nullable|string|max:255',

            'image_alt' => 'nullable|string|max:255',

            'web_image' =>
                'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',

            'mobile_image' =>
                'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',

            'status' => 'nullable|boolean',
        ]);

        $member = $this->teamMemberService
            ->save($request);

        return $this->success(
            $member,
            'Team member saved successfully'
        );
    }

    public function details($id)
    {
        $member = $this->teamMemberService
            ->details($id);

        if (!$member) {

            return $this->error(
                'Team member not found',
                [],
                404
            );
        }

        return $this->success(
            $member,
            'Team member fetched successfully'
        );
    }

    public function list()
    {
        return $this->success(
            $this->teamMemberService->list(),
            'Team member list fetched successfully'
        );
    }

    public function detailsBySlug($slug)
    {
        $member = $this->teamMemberService
            ->detailsBySlug($slug);

        if (!$member) {

            return $this->error(
                'Team member not found',
                [],
                404
            );
        }

        return $this->success(
            $member,
            'Team member fetched successfully'
        );
    }
}