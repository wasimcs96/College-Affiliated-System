@extends('layout.master')
@section('parentPageTitle', 'messenger')
@section('title', 'Chat')


@section('content')
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="body">
                <div class="chatapp_list">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search...">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="icon-magnifier"></i></span>
                        </div>
                    </div>
                    <ul class="right_chat list-unstyled mb-0">
                        @foreach($users as $user)
                            <li class="online">
                                <a href="javascript:void(0);" id="{{$user->id}}" class="javae">
                                    <div class="media">
                                        <img class="media-object " src="../assets/images/xs/avatar3.jpg" alt="">
                                        <div class="media-body">
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
                <div class="chatapp_body">
                    <div class="chat-header clearfix">
                        <div class="row clearfix">
                            <div class="col-lg-12">
                                <div class="chat-about">
                                    <h6 class="m-b-0" id="hed" >Louis Pierce</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="chat-history">
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
                            {{-- <li class="right clearfix">
                                <img class="user_pix" src="../assets/images/xs/avatar5.jpg" alt="avatar">
                                <div class="message">
                                    <span>How is the project coming along?</span>
                                </div>
                                <span class="data_time">10:12 AM, Today</span>
                            </li>
                            <li class="left clearfix">
                                <img class="user_pix" src="../assets/images/user.png" alt="avatar">
                                <div class="message">
                                    <span>Project has been already finished and I have<br> results to show you.</span>
                                </div>
                                <span class="data_time">10:16 AM, Today</span>
                            </li> --}}
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
                         var _token = $('input[name="_token"]').val();

       $.ajax({
              type: "POST",
              url: "{{ route('messanger.sendmessage') }}",
              data: {id:id,_token:_token,msd:msd}, // serializes the form's elements.
              success: function(data)
              {

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
                   $(this).height('auto');
                   // document.getElementById('ms').innerHTML=" ";
               //    console.log(data); // show response from the php script.
              }
            });


   });
         </script>
         {{-- <script>
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
       </script> --}}

@stop
