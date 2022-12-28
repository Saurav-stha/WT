# 1. HTML Lists
HTML lists allow web developers to group a set of related items in lists.
Unordered HTML List
An unordered list starts with the ul tag. Each list item starts with the li tag.
The list items will be marked with bullets (small black circles) by default:
Ordered HTML List
An ordered list starts with the ol tag. Each list item starts with the li tag.
The list items will be marked with numbers by default:


# 2. Semantics
 A semantic element clearly describes its meaning to both the browser and the developer.
Examples of semantic elements: form, table, and article - Clearly defines its content. 


# 3. HTML Formatting Elements
Formatting elements were designed to display special types of text:

b - Bold text
i - Italic text
em - Emphasized text
mark - Marked text
small - Smaller text
del - Deleted text
ins - Inserted text
sub - Subscript text
sup - Superscript text 
strong - Important text



# 4. Image, Audio and Video

# Image:
The img tag is used to embed an image in an HTML page.

Images are not technically inserted into a web page; images are linked to web pages. The img tag creates a holding space for the referenced image.

The img tag has two required attributes: 

src - Specifies the path to the image
alt - Specifies an alternate text for the image, if the image for some reason cannot be displayed
 Syntax: img src="source of the image" alt="name of the image" 

# Audio:
The audio tag is used to embed sound content in a document, such as music or other audio streams.
The audio tag contains one or more source tags with different audio sources. The browser will choose the first source it supports.
The text between the audio and audio tags will only be displayed in browsers that do not support the audio element.
There are three supported audio formats in HTML: MP3, WAV, and OGG. 

# Video:
The video tag is used to embed video content in a document, such as a movie clip or other video streams.

The video tag contains one or more source tags with different video sources. The browser will choose the first source it supports.
The text between the video and video tags will only be displayed in browsers that do not support the video element.
There are three supported video formats in HTML: MP4, WebM, and OGG. 


# 5. iframe
 An HTML iframe is used to display a web page within a web page.
The HTML iframe tag specifies an inline frame.
An inline frame is used to embed another document within the current HTML document.
Syntax: 
<iframe src="url" title="description"></iframe>