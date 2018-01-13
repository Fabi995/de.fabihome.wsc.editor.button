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
	 * @param array        $openingTag
	 * @param string       $content
	 * @param array        $closingTag
	 * @param BBCodeParser $parser
	 * @return string
	 */
        public function getParsedTag(array $openingTag, $content, array $closingTag, BBCodeParser $parser) {
                if ($parser->getOutputType() == 'text/html') {
                        $externalButtonLink = ($openingTag['attributes'][0]) ? !ApplicationHandler::getInstance()->isInternalURL($openingTag['attributes'][0]) : false;
                        if (!$externalButtonLink) {
	                        $openingTag['attributes'][0] = preg_replace('~^https?://~', RouteHandler::getProtocol(), $openingTag['attributes'][0]);
                        }
                        WCF::getTPL()->assign([
                                'title' => (!empty($openingTag['attributes'][1]) ? $openingTag['attributes'][1] : ''),
                                'icon'=> (!empty($openingTag['attributes'][2]) ? $openingTag['attributes'][2] : ''),
                                'isExternalButtonLink' => $externalButtonLink,
                        ]);
                        return WCF::getTPL()->fetch('btnBBCodeTag');
                }

        }
}