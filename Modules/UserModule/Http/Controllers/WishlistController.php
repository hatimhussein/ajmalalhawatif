<?php

namespace Modules\UserModule\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\UserModule\Entities\Wishlist;
use Modules\UserModule\Entities\User;
use Modules\UserModule\Repository\UserRepository;

use Modules\CommonModule\Helper\ApiResponseHelper;
use Auth;
class WishlistController extends Controller
{
  use ApiResponseHelper;
    public function __construct(UserRepository $userRepository)
    {
        // $this->middleware('is_admin');
        $this->userRepository = $userRepository;

    }

    public function index()
    {

      $wishlists = Wishlist::where("user_id", Auth::id())->with('product')->orderby('id', 'desc')->get();

        return view('usermodule::front.account.wishlist',compact('wishlists'));
    }
    public function WishlistByIdAdmin($id)
    {
        $now= Carbon::today();
        $user=$this->userRepository->findUserByIdAdmin($id);
        $wishlist = Wishlist::where("user_id",$id)->where('created_at','>=',$now)->with('product')->orderby('id', 'desc')->get();



        return view('usermodule::admin.user.wishlist',compact('user','wishlist'));
    }
    public function create()
    {

    }

    public function addOrRemove(Request $request)
    {
      $is_founded=Wishlist::where('user_id',Auth::id())->where('product_id',$request->product_id)->first();
      if($is_founded)
      {
        $is_founded->delete();
        return $this->setCode(200)->setSuccess(__('commonmodule::validation.remove_to_favorite'))->send();

      }
      else{
          Wishlist::create(['user_id'=>Auth::id(),'product_id'=>$request->product_id]);
          return $this->setCode(200)->setSuccess(__('commonmodule::validation.add_to_favorite'))->send();
      }
    }

    public function show($id)
    {
        return view('usermodule::show');
    }

    public function edit($id)
    {
        return view('usermodule::edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
