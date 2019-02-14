<?php

namespace App\Modules\Notify\Http\Controllers\API;

use App\Modules\Notify\Http\Requests\API\CreateMessageAPIRequest;
use App\Modules\Notify\Http\Requests\API\UpdateMessageAPIRequest;
use App\Modules\Notify\Models\Message;
use App\Modules\Notify\Repositories\MessageRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Modules\Notify\Concerns\INotify;
use App\Modules\Notify\Methods\Sms;

use App\Modules\Notify\Vendors\SmartSms;
use App\Modules\Notify\Models\InApp;

use App\Modules\Notify\Methods\InApp as InAppMsg;


/**
 * Class MessageController
 * @package App\Modules\Notify\Http\Controllers\API
 */

class MessageAPIController extends AppBaseController
{
    /** @var  MessageRepository */
    private $messageRepository;


    public function __construct(MessageRepository $messageRepo)
    {
        $this->messageRepository = $messageRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/messages",
     *      summary="Get a listing of the Messages.",
     *      tags={"Message"},
     *      description="Get all Messages",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Message")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $this->messageRepository->pushCriteria(new RequestCriteria($request));
        $this->messageRepository->pushCriteria(new LimitOffsetCriteria($request));
        $messages = $this->messageRepository->all();

        return $this->sendResponse($messages->toArray(), 'Messages retrieved successfully');
    }

    /**
     * @param CreateMessageAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/messages",
     *      summary="Store a newly created Message in storage",
     *      tags={"Message"},
     *      description="Store Message",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Message that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Message")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Message"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateMessageAPIRequest $request)
    {
        $input = $request->all();

        $messages = $this->messageRepository->create($input);

        return $this->sendResponse($messages->toArray(), 'Message saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/messages/{id}",
     *      summary="Display the specified Message",
     *      tags={"Message"},
     *      description="Get Message",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Message",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Message"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var Message $message */
        $message = $this->messageRepository->findWithoutFail($id);

        if (empty($message)) {
            return $this->sendError('Message not found');
        }

        return $this->sendResponse($message->toArray(), 'Message retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateMessageAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/messages/{id}",
     *      summary="Update the specified Message in storage",
     *      tags={"Message"},
     *      description="Update Message",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Message",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Message that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Message")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Message"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateMessageAPIRequest $request)
    {
        $input = $request->all();

        /** @var Message $message */
        $message = $this->messageRepository->findWithoutFail($id);

        if (empty($message)) {
            return $this->sendError('Message not found');
        }

        $message = $this->messageRepository->update($input, $id);

        return $this->sendResponse($message->toArray(), 'Message updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/messages/{id}",
     *      summary="Remove the specified Message from storage",
     *      tags={"Message"},
     *      description="Delete Message",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Message",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var Message $message */
        $message = $this->messageRepository->findWithoutFail($id);

        if (empty($message)) {
            return $this->sendError('Message not found');
        }

        $message->delete();

        return $this->sendResponse($id, 'Message deleted successfully');
    }



    public function sendSms( Request $request)
    {
        $sms = new Sms( new SmartSms );

        $sms->recepients = $request->recepients;
        $sms->message = $request->message;
        $resp = $sms->send();

        $this->sendResponse($resp, 'not sure');
    }


    public function sendMail(){


    }



    public function sendInApp( Request $request)
    {
        $inapp = new InAppMsg();
        $inapp->message = $request->message;
        $inapp->recipient = $request->recipients;

        try{
            $resp = $inapp->send();
        }
        catch(Exception $e){
            $this->sendResponse($resp, "problem sending message");
        }
        $this->sendResponse($resp, "check");
    }
}
