
<?php

//when the user goes to the /player url, it will go to player controller and depend on getPlayerName to get the data and tell it which view to use.
//the {id} is taken as a variable and passes it in the getPlayerName arguement 
Route::get('/player/{id}', 'PlayerController@getPlayerName');
