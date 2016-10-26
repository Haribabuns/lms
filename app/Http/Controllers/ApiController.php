<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\Response as IlluminateResponse;
class ApiController extends Controller{

	protected $statusCode = 200;
	public function getStatusCode()
	    {
	    	return $this->statusCode;
	    }
	public function setStatusCode($statusCode)
	    {
	    	$this->statusCode = $statusCode;
	    	return $this;
	    }
	public function respondInternalError($message = 'Internal Error!')
	    {
	    	return $this->setStatusCode(500)->respondWithError($message);
	    }
	public function respondNotFound($message = 'Not Found!')
	    {
	    	return $this->setStatusCode(IlluminateResponse::HTTP_NOT_FOUND)->respondWithError($message);
	    }
	public function respond($data, $headers = [])
	    {
	    	return Response::json($data, $this->getStatusCode(), $headers);
	    }
	// protected function respondWithPagination(Paginator $lessons, $data)
 //        {
 //            $data = array_merge($data, [
 //                    'paginator' => [
 //                        'total_count' => $lessons->getTotal(),
 //                        'total_pages' => ceil($lessons->getTotal() / $lessons->getPerPage()),
 //                        'current_page' => $lessons->getCurrentPage(),
 //                        'limit' => $lessons->getPerPage()
 //                    ]
 //                ]);
 //            return $this->respond($data);
 //        }
	public function respondWithError($message)
	    {
	    	return $this->respond([
	    			'error' => [
	    				'message' => $message,
	    				'status_code' => $this->getStatusCode()
	    			]
	    		]);
	    }
	protected function respondCreated($message){
        return $this->setStatusCode(201)->respond([
                    'message' => $message
                ]);
    }
}