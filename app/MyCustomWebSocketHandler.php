<?php 
namespace App;
use Illuminate\Support\Facades\DB;
use Ratchet\ConnectionInterface;
use Ratchet\RFC6455\Messaging\MessageInterface;
use Ratchet\WebSocket\MessageComponentInterface;
use Ratchet\Server\IoConnection;
class MyCustomWebSocketHandler implements MessageComponentInterface
{
    public function __construct(){
        $this->clients = new \SplObjectStorage;
    }
    
    public function onOpen(ConnectionInterface $connection){
    // $socketId = sprintf('%d.%d', 0, random_int(1, 1000000000));
    [$id,$token] = explode("%7C",explode("=",$connection->httpRequest->Geturi()->Getquery())[1]);
    $dbdata = DB::select("select * from `personal_access_tokens` where `id` = {$id}")[0];
    dump($token);
    dump($id);
    if(hash_equals($dbdata->token, hash("sha256",$token))){
        echo "vibe";
        $userid = $dbdata->tokenable_id;
        $messages= DB::select("select * from `messages` where `receiver` = {$userid} or `sender` = {$userid}");
        $users = DB::select("select `id`, `name`, `email` from `users`");
        $connection->app = new \stdClass(); 
        $connection->app->id = 'my_app';
        $socketId = sprintf('%d.%d', 0, $dbdata->tokenable_id);
        $connection->socketId = $socketId;
        $this->clients->attach($connection, $userid);
        $connection->send(json_encode(array("messages"=>$messages, "users"=>$users)));
        }
        else
        {
            $connection->socketId = "0.0";
            $connection->close();
        }
    ;
        
    }
    
    public function onClose(ConnectionInterface $connection)
    {
        // TODO: Implement onClose() method.
        $this->clients->detach($connection);
    }

    public function onError(ConnectionInterface $connection, \Exception $e)
    {   
        print($e);
        return $e;
        // TODO: Implement onError() method.
    }

    public function onMessage(ConnectionInterface $connection, MessageInterface $msg)
    {   
        $array = json_decode($msg, true);
        // echo $array["receiver"];
        // dump($this->clients);
    //    dump($this->clients->getInfo());
        $senderid = explode(".",$connection->socketId)[1];
        dump($senderid);
        $receiversent = false;
        $receiverid = $array["receiver"];
        $sendersent = false;
        $record = array("receiver"=>$receiverid,"sender"=>$senderid,"message"=>$array["message"], "user_read"=>0,"created_at"=>now(), "updated_at"=>now());
        dump($record);
        while($this->clients->valid()) {
        if($receiversent ==true && $sendersent == true){break;};
        $index  = $this->clients->key();
        $object = $this->clients->current(); // similar to current($s)
        $data   = $this->clients->getInfo();
        if($data ==$senderid){
            $this->clients->current()->send(json_encode(array("messages"=>$record)));
            $sendersent = true;
            
        }elseif($data == $receiverid){
            $this->clients->current()->send(json_encode(array("messages"=>$record)));
            $receiversent = true;
            $record["user_read"]=1;
        };
        $this->clients->next();
    }
        DB::table("messages")->insert($record);
    }
}
