<?php

namespace WPGraphQLRedirection\Type\ObjectType;

class RedirectionItem
{

	/**
	 * Register the RedirectionItem type to the Schema
	 *
	 * @return void
	 */
	public static function register_type()
	{
		register_graphql_object_type('RedirectionItemType', [
			'description' => __('A Redirection Item object', 'wpgraphql-redirection'),
			'interfaces'  => [],
			'fields'      => [
				'databaseId'  => [
					'type'        => 'Int',
					'description' => __('The ID of the redirect', 'wpgraphql-redirection'),
				],
				'url'        => [
					'type'        => 'String',
					'description' => __('The source URL', 'wpgraphql-redirection'),
				],
				'matchUrl'   => [
					'type'        => 'String',
					'description' => __('The URL pattern to match', 'wpgraphql-redirection'),
				],
				'matchData'  => [
					'type'        => 'String',
					'description' => __('Additional match data', 'wpgraphql-redirection'),
				],
				'isRegex'    => [
					'type'        => 'Boolean',
					'description' => __('Whether this is a regex redirect', 'wpgraphql-redirection'),
				],
				'actionData' => [
					'type'        => 'String',
					'description' => __('The target URL or action data', 'wpgraphql-redirection'),
				],
				'code'       => [
					'type'        => 'Int',
					'description' => __('The HTTP status code', 'wpgraphql-redirection'),
				],
				'actionType' => [
					'type'        => 'String',
					'description' => __('The type of redirect action', 'wpgraphql-redirection'),
				],
				'matchType'  => [
					'type'        => 'String',
					'description' => __('The type of URL matching', 'wpgraphql-redirection'),
				],
				'title'      => [
					'type'        => 'String',
					'description' => __('The title of the redirect', 'wpgraphql-redirection'),
				],
				'lastAccess' => [
					'type'        => 'Int',
					'description' => __('The timestamp of the last access', 'wpgraphql-redirection'),
				],
				'hits'       => [
					'type'        => 'Int',
					'description' => __('The number of hits', 'wpgraphql-redirection'),
				],
				'status'     => [
					'type'        => 'String',
					'description' => __('The status of the redirect (enabled/disabled)', 'wpgraphql-redirection'),
				],
				'position'   => [
					'type'        => 'Int',
					'description' => __('The position in the redirect list', 'wpgraphql-redirection'),
				],
				'groupId'    => [
					'type'        => 'Int',
					'description' => __('The ID of the group this redirect belongs to', 'wpgraphql-redirection'),
				],
				'isDynamic'  => [
					'type'        => 'Boolean',
					'description' => __('Whether this is a dynamic redirect', 'wpgraphql-redirection'),
				],
			],
		]);
	}
}