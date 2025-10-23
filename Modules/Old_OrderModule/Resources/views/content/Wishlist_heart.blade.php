@if($wish_list)
  @if($wish_list->contains('product_id', $product->id))
    <div class="Wishlist sale-top-left"><span data-product_id="{{$product->id}}" class="active wishlist_operations"  href="#"><i class="icon-heart"></i></span></div>
  @else
  <div class="Wishlist sale-top-left"><span data-product_id="{{$product->id}}" class="wishlist_operations"><i class="icon-heart"></i></span></div>
  @endif
@endif
