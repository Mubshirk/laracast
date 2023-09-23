<?php

namespace App\services;

use \MailchimpMarketing\ApiClient;

use App\Http\Controllers\PostController;

class Newsletter
{
    public function subscribe(string $email)
    {

        return $this->client()->lists->addListMember(config('services.mailchimp.lists.subscribers'), [
            'email_address' => $email,
            'status' => 'subscribed'
        ]);
    }

    protected function client()
    {

        return (new ApiClient())->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us9'
        ]);
    }
}
