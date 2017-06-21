<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
Use DB;
use Auth;
use App\Http\Controllers\Controller;

use App/Player;

class PlayerController extends Controller
{
  //the $id comes from the url. see routes.php
  public function getPlayerName($id)
  {
    //use the Player model, and filter out our result using the id from the url
      $player = Player::where("player_id","=",$id);

      //call our player view and pass in the player data
      return view("player")->with(["data"=>$player]);
  }
}
