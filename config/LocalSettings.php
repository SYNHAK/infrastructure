<?php
# This file was automatically generated by the MediaWiki 1.17.0
# installer. If you make manual changes, please keep track in case you
# need to recreate them later.
#
# See includes/DefaultSettings.php for all configurable settings
# and their default values, but don't forget to make changes in _this_
# file, not there.
#
# Further documentation for configuration settings may be found at:
# http://www.mediawiki.org/wiki/Manual:Configuration_settings

# Protect against web entry
if ( !defined( 'MEDIAWIKI' ) ) {
	exit;
}

## Uncomment this to disable output compression
# $wgDisableOutputCompression = true;

$wgSitename      = "SYNHAK";

## The URL base path to the directory containing the wiki;
## defaults for all runtime URL paths are based off of this.
## For more information on customizing the URLs please see:
## http://www.mediawiki.org/wiki/Manual:Short_URL
$wgScriptExtension  = ".php";
$wgScriptPath       = "/w";
$wgArticlePath      = "/wiki/$1";
$wgScript           = "$wgScriptPath/index.php";
$wgRedirectScript   = "$wgScriptPath/redirect.php";
$wgUsePathInfo      = true;

## The relative URL path to the skins directory
$wgStylePath        = "$wgScriptPath/skins";

## The relative URL path to the logo.  Make sure you change this from the default,
## or else you'll overwrite your logo when you upgrade!
$wgLogo             = "/logo.png";

## UPO means: this is also a user preference option

$wgEnableEmail      = true;
$wgEnableUserEmail  = true; # UPO

$wgEmergencyContact = "sysadmin@synhak.org";
$wgPasswordSender   = "sysadmin@synhak.org";

$wgEnotifUserTalk      = false; # UPO
$wgEnotifWatchlist     = false; # UPO
$wgEmailAuthentication = true;

## Database settings
$wgDBtype           = "mysql";
$wgDBserver         = '{{db_host}}';
$wgDBname           = "wiki";
$wgDBuser           = '{{db_user}}';
$wgDBpassword       = '{{db_password}}';

# MySQL specific settings
$wgDBprefix         = "";

# MySQL table options to use during installation or update
$wgDBTableOptions   = "ENGINE=InnoDB, DEFAULT CHARSET=utf8";

# Experimental charset support for MySQL 4.1/5.0.
$wgDBmysql5 = false;

## Shared memory settings
$wgMainCacheType    = CACHE_ACCEL;
$wgMemCachedServers = array();

## To enable image uploads, make sure the 'images' directory
## is writable, then set this to true:
$wgEnableUploads  = true;
$wgUseImageMagick = true;
$wgImageMagickConvertCommand = "/usr/bin/convert";

# InstantCommons allows wiki to use images from http://commons.wikimedia.org
$wgUseInstantCommons  = false;

## If you use ImageMagick (or any other shell command) on a
## Linux server, this will need to be set to the name of an
## available UTF-8 locale
$wgShellLocale = "en_US.utf8";

## If you want to use image uploads under safe mode,
## create the directories images/archive, images/thumb and
## images/temp, and make them all writable. Then uncomment
## this, if it's not already uncommented:
#$wgHashedUploadDirectory = false;

## If you have the appropriate support software installed
## you can enable inline LaTeX equations:
$wgUseTeX           = false;

## Set $wgCacheDirectory to a writable directory on the web server
## to make your wiki go slightly faster. The directory should not
## be publically accessible from the web.
#$wgCacheDirectory = "$IP/cache";

# Site language code, should be one of ./languages/Language(.*).php
$wgLanguageCode = "en";

$wgSecretKey = "67ce9062ba3396d3b580df354821a580c91eba398b174a0c27fa783bc0a5bfd0";

# Site upgrade key. Must be set to a string (default provided) to turn on the
# web installer while LocalSettings.php is in place
//$wgUpgradeKey = "6e4d228b3fefd854";

## Default skin: you can change the default skin. Use the internal symbolic
## names, ie 'standard', 'nostalgia', 'cologneblue', 'monobook', 'vector':
$wgDefaultSkin = "vector";

## For attaching licensing metadata to pages, and displaying an
## appropriate copyright notice / icon. GNU Free Documentation
## License and Creative Commons licenses are supported so far.
$wgEnableCreativeCommonsRdf = true;
$wgRightsPage = ""; # Set to the title of a wiki page that describes your license/copyright
$wgRightsUrl  = "http://www.gnu.org/copyleft/fdl.html";
$wgRightsText = "GNU Free Documentation License 1.3 or later";
$wgRightsIcon = "{$wgStylePath}/common/images/gnu-fdl.png";
# $wgRightsCode = ""; # Not yet used

# Path to the GNU diff3 utility. Used for conflict resolution.
$wgDiff3 = "/usr/bin/diff3";



# Query string length limit for ResourceLoader. You should only set this if
# your web server has a query string length limit (then set it to that limit),
# or if you have suhosin.get.max_value_length set in php.ini (then set it to
# that value)
$wgResourceLoaderMaxQueryLength = -1;


# End of automatically generated settings.
# Add more configuration options below.

require_once( "$IP/extensions/googleAnalytics/googleAnalytics.php" );
# Replace xxxxxxx-x with YOUR GoogleAnalytics UA number
$wgGoogleAnalyticsAccount = "UA-21458826-2";
 
# Optional Variables (both default to true)
$wgGoogleAnalyticsIgnoreSysops = false;
$wgGoogleAnalyticsIgnoreBots = false;
#If you use AdSense as well and have linked your accounts, to enable tracking set this to true
$wgGoogleAnalyticsAddASAC = false;

require_once( "$IP/extensions/ParserFunctions/ParserFunctions.php" );
$wgPFEnableStringFunctions = true;

$wgFileExtensions[] = 'svg';
$wgFileExtensions[] = 'pdf';
$wgAllowTitlesInSVG = true;
$wgSVGConverter = 'rsvg';

// Captcha
require_once( "$IP/extensions/ConfirmEdit/ConfirmEdit.php" );
// Begin not-quite-captcha-but-should-help-destroy-spam section
require_once( "$IP/extensions/ConfirmEdit/QuestyCaptcha.php" );
$wgCaptchaClass = 'QuestyCaptcha';
$wgCaptchaQuestions[] = array(
  'question' => 'Fill in the blank: SYN/HAK, The __________ Hackerspace. Hint: It is our city.',
  'answer' => 'Akron');
// End not-quite-captcha-but-should-help-destroy-spam section

require_once( "$IP/extensions/ConfirmEdit/ReCaptcha.php"); 
$wgCaptchaClass = 'ReCaptcha';
$wgReCaptchaPublicKey = '{{wg_captcha_public_key}}';
$wgReCaptchaPrivateKey = '{{wg_captcha_private_key}}';
$wgCaptchaTriggers['edit']          = true;
$wgCaptchaTriggers['create']        = true;
$wgCaptchaTriggers['addurl']        = true;
$wgCaptchaTriggers['createaccount'] = true;
$wgCaptchaTriggers['badlogin']      = true;
$wgGroupPermissions['*'            ]['skipcaptcha'] = false;
$wgGroupPermissions['user'         ]['skipcaptcha'] = true;
$wgGroupPermissions['autoconfirmed']['skipcaptcha'] = true;
$wgGroupPermissions['bot'          ]['skipcaptcha'] = true; // registered bots
$wgGroupPermissions['sysop'        ]['skipcaptcha'] = true;
$wgGroupPermissions['sysop'        ]['coding'] = true;

require_once( "$IP/extensions/Secured_HTML.php" );

require_once( "$IP/extensions/RSS/RSS.php" );

require_once("$IP/extensions/Nuke/Nuke.php");

require_once( "$IP/extensions/googleAgenda.php" );

include_once( "$IP/extensions/ExternalData/ExternalData.php" );

// Client side caching: We override this in apache.
// UPDATE: 2012-10-29 set to true for now, custom httpd cache rules are acting up.
$wgCachePages = true;

$wgAllowMicrodataAttributes = true;

$wgNamespacesWithSubpages = array_fill(0, 200, true);


//$wgReadOnly = 'OUTAGE: This wiki is in read-only mode until 5PM EST on August 28th.';
