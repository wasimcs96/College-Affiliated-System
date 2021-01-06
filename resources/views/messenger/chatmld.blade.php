@inject('request', 'Illuminate\Http\Request')
@extends('layouts.admin.master')
@section('title','Messages')
@section('content')
@include('layouts.admin.flash.alert')
@push('per_page_style')






@endpush
<style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    .container{max-width:1170px; margin:auto;}
img{ max-width:100%;}
.inbox_people {
  background: #f8f8f8 none repeat scroll 0 0;
  float: left;
  overflow: hidden;
  width: 40%; border-right:1px solid #c4c4c4;
}
.inbox_msg {
  border: 1px solid #c4c4c4;
  clear: both;
  overflow: hidden;
}
.top_spac{ margin: 20px 0 0;}


.recent_heading {float: left; width:40%;}
.srch_bar {
  display: inline-block;
  text-align: right;
  width: 60%; padding:
}
.headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

.recent_heading h4 {
  color: #05728f;
  font-size: 21px;
  margin: auto;
}
.srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
.srch_bar .input-group-addon button {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  padding: 0;
  color: #707070;
  font-size: 18px;
}
.srch_bar .input-group-addon { margin: 0 0 0 -27px;}

.chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
.chat_ib h5 span{ font-size:13px; float:right;}
.chat_ib p{ font-size:14px; color:#989898; margin:auto}
.chat_img {
  float: left;
  width: 11%;
}
.chat_ib {
  float: left;
  padding: 0 0 0 15px;
  width: 88%;
}

.chat_people{ overflow:hidden; clear:both;}
.chat_list {
  border-bottom: 1px solid #c4c4c4;
  margin: 0;
  padding: 18px 16px 10px;
}
.inbox_chat { height: 550px; overflow-y: scroll;}

.active_chat{ background:#ebebeb;}

.incoming_msg_img {
  display: inline-block;
  width: 6%;
}
.received_msg {
  display: inline-block;
  padding: 0 0 0 10px;
  vertical-align: top;
  width: 92%;
 }
 .received_withd_msg p {
  background: #ebebeb none repeat scroll 0 0;
  border-radius: 3px;
  color: #646464;
  font-size: 14px;
  margin: 0;
  padding: 5px 10px 5px 12px;
  width: 100%;
}
.time_date {
  color: #747474;
  display: block;
  font-size: 12px;
  margin: 8px 0 0;
}
.received_withd_msg { width: 57%;}
.mesgs {
  float: left;
  padding: 30px 15px 0 25px;
  width: 60%;
}

 .sent_msg p {
  background: #05728f none repeat scroll 0 0;
  border-radius: 3px;
  font-size: 14px;
  margin: 0; color:#fff;
  padding: 5px 10px 5px 12px;
  width:100%;
}
.outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
.sent_msg {
  float: right;
  width: 46%;
}
.input_msg_write input {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  color: #4c4c4c;
  font-size: 15px;
  min-height: 48px;
  width: 100%;
}

.type_msg {border-top: 1px solid #c4c4c4;position: relative;}
.msg_send_btn {
  background: #05728f none repeat scroll 0 0;
  border: medium none;
  border-radius: 50%;
  color: #fff;
  cursor: pointer;
  font-size: 17px;
  height: 33px;
  position: absolute;
  right: 0;
  top: 11px;
  width: 33px;
}
.messaging { padding: 0 0 50px 0;}
.msg_history {
  height: 516px;
  overflow-y: auto;
}
</style>

    <div id="username">

      <h3 class="text-center" id="hed">Select User</h3>
    </div>
    <div class="messaging">
          <div class="inbox_msg">
            <div class="inbox_people">
              <div class="headind_srch">
                <div class="recent_heading">
                  <h4>Recent</h4>
                </div>
                <div class="srch_bar">
                  <div class="stylish-input-group">
                    <input type="text" class="search-bar" onkeyup="myFunction()" id="myInput" placeholder="Search" >
                  </div>
                </div>
              </div>
              <div class="inbox_chat">
@foreach ($users as $user)
<div id="userlist-{{$user->id}}" class="chat_list">
    <div class="chat_people">
        <a href="javascript:void(0)" id="{{$user->id}}" class="javae">
            <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
        <div class="chat_ib" id="cs">
        <h5 class="head">{{$user->first_name}} {{$user->last_name}}</h5>
        @if($user->message != null)
            @foreach($user->message as $key=>$message)
            @if($key == 0)
                <h5><span class="chat_date">{{$message->created_at}}</span></h5>
                <p>{{$message->message}}</p>
            @endif
            @endforeach
        @endif
        </div>
        </a>
    </div>
  </div>
@endforeach


              </div>
            </div>
            <div class="mesgs">
              <div class="msg_history" id="history">
                <div class="incoming_msg">
                  <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="user"> </div>
                  <div class="received_msg">
                    <div class="received_withd_msg">
                      <p>No User Selected Yet</p>
                      <span class="time_date"></span></div>
                  </div>
                </div>
                <div class="outgoing_msg">
                  <div class="sent_msg">
                    <p></p>
                    <span class="time_date"> </span> </div>
                </div>

              </div>
              <div class="type_msg">

                <div class="input_msg_write" id="btn">
                    <form  action="#" id="target" class="frm">

                                                          <input type="text" class="write_msg" name="msd"  id="ms" placeholder="Type a message" require="require" />
                                                          {{-- <input type="text" id="hid" class="write_msg" name="id" placeholder="Type a message" hidden/> --}}
                                          <button class="msg_send_btn" id="bt" type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button></form>
                  {{-- <input type="text" class="write_msg" placeholder="Type a message"/> --}}
                {{-- <a href="javascript:void(0)" class="att">  <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button></a> --}}
                </div>

            </div>
            </div>
          </div>




        </div></div>
        {{-- <script>
            console.log("working");
        </script> --}}
        {{-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> --}}
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <script>


          $(document).ready(function(){

            document.getElementById("bt").disabled = true;
              $('.javae').click(function(){

                      var userid = $(this).attr("id");
                      var _token = $('input[name="_token"]').val();

                        // document.getElementById(`userlist-${userid}`).style.background="grey";
                      $.ajax({
                        url: "{{ route('data.fetch') }}",
                          method: "POST",
                          data:{userid:userid,_token:_token},
                          success:function(result)
                          {
                               var re=JSON.parse(result);
                               console.log(re);
                                  document.getElementById("hed").innerHTML = re.first_name+" "+re.last_name;
                                  document.getElementById("target").innerHTML+= `<input type="text" class="write_msg" name="id" value=${re.id} placeholder="Type a message" hidden/>`;
                                  document.getElementById("bt").disabled = false;

                                if (re.conversation == false) {
                                  document.getElementById("history").style.marginLeft="240px";
                                    document.getElementById("history").innerHTML=re.messages;
                                }
                                else{
                                    html='';
                                    (re.messages).forEach(element => {
                                        if (element.send_by_admin == 0) {
                                            html+=`<div class="incoming_msg">
                  <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="user"> </div>

                  <div class="received_msg">
                    <div class="received_withd_msg">
                      <p>${element.message}</p>
                      <span class="time_date">${element.created_at}</span></div>
                  </div>
                </div>`;
                                        }
                                        else{

                html+=` <div class="outgoing_msg">
                  <div class="sent_msg">
                    <p>${element.message}</p>
                    <span class="time_date">${element.created_at}</span> </div>
                </div>`;
                                        }



                                });
                                    document.getElementById("history").innerHTML=html;

                                }

                      }


              })
          })


          })

      </script>
      <script>
 $("#target").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.
    // console.log('working');
    // var form = $(this);
    // var url = form.attr('action');
    var id = $('input[name="id"]').val();
    var msd = $('input[name="msd"]').val();
                      var _token = $('input[name="_token"]').val();
                      document.getElementById('history').innerHTML+=`<div class="outgoing_msg">
                  <div class="sent_msg">
                    <p>${msd}</p>
                    <span class="time_date"> </span> </div>
                </div>`;
                $('.msg_history').animate({
                scrollTop: $('.msg_history')[0].scrollHeight
                }, 1000);
    $.ajax({
           type: "POST",
           url: "{{ route('message.send') }}",
           data: {id:id,_token:_token,msd:msd}, // serializes the form's elements.
           success: function(data)
           {

                // document.getElementById('ms').innerHTML=" ";
            //    console.log(data); // show response from the php script.
           }
         });


});
      </script>
      <script>
      function myFunction() {
        var input, filter, ul, li, a, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        ul = document.getElementsByClassName("chat_list");
        // console.log(ul[0]);
        li = ul[0].getElementsByTagName("a");
        // console.log();
        Array.from(ul).forEach(element => {
            a=element.getElementsByTagName("div")[0];
            b=a.getElementsByTagName("a")[0];
            c=b.getElementsByTagName("div")[1];
            d=c.getElementsByTagName("h5")[0];
            console.log(d);
            txtValue = d.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
             element.style.display = "";
            } else {
            element.style.display = "none";
            }

});

    }
    </script>
@endsection
@push('per_page_script')

@endpush

