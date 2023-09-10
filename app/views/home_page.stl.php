@spread('lay')

@section('title')
{$user_info['givenName']} {$user_info['familyName']} |Profile
@endsection   

@section('content')

 <div class="row d-flex justify-content-center align-items-center">
   <div class="col-md-6">
     <div class="card mb-4">
       <div class="card-body text-center">
         <img src="{$user_info['picture']}" alt="avatar"
           class="rounded-circle img-fluid" style="width: 150px;"/>
         <h5 class="my-3">{$user_info['givenName']} {$user_info['familyName']}</h5>
         <p class="text-muted mb-1"><b>ID</b>:{$user_info['id']}</p>
         <p class="text-muted mb-4">{$user_info['email']}</p>
       </div>
     </div>
   </div>
 </div>

@endsection