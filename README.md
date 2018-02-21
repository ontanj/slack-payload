# Payload

When using interactive messages in Slack's API, the result is returned as a json encoded array through `$_POST["payload"]`. This application helps extracting information from that payload.

## Installation

`composer require ontanj/slack-payload`

## Usage 

The Payload class is in the namespace `SlackPayload`.

To instantiate the Payload class, pass `$_POST["payload"]` to the contructor.
Now you can recieve the information by using functions of the object.

### Available functions
```
/**
 * Gets callback id for the used attachment
 * @return string callback id
 */
public function callback_id() : string

/**
 * Gets id for the channel the message came from
 * @return string channel id
 */
public function channel_id() : string

/**
 * Gets name of the channel the message came from
 * @return string channel name
 */
public function channel_name() : string

/**
 * Gets the choice made, either selected list item or pressed button.
 * @return string value of choice
 */
public function choice() : string

/**
 * Gets the name of the menu where the list item was chosen.
 * If choice wasn't made from a list, the button value is returned.
 * @return string menu name
 */
public function menu_name() : string

/**
 * Gets the URL to return a response to
 * @return string URL
 */
public function response_url() : string

/**
 * Gets the id of the slack team where the message was sent from.
 * @return string team id
 */
public function team_id() : string

/**
 * Gets the name of the slack team where the message was sent from.
 * @return string team name
 */
public function team_name() : string

/**
 * Gets the id of the user performing the action
 * @return string user id
 */
public function user_id() : string

/**
 * Gets the name of the user performing the action
 * @return string user name
 */
public function user_name() : string
```

## Future

The aim is to include more functions. Feel free to contribute.
