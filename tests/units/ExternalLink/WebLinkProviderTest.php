<?php

require_once __DIR__.'/../Base.php';

use Kanboard\ExternalLink\WebLinkProvider;

class WebLinkProviderTest extends Base
{
    public function testGetName()
    {
        $webLinkProvider = new WebLinkProvider($this->container);
        $this->assertEquals('Web Link', $webLinkProvider->getName());
    }

    public function testGetType()
    {
        $webLinkProvider = new WebLinkProvider($this->container);
        $this->assertEquals('weblink', $webLinkProvider->getType());
    }

    public function testGetDependencies()
    {
        $webLinkProvider = new WebLinkProvider($this->container);
        $this->assertEquals(array('related' => 'Related'), $webLinkProvider->getDependencies());
    }

    public function testMatch()
    {
        $webLinkProvider = new WebLinkProvider($this->container);

        $webLinkProvider->setUserTextInput('http://kanboard.net/');
        $this->assertTrue($webLinkProvider->match());

        $webLinkProvider->setUserTextInput('http://kanboard.net/mypage');
        $this->assertTrue($webLinkProvider->match());

        $webLinkProvider->setUserTextInput('  https://kanboard.net/ ');
        $this->assertTrue($webLinkProvider->match());

        $webLinkProvider->setUserTextInput('http:// invalid url');
        $this->assertFalse($webLinkProvider->match());

        $webLinkProvider->setUserTextInput('');
        $this->assertFalse($webLinkProvider->match());
    }

    public function testGetLink()
    {
        $webLinkProvider = new WebLinkProvider($this->container);
        $this->assertInstanceOf('\Kanboard\ExternalLink\WebLink', $webLinkProvider->getLink());
    }
}
