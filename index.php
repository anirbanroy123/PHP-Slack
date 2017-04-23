<?php
/**
 * Grab your Token: Go to https://api.slack.com/web to create your access-token. The token will look somewhat like this:
 * xoxo-2100000415-0000000000-0000000000-ab1ab1
 * 
 * @param string $message The message to post into a channel.
 * @param string $channel The name of the channel prefixed with #, example #foobar
 * @return boolean
 */
function slack()
{
    $ch = curl_init("https://slack.com/api/chat.postMessage");
    $data = http_build_query([
        "token" => "xoxp-174009447319-172522678208-174010497207-3b6154795c296faba030ace8f542e72e",
    	"channel" => "#lead", //"#mychannel",
    	"text" => "Hello, Foo-Bar channel message.",
    	"username" => "anirban",
    ]);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

$re=slack();
echo $re;
if ($re){
	echo "yes";
}else{
	echo "no";
}
?>