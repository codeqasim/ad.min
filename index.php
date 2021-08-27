<?php

/*
session_start();
$_SESSION['app_name'] = "KHARIDAR";

echo "<pre>";
print_r($_SESSION);
echo "</pre>";
*/

?>


<!DOCTYPE HTML>
<html>
<head>
<title>App</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui">
<meta http-Equiv="Cache-Control" Content="no-cache" />
<link rel="stylesheet" href="style.css" />
</head>
<body onload="document.body.style.opacity='1'">

<h1 id="pagename"></h1>

<a href="home">home</a>
<a href="about">about</a>

<div id="app"></div>
</body>
</html>


<script>
   var config = {
   api_url: "https://api.kharidar.co/api/v1/", /* make sure the url should end with slash " / " */
   appname: "Kharidar",
   language: "en",
   currency: "PKR",
   logo: "http://api.kharidar.co/public/assets/img/logo.png"
   }

   // trigger async function
   // log response or catch error of fetch promise

   // document.getElementById('app').innerHTML = data.app.appname;
   // document.getElementById("logo").src = config.logo;

   // appname = sessionStorage.app.appname;
   // sessionStorage.setItem('app', JSON.stringify(response))

   const categories = JSON.parse(sessionStorage.getItem("categories"));

   // variable is undefined or null
   if (typeof categories === 'undefined' || categories === null) {

   // Rainbow Giant Styled Text
   const style = 'font-weight: bold; font-size: 14px;';
   console.log('%c Loading Categories', style);

   async function fetchAsync () {

   // await response of fetch call
   let response = await fetch(config.api_url+'categories');

   // only proceed once promise is resolved

   let data = await response.json();
   // only proceed once second promise is resolved

   // store to session
   sessionStorage.setItem('categories', JSON.stringify(data.data))

   return data;

   }

   fetchAsync()
   .then(data => console.log(data.data))

   } else {

   // Rainbow Giant Styled Text
   const style = 'font-weight: bold; font-size: 14px;';
   console.log('%c Categories Cached', style);
   console.log(categories);

   }

   // =========================================================== //

   var uri=window.location.pathname.split('/');

   console.log(uri[2])

   if (uri[2] == "about"){
    document.getElementById('pagename').innerHTML = 'About Us';
   }

   if (uri[2] == "home"){
    document.getElementById('pagename').innerHTML = 'Home';
   }

//    function printdiv(printdivname) {
//     var headstr = "<html><head><title>Booking Details</title></head><body>";
//     var footstr = "</body>";
//     var newstr = document.getElementById(printdivname).innerHTML;
//     var oldstr = document.body.innerHTML;
//     document.body.innerHTML = headstr+newstr+footstr;
//     window.print();
//     document.body.innerHTML = oldstr;
//     return false;
// }
</script>