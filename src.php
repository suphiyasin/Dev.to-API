<?php
class devto{
	public $cookie;
	public $username;

	
	
	
	
	
	public function createPost($title, $text, $hashtag = null){
		$post = '{"article":{"formKey":"2022-06-13T12:40:06.392Z","id":null,"title":"'.$title.'","tagList":"'.$hashtag.'","description":"","canonicalUrl":"","series":"","allSeries":[],"bodyMarkdown":"'.$text.'","published":true,"submitting":false,"editing":false,"mainImage":null,"organizations":[],"organizationId":null,"edited":true,"updatedAt":null,"version":"v2","siteLogo":"<a href=\"/\" class=\"site-logo\" aria-label=\"DEV Community Home\">\n    <img class=\"site-logo__img\" src=\"https://dev-to-uploads.s3.amazonaws.com/uploads/logos/resized_logo_UQww2soKuUsjaOGNB38o.png\" alt=\"DEV Community\">\n</a>\n","helpFor":"article_body_markdown","helpPosition":362,"isModalOpen":false,"markdownLintErrors":[]}}';
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://dev.to/articles');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$headers = array();
$headers[] = 'Authority: dev.to';
$headers[] = 'Accept: application/json';
$headers[] = 'Accept-Language: tr-TR,tr;q=0.9';
$headers[] = 'Content-Type: application/json';
$headers[] = 'Cookie: '.$this->cookie.'';
$headers[] = 'Origin: https://dev.to';
$headers[] = 'Referer: https://dev.to/new';
$headers[] = 'Sec-Ch-Ua: \" Not A;Brand\";v=\"99\", \"Chromium\";v=\"102\", \"Google Chrome\";v=\"102\"';
$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
$headers[] = 'Sec-Ch-Ua-Platform: \"Windows\"';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: same-origin';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36';
$headers[] = 'X-Csrf-Token: TM0yu8hybfAmQpILoUNzf0KuSnedROEH7crLHT3CRg1q551QEdWkP6U2BPMv2V3Dkl7o673b-FYEdgwU0QNvVg';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result = curl_exec($ch);
$resp = json_decode($result, true);
$kid = $resp['id'];
return $kid;
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);
}

public function getUserID($user){
	require("load.php");
$ch = curl_init();
$url = 'https://dev.to/'.$user.'?i=i';

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$headers = array();
$headers[] = 'Authority: dev.to';
$headers[] = 'Accept: */*';
$headers[] = 'Accept-Language: tr-TR,tr;q=0.9';
$headers[] = 'Cookie: '.$this->cookie.'';
$headers[] = 'If-None-Match: W/\"fc66304eb1f3716c5434a4c6d81df7c5\"';
$headers[] = 'Referer: https://dev.to/notifications';
$headers[] = 'Sec-Ch-Ua: \" Not A;Brand\";v=\"99\", \"Chromium\";v=\"102\", \"Google Chrome\";v=\"102\"';
$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
$headers[] = 'Sec-Ch-Ua-Platform: \"Windows\"';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: same-origin';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
	preg_match_all('/data-article-author-id="(.*?)"/m',$result,$output);
	$resp = $output[1][0];
return $resp;
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

}



public function getPosts(){
	$userid = $this->getUserID($this->username);
	$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://dev.to/search/feed_content?per_page=15&page=0&user_id='.$userid.'&class_name=Article&sort_by=published_at&sort_direction=desc&approved=');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$headers = array();
$headers[] = 'Authority: dev.to';
$headers[] = 'Accept: application/json';
$headers[] = 'Accept-Language: tr-TR,tr;q=0.9';
$headers[] = 'Content-Type: application/json';
$headers[] = 'Cookie: '.$this->cookie.'';
$headers[] = 'If-None-Match: W/\"f87f6997c150497a56d46d5a010acf02\"';
$headers[] = 'Referer: https://dev.to/ataturk';
$headers[] = 'Sec-Ch-Ua: \" Not A;Brand\";v=\"99\", \"Chromium\";v=\"102\", \"Google Chrome\";v=\"102\"';
$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
$headers[] = 'Sec-Ch-Ua-Platform: \"Windows\"';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: same-origin';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36';
$headers[] = 'X-Csrf-Token: 6nYyQHWd8WKhsQyc-qwNGcwGrWO40FfM5uRFMbusWf3MXJ2rrDo4rSLFmmR0NiOlHPYP_5hPTp0PWII4V21wpg';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
$response = json_decode($result, true);
$resp = $response['result'];
return $resp;
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);
	
	
}

public function getToken(){
	$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://dev.to/async_info/base_data');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$headers = array();
$headers[] = 'Authority: dev.to';
$headers[] = 'Accept: */*';
$headers[] = 'Accept-Language: tr-TR,tr;q=0.9';
$headers[] = 'Cookie: '.$this->cookie.'';
$headers[] = 'If-None-Match: W/\"0ca361697a8fe58c7c2975f910ad1cd1\"';
$headers[] = 'Referer: https://dev.to/frezyx';
$headers[] = 'Sec-Ch-Ua: \" Not A;Brand\";v=\"99\", \"Chromium\";v=\"102\", \"Google Chrome\";v=\"102\"';
$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
$headers[] = 'Sec-Ch-Ua-Platform: \"Windows\"';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: same-origin';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
$response = json_decode($result, true);
$resp = $response['token'];
return $resp;
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

}


public function follow($userx = null, $type = null){
	
		$id = $this->getUserID($userx);
	$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://dev.to/follows');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '------WebKitFormBoundarylCfk44H4gb781Rex
Content-Disposition: form-data; name="followable_type"

User
------WebKitFormBoundarylCfk44H4gb781Rex
Content-Disposition: form-data; name="followable_id"

'.$id.'
------WebKitFormBoundarylCfk44H4gb781Rex
Content-Disposition: form-data; name="verb"

'.$type.'
------WebKitFormBoundarylCfk44H4gb781Rex
Content-Disposition: form-data; name="authenticity_token"

'.$this->getToken().'
------WebKitFormBoundarylCfk44H4gb781Rex--');
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$headers = array();
$headers[] = 'Authority: dev.to';
$headers[] = 'Accept: */*';
$headers[] = 'Accept-Language: tr-TR,tr;q=0.9';
$headers[] = 'Content-Type: multipart/form-data; boundary=----WebKitFormBoundarylCfk44H4gb781Rex';
$headers[] = 'Cookie: '.$this->cookie.'';
$headers[] = 'Origin: https://dev.to';
$headers[] = 'Referer: https://dev.to/frezyx';
$headers[] = 'Sec-Ch-Ua: \" Not A;Brand\";v=\"99\", \"Chromium\";v=\"102\", \"Google Chrome\";v=\"102\"';
$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
$headers[] = 'Sec-Ch-Ua-Platform: \"Windows\"';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: same-origin';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36';
$headers[] = 'X-Csrf-Token: PmvdG4lHlzU0aEXI6pHEswcs5PReuneC42_GUkEjgsgYQXLwUOBe-rcc0zBkC-oP19xGaH4lbtMK0wFbreKrkw';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
$respo = json_decode($result, true);
$resp = $respo['outcome'];
return $resp;
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);
	
	
}


public function getCommentId($url){
	
	
	$ch = curl_init();
	$url2 = $url.'?i=i';
	curl_setopt($ch, CURLOPT_URL, $url2);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

	$headers = array();
	$headers[] = 'Authority: dev.to';
	$headers[] = 'Accept: */*';
	$headers[] = 'Accept-Language: tr-TR,tr;q=0.9';
	$headers[] = 'Cookie: '.$this->cookie.'';
	$headers[] = 'Referer: https://dev.to/suphi';
	$headers[] = 'Sec-Ch-Ua: \" Not A;Brand\";v=\"99\", \"Chromium\";v=\"102\", \"Google Chrome\";v=\"102\"';
	$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
	$headers[] = 'Sec-Ch-Ua-Platform: \"Windows\"';
	$headers[] = 'Sec-Fetch-Dest: empty';
	$headers[] = 'Sec-Fetch-Mode: cors';
	$headers[] = 'Sec-Fetch-Site: same-origin';
	$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36';
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

	$result = curl_exec($ch);
	
	
	preg_match_all('/data-commentable-id="(.*?)"/m',$result,$output);
	
	$resp = $output[1][0];
return($resp);
	if (curl_errno($ch)) {
		echo 'Error:' . curl_error($ch);
	}
	curl_close($ch);

		
	
}

public function reactmessage($url, $type){
	$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://dev.to/reactions');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '------WebKitFormBoundary5sEG6cAhMNLRWIaJ
Content-Disposition: form-data; name="reactable_type"

Article
------WebKitFormBoundary5sEG6cAhMNLRWIaJ
Content-Disposition: form-data; name="reactable_id"

'.$this->getCommentId($url).'
------WebKitFormBoundary5sEG6cAhMNLRWIaJ
Content-Disposition: form-data; name="category"

'.$type.'
------WebKitFormBoundary5sEG6cAhMNLRWIaJ
Content-Disposition: form-data; name="authenticity_token"

ANl5GSpQWSLDKHoJ4WvMalQDuvp5Nc7AT7wsUAt4UKUm89by8_eQ7UBc7PFv8eLWhPMYZlmq15GmAOtZ57l5_g
------WebKitFormBoundary5sEG6cAhMNLRWIaJ--');
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$headers = array();
$headers[] = 'Authority: dev.to';
$headers[] = 'Accept: */*';
$headers[] = 'Accept-Language: tr-TR,tr;q=0.9';
$headers[] = 'Content-Type: multipart/form-data; boundary=----WebKitFormBoundary5sEG6cAhMNLRWIaJ';
$headers[] = 'Cookie: '.$this->cookie.'';
$headers[] = 'Origin: https://dev.to';
$headers[] = 'Referer: https://dev.to/suphi/new-generation-buy-me-coffee-3c7i';
$headers[] = 'Sec-Ch-Ua: \" Not A;Brand\";v=\"99\", \"Chromium\";v=\"102\", \"Google Chrome\";v=\"102\"';
$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
$headers[] = 'Sec-Ch-Ua-Platform: \"Windows\"';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: same-origin';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36';
$headers[] = 'X-Csrf-Token: ANl5GSpQWSLDKHoJ4WvMalQDuvp5Nc7AT7wsUAt4UKUm89by8_eQ7UBc7PFv8eLWhPMYZlmq15GmAOtZ57l5_g';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

	
	
	
}


public function editProfile($username = null, $mail = null, $userTag = null, $bio = null, $location = null, $web = null){
	$id = $this->getUserID($this->username);

$ch = curl_init();
$url = 'https://dev.to/profiles/'.$id;
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, '------WebKitFormBoundary5PxfIJ0JxABPhmvS
Content-Disposition: form-data; name="utf8"

✓
------WebKitFormBoundary5PxfIJ0JxABPhmvS
Content-Disposition: form-data; name="_method"

put
------WebKitFormBoundary5PxfIJ0JxABPhmvS
Content-Disposition: form-data; name="authenticity_token"

'.$this->getToken().'
------WebKitFormBoundary5PxfIJ0JxABPhmvS
Content-Disposition: form-data; name="user[name]"

'.$username.'
------WebKitFormBoundary5PxfIJ0JxABPhmvS
Content-Disposition: form-data; name="user[email]"

'.$mail.'
------WebKitFormBoundary5PxfIJ0JxABPhmvS
Content-Disposition: form-data; name="users_setting[display_email_on_profile]"

0
------WebKitFormBoundary5PxfIJ0JxABPhmvS
Content-Disposition: form-data; name="user[username]"

'.$userTag.'
------WebKitFormBoundary5PxfIJ0JxABPhmvS
Content-Disposition: form-data; name="user[profile_image]"; filename=""
Content-Type: application/octet-stream


------WebKitFormBoundary5PxfIJ0JxABPhmvS
Content-Disposition: form-data; name="profile[website_url]"

'.$web.'
------WebKitFormBoundary5PxfIJ0JxABPhmvS
Content-Disposition: form-data; name="profile[location]"

'.$location.'
------WebKitFormBoundary5PxfIJ0JxABPhmvS
Content-Disposition: form-data; name="profile[summary]"

'.$bio.'
------WebKitFormBoundary5PxfIJ0JxABPhmvS
Content-Disposition: form-data; name="profile[currently_learning]"


------WebKitFormBoundary5PxfIJ0JxABPhmvS
Content-Disposition: form-data; name="profile[skills_languages]"


------WebKitFormBoundary5PxfIJ0JxABPhmvS
Content-Disposition: form-data; name="profile[currently_hacking_on]"


------WebKitFormBoundary5PxfIJ0JxABPhmvS
Content-Disposition: form-data; name="profile[available_for]"


------WebKitFormBoundary5PxfIJ0JxABPhmvS
Content-Disposition: form-data; name="profile[work]"


------WebKitFormBoundary5PxfIJ0JxABPhmvS
Content-Disposition: form-data; name="profile[education]"


------WebKitFormBoundary5PxfIJ0JxABPhmvS
Content-Disposition: form-data; name="users_setting[brand_color1]"

#000000
------WebKitFormBoundary5PxfIJ0JxABPhmvS
Content-Disposition: form-data; name="users_setting[brand_color2]"

#ffffff
------WebKitFormBoundary5PxfIJ0JxABPhmvS--');
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$headers = array();
$headers[] = 'Authority: dev.to';
$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9';
$headers[] = 'Accept-Language: tr-TR,tr;q=0.9';
$headers[] = 'Cache-Control: max-age=0';
$headers[] = 'Content-Type: multipart/form-data; boundary=----WebKitFormBoundary5PxfIJ0JxABPhmvS';
$headers[] = 'Cookie: '.$this->cookie.'';
$headers[] = 'Origin: https://dev.to';
$headers[] = 'Referer: https://dev.to/settings';
$headers[] = 'Sec-Ch-Ua: \" Not A;Brand\";v=\"99\", \"Chromium\";v=\"102\", \"Google Chrome\";v=\"102\"';
$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
$headers[] = 'Sec-Ch-Ua-Platform: \"Windows\"';
$headers[] = 'Sec-Fetch-Dest: document';
$headers[] = 'Sec-Fetch-Mode: navigate';
$headers[] = 'Sec-Fetch-Site: same-origin';
$headers[] = 'Sec-Fetch-User: ?1';
$headers[] = 'Upgrade-Insecure-Requests: 1';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
print_r($result);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);
}


public function createComment($text, $url){
	
	$ch = curl_init();
$id = $this->getCommentId($url);
curl_setopt($ch, CURLOPT_URL, 'https://dev.to/comments');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"comment\":{\"body_markdown\":\"$text\",\"commentable_id\":\"$id\",\"commentable_type\":\"Article\",\"parent_id\":null}}");
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$headers = array();
$headers[] = 'Authority: dev.to';
$headers[] = 'Accept: */*';
$headers[] = 'Accept-Language: tr-TR,tr;q=0.9';
$headers[] = 'Content-Type: application/json';
$headers[] = 'Cookie: '.$this->cookie.'';
$headers[] = 'Origin: https://dev.to';
$headers[] = 'Referer: https://dev.to/suphi';
$headers[] = 'Sec-Ch-Ua: \" Not A;Brand\";v=\"99\", \"Chromium\";v=\"102\", \"Google Chrome\";v=\"102\"';
$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
$headers[] = 'Sec-Ch-Ua-Platform: \"Windows\"';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: same-origin';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36';
$headers[] = 'X-Csrf-Token: Th9bx5tZBRgcDK5ANzuldZ38gn6AupmoXE3kYQpISW9oNfQsQv7M1594OLi5oYvJTQwg4qAlgPm18SNo5olgNA';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
print_r($result);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);
}





}
