<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class MessengerController extends Controller
{

    public function index(){

        // $users=User::where('status','=',1)->with(["message"])->orderBY("first_name", "ASC")->get();
        //dd($users);
        return view('messenger.chat')->with('users', User::all());
    }

    public function fetchData(Request $request){

        $userid = $request->get('userid');
        $use=User::where('id','=',$userid)->get()->first();
        $message = DB::table('application_chats')->where('sender',auth()->user()->id)->where('receiver',$userid)->get();
        // dd($message);
        if ($message->count() > 0) {
            $msg=$message;
            $conversation=true;
        }
        else{
            $msg='Start the conversation';
            $conversation=false;
        }
        // foreach($message as $output){

        $output=array(
            'id'=>$use['id'],
            'first_name'=>$use['first_name'],
            'last_name'=>$use['last_name'],
            'messages'=>$msg,
            'conversation'=>$conversation,
            'send_by'=>1
        );
    // }

        echo json_encode($output);
    }

    public function sendMessage(Request $request ) {

        // dd($request->all());

        $message = $request->get('msd');
        // dd($message);
        $userid = $request->get('id');
        $msg = DB::table('application_chats')->where('receiver',$userid)->where('sender',auth()->user()->id)->first();
        $ldate =date('Y-m-d H:i:s');

        if ($msg != null) {
            $ms=DB::table('application_chats')->insert([
                'receiver'=>$userid,
                'sender'=>auth()->user()->id,
                 'send_by'=>0,
                 'message'=>$message,
                 'created_at'=>$ldate
            ]);
        }

        else{
       $ms=DB::table('application_chats')->insert([
           'receiver'=>$userid,
           'sender'=>auth()->user()->id,
            'send_by'=>1,
            'message'=>$message,
            'created_at'=>$ldate
       ]);
        }

        return Redirect()->route('messanger');

    }


}
