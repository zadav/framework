<?php

namespace Calendar\Controller;

use Symfony\Component\HttpFoundation\Response;
use Calendar\Model\LeapYear;

class LeapYearController {

    public function indexAction(Request $request, $year) 
    {
        $leapyear = new LeapYear();
        if ($leapyear->isLeapYear($year)) {
            $response =  new Response('Yep, this is a leap year!'.rand());            
        } else {
            $response = new Response('Nope, this is not a leap year.');        
        }
        $response->setTtl(10);
        
        /*
         * $date = date_create_from_format('Y-m-d H:i:s', '2005-10-15 10:00:00');
 
        $response->setCache(array(
            'public'        => true,
            'etag'          => 'abcde',
            'last_modified' => $date,
            'max_age'       => 10,
            's_maxage'      => 10,
        ));

        // it is equivalent to the following code
        $response->setPublic();
        $response->setEtag('abcde');
        $response->setLastModified($date);
        $response->setMaxAge(10);
        $response->setSharedMaxAge(10);

         */
        return $response;
    }
}
