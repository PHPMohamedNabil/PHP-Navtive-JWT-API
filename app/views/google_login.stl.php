@spread('lay')

@section('title')Google|Login@endsection   

@section('content')

<div class="row d-flex justify-content-center align-items-center">
   {%if session()->has('error')%}
       <div class="col-md-6 ">
           <div class="alert alert-danger alert-dismissible"  role="alert">
             <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>{%session()->flush('error')%}</strong>
           </div>
       </div>
   {%endif%}
   <div class="col-md-6 ">
      <p class="text-center"> 
         <a href="{$login_url}" class="btn btn-light">
            <img src="https://tinyurl.com/46bvrw4s" alt="Google Logo"> Login with Google
         </a>
      </p>
      
   </div>
</div>

@endsection