<?php
   //Photo Contest Facebook APP
   //Created and Copyright Zbynek Hovorka
   //Official FB page - https://www.facebook.com/pages/Photo-Contest-FB-App/457225521028147
   //Special Thanks - Josef Kuchar
   
   
   //Photo contest. For translating just overwrite existing phrase
   
   //Global
   define('_PAGETITLE', 'Photo Contest - Home');
   define('_THERMSANDC', 'Therms of use');
   define('_TITLEFAQ', 'FAQ');
   define('_YOURENTRIES', 'Your Entries');
   define('_WINNERCONTEST', 'Winner!');
   define('_VOTESCONTEST', 'Votes');
   
   //IMPORTANT!!
   //Facebook Locale list http://www.facebook.com/translations/FacebookLocales.xml
   define('_FBLOCALE', 'en_US'); //for example english en_US, for czech cs_CZ, for german de_DE . 
   
   
   //Top and Bottom Menu  
   define('_UPLOADIMAGE', 'Upload Image');
   define('_SHOWGALLERY', 'Gallery');
   define('_MYIMAGES', 'Your Entries');
   define('_RULES', 'Rules &amp; Prizes');
   define('_ORGANIZER', 'Organizer');
   define('_CUSTOMPAGE', 'Custom Page');
   define('_PRIVACYPOLICY', 'Privacy Policy and Terms of Use');
   define('_PRIVACYPOLICY2', 'Privacy Policy');
   
   
   //Posts on the Wall
   
   // This line show up to user on facebook wall after voting. USER NAME just voted for image in PHOTO CONTEST NAME
   define('_JUSTVOTED', 'just voted for image in');
   // This line show up to user on facebook wall after image uploading. USER NAME had just participated in the contest PHOTO CONTEST NAME
   define('_JOININGCONTEST', 'is currently participating in the contest');
   // Caption of the post
   define('_APPNAME', 'Photo Contest');
   
   
   
   //Messages  
   define('_MSGCONTESTHASENDED', 'The Contest has ended on date:');
   define('_MSGCONTESTSTART', 'The Photo Contest has not yet begun. Starts on date:');
   define('_MSGUPLOADLIMIT', 'Note: Sorry, but you can not upload another image. Your image limit for this competition was exhausted.:');
   define('_ERRNOIMAGE', 'Error: No image was chosen');
   define('_ERRWRONGFILEFORMAT', 'Error: Invalid file format. Only .PNG, .JPG, .GIF are allowed file formats');
   define('_ERRPHOTOTITLE', 'Error: Photo Title is required field');
   define('_VOTESUCCESS', 'Success: The vote was successful. Thank you for your vote!');
   define('_ERRVOTED', 'Notice: For this image you have already voted! You can not voting twice the same image!');
   define('_ERRORMSG', 'Error: ');
   define('_ERRNOIMAGEUPLOADED', 'You are not uploaded any pictures yet.');
   define('_SUCCESUPLOAD', 'Success: Upload was successful');
   define('_ERRUPLOAD', 'Error: Upload was not successful. Please try again!');
   define('_NOMOREVOTING', 'Contest has ended. This image can not longer be voted');
   define('_DELETESUCCESS', 'Success: Photo was deleted successfully!');
   define('_DELETEERROR', 'Error: Photo was not deleted!');
   define('_SUCCESSSAVE', 'Success: Settings have been saved!');
   define('_SUCCESSEDIT', 'Success: Edit was successful!');
   define('_ERROREDIT', 'Error: Edit was not successful!');
   define('_LOGGEDOUT', 'You have been logged out');
   
   
   //Upload Form
   define('_MAXCHARACTER', 'Maximum number of characters is');
   define('_UPLOADPHOTO', 'Upload Photo');
   define('_CHOOSEPHOTO', 'Choose Photo');
   define('_PHOTONAME', 'Caption');
   define('_REQUIREDFIELD', '* Required');
   define('_DESCRIPTION', 'Description');
   define('_MAXLENGHT250', '(Max. 250 characters)');
   define('_LEFT250', 'Left:');
   define('_WRITTEN250', 'Written:');
   define('_UPLOADBUTTON', 'Upload');
   define('_AGREEWITH', 'Insert a photo into the contest by clicking on the "Upload" button. Clicking this button you agree with');
   define('_THERMSCONDITIONS', 'Terms and Conditions');
   
   //Gallery
   define('_ORDEREDBY', 'Ordered by');
   define('_NEWEST', 'Newest');
   define('_OLDEST', 'Oldest');
   define('_MOSTVOTES', 'Most voted');
   define('_LEASTVOTES', 'Least votes');
   define('_IMGDETAIL', 'Display');
   define('_IMGVOTES', 'vote(s)');
   define('_TITGALLERY', 'Gallery');
   
  
   //Detail page
   define('_DETAILTITLE', 'Detailed Image');
   define('_IMGNEXT', 'Next');
   define('_IMGPREV', 'Previous');
   define('_INVITEFB', 'Invite your friends');
   define('_INVITEFBBUTTON', 'Invite friends');
   define('_POSTTOWALL', 'Post to Wall');
   define('_DTAUTHOR', 'Author:');
   define('_DTCAPTION', 'Caption:');
   define('_DTDESCRIPTION', 'Description:');
   define('_DTVOTE', 'Vote!');
   define('_DTVOTES', 'vote(s)');
   
   //Your Entries
   define('_YITITLE', 'On this page you will find an overview of your photos, including the number of votes. Only you can see this content.');
   define('_YIAUTHOR', 'Author:');
   define('_YICAPTION', 'Caption:');
   define('_YINUMBEROFVOTES', 'Number of votes:');
   
   //Admin Control Panel
   define('_LOGINTITLE', 'Login to Admin Control Panel');
   define('_ACPUSER', 'User');
   define('_ACPPASS', 'Password');
   define('_ADMINCP', 'Admin Control Panel');
   define('_ASETTINGS', 'Settings');
   define('_APHOTOS', 'Entries');
   define('_LOGOUT', 'Logout');
   define('_LOGIN', 'Login');
   define('_EDITCUSTOMPAGE', 'Edit Custom Page');
   define('_EDITTERMS', 'Edit Rules');
   define('_EDITTERMSPRIZES', 'Edit Rules and Prizes');
   define('_EDITPRIVACY', 'Edit Privacy');
   define('_EDITPRIVACYANDTERMS', 'Edit Privacy and Terms of Use');
   define('_STATISTICS', 'Statistics');
   define('_TOTALIMAGES', 'Total images in contest:');
   define('_TOTALVOTES', 'Total votes in contest:');
   define('_STARTDATE', 'Start date (Format YYYY-MM-DD HH-MM-SS)');
   define('_ENDDATE', 'End date (Format YYYY-MM-DD HH-MM-SS)');
   define('_CONTESTTITLE', 'Title');
   define('_IMAGESPERUSER', 'Images per user');
   define('_LINKORGANIZER', 'Link to organizers home page');
   define('_IMAGESPERPAGE', 'Images per page');
   define('_TRACKINGCODE', 'Tracking code (For example Google Analytics)');
   define('_SAVESETTINGS', 'Save Settings');
   define('_IMAGEMANAGEMENT', 'Image Management');
   define('_SEARCHIMAGE', 'Search image by caption');
   define('_SEARCHBUTTON', 'Search');
   define('_LASTENTRIES', 'Last Entries');
   define('_ACPDELETE', 'Delete');
   define('_ACPEDIT', 'Edit');
   define('_ENTRIESID', 'ID');
   define('_ENTRIESIMAGES', 'Images');
   define('_ENTRIESVOTES', 'Votes');
   define('_ENTRIESUSER', 'User');
   define('_ALLENTRIES', 'All entries');
   define('_SEARCHRESULTS', 'Search results:');
   define('_SEARCHNORESULTS', 'No results');
   define('_MENUTITLE', 'Title (for menu)');
   define('_ALLOW', 'Allow Custom Page?');
   define('_ACPYES', 'Yes');
   define('_ACPNO', 'No');
   define('_CUSTOMPAGECONTENT', 'Content');
   
   
?>