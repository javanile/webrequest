<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class LaravelController extends Controller
{
    /**
     * Provision a new web request.
     *
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request): Response
    {
        $value1 = $request->get('value1');
        $value2 = $request->get('value2');
        $value3 = $request->get('value3');

        return new Response($value1 + $value2 + $value3);
    }
}

// Send controller response to output
(new LaravelController())(Request::capture())->send();
