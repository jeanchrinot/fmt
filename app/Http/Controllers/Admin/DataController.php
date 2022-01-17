<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ContactUs;

class DataController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

	public function getMessage(Request $request,$id)
    {
        $message = ContactUs::where('id',$id)->firstOrFail();

        //dd($message->name);
        $status = $message->viewed;

        if($status==0) {
           $message->viewed= 1;
           $message->save();
        }
        return response()->json(["message" => $message]);
    }

    /*public function markAsRead(Request $request,$id)
    {
    	$message = ContactUs::findOrFail($id);
    	$message->viewed = 1;
    	$message->save();
    	//dd($message);
    	$success = 1;
    	return $success;
    }  */

    public function deleteItem(Request $request,$itemType,$itemId)
    {
        $response = ['error'=>null];
    	switch ($itemType) {
    		case 'message':
    			\App\ContactUs::where('id',$itemId)->delete();
    			$response = json_encode($response["success"]="Supprime avec success");
    			break;
    		case 'users':
                $user = \App\User::where('id',$itemId)->get(['id','type'])->first();

                if(($user->type)!==2){
                    \App\User::where('id',$itemId)->delete();
                }
                else{
                    // Admin can not be deleted
                    $response['error'] = "Erreur: Admininstrateur ne peut pas être supprimé!";
                }

                break;
            case 'office_member':
                $IDs = explode('-',$itemId);
                $user_id = $IDs[0];
                $position_id = $IDs[1];
                \App\PositionUser::where(['user_id'=>$user_id,'position_id'=>$position_id])->delete();
                break;
            case 'deputy':
                $IDs = explode('-',$itemId);
                $user_id = $IDs[0];
                $province = $IDs[1];
                \App\Deputy::where(['user_id'=>$user_id,'province'=>$province])->delete();
                break;
            case 'slider':
                \App\Slider::where('id',$itemId)->delete();
                break;
            case 'student_words':
                \App\Studentword::where('id',$itemId)->delete();
                break;
            case 'actucategory':
                \App\Actucategory::where('id',$itemId)->delete();
                break;
            case 'actu':
                \App\Actu::where('id',$itemId)->delete();
                break;
            case 'activity':
                \App\Activity::where('id',$itemId)->delete();
                break;
            case 'gallerycategory':
                \App\Gallerycategory::where('id',$itemId)->delete();
                break;
            case 'gallery':
                \App\Gallery::where('id',$itemId)->delete();
                break;
            case 'video':
                \App\Video::where('id',$itemId)->delete();
                break;
    		default:
    			# code...
    			break;
    	}

    	return $response;
    }

    public function itemDetails(Request $request,$itemType,$itemId)
    {
        switch ($itemType) {
            case 'users':
               $details = \App\User::where('id',$itemId)->firstOrFail();
                break;
            case 'slider':
                $details = \App\Slider::where('id',$itemId)->firstOrFail();
                break;
            case 'student_words':
                $details = \App\Studentword::where('id',$itemId)->firstOrFail();
                break;
            case 'actu':
                $details = \App\Actu::where('id',$itemId)->firstOrFail();
                break;
            case 'activity':
                $details = \App\Activity::where('id',$itemId)->firstOrFail();
                break;
            case 'gallery':
                $details = \App\Gallery::where('id',$itemId)->firstOrFail();
                break;
            case 'video':
                $details = \App\Video::where('id',$itemId)->firstOrFail();
                break;
            default:
                # code...
                break;
        }

        return view('admin.components.'.$itemType)->with('details',$details);
    }

}
