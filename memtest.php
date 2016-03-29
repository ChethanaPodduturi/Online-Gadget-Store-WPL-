<?php
// We will start by making a new MemCache instance, and assign it to the variable $mc
$mc = new Memcache;
 
// Using the $mc instance we will connect to our server, normally this will be on port 11211 (localhost)
$mc->connect('127.0.0.1', 11211) or die ("Could not connect");
 
// Memcache will save data to a specific unique key, you can set this to almost anything
$thekey = "PostCount";
 
// Now we are going to define the data, this will be saved to our $thekey
$thedata = "12340";
 
// Now to actually pass the key and data to memcache, note '0' means we are not going to have this expire after a specified amount of time.
$mc->set($thekey, $thedata, false, 0);
 
// Using $thekey we will get the memcache data back, this will be saved into our variable $result
$result = $mc->get($thekey);
 
echo $result; //will return 12340
?>