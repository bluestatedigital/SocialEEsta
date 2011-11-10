#BSD SocialEEsta v1.0

##All Social. No Fuss.

SocialEEsta adds social buttons to your ExpressionEngine pages with no fuss.

It supports Twitter's Tweet & Follow buttons, Facebook's Like button, and Google's +1 button.

## HTML5 Social Buttons By Default

SocialEEsta defaults to the HTML5 versions of these buttons; use the {exp:socialeesta:scripts} tag to add the Javascript required for each of these buttons to work.

##The tags:

- {exp:socialeesta:scripts}
- {exp:socialeesta:tweet}
- {exp:socialeesta:follow}
- {exp:socialeesta:like}
- {exp:socialeesta:plusone}


## Load Javascript Required by Social Buttons: {exp:socialeesta:scripts}

###Example tag:

```
{exp:socialeesta:scripts google="yes" twitter="yes" facebook="yes" fb_app_id="123456789" fb_channel_url="//www.yourdomain.com/path/to/channel.html"}
```

SocialEEsta provides the asynchronous version of all three scripts libraries. This tag can be placed anywhere within the &lt;body&gt; element.

- google  :  "yes"  :  Include the Javascript necessary to use the Google +1 button.
- twitter  :  "yes"  :  Include the Javascript necessary to use the HTML5 version of the Twitter Tweet and Follow buttons.
- facebook  :  "yes"  : Include the Facebook Javascript SDK, required to use the HTML5 version of the Like button.
- fb_app_id  :  Your site's Facebook App ID. Required if you are loading the Facebook Javascript SDK.
- fb_channel_url  :  This is optional, but Facebook recommends it. See https://developers.facebook.com/docs/reference/javascript/ for more information.


## Twitter Tweet Button: {exp:socialeesta:tweet} 


###Example tag:

```
{exp:socialeesta:tweet url="{title_permalink='blog/entry'}" type="iframe" via="bsdwire" text="{title}" count_position="vertical"}
```

All Parameters are optional.

- url  :  The URL to share on Twitter. The URL should be absolute.
- type  :  "js", "iframe" :  Default value: "js"  :  Defines whether to use HTML5 version or iframe version of the Tweet Button.
- count_url  :  The URL to which your shared URL resolves to; useful is the URL you are sharing has already been shortened. This affects the display of the Tweet count.
- via  :  Screen name of the user to attribute the Tweet to.
- text  :  Text of the suggested Tweet.
- count_position  :  "none", "horizontal", or "vertical"  :  Default value: "horizontal".
- related  :  Up to 2 related accounts, separated by a comma. These accounts are suggested to the user after they publish the Tweet.



## Twitter Follow Button: {exp:socialeesta:follow}

###Example tag:

```
{exp:socialeesta:follow user="bsdwire" follower_count="yes" type="iframe"}
```

###Required Parameters

- user  :   Default value: none  :  Which user to follow. Do not include the '@'.

###Optional Parameters

- type  :  "js" or "iframe"  :  Default value: "js"  :  Defines whether to use HTML5 version or iframe version of the Follow Button.
- follower_count  :  "yes" or "no"  :  Default value: "no"  :  Whether to display the follower count adjacent to the follow button. 
- button_color  :  "blue" or "grey"  :  Default value: "blue"  :  Change the color of the button itself.
- text_color  :  Default value: none  :  Specify a hexadecimal color code for the "Followers count" and "Following state" text. Omit the '#' character.
- link_color  :  Default value: none  :  Specify a hexadecimal color code for the Username text. Omit the '#' character.
- lang  :  Default value: "en"  :  Specify the language for the button using ISO-639-1 Language code. Defaults to "en" (english).

###Javascript button specific parameters — not supported with iframe version

- width  :  A pixel or percentage value to set the button element width
- align  :  "right" or "left" - Defaults to "left".




##Facebook Like Button: {exp:socialeesta:like}


###Example tag: 

```
{exp:socialeesta:like url="{pages_url}" type="iframe" verb="recommend" color="light" layout="button_count"}
```

All parameters are optional.

- href  :  The URL to Like on Facebook. Default value: the page on which the button is present.
- type  :  "html5" or "iframe" :  Defaults to "html5". 
- layout  :  "standard", "button_count" or "box_count"  :  Default value: "button_count"  :  1) "standard" : No counter is displayed; 2) "button_count" : A counter is displayed to the right of the like button; 3) "box_count" : A counter is displayed above the like button
- verb  :  "like" or "recommend"  :  Default value: "like".
- color  :  "light" or "dark"  :  Default value: "light".
- font :  "arial", "lucida grande", "segoe ui", "tahoma", "trebuchet ms", "verdana" : Default value: "lucida grande" (Facebook's default)

###Layout-specific parameters

The height and width parameters have default values that depend upon the button layout chosen. Refer to Facebook's documentation for more info: https://developers.facebook.com/docs/reference/plugins/like/

- faces  :  "true" or "false"  :  Default value: "false"  :  whether to display profile photos below the button (standard layout only)
- width  :  a value in pixels
- height  :  a value in pixels




## Google Plus One Button: {exp:socialeesta:plusone}

###Example tag: 

```
{exp:socialeesta:plusone size="standard" annotation="inline" href="{site_url}"}
```

All parameters are optional:

- href  :  The URL to publicly +1. Defaults to the page on which the button is present.
- size  :  'small', 'medium', 'standard', or 'tall  :  Default value: 'medium'.
- annotation  :  'none', 'bubble', or 'inline'  :  Default value: bubble. 
- width  :  a value in pixels (e.g. '250')  :  Applied only to buttons where annotation="inline"
- callback  :  If specified, this function is called after the user clicks the +1 button. See the Google +1 button docs for additional details: https://developers.google.com/+/plugins/+1button/