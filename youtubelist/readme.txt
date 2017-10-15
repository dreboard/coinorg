Youtube playlist jquery and php Gdata Api html5 installation

Requires PHP 5 and Curl or url fopen. It is coded using PHP 5 OOP.

Unzip the directory structure

index.php
dir js
dir css
dir cache
dir class

and upload to a directory on your webspace
Give the dir cache rights to write to if you use the cache option (chmod 666,755,777 whatever is used on your server)

Then call the script in your browser
http://www.myname.com/index.php

You will now see the default example page.
To adjust this script to your needs open up index.php in notepath or a php editor and make all the settings you want.
NB. don't use Dreamweaver or any other WYSIWYG editor.

All the settings are described in the example index.php !

Choose which feed you want
-keywords, playlist, favorites or username

Set it like this

//Keywords
$video = new youtubelist('keywords');
$video->set_keywords('HD nature');

//playlist
$video = new youtubelist('playlist');
$video->set_playlist('here the playlist ID');

//playlist
$video = new youtubelist('favorites');
$video->set_favorites('username');

//username
$video = new youtubelist('username');
$video->set_username('username');

-Easy remove the search option

Sort
-can be relevance (default), published, viewCount, rating

Set language filter
-for example english lr=en

safeSearch
-parameter none , moderate, strict

-Cache the xml feed(true or false)
(if true give the dir cache rights to write to)

Empty cached xml
-for example after one hour 60*60, one day 24*60*60 or 7*24*60*60 one week

You can easily make all kind of settings for the jquery

$(function() {
    $(".videoThumb").ytplaylist({html5: true, autoPlay: true, playOnLoad: false, holderId: 'ytvideo'});
});

Look in jquery.youtubeplaylist.js for all settings

If you want to use this app in your homepage I made some commands of the html needed for this app.

Good luck and happy viewing

Ceasar Feijen

