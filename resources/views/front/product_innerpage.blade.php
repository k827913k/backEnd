@extends("layouts/nav")

@section("css")
<style>
    .product_title {
        font-size: 30px;
        font-weight: 400;
        line-height: 48px;
        color: #000;
        margin: 30px 0 10px 0;
    }

    .btn_style {
        height: 50px;
        border: 1px solid lightgray;
        background-color: #FFF;
        line-height: 50px;
        display: flex;
        justify-content: center;
        cursor: pointer;
        margin: 0 10px 20px 0;
    }

    /* 有active的顯示 */
    .btn_style.active {
        border: 1px solid red;
    }

    .info {
        width: 500px;
        height: 150px;
        line-height: 60px;
        background-color: #FFF;
        margin: 30px 0 0 0 ;
        box-sizing: border-box;
        padding: 10px 40px;
    }

    .buy {
        width: 500px;
        height: 50px;
        margin: 30px 0 30px 0;
        cursor: pointer;
        background-color: #ff6700;
        color: #FFF;
        line-height: 50px;
        display: flex;
        justify-content: center;
    }
</style>

@endsection

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
                <div class="btn_style btn active">
                    <div>金色</div>
                </div>
                <div class="btn_style btn">
                    <div>銀色</div>
                </div>
            </div>
            <div>數量</div>
            <div>
                <div id="input_div">
                    <input type="button" value="-" id="moins" onclick="minus()">
                    <input type="text" size="5" value="0" id="count">
                    <input type="button" value="+" id="plus" onclick="plus()">
                </div>
            </div>
            <div class="info">10000 小米行動電源 QC3.0 高配版 金色 * 1 NT$795<span><br>總計：NT$795</span></div>
            <input name="product_id" id="product_id" type="text">
            <input name="product_id" id="product_color" type="text">
            <input name="product_id" id="product_count" type="text">
            <a href="/cart"><div class="buy">立即購買</div></a>

        </div>
</div>
</section>
@endsection


@section("js")

<script>
    //按鈕切換 active
    $('.btn').click(function () {
        $('.btn').removeClass("active");
        $(this).addClass("active");
    });

// plus minus
    var count = 0;
    var countEl = document.getElementById("count");
    function plus(){
        count++;
        countEl.value = count;
    }
    function minus(){
      if (count > 0) {
        count--;
        countEl.value = count;
      }
    }

</script>

@endsection
