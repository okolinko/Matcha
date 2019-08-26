<?php

namespace App\Controllers;


use App\Controllers\Misc\Misc as misc;
use App\Controllers\Misc\Request;
use App\Core\Database\DB;

class MessengerController extends  Controller
{
    public $request;
    public function __construct()
    {
        $this->request = new Request();
    }

    public function getView(){

        $allGr = $this->getAllGroups($_SESSION['userId']);

//        misc::trace($allGr);
        foreach ($allGr as &$item) {
            $item = (array)$item;
        }

        if (isset($allGr[0])){
            $listMessages = $this->getListMessages(['m_gr_id'=>$allGr[0]['gr_id'], 'm_del'=>0]);
            foreach ($listMessages as &$item) {
                $item = (array)$item;
                $item['countNew'] = $this->getNewGroup($item['m_gr_id']);
//                misc::trace($item, false);

            }
        }

        require_once "app/views/messenger.view.php";

    }

    public function getNew(){



        header('content-type:application/json');
//        select * from message_group_insert where gr_id = (select gr_in_gr_id from (select * from message_group_insert where gr_in_user_id=36) as one)
        $count = (new DB())->table('message_group')
            ->leftJoin('message_group_insert','message_group.gr_id','=','message_group_insert.gr_in_gr_id')
            ->leftJoin('messages_2','message_group_insert.gr_in_gr_id','=','messages_2.m_gr_id')
            ->leftJoin('message_view','messages_2.m_id', '=','message_view.view_m_id')
            ->select('count(*) as count')
            ->where(['message_group_insert.gr_in_user_id'=>$_SESSION['userId'],'message_view.view_view'=>0])
            ->get();
//        misc::trace($temp);
//        $count = (new DB())
//            ->table('messages_2')
//            ->join('message_view','messages_2.m_id', '=','message_view.view_m_id')
//            ->select('count(*) as count')
//            ->where([
//                'm_gr_id'=>array_column(
//                    (new DB())
//                        ->table('message_group')
//                        ->select('gr_id')
//                        ->where(['gr_user_id' => $_SESSION['userId']])
//                        ->get(),'gr_id'),
////                'm_user_id' => $_SESSION['userId'],
////                'm_view'    => 0
//            ])
//            ->get();
//misc::trace($count);
        if (!empty($count)) {
            $count = $count[0]->count;
            print json_encode(['status'=>1,'record'=>$count]);
            return;
        }
        print json_encode(['status'=>0,'record'=>$count]);
        return;
    }

    public function getNewGroup($gr_id){

        $count = (new DB())
            ->table('messages_2')
            ->join('message_view','messages_2.m_id', '=','message_view.view_m_id')
            ->select('count(*) as count')
            ->where(['m_gr_id'=>$gr_id])
            ->get();
//        misc::trace($count);
        if (!empty($count)) {
            $count = $count[0]->count;
            return $count;
        }
       return 0;
    }

    public function getNewGroupForJson(){

        header('content-type:application/json');

        $gr_id = $this->request->get('gr_id');

        $count = (new DB())
            ->table('messages_2')
            ->join('message_view','messages_2.m_id', '=','message_view.view_m_id')
            ->select('count(*) as count')
            ->where(['m_gr_id'=>$gr_id])
            ->get();

        if (!empty($count)) {
            $count = $count[0]->count;
            print json_encode(['status'=>1,'record'=>$count]);
            return;
        }
        print json_encode(['status'=>0,'record'=>$count]);
        return;
    }

    public function getAllGroups($idUser){
        $grId = array_column((new DB())->table('message_group')->where(['gr_user_id' => $idUser])->get(),'gr_gr_id');

        $allGr = (new DB())->table('message_group')
            ->leftJoin('message_group_insert','message_group.gr_id','=','message_group_insert.gr_in_gr_id')
            ->leftJoin('users','message_group_insert.gr_in_user_id','=','users.id')
            ->select("gr_id, gr_created_at, id as user_id, user_name")
            ->where("gr_in_user_id = $idUser")
//            ->sortBy('gr_created_at', 'desc')
            ->get();

        $allGr = (new DB())->table('message_group')
            ->leftJoin('message_group_insert','message_group.gr_id','=','message_group_insert.gr_in_gr_id')
            ->leftJoin('users','message_group_insert.gr_in_user_id','=','users.id')
            ->select("gr_id, gr_created_at, id as user_id, user_name")
            ->where(["gr_id"=>array_column($allGr,"gr_id")])
            ->where("gr_in_user_id != $idUser")
//            ->sortBy('gr_created_at', 'desc')
            ->get();

        return $allGr;
    }

    public function getListMessages($where){

        return (new DB())->table('messages_2')
            ->leftJoin('users','messages_2.m_owner_id','=','users.id')
            ->select('m_id, m_gr_id, m_view, m_text, user_name, id as user_id, m_created_at')
            ->where($where)
            ->sortBy('m_created_at', 'desc')
            ->get();

    }

    public function getListMessagesForJson(){
        header('content-type:application/json');

        $idGr = intval($this->request->get('gr_id'));

        $where = [
            'm_gr_id'   => $idGr,
//            'm_user_id' => $_SESSION['userId'],
            'm_del'     => 0,
        ];
//misc::trace($where);
//        $temp = (new DB())->table('messages_2')
//            ->leftJoin('users','messages_2.m_user_id','=','users.id')
//            ->select('m_id, m_gr_id, m_view, m_text, user_name, id as user_id, m_created_at')
//            ->where($where)
//            ->get();
//        foreach ($temp as &$item) {
//            $item = (array)$item;
//        }
//
//        misc::trace(json_encode($temp));
       print json_encode(['status'=>1,'msg'=>'success','record'=>(new DB())->table('messages_2')
           ->leftJoin('users','messages_2.m_owner_id','=','users.id')
           ->select('m_id, m_gr_id, m_view, m_text, user_name, id as user_id, m_created_at')
           ->where($where)
           ->sortBy('m_created_at', 'desc')
           ->get()]);
       return ;

    }

    public function createNewGroup($user_id=null){
        header('content-type:application/json');
        $userIdOwner = $_SESSION['userId'];
        if (is_null($user_id))
            $user_id = intval($this->request->get('user_id'));

        $create_one = [
            'gr_owner_id' => $userIdOwner,
        ];

       $grId = (new DB())->table('message_group')->insert($create_one);

       $create_insert = [
           'gr_in_gr_id' => $grId,
           'gr_in_user_id' => $user_id
       ];

       (new DB())->table('message_group_insert')->insert($create_insert);
       $create_insert['gr_in_user_id'] = $userIdOwner;

       (new DB())->table('message_group_insert')->insert($create_insert);

       print json_encode(['status'=>1,'msg'=>'success', 'record' => $grId]);
       return;
    }

    public function createNewGroup2($user_id){
        header('content-type:application/json');
        $userIdOwner = $_SESSION['userId'];
        if (is_null($user_id))
            $user_id = intval($this->request->get('user_id'));

        $create_one = [
            'gr_owner_id' => $userIdOwner,
        ];

        $grId = (new DB())->table('message_group')->insert($create_one);
//misc::trace($grId);
        $create_insert = [
            'gr_in_gr_id' => $grId,
            'gr_in_user_id' => $user_id
        ];

        (new DB())->table('message_group_insert')->insert($create_insert);
        $create_insert['gr_in_user_id'] = $userIdOwner;

        (new DB())->table('message_group_insert')->insert($create_insert);

        return $grId;

    }

    public function isGroup(){

        $userIdOwner = $_SESSION['userId'];
        $user_id = intval($this->request->get('user_id'));

        $grOne = array_column((new DB())->table('message_group_insert')->where('gr_in_user_id='.$userIdOwner)->get(),'gr_in_gr_id');
        $grTwo = array_column((new DB())->table('message_group_insert')
            ->where('gr_in_user_id='.$user_id)
            ->where(['gr_in_gr_id' => $grOne])
            ->get(),'gr_in_gr_id');

//        misc::trace($grOne);
        if (empty($grTwo))
        {
            $grId = $this->createNewGroup2($user_id);
//            misc::trace($grId);
            print $grId;
            exit(0);
            return ;
        }

        foreach ($grTwo as &$item) {
            $item = (array)$item;
        }
        $grId = $grTwo[0];
        print $grId[0];
        return ;
    }

    public function createNewMessage(){
        header('content-type:application/json');
        $userIdOwner = $_SESSION['userId'];
        $grId = intval($this->request->get('gr_id'));
//        $text = misc::strings_clear($this->request->get('text'));
        $text = $this->request->get('text');

        if (!empty($group = (array)(new DB())->table('message_group')->where(['gr_gr_id'=>$grId,'gr_user_id'=>$userIdOwner])->get())) {

            $create = [
                'm_gr_id' => $grId,
                'm_owner_id' => $userIdOwner,
                'm_user_id' => $userIdOwner,
                'm_text' => $text,
//                'm_view'    => 1
            ];

            $idMsg = (new DB())->table('messages_2')->insert($create);

            $group = (array)(new DB())->table('message_group_insert')->where(['gr_in_gr_id'=>$grId])->where("gr_in_user_id != $userIdOwner")->get();
//SELECT * FROM message_group WHERE gr_gr_id='6' AND gr_user_id='36'</pre><pre>SELECT * FROM message_group_insert WHERE gr_in_gr_id='6' AND gr_in_user_id != 36</pre>{"status":1,"msg":"Group was created"}
            $update = [
                'm_user_id' => $group['gr_user_id'],
            ];

            (new DB())->table('messages_2')->where(['m_id' => $idMsg])->update($update);


            foreach ($group as &$item) {
                $item = (array)$item;
            }

            $createViewMessage = [
                'view_user_id' => $userIdOwner,
                'view_m_id' => $idMsg,
                'view_view' => 1,
            ];
//misc::trace($group);
            (new DB())->table('message_view')->insert($createViewMessage);
            $createViewMessage['view_user_id'] = $group[0]['gr_in_user_id'];
            $createViewMessage['view_view'] = 0;
            (new DB())->table('message_view')->insert($createViewMessage);

            print json_encode(['status' => 1, 'msg' => "Group was created"]);
            return ;
        }
        print json_encode(['status' => 0, 'msg' => "Group is not found"]);
        return ;
    }


}