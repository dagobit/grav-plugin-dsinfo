<?php
namespace Grav\Plugin;

use \Grav\Common\Plugin;

class DsinfoPlugin extends Plugin
{
    public $features = [
        'blueprints' => 1000,
    ];
    protected $version;
    
    public function onPluginsInitialized()
    {
        if ($this->isAdmin()) {
            // Store this version and prefer newer method
            if (method_exists($this, 'getBlueprint')) {
                $this->version = $this->getBlueprint()->version;
            } else {
                $this->version = $this->grav['plugins']->get('admin')->blueprints()->version;
            }
        }
    }
    
    
    public static function getSubscribedEvents()
    {
        return [
          'onShortcodeHandlers' => ['onShortcodeHandlers', 0],
          // 'onTwigTemplatePaths' => ['onTwigTemplatePaths', 0],
      ];
    }
    
    

    public function onShortcodeHandlers()
    {
        $this->grav['shortcode']->registerAllShortcodes(__DIR__.'/shortcodes');
    }
}
