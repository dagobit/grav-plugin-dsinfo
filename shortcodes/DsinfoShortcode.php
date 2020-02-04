<?php

namespace Grav\Plugin\Shortcodes;

use Thunder\Shortcode\Shortcode\ShortcodeInterface;

class DsinfoShortcode extends Shortcode
{
    public function init()
    {
        $companyName = $this->grav['config']->get('plugins.dsinfo.company');
      
        $this->shortcode->getHandlers()->add('dsinfo-company', function (ShortcodeInterface $sc) use ($companyName) {
            return $companyName;
        });
        
        $address =  $this->grav['config']->get('plugins.dsinfo.address');
        $city = $this->grav['config']->get('plugins.dsinfo.city');
        
        $this->shortcode->getHandlers()->add(
            'dsinfo-addressbox',
            function (ShortcodeInterface $sc) use ($companyName, $address, $city) {
                return "<p>
            $companyName<br/>
            $address<br>
            $city
          </p>";
            }
        );
        
        $phone =  $this->grav['config']->get('plugins.dsinfo.phone');
        $fax = $this->grav['config']->get('plugins.dsinfo.fax');
        $email =  $this->grav['config']->get('plugins.dsinfo.email');
        
        $this->shortcode->getHandlers()->add(
            'dsinfo-tte',
            function (ShortcodeInterface $sc) use ($phone, $fax, $email) {
                return "<p>
                Telefon: $phone<br/> 
                Telefax: $fax<br/>  
                E-Mail: $email
          </p>";
            }
        );
        
        $taxid =  $this->grav['config']->get('plugins.dsinfo.taxid');
        $this->shortcode->getHandlers()->add(
            'dsinfo-taxid',
            function (ShortcodeInterface $sc) use ($taxid) {
                return $taxid;
            }
        );
        
        $this->shortcode->getHandlers()->add(
            'dsinfo-email',
            function (ShortcodeInterface $sc) use ($email) {
                return $email;
            }
        );
        
        
        $this->shortcode->getHandlers()->add(
            'dsinfo-authorinline',
            function (ShortcodeInterface $sc) use ($companyName,
          $address, $city) {
                return "$companyName ($address, $city)";
            }
        );
        
        
        
        $this->shortcode->getHandlers()->add(
            'dsinfo-info',
            function (ShortcodeInterface $sc) {
                return '<p>
              Dieser digitale Standort entstand mit Hilfe des Teams von <a href="https://www.digitaler-standort.de/">digitaler-standort.de</a>. Wir begleiten digitale Transformationen für KMUs.
            </p>';
            }
        );
    }
}
