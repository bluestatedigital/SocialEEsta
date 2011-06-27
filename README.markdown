#BSD SocialEEsta v1.0

This plugin has three uses:

- Generate Twitter "Tweet" and button
- Generate Twitter "Follow" and button 
- Generate a Facebook "Like" button


##Twitter "Tweet" Button Parameters =

(based on Tweet Button specs). All Parameters are optional, but the Tweet Button won't function as expected without at least "url" or "text".

- url  :  The URL to share on Twitter. The URL should be absolute.
- type  :  "iframe", "js" :  Default value: "iframe"  :  The "js" version will also insert the Javascript. See "include_js".
- count_url  :  The URL to which your shared URL resolves to; useful is the URL you are sharing has already been shortened. This affects the display of the Tweet count.
- via  :  Screen name of the user to attribute the Tweet to.
- text  :  Text of the suggested Tweet.
- count_position  :  "none", "horizontal", or "vertical"  :  Default value: "none".
- related  :  Related accounts.

###Type-specific Options:

Type "none" & "js":

- class  :  Assign a class attribute to the element. 
- id  :  Assigns an ID attribute to the  element. Only used when type="none".
- link_text  :  If type="none", this will display as the text of the "Tweet" link. Defaults to "Tweet"

Type "js":

- include_js  :  "yes" or "no"  :  Default value: yes  :  If "yes", the Twitter widgets.js file will be loaded.


###Example tag:

{exp:socialeesta:tweet url="{title_permalink='blog/entry'}" type="js" via="bsdwire" text="{title}" count_position="horizontal"}

##Twitter "Follow" Button Parameters =


###Required Parameters

- user  :   Default value: none  :  Which user to follow. Do not include the '@'.

###Optional Parameters

- type  :  "js" or "iframe"  :  Default value: "iframe"  :  Defines whether to use Javascript version or IFRAME version of the Follow Button.
- follower_count  :  "yes" or "no"  :  Default value: "no"  :  Whether to display the follower count adjacent to the follow button. 
- button_color  :  "blue" or "grey"  :  Default value: "blue"  :  Change the color of the button itself.
- text_color  :  Default value: none  :  Specify a hexadecimal color code for the "Followers count" and "Following state" text
- link_color  :  Default value: none  :  Specify a hexadecimal color code for the Username text
- lang  :  Default value: "en"  :  Specify the language for the button using ISO-639-1 Language code. Defaults to "en" (english).
- include_js  :  "yes" or "no"  :  Default value: "yes"  :  If "yes", the Twitter widget.js file will be loaded.


###Javascript button specific parameters — not supported with IFRAME version

- width  :  A pixel or percentage value to set the button element width
- align  :  "right" or "left" - Defaults to "left".


###Example tag:

{exp:socialeesta:follow user="bsdwire" follower_count="yes" type="js"}



## Facebook Like Button Parameters =


All parameters are optional, but the button won't function as expected without at least a "url".

- url  :  The URL to Like on Facebook. Defaults to the Site Index (homepage) if no value is present.
- type  :  "iframe" or "xfbml"  :  Defaults to "iframe". *If you choose "xfbml", you must include the Facebook Javascript SDK on your page.*
- layout  :  "standard", "button_count" or "box_count"  :  Default value: "standard"  :  1) "standard" : No counter is displayed; 2) "button_count" : A counter is displayed to the right of the like button; 3) "box_count" : A counter is displayed above the like button
- faces  :  "yes" or "no"  :  Default value: "no"  :  whether to display profile photos below the button (standard layout only)
- verb  :  "like" or "recommend"  :  Default value: "like".
- color  :  "light" or "dark"  :  Default value: "light".


###IFRAME specific parameters, not supported in the XFBML version

The height and width parameters have default values that depend upon the button layout chosen. [Refer to Facebook's documentation for more info.] (https://developers.facebook.com/docs/reference/plugins/like/)

- width  :  a value in pixels
- height  :  a value in pixels
    

###Example tag: 

{exp:socialeesta:like url="{pages_url}" type="iframe" verb="recommend" color="light" layout="button_count"}