<?php

namespace App;

#use Illuminate\Notifications\Model;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    //the db table exactly as its spelled
    protected $table = 'player';

     //these are exact column names in the "Player" table
     //I didn't put ID in here. It would be best practice to set that column in the data base to auto increment to ensure that it is a unique value
    protected $fillable = [
        'player_first_name', 'player_last_name', 'phone_number', 'elo_score'
    ];

    //put exact column names that need protected
    protected $hidden = [
    ];
}
