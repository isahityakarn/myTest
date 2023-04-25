<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupStoreRequest;
use App\Http\Requests\TeamStoreRequest;
use App\Models\Group;
use App\Models\Team;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $groups_name = Group::all();
        $teams = Team::all();
        $groups = Team::with('group')->get()->groupBy('group_id');
        // return  count($teams);
        $total_team = count($teams);
        $total_group = count($groups);

        $data = compact('groups', 'groups_name', 'total_team', 'total_group');
        return  view("welcome")->with($data);
    }
    public function store(TeamStoreRequest $request)
    {
        $group = new Team();
        $group->group_id = $request->group_name;
        $group->team_name = $request->team_name;
        $group->save();
        return redirect('/');
    }
    public function groupStore(GroupStoreRequest $request)
    {
        $group = new Group();
        $group->group_name = $request->group_name;
        $group->save();
        return redirect('/');
    }
}
