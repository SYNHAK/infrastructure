<?php
# create namespace
define("NS_HTML",122);
define("NS_HTML_TALK",123);
$wgExtraNamespaces[NS_HTML] = "HTML";
$wgExtraNamespaces[NS_HTML_TALK] = "HTML_talk";
# protect namespace
$wgNamespaceProtection[NS_HTML] = Array("coding");
$wgNamespacesWithSubpages[NS_HTML] = true;
$wgGroupPermissions['*']['coding'] = false;
$wgGroupPermissions['coding']['coding'] = true;
$wgAvailableRights[] = 'coding';
$wgExtensionMessagesFiles['Secured_HTML'] = dirname(__FILE__) . '/Secured_HTML.i18n.php';
$wgExtensionFunctions[] = "wfSecuredHTMLExtension";
$wgHooks['LanguageGetMagic'][]       = 'efHtml_Magic';
$wgExtensionCredits['parserhook'][] = array(
  'name' => 'Secured HTML',
  'author' => 'Shaiaqua',
  'url'            => 'http://www.mediawiki.org/wiki/Extension:Secured_HTML',
  'description' => 'Lets you include arbitrary HTML in an authorized and secure way',
);
function wfSecuredHTMLExtension() {
    global $wgParser;
    $wgParser->setFunctionHook( "html", "renderSecuredHTML" );
    //wfLoadExtensionMessages('Secured_HTML');
}
function efHtml_Magic( &$magicWords, $langCode ) {
    $magicWords['html'] = array( 0, 'html' );
    return true;
}
function renderSecuredHTML( &$parser, $param1 = '', $param2 = '' ) {
    $title    = Title::makeTitleSafe( NS_HTML, $param1 );
    if(!$title->exists())return "[[${param1}]]";    // return standard red link if page doesn't exist
    if(!$title)return false;
    $revision = Revision::newFromTitle( $title );
    if(!$revision)return false;
    $wikitext = $revision->getText();
    if($param2){
        $params = explode('&',$param2);
        foreach($params as $param) {
            $param = explode('=',$param);
            $wikitext = str_replace('{{{'.$param[0].'|}}}',$param[1],$wikitext);
            $wikitext = str_replace('{{{'.$param[0].'}}}',$param[1],$wikitext);
        }
    }
    $wikitext = preg_replace('/{{{[^}]+\|}}}/','',$wikitext);
    $output = $wikitext;
    return array($output, 'noparse' => true, 'isHTML' => true);
}
