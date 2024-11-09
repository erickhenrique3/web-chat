<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PageController extends Controller
{
   public function Chat(){
    return Inertia::render('Chat');
   }
   public function Emoji(){
      return Inertia::render('Emoji');
     }
   public function Dashboard(){
    return Inertia::render('Dashboard');
   }
}
