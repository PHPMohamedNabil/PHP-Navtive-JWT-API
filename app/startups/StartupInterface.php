<?php

namespace App\Startups;

interface StartupInterface{

	public function register();

	public function startup();
}