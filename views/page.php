<?php
return "<!doctype html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width; initial-scale=1.0'>
        <title>{$html->getTitle()}</title>
        {$html->getCss()}
        {$html->getScript()}
    </head>
    <body onload='script_start()'>
    	<div id='topLink'>{$html->getTopLink()}</div>
    	<div id='header'><h1>{$html->getHeadline()}</h1>{$html->getHeader()}</div>
    	<nav><div id='headline'>{$html->getH1()}</div>{$html->getNavigation()}</nav>
    	<div id='content'>{$html->getContent()}</div>
    	<div id='footer'>{$html->getFooter()}</div>
    </body>
</html>";