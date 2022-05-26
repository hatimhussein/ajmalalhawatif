<?php
namespace Modules\UserModule\Repository;
use Dompdf\Exception;
use Illuminate\Database\Eloquent\Model;
use Modules\UserModule\Entities\SuggesstionReply;
use Modules\UserModule\Entities\Suggestion;
use Modules\UserModule\Entities\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use Modules\CommonModule\Helper\ApiResponseHelper;
use Modules\CommonModule\Helper\ApiAuthHelper;
use Modules\UserModule\Notifications\SuggestionRespnseNotification;
use Modules\UserModule\Transformers\UserResource;
use Auth;
use Modules\CommonModule\Helper\UploaderHelper;

trait SuggestionRepository
{
    use UploaderHelper;

    public function replyAdmin($data)
    {
        $suggestion = Suggestion::where('id',$data['id'])->first();
        if(isset($data['attach']))$data['file'] = implode(',',$this->uploadAlbumm($data['attach'],'suggestion'));
        $data['suggesstion_id']=$data['id'];
        $data['user_id']=$suggestion->user_id;
        $data['reply_type']=0;
        unset($data['attach'],$data['id'],$data['type']);
        $reply = SuggesstionReply::create($data);
        if($reply)
        {
            try {
                $suggestion->user->notify(new SuggestionRespnseNotification($suggestion));

            }catch (\Exception $e)
            {
                throw $e;
            }
            $editSuggestion = $suggestion->update(['reply_type'=>1]);
            return view('usermodule::admin.suggestion.admin_reply',compact('suggestion','reply'));
        }
    }


}



?>
