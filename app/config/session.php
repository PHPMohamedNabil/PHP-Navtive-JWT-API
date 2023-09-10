<?php

// Session Settings : the supported session driver is file

return [
    //session storage settings

    'gc_maxlifetime'          =>   1800,
	'gc_divisor'              =>   50,
	'gc_probability'          =>   100,
	'session_life_time'       =>   env('SESSION_LIFE_TIME'), // session life since application start
	'session_last_access'     =>   env('SESSION_IDLE_TIME'), // session user activity idle time
	'save_path'               =>  SESSION_PATH, // path to session file
	
	//cookie settings
	'domain'                  =>   'localhost', //wirte only webiste domain name exapmle:facebook.com|google.com don't write full url with scheme for localhost just write localhost
	'lifetime'                =>   0, 
	'httponly'                =>   true, 
	'path'                    =>   '/', 
	'secure'                  =>   0, 
	'session_name'            =>   'CORESD' 

];