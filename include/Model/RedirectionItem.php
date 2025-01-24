<?php

namespace WPGraphQLRedirection\Model;

use Red_Item;
use Exception;
use WPGraphQL\Model\Model;

/**
 * Class RedirectionItem - Models the data for redirection items
 *
 * @property int    $databaseId
 * @property string $url
 * @property string $matchUrl
 * @property string $matchData
 * @property bool   $isRegex
 * @property string $actionData
 * @property int    $code
 * @property string $actionType
 * @property string $matchType
 * @property string $title
 * @property int    $lastAccess
 * @property int    $hits
 * @property string $status
 * @property int    $position
 * @property int    $groupId
 * @property bool   $isDynamic
 *
 * @package WPGraphQLRedirection\Model
 */
class RedirectionItem extends Model
{

	/**
	 * Stores the incoming redirection item to be modeled
	 *
	 * @var Red_Item $data
	 */
	protected $data;

	/**
	 * Source uri to redirect from.
	 */
	private $uri;

	/**
	 * Redirection Item constructor.
	 *
	 * @param array $item The incoming redirection item to be modeled
	 *
	 * @throws \Exception Throws Exception.
	 */
	public function __construct($item, $uri = null)
	{
		$this->data = $item;
		$this->uri  = $uri;
		parent::__construct();
	}

	/**
	 * Initializes the object
	 *
	 * @return void
	 */
	protected function init()
	{
		if (empty($this->fields)) {
			$this->fields = [
				'databaseId'  => function () {
					return ! empty($this->data) ? $this->data->get_id() : null;
				},
				'url'        => function () {
					return ! empty($this->data) ? $this->data->get_url() : null;
				},
				'matchUrl'   => function () {
					return ! empty($this->data) ? $this->data->get_match_url() : null;
				},
				'matchData'  => function () {
					return ! empty($this->data) ? $this->data->get_match_data() : null;
				},
				'isRegex'    => function () {
					return ! empty($this->data) ? $this->data->is_regex() : null;
				},
				'actionData' => function () {
					return ! empty($this->data) ? $this->data->get_action_data() : null;
				},
				'code'       => function () {
					return ! empty($this->data) ? $this->data->get_action_code() : null;
				},
				'actionType' => function () {
					return ! empty($this->data) ? $this->data->get_action_type() : null;
				},
				'matchType'  => function () {
					return ! empty($this->data) ? $this->data->get_match_type() : null;
				},
				'title'      => function () {
					return ! empty($this->data) ? $this->data->get_title() : null;
				},
				'lastAccess' => function () {
					return ! empty($this->data) ? $this->data->get_last_hit() : null;
				},
				'hits'       => function () {
					return ! empty($this->data) ? $this->data->get_hits() : null;
				},
				'status'     => function () {
					return ! empty($this->data) ? ($this->data->is_enabled() ? 'enabled' : 'disabled') : null;
				},
				'position'   => function () {
					return ! empty($this->data) ? $this->data->get_position() : null;
				},
				'groupId'    => function () {
					return ! empty($this->data) ? $this->data->get_group_id() : null;
				},
				'isDynamic'  => function () {
					return ! empty($this->data) ? $this->data->is_dynamic() : null;
				},
			];
		}
	}
}