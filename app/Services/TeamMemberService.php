<?php

namespace App\Services;

use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TeamMemberService extends BaseService
{
    public function save(Request $request)
    {
        $teamMember = TeamMember::find($request->id);

        $data = $request->except([
            'web_image',
            'mobile_image'
        ]);

        if (empty($request->id)) {

            $slug = Str::slug($request->name);

            $count = TeamMember::where(
                'slug',
                'LIKE',
                $slug . '%'
            )->count();

            $data['slug'] =
                $count > 0
                ? $slug . '-' . ($count + 1)
                : $slug;
        }

        if ($request->hasFile('web_image')) {

            if ($teamMember?->web_image) {
                $this->deleteFile(
                    $teamMember->web_image
                );
            }

            $data['web_image'] = $this->uploadFile(
                $request->file('web_image'),
                'team-members'
            );
        }

        if ($request->hasFile('mobile_image')) {

            if ($teamMember?->mobile_image) {
                $this->deleteFile(
                    $teamMember->mobile_image
                );
            }

            $data['mobile_image'] = $this->uploadFile(
                $request->file('mobile_image'),
                'team-members'
            );
        }

        return TeamMember::updateOrCreate(
            [
                'id' => $request->id
            ],
            $data
        );
    }

    public function details($id)
    {
        $member = TeamMember::find($id);

        if ($member) {

            $member->web_image =
                $this->fileUrl(
                    $member->web_image
                );

            $member->mobile_image =
                $this->fileUrl(
                    $member->mobile_image
                );
        }

        return $member;
    }

    public function list()
    {
        $members = TeamMember::latest()->get();

        foreach ($members as $member) {

            $member->web_image =
                $this->fileUrl(
                    $member->web_image
                );

            $member->mobile_image =
                $this->fileUrl(
                    $member->mobile_image
                );
        }

        return $members;
    }

    public function detailsBySlug(string $slug)
    {
        $member = TeamMember::where(
            'slug',
            $slug
        )->where(
            'status',
            1
        )->first();

        if ($member) {

            $member->web_image = $this->fileUrl(
                $member->web_image
            );

            $member->mobile_image = $this->fileUrl(
                $member->mobile_image
            );
        }

        return $member;
    }
}