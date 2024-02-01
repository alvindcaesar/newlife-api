<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Carbon\Carbon;

class MemberController extends Controller
{
    public function index()
    {
        $perPage = 50;

        $members = Member::paginate($perPage);

        return response()->json($members);
    }

    public function getMemberByMemberCode($identifier)
    {
        if (!auth()->check()) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        $member = Member::where('MemberCode', $identifier)
                    ->orWhere('NewIC', $identifier)
                    ->first();

        if(!$member) {
            return response()->json(['message' => 'Member not found'], 404);
        }

        return response()->json($member);
    }

    public function allMemberList()
    {
        // $members = Member::where('MemberName', 'not like', '%TERMINATED%')
        // ->orderBy('CreateDate', 'desc')
        // ->paginate(100);

        // foreach ($members as $member) {
        //     $member->CreateDate = Carbon::parse($member->CreateDate)->format('F j, Y');
        // }

        // return view('member-list', compact('members'));
    }

    public function memberTree($memberID)
    {
    //     $downlines = Member::where('SponsorID', $memberID)
    //         ->where('MemberName', 'not like', '%terminated%')
    //         ->where('AccountStatus', '<>', 'T')
    //         ->get();
    //     $memberNames = [];

    //     foreach ($downlines as $downline) {
    //     $memberNames[] = $downline->MemberName;
    // }
    //     $formattedMemberNames = implode("<br>", $memberNames);
    //     $totalMembers = count($memberNames);
    //     return "Total Members: <h1>$totalMembers</h1> <br>$formattedMemberNames";
    }

}
