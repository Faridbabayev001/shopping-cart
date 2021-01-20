<div class="col-md-9">
    <div class="ibox">
        <div class="ibox-title">
            <span class="pull-right">(<strong>{{$productCount}}</strong>) items</span>
            <h5>Items in your cart</h5>
        </div>
        @foreach($items as  $productId =>  $product)
        <div class="ibox-content"   >
            <div class="table-responsive">
                <table class="table shoping-cart-table">
                    <tbody>
                    <tr>
                        <td width="90">
                            <div >
                                <img class="img-fluid" src="{{$product['image']}}" alt="{{$product['name']}}">
                            </div>
                        </td>
                        <td class="desc">
                            <h3>
                                <a href="#" class="text-navy">
                                    {{$product['name']}}
                                </a>
                            </h3>

                            <div class="m-t-sm">
                                <a href="#"  data-id="{{$productId}}" class="text-muted product__del-btn"><i class="fa fa-trash"></i> Remove item</a>
                            </div>
                        </td>

                        <td>
                            {{$product['price']}} AZN
                        </td>
                        <td width="95">
                            <select class="form-control product__count" data-productPrice="{{$product['price']}}" data-id="{{$productId}}">
                                @for ($i = 1; $i <= 10; $i++)
                                    <option value="{{$i}}" {{$product['count'] == $i ? "selected" : ''}}>{{$i}}</option>
                                @endfor
                            </select>
                        </td>
                        <td>
                            <h4>
                                {{$product['count'] * $product['price']}} AZN
                            </h4>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>
        @endforeach
    </div>

</div>
<div class="col-md-3">
    <div class="ibox">
        <div class="ibox-title">
            <h5>Cart Summary</h5>
        </div>
        <div class="ibox-content">
                    <span>
                        Total
                    </span>
            <h2 class="font-bold">
                {{$productPrice}} AZN
            </h2>

            <hr>
            <div class="m-t-sm">
                <div class="btn-group">
                    <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-shopping-cart"></i> Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
