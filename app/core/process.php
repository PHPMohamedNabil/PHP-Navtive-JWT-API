<?php 


 function do_resize()
 {
    if (post('resize'))
    {    
   
	    if (validate_all('image'))
	    {
	       add_service_use();
	       do_jpgpng_resize('image');   
	       do_gif_resize('image');	
	       
	       

	    }
	    
        else
        {  
         
        	 error_msg();
        	 redirect_to(SITE_URL);
        	
        }
	    


    }

 }


 function do_gif_resize($gif)
 {
    
    if (is_gif(get_photo($gif)))
    {
      $gif=new Resize;
      $gif->resizegif($_FILES["image"]['tmp_name'],get_width(),get_height());

    }

    return false;



 }

 function do_jpgpng_resize($jpg_png)
 {

    if (is_png(get_photo($jpg_png)) || is_jpeg(get_photo($jpg_png)))
    {
       
       $photo=new Resize;
       $aspect=(getpostvalue('aspect')==='on')?1:0; 
       $photo->normalResize(get_photo($jpg_png),get_width(),get_height(),$aspect);
    
    }
    else
    {
    	  return false;
    }

 }

 function do_photo_resize($photo)
 {


 }

 function has_file($file)
 {
        return $_FILES[$file]['tmp_name'] !=='';
 }

 function get_file($file)
 {  
 	if (isset($_FILES))
 	{
 	   
 	   return $_FILES["$file"]['tmp_name'];
 	}

 	return false;
 }

 function get_width()
 {     
 	 return (int)getpostvalue('width');
 }

 function get_height()
 {
 	 return (int)getpostvalue('height');
 }



 function get_resize_case()
 {
    
 }



 function error_msg()
 {
 	$_SESSION['error']='Some Thing went Wrong while resizing your Photo Please Try again !!!';
 	return $_SESSION['error'];
 }

 function validate_all($photo)
 {  

 	if (!get_width() || !get_height() || !get_photo($photo))
 	{
 	    
 	   return false;
 	}
  
 	return true;


 } 

  
    
    function add_service_use()
    {    
         $data=getfiledata(DATABASE.'user_info.json');
         $array=json_decode($data,true);
         $ref=isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
         $extra=['using_date'=>date('d-m-y h:i:s a',time()),
                'ip_address'=>$_SERVER['REMOTE_ADDR'],
                'came_from'=>$ref
                ];
         $array[]=$extra;    
         $final_data=json_encode($array);   
         filewrite(DATABASE.'user_info.json',$final_data);
    }

    function get_service_use()
    {
        

    }

    function login()
    {
       if (post('login') && csrf_token())
       {   
         
             //die('asdasd');
         if (validate_login_data($_POST['email'],$_POST['password']))
         {     
              $data=(array)json_decode(getfiledata(DATABASE.'admin.json'));
              $_SESSION['online']=true;
              $_SESSION['last_viste']=$data['last_viste'];
              redirect_to(SITE_AD_URL.'index.php');
         
         }
             
       
       }  

    } 

    function logout()
    { 
      if (post('logout'))
      {
        if (csrf_token())
        {
         $data=getfiledata(DATABASE.'admin.json');
         $array=json_decode($data,true);
         $extra=date('F j h:i:s a');
                
         $array['last_viste']=$extra;    
         $final_data=json_encode($array);   
         filewrite(DATABASE.'admin.json',$final_data);
         unset($_SESSION['online']);
         redirect_to(SITE_AD_URL.'login.php');
        }
     
      }
      

    }

    function cms_middleware()
    {
        if (get_request_method() && isset($_SESSION['online']))
        {     
            return true;
               
        }

      
         redirect_to(SITE_AD_URL.'login.php');
    }


    function new_contact_info()
    {
          if (post('send'))
          {  
           
           $str=[
                 getpostvalue('cont_name'),
                 getpostvalue('cont_sub'),
                 getpostvalue('cont_msg')
                ];

              if (validate_contacts($str,getpostvalue('cont_email')))
               {
                   
                     $data=getfiledata(DATABASE.'contactus.json');

                   $array=json_decode($data,true);
        
         $extra=['name'   =>getpostvalue('cont_name'),
                 'subject'=>getpostvalue('cont_sub'),
                 'msg'    =>getpostvalue('cont_msg'),
                 'email'  =>getpostvalue('cont_email'),
                 'date'   =>date('m-d-y h:i:s')
                ];
                
                $array[]=$extra;    
                $final_data=json_encode($array);   
                filewrite(DATABASE.'contactus.json',$final_data);
                 $_SESSION['succ']='Your message had been sent thanks for contacting with us ';
               }

               else{
                  $_SESSION['error']='seems that there are missing information
                  ';
                  redirect_to(SITE_URL.'contacts.php');
               }
          

         }

    }

    function str_escap($str)
    {   

        if (is_array($str))
        {
           for ($i=0; $i <count($str); $i++)
           { 
              if(!filter_var($str[$i],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH))
              {
                   return false;
              }

           }
           return true;
        }
        return filter_var($str,FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH); 
    }


    function is_email($email)
    {
        return filter_var($email,FILTER_VALIDATE_EMAIL);
    }


    function validate_contacts($str,$email)
    {
        if (str_escap($str) && is_email($email))
        {
            return true;
        
        }
        return false;
    }

    function validate_login_data($username,$password)
    {
        $username=str_escap($username);
        $file    =file_get_contents(DATABASE.'admin.json');
            if ($file)
            {
              $data=(array)json_decode($file);
       
        if ($data['username'] === $username && passwordCheck($password,$data['password']))
               {
                   return true;
                   
               }
               return false;
            
            }
            return false;

            
    }


    function set_password($password)
    {
       return password_hash($password,PASSWORD_BCRYPT,['cost'=>11]);
    }

     function passwordCheck($password,$hashedpassword)
    {
        
      return password_verify($password,$hashedpassword);
         


    }


    function getfiledata($file)
    {    
        if (file_exists($file))
        {
             $data=file_get_contents($file);

              return $data;
        }

    }

    function filewrite($file,$data,$append=false)
    {  
        if (file_exists($file) && !$append)
        {     
           

            file_put_contents($file,$data);
        }
        else{
          file_put_contents($file,$data,FILE_APPEND);
        }
        

    }



