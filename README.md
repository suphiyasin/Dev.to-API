# Dev.to-API
# Usage
<center>
<b>First we need to include src.php. Then you need to enter Cookie and username
  <br/>
  
  ```
  <?php
include("src.php");
$use = new devto();
$use->cookie = 'COOKIE';
$use->username = "YOUR USERNAME FROM dev.to";
```
<br/>

 then you can use whatever function you want to use
<br/>

<h4>Examples</h4>
<br/>
User Follow / Unfollow :
<br/>

```
 <?php
include("src.php");
$use = new devto();
$use->cookie = 'COOKIE';
$use->username = "YOUR USERNAME FROM dev.to";
echo $use->follow("suphi", "follow");
// or echo $use->follow("suphi", "unfollow");
```
<br/>

Get Shared Posts:
```
 <?php
include("src.php");
$use = new devto();
$use->cookie = 'COOKIE';
$use->username = "YOUR USERNAME FROM dev.to";
sa = $use->getposts();
foreach($sa as $as){
	echo 'Link : <a href="https://dev.to'.$as['path'].'" target="_blank">https://dev.to'.$as['path'].'</a><br/>
	ID : '.$as['id'].'<br/><hr/><br/>';
}
```
<br/>

Create Comment : 
```
 <?php
include("src.php");
$use = new devto();
$use->cookie = 'COOKIE';
$use->username = "YOUR USERNAME FROM dev.to";
$use->createComment("comment, nice!", "https://dev.to/suphi/new-generation-buy-me-coffee-3c7i");  
```

Edit Profile :
```
include("src.php");
$use = new devto();
$use->cookie = 'COOKIE';
$use->username = "YOUR USERNAME FROM dev.to";
$use->editProfile("Name(*)", "Maıl Adress(*)", "username(*)", "Bio", "Location", "https://website.com");
```

React Message:
```
include("src.php");
$use = new devto();
$use->cookie = 'COOKIE';
$use->username = "YOUR USERNAME FROM dev.to";
//react a 'like', 'unicorn', 'readinglist'
$use->reactmessage("https://dev.to/suphi/new-generation-buy-me-coffee-3c7i", "unicorn"); 
```

Create Post:
```
include("src.php");
$use = new devto();
$use->cookie = 'COOKIE';
$use->username = "YOUR USERNAME FROM dev.to";
//Important: Your other content cannot have the same body as this content.
echo $use->createPost("Title", "Text - Body", "Hashtag, list, suphi");
```

