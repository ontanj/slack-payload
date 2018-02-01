<?php

/**
 * Payload object to perform operations on in order to extract 
 * information from the payload sent by Slack when dealing
 * with interactive messages.
 * 
 * @author Anton Jeppsson (ontanj)
 *
 */

namespace SlackPayload;

class Payload {
    
    private $payload;
    
    function __construct($payload) {
        $this->payload = json_decode($payload,true);
    }
    
    /**
     * Gets callback id for the used attachment
     * @return string callback id
     */
    public function callback_id() : string {
        return $this->payload["callback_id"];
    }
    
    /**
     * Gets id for the channel the message came from
     * @return string channel id
     */
    public function channel_id() : string {
        return $this->payload["channel"]["id"];
    }
    
    /**
     * Gets name of the channel the message came from
     * @return string channel name
     */
    public function channel_name() : string {
        return $this->payload["channel"]["name"];
    }
    
    /**
     * Gets the choice made, either selected list item or pressed button.
     * @return string value of choice
     */
    public function choice() : string {
        if ($this->payload["actions"][0]["type"] === "button") {
            return $this->payload["actions"][0]["name"];
        }
        if ($this->payload["actions"][0]["type"] === "select") {
            return $this->payload["actions"][0]["selected_options"][0]["value"];
        }
        trigger_error("Unknown option", E_USER_ERROR);
    }
    
    /**
     * Gets the URL to return a response to
     * @return string URL
     */
    public function response_url() : string {
        return $this->payload["response_url"];
    }
    
    /**
     * Gets the name of the menu where the list item was chosen.
     * If choice wasn't made from a list, the button value is returned.
     * @return string menu name
     */
    public function menu_name() : string {
        if ($this->payload["actions"][0]["type"] === "button") {
            return $this->choice();
        }
        return $this->payload["actions"][0]["name"];
    }
    
    /**
     * Gets the id of the slack team where the message was sent from.
     * @return string team id
     */
    public function team_id() : string {
        return $this->payload["team"]["id"];
    }
    
    /**
     * Gets the name of the slack team where the message was sent from.
     * @return string team name
     */
    public function team_name() : string {
        return $this->payload["team"]["domain"];
    }
    
    /**
     * Gets the id of the user performing the action
     * @return string user id
     */
    public function user_id() : string {
        return $this->payload["user"]["id"];
    }
    
    /**
     * Gets the name of the user performing the action
     * @return string user name
     */
    public function user_name() : string {
        return $this->payload["user"]["name"];
    }
}
