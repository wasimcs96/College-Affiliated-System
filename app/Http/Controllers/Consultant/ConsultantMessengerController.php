<?php

namespace App\Http\Controllers\Consultant;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\UniversityConsultantClient;
use App\Models\UniversityConsultant;
use App\Models\Booking;
use App\Models\ApplicationChat;
use Illuminate\Support\Arr;
use App\Http\Controllers\Controller;

class ConsultantMessengerController extends Controller
{
    public function index()
    {
        // $auth=auth()->user();
        // if($auth->isAdmin()){
        //     $usertype=0;
        // }
        // // if($auth->isUniversity()){
        // //     $usertype=1;
        // // }
        // if($auth->isConsultant()){
        //     $usertype=2;
        // }
        // if($auth->isClient()){
        //     $usertype=3;
        // }
        // if($auth->isSubAdmin()){
        //     $usertype=4;
        // }
        $consultants = [];
        $clients= [];
        $consultants = UniversityConsultant::where('consultant_id',auth()->user()->id)->pluck('university_id');
        // dd($consultants);
        $clients = Booking::where('consultant_id',auth()->user()->id)->pluck('client_id');
        // dd($clients);
        // $users = array_merge($consultants,$clients);
        $array = Arr::collapse([$consultants,$clients]);
        $users = User::whereIn('id', $array)->get();
        // dd($users);
        $check = ApplicationChat::where('sender',auth()->user()->id)->orWhere('receiver',auth()->user()->id)->orderByDesc('id')->first();
        // dd($check);
        return view('consultant.messenger.chat',compact('check'))->with('adminUsers', User::all())->with('users',$users);
        // $users=User::where('status','=',1)->with(["message"])->orderBY("first_name", "ASC")->get();
        //dd($users);
    }

    public function fetchData(Request $request){

        $userid = $request->get('userid');
        $use=User::where('id','=',$userid)->get()->first();
        $message = DB::table('application_chats')->where('sender',auth()->user()->id)->where('receiver',$userid)->get();
        $msgr = DB::table('application_chats')->where('sender',$userid)->where('receiver',auth()->user()->id)->where('seen',0)->update(array('seen' => 1));
        // dd($msgr);
        // dd($message);
        $message = DB::table('application_chats')->where('sender',auth()->user()->id)->where('receiver',$userid)->get();
        $send_by = DB::table('application_chats')->where('sender',$userid)->where('receiver',auth()->user()->id)->get();
        if ($message->count() > 0) {
            $msg=$message;
            $conversation=true;
        }
        else{
            $msg='Start the conversation';
            $conversation=false;
        }
        if ($send_by->count() > 0) {
            $sb=$send_by;
            $conversation=true;
        }
        else{
            $sb='Start the conversation';
            // $conversation=false;
        }
        // foreach($message as $output){

        $output=array(
            'id'=>$use['id'],
            'first_name'=>$use['first_name'],
            'last_name'=>$use['last_name'],
            'profile_image'=>$use['profile_image'],
            'messages'=>$msg,
            'conversation'=>$conversation,
            'sender'=>$sb,
            'send_by'=>2,

        );
    // }

        echo json_encode($output);
    }

    public function sendMessage(Request $request ) {

        //  dd($request->all());

        $message = $request->get('msd');
        // dd($message);
        $userid = $request->get('id');
        $msg = DB::table('application_chats')->where('receiver',$userid)->where('sender',auth()->user()->id)->first();
        $ldate =date('Y-m-d H:i:s');

        if ($msg != null) {
            $ms=DB::table('application_chats')->insert([
                'receiver'=>$userid,
                'sender'=>auth()->user()->id,
                 'send_by'=>2,
                 'message'=>$message,
                 'created_at'=>$ldate
            ]);
        }

        else{
       $ms=DB::table('application_chats')->insert([
           'receiver'=>$userid,
           'sender'=>auth()->user()->id,
            'send_by'=>2,
            'message'=>$message,
            'created_at'=>$ldate
       ]);
        }

        return redirect()->route('consultant.messenger');

}
}
