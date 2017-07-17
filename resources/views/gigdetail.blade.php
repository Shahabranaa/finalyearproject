@extends('layouts.app')

@section('content')
    @include('menunav')

    {{--<script>--}}
        {{--(function(e){var t,o={className:"autosizejs",append:"",callback:!1,resizeDelay:10},i='<textarea tabindex="-1" style="position:absolute; top:-999px; left:0; right:auto; bottom:auto; border:0; padding: 0; -moz-box-sizing:content-box; -webkit-box-sizing:content-box; box-sizing:content-box; word-wrap:break-word; height:0 !important; min-height:0 !important; overflow:hidden; transition:none; -webkit-transition:none; -moz-transition:none;"/>',n=["fontFamily","fontSize","fontWeight","fontStyle","letterSpacing","textTransform","wordSpacing","textIndent"],s=e(i).data("autosize",!0)[0];s.style.lineHeight="99px","99px"===e(s).css("lineHeight")&&n.push("lineHeight"),s.style.lineHeight="",e.fn.autosize=function(i){return this.length?(i=e.extend({},o,i||{}),s.parentNode!==document.body&&e(document.body).append(s),this.each(function(){function o(){var t,o;"getComputedStyle"in window?(t=window.getComputedStyle(u,null),o=u.getBoundingClientRect().width,e.each(["paddingLeft","paddingRight","borderLeftWidth","borderRightWidth"],function(e,i){o-=parseInt(t[i],10)}),s.style.width=o+"px"):s.style.width=Math.max(p.width(),0)+"px"}function a(){var a={};if(t=u,s.className=i.className,d=parseInt(p.css("maxHeight"),10),e.each(n,function(e,t){a[t]=p.css(t)}),e(s).css(a),o(),window.chrome){var r=u.style.width;u.style.width="0px",u.offsetWidth,u.style.width=r}}function r(){var e,n;t!==u?a():o(),s.value=u.value+i.append,s.style.overflowY=u.style.overflowY,n=parseInt(u.style.height,10),s.scrollTop=0,s.scrollTop=9e4,e=s.scrollTop,d&&e>d?(u.style.overflowY="scroll",e=d):(u.style.overflowY="hidden",c>e&&(e=c)),e+=w,n!==e&&(u.style.height=e+"px",f&&i.callback.call(u,u))}function l(){clearTimeout(h),h=setTimeout(function(){var e=p.width();e!==g&&(g=e,r())},parseInt(i.resizeDelay,10))}var d,c,h,u=this,p=e(u),w=0,f=e.isFunction(i.callback),z={height:u.style.height,overflow:u.style.overflow,overflowY:u.style.overflowY,wordWrap:u.style.wordWrap,resize:u.style.resize},g=p.width();p.data("autosize")||(p.data("autosize",!0),("border-box"===p.css("box-sizing")||"border-box"===p.css("-moz-box-sizing")||"border-box"===p.css("-webkit-box-sizing"))&&(w=p.outerHeight()-p.height()),c=Math.max(parseInt(p.css("minHeight"),10)-w||0,p.height()),p.css({overflow:"hidden",overflowY:"hidden",wordWrap:"break-word",resize:"none"===p.css("resize")||"vertical"===p.css("resize")?"none":"horizontal"}),"onpropertychange"in u?"oninput"in u?p.on("input.autosize keyup.autosize",r):p.on("propertychange.autosize",function(){"value"===event.propertyName&&r()}):p.on("input.autosize",r),i.resizeDelay!==!1&&e(window).on("resize.autosize",l),p.on("autosize.resize",r),p.on("autosize.resizeIncludeStyle",function(){t=null,r()}),p.on("autosize.destroy",function(){t=null,clearTimeout(h),e(window).off("resize",l),p.off("autosize").off(".autosize").css(z).removeData("autosize")}),r())})):this}})(window.jQuery||window.$);--}}

        {{--var __slice=[].slice;(function(e,t){var n;n=function(){function t(t,n){var r,i,s,o=this;this.options=e.extend({},this.defaults,n);this.$el=t;s=this.defaults;for(r in s){i=s[r];if(this.$el.data(r)!=null){this.options[r]=this.$el.data(r)}}this.createStars();this.syncRating();this.$el.on("mouseover.starrr","span",function(e){return o.syncRating(o.$el.find("span").index(e.currentTarget)+1)});this.$el.on("mouseout.starrr",function(){return o.syncRating()});this.$el.on("click.starrr","span",function(e){return o.setRating(o.$el.find("span").index(e.currentTarget)+1)});this.$el.on("starrr:change",this.options.change)}t.prototype.defaults={rating:void 0,numStars:5,change:function(e,t){}};t.prototype.createStars=function(){var e,t,n;n=[];for(e=1,t=this.options.numStars;1<=t?e<=t:e>=t;1<=t?e++:e--){n.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty'></span>"))}return n};t.prototype.setRating=function(e){if(this.options.rating===e){e=void 0}this.options.rating=e;this.syncRating();return this.$el.trigger("starrr:change",e)};t.prototype.syncRating=function(e){var t,n,r,i;e||(e=this.options.rating);if(e){for(t=n=0,i=e-1;0<=i?n<=i:n>=i;t=0<=i?++n:--n){this.$el.find("span").eq(t).removeClass("glyphicon-star-empty").addClass("glyphicon-star")}}if(e&&e<5){for(t=r=e;e<=4?r<=4:r>=4;t=e<=4?++r:--r){this.$el.find("span").eq(t).removeClass("glyphicon-star").addClass("glyphicon-star-empty")}}if(!e){return this.$el.find("span").removeClass("glyphicon-star").addClass("glyphicon-star-empty")}};return t}();return e.fn.extend({starrr:function(){var t,r;r=arguments[0],t=2<=arguments.length?__slice.call(arguments,1):[];return this.each(function(){var i;i=e(this).data("star-rating");if(!i){e(this).data("star-rating",i=new n(e(this),r))}if(typeof r==="string"){return i[r].apply(i,t)}})}})})(window.jQuery,window);$(function(){return $(".starrr").starrr()})--}}

        {{--$(function(){--}}

            {{--$('#new-review').autosize({append: "\n"});--}}

            {{--var reviewBox = $('#post-review-box');--}}
            {{--var newReview = $('#new-review');--}}
            {{--var openReviewBtn = $('#open-review-box');--}}
            {{--var closeReviewBtn = $('#close-review-box');--}}
            {{--var ratingsField = $('#ratings-hidden');--}}

            {{--openReviewBtn.click(function(e)--}}
            {{--{--}}
                {{--reviewBox.slideDown(400, function()--}}
                {{--{--}}
                    {{--$('#new-review').trigger('autosize.resize');--}}
                    {{--newReview.focus();--}}
                {{--});--}}
                {{--openReviewBtn.fadeOut(100);--}}
                {{--closeReviewBtn.show();--}}
            {{--});--}}

            {{--closeReviewBtn.click(function(e)--}}
            {{--{--}}
                {{--e.preventDefault();--}}
                {{--reviewBox.slideUp(300, function()--}}
                {{--{--}}
                    {{--newReview.focus();--}}
                    {{--openReviewBtn.fadeIn(200);--}}
                {{--});--}}
                {{--closeReviewBtn.hide();--}}

            {{--});--}}

            {{--$('.starrr').on('starrr:change', function(e, value){--}}
                {{--ratingsField.val(value);--}}
            {{--});--}}
        {{--});--}}
    {{--</script>--}}


    <div class=" container">
        <div class="row ">
            <div class="col-lg-8">
                <div class="panel panel-default gigdetail-panel">
                    <h1>I will {{$gig->gigtitle}}</h1>
                        <span>
                                @for ($i=1; $i <= 5 ; $i++)
                                <span class="glyphicon glyphicon-star showstar{{ ($i <= number_format($avgRating, $decimals = 0 )) ? '' : '-empty'}}"></span>
                            @endfor
                                    <span class="stats-row">({{$ratingCount}})</span>
                           </span>
                    <hr class="hr-gigtitle">
                    <img src="http://localhost:8000/storage/{{$gig->image}}" alt="" width="100%">
                </div>

                <div class="panel panel-body panel-default" style="padding:0;">
                    <header class="panel-header">
                        <h4 class="gig-fancy-header"> About This Gig</h4>
                    </header>
                    <section>
                        <strong class="gig-description">{{$gig->description}}</strong>
                    </section>
                </div>
                @foreach($orders as $order)
                    @if($order->review ==0 && $order->status ==2 )
                        <div class="row" style="margin-top:40px;">
                            <div class="col-md-12">
                                <div class="well well-sm">
                                    <div class="text-right">
                                        <a class="btn btn-success btn-green" href="#reviews-anchor" id="open-review-box">Leave a Review</a>
                                    </div>
                                    <div class="row" id="post-review-box" style="display:none;">
                                        <div class="col-md-12">
                                            <form action="{{route('review',['gig_id'=>$gig->id])}}" method="post">
                                                {{csrf_field()}}
                                                <input id="ratings-hidden" name="rating" type="hidden">
                                                <textarea class="form-control animated" cols="50" id="new-review" name="comment" placeholder="Enter your review here..." rows="5"></textarea>
                                                <div class="text-center">
                                                    <div class="stars starrr" data-rating="0"></div>
                                                </div>
                                                <div class="text-right">
                                                    <button class="btn btn-danger btn-lg" href="#" id="close-review-box" style="display:none; margin-right: 10px;">
                                                    <span class=""></span>Cancel</button>
                                                    <button class="btn btn-success btn-lg" type="submit">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @endforeach



                <div class="panel panel-body" style="padding:0;">
                    <header class="panel-header">
                            <h4 class="gig-fancy-header">{{$ratingCount}} Reviews
                           <span style="padding: 2%; ">
                                @for ($i=1; $i <= 5 ; $i++)
                                   <span class="glyphicon glyphicon-star showstar{{ ($i <= number_format($avgRating, $decimals = 0 )) ? '' : '-empty'}}"></span>
                               @endfor
                                {{ number_format($avgRating, 1 )}}
                           </span>
                            </h4>
                    </header>
                    <ul class="review-ul" style="padding:0;" >
                        @foreach($reviews as $review)
                            <li class="star-rating-row" >
                                @if($reviewProfile[$loop->index]->picture)
                                    <a href="{{route('profile',['user_id'=>$reviewProfile[$loop->index]->user->id])}}"><span class="user-pict-60"><img src="http://localhost:8000/storage/{{$reviewProfile[$loop->index]->picture}}" alt="tradegenie" width="60" height="60" data-reload="inprogress"></span></a>
                                @else
                                    <span class="user-pict-60"><img src="https://cdn3.iconfinder.com/data/icons/rcons-user-action/32/boy-512.png" alt="tradegenie" width="60" height="60" data-reload="inprogress"></span>
                                @endif
                                <a class="reviewName" rel="nofollow" href="{{route('profile',['user_id'=>$reviewProfile[$loop->index]->user->id])}}">{{$reviewProfile[$loop->index]->user->name}}</a>
                                        @for ($i=1; $i <= 5 ; $i++)
                                            <span class="glyphicon glyphicon-star user-review-star showstar{{ ($i <= $review->rating) ? '' : '-empty'}}"></span>
                                        @endfor

                                <div class="msg-body">
                                    {{$review->comment}}
                                </div>
                                <span class="rating-date">{{date('d,M Y', $review->created_at->timestamp)}}</span>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>


            <div class="col-lg-4">
                    <h1 class=" price-panel"> Rs <span style="color:#88b1ff ">{{$gig->price}}</span></h1>
                   @if($pro->user->id != \Illuminate\Support\Facades\Auth::user()->id)
                        @if($isBuyed == 'false')
                            <div class="panel panel-top-paddiing">
                                <a href="{{route('order',['gig_id'=>$gig->id])}}" class=""> <h1 class="confirm-order btn btn-default orderNow">Confirm Order of (Rs {{$gig->price}})</h1></a>
                            </div>
                        @endif
                         @if($isBuyed == 'true')
                                <div class="panel panel-top-paddiing">
                                    <a href="#" class=""> <h1 class="confirm-order btn btn-default orderNow">View Order Details </h1></a>
                                </div>
                         @endif
                   @endif

                <div class="panel panel-default">
                    <a href="{{route('profile',['user_id'=>$pro->user->id])}}"> <img  class="img-responsive profile-image " width="150" height="150" src="http://localhost:8000/storage/{{$pro->picture}}" alt=""></a>
                    <a href="{{route('profile',['user_id'=>$pro->user->id])}}"> <strong class="userName">{{ $pro->user->name}}</strong></a>
                        <hr class="line">
                    <div
                        <ul class="userstatsUl ">
                            <li class="fa fa-map-marker fa-1x userstatsLi"> <span class="from">From</span> <strong class="area">{{$pro->area}}</strong></li>
                            <li class="fa fa-user fa-1x userstatsLi"> <span class="from">Member </span> <strong class="area">{{date('M Y', $pro->created_at->timestamp)}}</strong></li>
                            <li class="fa fa-check-circle fa-1x userstatsLi" > <span class="from">Nadra verify </span> <strong class="area">{{date('M Y', $pro->created_at->timestamp)}}</strong></li>
                        </ul>
                        <hr>
                        <a href="" class=""> <h1 class="confirm-order btn btn-default callNOw">Call {{$pro->phone}}</h1></a>
                        <hr>
                        <h3 class="description"> User Bio</h3>
                        <section>
                            <p>{{$pro->bio}}</p>
                        </section>

                    </div>
                </div>
            </div>
        </div>
     </div>
@endsection