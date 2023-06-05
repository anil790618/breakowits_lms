<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Noauth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // $auth = service('auth');

        // if (! $auth->isLoggedIn()) {
        //     return redirect()->to(site_url('login'));
        // }
        if(session()->get('isLoggedIn')){ 
            return redirect()->to('/dashboard');
        }
    }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}