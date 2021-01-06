@extends('layout.master')
@section('parentPageTitle', 'messenger')
@section('title', 'Chat')


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
    /* .chat_list {
      border-bottom: 1px solid #c4c4c4;
      margin: 0;
      padding: 18px 16px 10px;
    } */
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


@section('content')
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="body">
                <div class="chatapp_list">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control search-bar" onkeyup="myFunction()" id="myInput" placeholder="Search...">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="icon-magnifier"></i></span>
                        </div>
                    </div>
                    <div class="">
                    <ul class="right_chat list-unstyled mb-0">
                        @foreach($users as $user)
                            <li class="online chat_list">
                                <a href="javascript:void(0);" id="{{$user->id}}" class="javae">
                                    <div class="media">
                                        <div><img class="media-object " src="../assets/images/xs/avatar3.jpg" alt=""></div>
                                        <div class="media-body chat_ib" id="cs">
                                            <span class="name">{{$user->first_name}} {{$user->last_name}}</span>
                                            @if($user->message != null)
                                                @foreach($user->message as $key=>$message)
                                                    @if($key == 0)
                                                        <h5><span class="chat_date">{{$message->created_at}}</span></h5>
                                                        <p>{{$message->message}}</p>
                                                    @endif
                                                @endforeach
                                             @endif
                                            <span class="message">online</span>
                                            <span class="badge badge-outline status"></span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    </div>
                </div>
                <div class="chatapp_body">
                    <div class="chat-header clearfix">
                        <div class="row clearfix">
                            <div class="col-lg-12">
                                <div class="chat-about">
                                    <h6 class="m-b-0" id="hed">Select User</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="chat-history ">
                        <ul class="message_data msg_history" id="history">
                            <li class="right clearfix">
                                <img class="user_pix" src="../assets/images/xs/avatar7.jpg" alt="avatar">
                                <div class="message">
                                    <p></p>
                                </div>
                                <span class="data_time"></span>
                            </li>
                            <li class="left clearfix">
                                <img class="user_pix" src="../assets/images/user.png" alt="avatar">
                                <div class="message">
                                   <p></p>
                                </div>
                                <span class="data_time"></span>
                            </li>

                        </ul>
                    </div>
                    <div class="chat-message clearfix" id="btn">
                        {{-- <div class="input-group mb-0" id="btn target" > --}}
                            <form class="input-group mb-0" id="target">
                                <textarea type="text" row="" id="message" name="message" class="form-control" placeholder="Enter text here..."></textarea>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <button class="btn btn-link" id="bt" type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                                    </span>
                                </div>
                            </form>
                        {{-- </div> --}}
                    </div>
                </div>
                <div class="chatapp_detail text-center vivify pullLeft delay-150">
                    <div class="profile-image"><img src="../assets/images/user.png" class="rounded-circle mb-3" alt=""></div>
                    <h5 class="mb-0">Louis Pierce</h5>
                    <small class="text-muted">Address: </small>
                    <p> San Francisco</p>
                    <small class="text-muted">Email address: </small>
                    <p>louispierce@example.com</p>
                    <small class="text-muted">Mobile: </small>
                    <p>+ 202-222-2121</p>
                    <button class="btn btn-round btn-success">View Profile</button>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('page-styles')

@stop

@section('page-script')
<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
{{-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}

<script>


    $(document).ready(function(){

      document.getElementById("bt").disabled = true;
        $('.javae').click(function(){

                var userid = $(this).attr("id");
                var _token = $('input[name="_token"]').val();

                  // document.getElementById(`userlist-${userid}`).style.background="grey";
                $.ajax({
                  url: "{{ route('messanger.fetchdata') }}",
                    method: "POST",
                    data:{userid:userid,_token:_token},
                    success:function(result)
                    {
                         var re=JSON.parse(result);
                        //  console.log(re);
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
                                  if (element.send_by == 0) {
                                      html+=` <li class="right clearfix">
                                <img class="user_pix" src="../assets/images/xs/avatar7.jpg" alt="avatar">
                                <div class="message">
                                    <p>${element.message}</p>
                                </div>
                                <span class="data_time">${element.created_at}</span>
                            </li>`;
                                  }
                                  else{

                                        html+=` <li class="left clearfix">
                                                <img class="user_pix" src="../assets/images/user.png" alt="avatar">
                                                <div class="message">
                                                    <p>${element.message}</p>
                                                </div>
                                                <span class="data_time">${element.created_at}</span>
                                            </li>`;
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
       var msd = $('#message').val();
       document.getElementById('history').innerHTML+=`<li class="right clearfix">
        <img class="user_pix" src="../assets/images/user.png" alt="avatar">
        <div class="message">
            <p>${msd}</p>
        </div>
        <span class="data_time"></span>
    </li>`;
$('.msg_history').animate({
height: $('.msg_history').get(0).scrollHeight
}, 1000);
                         var _token = $('input[name="_token"]').val();

       $.ajax({
              type: "POST",
              url: "{{ route('messanger.sendmessage') }}",
              data: {id:id,_token:_token,msd:msd}, // serializes the form's elements.
              success: function(data)
              {

                  
                        //  $(this).height('auto');
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
                    b=a.getElementsByTagName("div")[1];
                    c=b.getElementsByTagName("span")[0];
                    
                    //console.log(c.innerText);
                    txtValue = c.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        element.style.display = "";
                    } else {
                    element.style.display = "none";
                    }

                 });

            }
       </script>

@stop
