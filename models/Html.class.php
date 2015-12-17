<?php
class Html{
	private $css = "";
	private $script = "";
	private $title = "DC run";
	private $navigation = "";
	private $header = "";
	private $footer = "";
	private $content = "";
	private $page = "";
	private $subpage = "";
	private $language = "cz";
	private $headline = "DC RUN";
	private $server = "";
	private $actualUrl = "";
	private $topLink = "";
	private $h1 = "";
	
// SERVER
	public function setServerAndUrl(){
		$this->server = $_SERVER['HTTP_HOST'];
		$this->actualUrl = $_SERVER['REQUEST_URI'];
	}
	public function getServer(){
		return $this->server;
	}
	public function getURL(){
		return $this->actualUrl;
	}
	
// CSS
	public function addCss($new){
		$this->css .= $new;
	}
	public function clearCss(){
		$this->css = "";
	}
	public function getCss(){
		return $this->css;
	}

// SCRIPT
	public function addScript($new){
		$this->script .= $new;
	}
	
	public function clearSrcipt(){
		$this->script = "";
	}
	
	public function getScript(){
		return $this->script;
	}
	
// TITLE
	public function addTitle($new){
		$this->title = $new . ' | ' . $this->title;
	}
	public function clearTitle() {
		$this->title = "ununik";
	}
	public function getTitle(){
		return $this->title;
	}
	
// NAVIGATION
	public function addToNavigation($name, $link) {
		$this->navigation .= "<a href='$link' title='$name'>$name</a>";  
	}
	
	public function getNavigation(){
		return $this->navigation;
	}
	
// HEADER
	public function addToHeader($new) {
		$this->header .= $new;
	}
	
	public function clearHeader() {
		$this->header = "";
	}
	
	public function getHeader() {
		return $this->header;
	}
	
	public function addToTopLink($new){
		$this->topLink .= $new;
	}
	public function getTopLink(){
		return $this->topLink;
	}
	
// FOOTER
	public function addToFooter($new){
		$this->footer .= $new;
	}
	
	public function clearFooter(){
		$this->footer = "";
	}
	
	public function getFooter(){
		return $this->footer;
	}
	
// CONTENT
	public function addToContent($new){
		$this->content .= $new;
	}
	
	public function clearContent(){
		$this->content = "";
	}
	
	public function getContent(){
		return $this->content;
	}
	public function setH1($new){
		$this->h1 = $new;
	}
	public function getH1(){
		return $this->h1;	
	}
	
// PAGE
	public function setPage($new){
		$this->page = $new;
	}
	public function addSubpage($new){
		$this->subpage .= '/' . $new;
	}
	public function getPage(){
		return $this->page;
	}
	public function getSubpages() {
		return $this->subpage;
	}
	public function setLanguage($lang){
		$this->language = $lang;
	}
	public function getLanguage(){
		return $this->language;
	}
	public function getPageController(){
		return "controllers/{$this->page}{$this->subpage}.php";
	}
	public function getPageAdminController(){
		return "controllers/admin/{$this->page}{$this->subpage}.php";
	}
	
// HEADLINE
	public function getHeadline(){
		return $this->headline;
	}
}