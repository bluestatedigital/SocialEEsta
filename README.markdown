#Socialite for EE2
##A plugin to generate Twitter "Tweet" and Facebook "Like" buttons.

### To Install:

Copy the "socialite" folder to /system/expressionengine/thirdparty/

###This plugin has two uses:

- Generate a Twitter "Tweet" button
- Generate a Facebook "Like" button

##Twitter Parameters 

Based on Tweet Button specs at http://dev.twitter.com/pages/tweet_button. 

All Parameters are optional, but the Tweet Button won't function as expected without at least "url" or "text".

    - url : The URL to share on Twitter. The URL should be absolute.
    - type : "iframe", "js", or "none". If no type is specified, defaults to iframe. The "js" version will also insert the Javascript.
    - count_url : The URL to which your shared URL resolves to; useful is the URL you are sharing has already been shortened. This affects the display of the Tweet count.
    - via : Screen name of the user to attribute the Tweet to.
    - text : Text of the suggested Tweet.
    - count_position : If set, determines where the counter is display. Valid values are "none", "horizontal", and "vertical". Defaults to "none".
    - related : Related accounts.
    - class : Assign a class attribute to the <a> element. Only used when type="none".
    - id : Assigns an ID attribute to the <a> element. Only used when type="none".
    - link_test : If type="none", this will display as the text of the "Tweet" link. Defaults to "Tweet"
    
Example tag: {exp:socialite:twitter url="{title_permalink='blog/entry'}" type="js" via="bsdwire" text="{title}" count_position="horizontal"}

##Facebook Like Button Parameters. 

Based on Facebook Social Plugin Specs at https://developers.facebook.com/docs/reference/plugins/like/

All parameters are optional, but the button won't function as expected without at least a "url".

    - url : The URL to Like on Facebook. Defaults to the Site Index (homepage) if no value is present.
    - type : "iframe" or "xfbml". Defaults to "iframe". If you choose "xfbml", you must include the Facebook Javascript SDK on your page.
    - layout : Accepts one of three options:
                - "standard" : No counter is displayed
                - "button_count" : A counter is displayed to the right of the like button
                - "box_count" : A counter is displayed above the like button
    - faces : whether to display profile photos below the button (standard layout only)
    - width : the width of the like button. Defaults to 250px.
    - verb : "like" or "recommend". Defaults to "like".
    - color : "light" or "dark". Defaults to "light".

Example tag: {exp:socialite:facebook url="{pages_url}" type="iframe" verb="recommend" color="light" layout="button_count" width="450"}