@spread('lay')

@section('title')
 {$user_info[0]->first_name}  {$user_info[0]->last_name?'-'.$user_info[0]->last_name:''}| Profile
@endsection   

@section('content')
<div class="row d-flex justify-content-center align-items-center">
   <div class="col-md-6">
    <div class="card mb-4">
       @foreach($user_info as $user)
        <div class="card-body text-center">
         <img src="{$user->profile_pic}" alt="avatar"
           class="rounded-circle img-fluid" style="width: 150px;"/>
         <h5 class="my-3">{$user->first_name} {$user->last_name}</h5>
         <p class="text-muted mb-1"><b>ID</b>:{$user->id}</p>
         <p class="text-muted mb-1"><b>Gender</b>:{$user->gender}</p>
         <p class="text-muted mb-1"><b>Local</b>:{$user->local}</p>
         <p class="text-muted mb-4">{$user->email}</p>
       </div>
      @endforeach
    </div>
   </div>
 </div>

@endsection



