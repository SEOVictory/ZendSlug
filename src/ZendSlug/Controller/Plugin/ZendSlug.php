<?php
/**
 * ZendSlug
 *
 * @package ZF2 Modules
 * @category Plugin
 * @copyright 2013
 * @version 1.0 Beta
 *
 * @author Vincenzo Provenza <info@ilovecode.it>
 */
namespace ZendSlug\Controller\Plugin;
use Zend\Mvc\Controller\Plugin\AbstractPlugin;

class ZendSlug extends AbstractPlugin
{
    private $_separator;

    public function getSeparator ()
    {
        return $this->_separator;
    }

    public function setSeparator ($_replacement)
    {
        $this->_separator = $_replacement;
    }

    public function __construct($config = array())
    {
        $this->setSeparator($config['separator']);
    }

    protected function _checkReplacement($replacement = null)
    {
        return $replacement == NULL ? $this->getSeparator() : $replacement;
    }

    protected function _checkTitle($title)
    {
        if (!isset($title))
        {
            throw new \Exception('Field title is required.');
        }
    }

    protected function _url($string, $separator)
	{
		$q_separator = preg_quote($separator, '#');
		$code = array(
			'&.+?;'			        => '',
			'[^a-z0-9 _-]'	        => '',
			'\s+'			        => $separator,
			'('.$q_separator.')+'	=> $separator
		);

		$string = strip_tags($string);
		foreach ($code as $key => $val)
		{
			$string = preg_replace('#'.$key.'#i', $val, $string);
		}

		$string = strtolower($string);
		return trim($string);
	}

	protected function _create($data)
    {
        $replace = isset($data['separator']) && $data['separator'] != '' ? $data['separator'] : null;
        $separator = $this->_checkReplacement($replace);
        $this->_checkTitle($data['title']);
        return $this->_url($data['title'], $separator);
    }

    public function create($data = array())
    {
        $slug = $this->_create($data);
        echo $slug;
    }
}