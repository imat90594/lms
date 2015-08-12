<?php

/**
 * @file
 * Default rules.
 */

/**
 * Implements hook_default_rules_configuration().
 */
function opigno_user_expiration_app_default_rules_configuration() {
  $items = array();
  $items['rules_user_expiration_cron'] = entity_import('rules_config', '{ "rules_user_expiration_cron" : {
    "LABEL" : "User Expiration Cron",
    "PLUGIN" : "reaction rule",
    "TAGS" : [ "cron", "og", "opigno" ],
    "REQUIRES" : [ "rules", "rules_conditional", "og" ],
    "ON" : [ "cron" ],
    "DO" : [
      { "variable_add" : {
          "USING" : { "type" : "integer", "value" : "1" },
          "PROVIDE" : { "variable_added" : { "node_status_published" : "Node Status Published" } }
        }
      },
      { "entity_query" : {
          "USING" : {
            "type" : "node",
            "property" : "status",
            "value" : [ "node-status-published" ],
            "limit" : "99999"
          },
          "PROVIDE" : { "entity_fetched" : { "published_nodes" : "published_nodes" } }
        }
      },
      { "LOOP" : {
          "USING" : { "list" : [ "published-nodes" ] },
          "ITEM" : { "published_node" : "published_node" },
          "DO" : [
            { "CONDITIONAL" : [
                {
                  "IF" : { "entity_is_of_type" : { "entity" : [ "published-node" ], "type" : "node" } },
                  "DO" : [
                    { "CONDITIONAL" : [
                        {
                          "IF" : { "node_is_of_type" : {
                              "node" : [ "published-node" ],
                              "type" : { "value" : { "course" : "course" } }
                            }
                          },
                          "DO" : [
                            { "LOOP" : {
                                "USING" : { "list" : [ "published-node:members--1" ] },
                                "ITEM" : { "published_node_active_member" : "Published node active member" },
                                "DO" : [
                                  { "LOOP" : {
                                      "USING" : { "list" : [ "published-node-active-member:og-membership--1" ] },
                                      "ITEM" : { "user_active_membership" : "User Active Membership" },
                                      "DO" : [
                                        { "CONDITIONAL" : [
                                            {
                                              "IF" : { "entity_is_of_type" : { "entity" : [ "user-active-membership:group" ], "type" : "node" } },
                                              "DO" : [
                                                { "CONDITIONAL" : [
                                                    {
                                                      "IF" : { "data_is" : {
                                                          "data" : [ "user-active-membership:group:nid" ],
                                                          "value" : [ "published-node:nid" ]
                                                        }
                                                      },
                                                      "DO" : [
                                                        { "CONDITIONAL" : [
                                                            {
                                                              "IF" : { "entity_has_field" : {
                                                                  "entity" : [ "user-active-membership" ],
                                                                  "field" : "opigno_user_membership_exp"
                                                                }
                                                              },
                                                              "DO" : [
                                                                { "CONDITIONAL" : [
                                                                    {
                                                                      "IF" : { "data_is" : {
                                                                          "data" : [ "user-active-membership:opigno-user-membership-exp" ],
                                                                          "op" : "\u003C",
                                                                          "value" : "now"
                                                                        }
                                                                      },
                                                                      "DO" : [
                                                                        { "CONDITIONAL" : [
                                                                            {
                                                                              "IF" : { "NOT data_is_empty" : { "data" : [ "user-active-membership:opigno-user-membership-exp" ] } },
                                                                              "DO" : [
                                                                                { "og_unsubscribe_user" : {
                                                                                    "user" : [ "published-node-active-member" ],
                                                                                    "group" : [ "published-node" ]
                                                                                  }
                                                                                }
                                                                              ]
                                                                            }
                                                                          ]
                                                                        }
                                                                      ]
                                                                    }
                                                                  ]
                                                                }
                                                              ]
                                                            }
                                                          ]
                                                        }
                                                      ]
                                                    }
                                                  ]
                                                }
                                              ]
                                            }
                                          ]
                                        }
                                      ]
                                    }
                                  }
                                ]
                              }
                            }
                          ]
                        }
                      ]
                    }
                  ]
                }
              ]
            }
          ]
        }
      }
    ]
  }
}');

  return $items;
}

