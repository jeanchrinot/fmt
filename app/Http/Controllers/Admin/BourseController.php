<?php

namespace App\Http\Controllers\admin;

use App\BourseInformation;
use App\Helper\ImageUploadHelper;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bourseInfos = BourseInformation::orderBy("id", "desc")->get();
        return view("admin.bourse.index", compact("bourseInfos", $bourseInfos));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.bourse.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except("_token");

        $data["user_id"] = Auth::user()->id;
        $data["slug"] = Str::slug($data["title"]);
        $data["image"] = $request->file("image") ? ImageUploadHelper::upload("bourse-information", $data["image"]) : "";

        $newInfo = BourseInformation::create($data);

        if ($newInfo) {
            return redirect()->route("bourse-informations.show", $newInfo->slug)->with('success', "Information de la bourse ajouté avec succès.");
        }

        return redirect()->back()->with('error', 'Erreur survenue. Ressayer plus tard.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $bourseInfo = BourseInformation::where("slug", $slug)->firstOrFail();
        return view("admin.bourse.show", compact("bourseInfo"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bourseInfo = BourseInformation::findOrFail($id);
        return view("admin.bourse.edit", compact("bourseInfo"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->except("_token");
        $bourseInfo = BourseInformation::findOrFail($id);
        $data["slug"] = Str::slug($data["title"]);

        if (isset($data["image"])) {
            $data["image"] = $request->file("image") ? ImageUploadHelper::upload("bourse-information", $data["image"]) : "";
        }

        $bourseInfo->update($data);

        if ($bourseInfo) {
            return redirect()->route("bourse-informations.show", $bourseInfo->slug)->with('success', "Information de la bourse ajouté avec succès.");
        }

        return redirect()->back()->with('error', 'Erreur survenue. Ressayer plus tard.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = [];
        $bourseInfo = BourseInformation::findOrFail($id);
        deleteImage($bourseInfo->image);

        $delete = $bourseInfo->delete();
       
        $delete = true;

        if ($delete) {
            $result["success"] = "L'information de la bourse supprimé avec succès.";
            $result["type"] = "success";
        } else {
            $result["type"] = "error";
            $result["error"] = "Un problème est survenu lors de la suppression. Réessayez plus tard!";
        }

        return response()->json($result);
    }
}
