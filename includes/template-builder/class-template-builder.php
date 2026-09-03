<?php

namespace GrozomartToolkit\TemplateBuilder;

defined('ABSPATH') || exit;

class Template_Builder
{

	protected static $instance = null;

	public static function instance()
	{
		if (null === self::$instance) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 */
	public function __construct()
	{
		$this->include_builder_cpt();
	}

	public function include_builder_cpt()
	{
		include_once GROZOMART_TOOLKIT_INCLUDES . '/template-builder/includes/class-post-type.php';
		include_once GROZOMART_TOOLKIT_INCLUDES . '/template-builder/includes/class-metaboxes.php';
		include_once GROZOMART_TOOLKIT_INCLUDES . '/template-builder/includes/class-rule.php';
		include_once GROZOMART_TOOLKIT_INCLUDES . '/template-builder/includes/class-admin.php';
		include_once GROZOMART_TOOLKIT_INCLUDES . '/template-builder/includes/class-frontend.php';
	}
}

Template_Builder::instance();
