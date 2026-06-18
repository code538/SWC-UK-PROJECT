<?php

namespace App\Services;

use App\Models\TeamFirstSection;
use App\Models\TeamSecondSection;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class TeamFirstSectionService extends BaseService
{
    public function save(Request $request)
    {
        $teamFirstSection = TeamFirstSection::first();

        $data = $request->except([
            'web_image',
            'mobile_image'
        ]);

        if ($request->hasFile('web_image')) {

            if ($teamFirstSection?->web_image) {
                $this->deleteFile(
                    $teamFirstSection->web_image
                );
            }

            $data['web_image'] = $this->uploadFile(
                $request->file('web_image'),
                'team-first-section'
            );
        }

        if ($request->hasFile('mobile_image')) {

            if ($teamFirstSection?->mobile_image) {
                $this->deleteFile(
                    $teamFirstSection->mobile_image
                );
            }

            $data['mobile_image'] = $this->uploadFile(
                $request->file('mobile_image'),
                'team-first-section'
            );
        }

        return TeamFirstSection::updateOrCreate(
            ['id' => 1],
            $data
        );
    }

    public function details()
    {
        $teamFirstSection = TeamFirstSection::first();

        if ($teamFirstSection) {

            $teamFirstSection->web_image =
                $this->fileUrl(
                    $teamFirstSection->web_image
                );

            $teamFirstSection->mobile_image =
                $this->fileUrl(
                    $teamFirstSection->mobile_image
                );
        }

        return $teamFirstSection;
    }

    public function pageDetails()
    {
        $firstSection = TeamFirstSection::first();

        if ($firstSection) {

            $firstSection->web_image = $this->fileUrl(
                $firstSection->web_image
            );

            $firstSection->mobile_image = $this->fileUrl(
                $firstSection->mobile_image
            );
        }

        $secondSection = TeamSecondSection::first();

        $teamMembers = TeamMember::where(
        'status',
        1
    )->get();

    foreach ($teamMembers as $member) {

        $member->web_image = $this->fileUrl(
            $member->web_image
        );

        $member->mobile_image = $this->fileUrl(
            $member->mobile_image
        );
    }

    return [
        'first_section' => $firstSection,
        'second_section' => $secondSection,
        'team_members' => $teamMembers,
    ];
}
}