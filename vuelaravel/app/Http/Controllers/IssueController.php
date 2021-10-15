<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */


    public function submitissue(Request $request)
    {
        $title = $request->title;
        $detail = $request->detail;
        $status = "submitted";
        DB::insert('insert into issues (title, detail ,status) values (?, ?, ?)', [$title, $detail, $status]);

        return response()->json([
            'message' => "successfully submitted"
        ]);
    }
    public function updateissue(Request $request)
    {
        $id = $request->id;
        DB::table('issues')
            ->where('id', $id)
            ->update(['status' => "closed"]);
        return response()->json([
            'message' => "update"
        ]);
    }
    public function editissue(Request $request)
    {
        $id = $request->id;
        $title = $request->title;
        $detail = $request->detail;
        DB::table('issues')
            ->where('id', $id)
            ->update(['detail' => $detail, 'title' => $title]);
        return response()->json([
            'message' => "update success"
        ]);
    }
    public function admineditissue(Request $request)
    {
        $id = $request->id;
        $status = $request->status;
        DB::table('issues')
            ->where('id', $id)
            ->update(['status' => $status]);
        return response()->json([
            'message' => "update status success"
        ]);
    }
    public function listissues()
    {
        $issues = DB::table('issues')->orderBy('id')->get();
        return $issues;
    }
    public function issuedetail(Request $request)
    {
        $id = $request->id;
        $issue = DB::table('issues')
            ->where('id', $id)
            ->get();
        return $issue;
    }
}
