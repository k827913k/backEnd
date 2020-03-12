@extends("layouts/nav")

<style>
    .product_title {
        font-size: 30px;
        font-weight: 400;
        line-height: 48px;
        color: #000;
        margin-bottom: 10px;
    }



</style>


@section("content")

<div class="container">
    <section class="row">
        <div class="col-6">

        </div>

        <div class="col-6">
            <div class="product_title">10000 小米行動電源 QC3.0 高配版</div>
            <div class="product_color">金色</div>
            <div class="product_price">NT$795</div>
            <hr>
            <div class="product_tips">icon雙倍該商品可享受雙倍積分</div>
            <hr>
            <div class="product_color_title">顏色</div>
            <div class="row">
                <button class="btn_style col-4">
                    <div>金色</div>
                </button>
                <button class="btn_style col-4">
                    <div>灰色</div>
                </button>
                <button class="btn_style col-4">
                    <div>黑色</div>
                </button>
                <button class="btn_style col-4 ">
                    <div>銀色</div>
                </button>
            </div>

            <div>數量</div>
            <div><input type="number" min="0"></div>
            <div>10000 小米行動電源 QC3.0 高配版 金色 * 1 NT$795
            </div>
            <div>總計：NT$795
            </div>
            <div><button>Buy Now</button></div>

        </div>

</div>
</section>

@endsection






@section("js")

@endsection
