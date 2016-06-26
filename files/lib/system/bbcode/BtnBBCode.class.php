<?php
namespace wcf\system\bbcode;
use wcf\system\WCF;
use wcf\system\application\ApplicationHandler;
use wcf\system\request\RouteHandler;

/**
 * Parses the [btn] bbcode tag.
 *
 * @author	Fabi_995
 * @copyright	2016 Fabian
 * @license	All rights reserved
 * @package	de.fabihome.wcf.bbcode.btn
 * @subpackage	system.bbcode
 * @category	Community Framework
 */
class BtnBBCode extends AbstractBBCode{
        
        /**
         * @see BBCode::getParsedTag()
         */
        public function getParsedTag(array $openingTag, $content, array $closingTag, BBCodeParser $parser) {
                if ($parser->getOutputType() == 'text/html') {
                        $externalButtonLink = ($content ? !ApplicationHandler::getInstance()->isInternalURL($content) : false);
                        if (!$externalButtonLink) {
                                $content = preg_replace('~^https?://~', RouteHandler::getProtocol(), $content);
                        }
                        WCF::getTPL()->assign(array(
                                'content' => $content,
                                'title' => (!empty($openingTag['attributes'][0]) ? $openingTag['attributes'][0] : ''),
                                'icon'=> (!empty($openingTag['attributes'][1]) ? $openingTag['attributes'][1] : ''),
                                'isExternalButtonLink' => $externalButtonLink,
                        ));
                        return WCF::getTPL()->fetch('btnBBCodeTag');
                }
				if ($parser->getOutputType() == 'text/plain') {
                        return $content;
                }
        }
}