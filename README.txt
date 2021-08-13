/////////////////////////////////////
//   vHost (VistaPanel Hosting    //
//	 Company Script) Powered By   //
//          Mahtab Hassan		  	 //
//////////////////////////////////

First create a database and import the following database given in the .zip file

next you need to edit the config file and replace all of the required field given the constant values change database info , api info , mail info , and company references.(remmeber to list the ip address of the server in your reseller panel)

edit sitemap.xml and change url to your webhosting company

enable ssl support from your cPanel account

now go to your reseller panel and then go to cpanel adevert settings and add following lines and replace yourdomain.com/template with your company domain

<link rel="stylesheet" type="text/css" href="https://yourdomain.com/template/cpanel/styles.css">
<link rel="stylesheet" type="text/css" href="https://yourdomain.com/template/cpanel/styles.min.css">
<link rel="stylesheet" type="text/css" href="https://yourdomain.com/template/cpanel/icon_spritemap.css">

Now go to customization and edit .htaccess and add following lines and replace yourdomain.com/template with your company domain

ErrorDocument 400 https://yourdomain.com/400.html
ErrorDocument 401 https://yourdomain.com/401.html
ErrorDocument 403 https://yourdomain.com/403.html
ErrorDocument 404 https://yourdomain.com/404.html
ErrorDocument 503 https://yourdomain.com/503.html

Now go to customization and Default Index Page and add following lines

<html>
<head>
<title>Default Index Page</title>
</head>
<body>
<h2 style="text-align:center">Congratulations</h2>
<p style="text-align:center">Your account have been created successfully please change your website files using filemanager or ftp</p>
</body>
</html>

Now go to Package and create a package for your domain name and add the details and save settings


now everything is done rest assure