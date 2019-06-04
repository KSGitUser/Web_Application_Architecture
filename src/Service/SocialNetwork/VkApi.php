<?php

namespace Service\SocialNetwork;

use VK\Client\VKApiClient;
use Framework\Render;
use VK\OAuth\VKOAuth;
use VK\OAuth\Scopes\VKOAuthUserScope;
use VK\OAuth\VKOAuthDisplay;
use VK\OAuth\VKOAuthResponseType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class VkApi
{
  use Render;

  public function connect()
  {


    $oauth = new VKOAuth();
    $client_id =   7008402;
    $redirect_uri = 'http://architect.gb/vk';
    $display = VKOAuthDisplay::PAGE;
    $scope = array(VKOAuthUserScope::PHOTOS, VKOAuthUserScope::GROUPS);
    $state = 'secret_state_code';

    $browser_url = $oauth->getAuthorizeUrl(VKOAuthResponseType::CODE, $client_id, $redirect_uri, $display, $scope, $state);

    $request = new Request([$browser_url]);
    $content = $request->getContent();
    header("Location: {$browser_url}");
    exit();




    /*   $oauth = new VKOAuth();
    $client_id = 7008402;
    $client_secret = 'SDAScasd';
    $redirect_uri = 'http://architect.gb';
    $code = 'CODE';

    $response = $oauth->getAccessToken($client_id, $client_secret, $redirect_uri, $code);
    $access_token = $response['access_token'];
    var_dump($browser_url);
    var_dump($response); */
  }
}
