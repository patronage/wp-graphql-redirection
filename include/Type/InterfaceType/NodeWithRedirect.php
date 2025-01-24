<?php

namespace WPGraphQL\Type\InterfaceType;

use Red_Item;
use WPGraphQLRedirection\Model\RedirectionItem;

class NodeWithRedirect
{
    /**
     * Registers the NodeWithRedirect Type to the Schema
     *
     * @return void
     */
    public static function register_type()
    {
        register_graphql_interface_type(
            'NodeWithRedirect',
            [
                'description' => __('A node that may have a redirect associated with it', 'wpgraphql-redirection'),
                'fields'      => [
                    'redirect' => [
                        'type'        => 'RedirectionItemType',
                        'description' => __('The redirect configuration for this node, if one exists', 'wpgraphql-redirection'),
                        'resolve'     => function ($source) {
                            if (empty($source->uri)) {
                                return null;
                            }

                            $items = Red_Item::get_for_matched_url($source->uri);

                            if (empty($items)) {
                                return null;
                            }

                            foreach ($items as $item) {
                                if ($item->get_match($source->uri)) {
                                    return new RedirectionItem($item, $source->uri);
                                }
                            }

                            return null;
                        },
                    ],
                ],
            ]
        );
    }
}
