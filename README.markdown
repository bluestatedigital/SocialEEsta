#BSD SocialEEsta v1.5

##All Social. No Fuss.

SocialEEsta adds social buttons to your ExpressionEngine pages with no fuss.

## HTML5 Social Buttons By Default

SocialEEsta defaults to the HTML5 versions of these buttons; use the {exp:socialeesta:scripts} tag to add the Javascript required for each of these buttons to work.

##SocialEEsta Supports…

- Twitter Tweet: {exp:socialeesta:tweet}
- Twitter Follow: {exp:socialeesta:follow}
- Facebook Like: {exp:socialeesta:like}
- Google +1 / Google+ Share: {exp:socialeesta:plusone}
- LinkedIn Share: {exp:socialeesta:linkedin}
- Pinterest Pin It: {exp:socialeesta:pinit}
- …and the Javascript that's required for the buttons to work: {exp:socialeesta:scripts}

## Load Javascript Required by Social Buttons: {exp:socialeesta:scripts}

###Example tag:

```
{exp:socialeesta:scripts scripts="facebook|twitter" fb_app_id="YOUR FACEBOOK APP ID" fb_channel_url="YOUR FACEBOOK CHANNEL URL"}
```

SocialEEsta provides the asynchronous version of all three script libraries with protocol neutral URLs. This tag can be placed anywhere within the page, but you'll probably be happiest with it just before the closing &lt;/body&gt; tag.

- scripts : "facebook", "twitter", "google", "linkedin", "pinterest" :  A pipe-separated list of Javascript libraries to include.
- fb_app_id  :  Your site's Facebook App ID. Required if you are loading the Facebook Javascript SDK.
- fb_channel_url  :  This is optional, but Facebook recommends it. See [Facebook's documentation](https://developers.facebook.com/docs/reference/javascript/) for more information.
- fb_canvas_autogrow  :  "true", "false", or an integer. See [Facebook's documentation](https://developers.facebook.com/docs/reference/javascript/FB.Canvas.setAutoGrow/) for more information.

## Twitter Tweet Button: {exp:socialeesta:tweet} 


###Example tag:

```
{exp:socialeesta:tweet url="{title_permalink='blog/entry'}" type="iframe" via="bsdwire" text="{title}" count_position="vertical"}
```

All Parameters are optional.

- url  :  The URL to share on Twitter. The URL should be absolute.
- type  :  "html5", "iframe" :  Default value: "html5"  :  Defines whether to use HTML5 version or iframe version of the Tweet Button.
- count_url  :  The URL to which your shared URL resolves to; useful if the URL you are sharing has already been shortened. This affects the display of the Tweet count.
- via  :  Screen name of the user to attribute the Tweet to.
- text  :  Text of the suggested Tweet.
- count_position  :  "none", "horizontal", or "vertical"  :  Default value: "horizontal".
- related  :  Up to 2 related accounts, separated by a comma. These accounts are suggested to the user after they publish the Tweet.
- size  : "large" or "medium  :  Default value: "medium"  : Specifies the size of the button.


See [Twitter's documentation](https://dev.twitter.com/docs/tweet-button) for additional information about any of the above parameters.

## Twitter Follow Button: {exp:socialeesta:follow}

###Example tag:

```
{exp:socialeesta:follow user="bsdwire" follower_count="yes" type="iframe"}
```

###Required Parameters

- user  :   Default value: none  :  Which user to follow. Do not include the '@'.

###Optional Parameters

- type  :  "html5" or "iframe"  :  Default value: "html5"  :  Defines whether to use HTML5 version or iframe version of the Follow Button.
- show_screen_name  :  "yes" or "no"  : Default value: "yes"  :  Defines whether to display the username within the button
- follower_count  :  "yes" or "no"  :  Default value: "no"  :  Whether to display the follower count adjacent to the follow button. 
- lang  :  Default value: "en"  :  Specify the language for the button using ISO-639-1 Language code. Defaults to "en" (english).
- size  : "large" or "medium  :  Default value: "medium"  : Specifies the size of the button.


###Javascript button specific parameters — not supported with iframe version

- width  :  A pixel or percentage value to set the button element width. Must include unit (px/%).
- align  :  "right" or "left" - Defaults to "left".

See [Twitter's documentation](https://dev.twitter.com/docs/follow-button) for additional information about any of the above parameters.



##Facebook Like Button: {exp:socialeesta:like}


###Example tag: 

```
{exp:socialeesta:like href="{pages_url}" type="iframe" action="recommend" color="light" layout="button_count"}
```

All parameters are optional.

- href  :  The URL to Like on Facebook. Default value: the page on which the button is present.
- type  :  "html5" or "iframe" :  Defaults to "html5". 
- send  :  "true" or "false"  :  Defaults to "false"  :  Include send button.
- layout  :  "standard", "button_count" or "box_count"  :  Default value: "button_count"  :  1) "standard" : No counter is displayed; 2) "button_count" : A counter is displayed to the right of the like button; 3) "box_count" : A counter is displayed above the like button
- action  :  "like" or "recommend"  :  Default value: "like".
- color  :  "light" or "dark"  :  Default value: "light".
- font :  "arial", "lucida grande", "segoe ui", "tahoma", "trebuchet ms", "verdana" : Default value: "lucida grande" (Facebook's default)

###Layout-specific parameters

The height and width parameters have default values that depend upon the button layout chosen. Refer to [Facebook's documentation for more info](https://developers.facebook.com/docs/reference/plugins/like/).

- show_faces  :  "true" or "false"  :  Default value: "false"  :  whether to display profile photos below the button (standard layout only)
- width  :  a value in pixels
- height  :  a value in pixels




## Google+ Buttons, +1 and G+ Share: {exp:socialeesta:plusone}

###Example tag: 

```
{exp:socialeesta:plusone size="standard" annotation="inline" href="{site_url}"}
```

All parameters are optional:

- href  :  The URL to publicly +1. Defaults to the page on which the button is present.
- size  :  'small', 'medium', 'standard', or 'tall  :  Default value: 'medium'.
- annotation  :  'none', 'bubble', or 'inline'  :  Default value: bubble. 
- width  :  a value in pixels (e.g. '250')  :  Applied only to buttons where annotation="inline". Do not include 'px'.
- action : 'share'  :  Use G+ 'share' button instead of +1. No param needed for the +1 button.
- callback  :  If specified, this function is called after the user clicks the +1 button. 

Refer to the [Google +1 button docs](https://developers.google.com/+/plugins/+1button/) for additional details.

## LinkedIn Share Button: {exp:socialeesta:linkedin}

All parameters are optional:

- url  :  The URL to share on LinkedIn. Defaults to the page on which the button is present.
- counter  : 'top', 'right'  :  Default value: no counter. Display a share count above or to the right of the button.
- show_zero  :  'true'  :  Default value: false. Display a 'zero' in the counter if the URL has not been shared.
- on_success  : A Javascript callback to run if the share is successful.
- on_error  : A Javascript callback to run if the share is not successful or an error occurs.

## Pinterest Pin It Button: {exp:socialeesta:pinit}

###Example tag:

````
{exp:socialeesta:pinit url="{title_permalink='blog/entry'}" media="{blog_image}" count="horizontal" description="{blog_summary}"}
````

#### Required parameters:

- url  :  The URL of the page the pin is on
- media  :  The URL of the image to be pinned

####Optional parameters

- count  :  'horizontal', 'vertical', or 'none'  :  Default value: none.
- description  :  A description of the image to be pinned.

