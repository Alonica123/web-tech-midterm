<?php
namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\BoholInfo;

class BoholInfoPostController extends Controller
{
    public $successStatus = 200;

    public function getAllPosts(Request $request)
    {
        $token = $request['t']; //t = token
        $userid = $request['u'];// u-userid

        $user = User::where('id',$userid)->where('remember_token',$token)->first();


        if($user != null){
            $bohol_info = DB::table('bohol_info')
                        ->leftJoin('users','bohol_info.id', '=','users.id')
                        ->select('bohol_info.id','bohol_info.barangay','bohol_info.town','bohol_info.province','bohol_info.code','bohol_info.population','users.name','bohol_info.created_at','bohol_info.updated_at')
                        ->get();

            return response()->json($bohol_info,$this->successStatus);
        }else{
            return response()->json(['response'=>'Bad call'],501);
        }
    }


    public function getPost(Request $request)
    {

        $id = $request['pid']; //old post id

        $token = $request['t']; //t = token
        $userid = $request['u'];// u-userid

        $user = User::where('id',$userid)->where('remember_token',$token)->first();


        if($user != null){

            $boholInfo = BoholInfo::where('id',$id)->first();
            if($user != null){
                return response()->json($boholInfo,$this->successStatus);
            }else{
                return response()->json(['response'=>'Posts not found'],404);
            }

        }else{
            return response()->json(['response'=>'Bad call'],501);
        }
    }


    // this method searches the country
    public function searchPost(Request $request)
    {

        $params = $request['p']; //p = params

        $token = $request['t']; //t = token
        $userid = $request['u'];// u-userid

        $user = User::where('id',$userid)->where('remember_token',$token)->first();


        if($user != null){

            $boholInfo = BoholInfo::where('name','LIKE','%' .$params . '%')->GET();
            if($user != null){
                return response()->json($boholInfo,$this->successStatus);
            }else{
                return response()->json(['response'=>'Posts not found'],404);
            }

        }else{
            return response()->json(['response'=>'Bad call'],501);
        }
    }
}
