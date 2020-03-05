@extends("layouts/nav")

@section("content")

<div class="container">
    <section class="features13 cid-rREXF6aUB7" id="features13-4">

        <h2 class="mbr-section-title pb-3 mbr-fonts-style align-center display-2">
            Images with text on them
        </h2>


        <div class="media-container-row">

            @foreach ($news_data as $item)

            <div class="card col-12 col-md-6 align-center col-lg-4">
                <div class="card-wrap">
                    <div class="card-img">
                        <img src="{{$item->url}}" alt="Mobirise" title="">
                    </div>
                    <div class="card-box p-5">
                        <h4 class="card-title py-2 mbr-fonts-style align-center mbr-white display-5">
                            {{$item->title}}
                        </h4>
                        <p class="mbr-text mbr-fonts-style mbr-white display-7">
                            {{$item->content}}
                        </p>
                    </div>
                </div>
                <div class="navbar-buttons mbr-section-btn">
                    <a class="btn btn-sm btn-primary display-4" href="/card-01">
                        <span class="mbri-save mbr-iconfont mbr-iconfont-btn "></span>
                        more
                    </a>
                </div>
            </div>



            @endforeach


            {{-- <div class="card col-12 col-md-6 align-center col-lg-4">
                <div class="card-wrap">
                    <div class="card-img">
                        <img src="assets/images/background2.jpg" alt="Mobirise">
                    </div>
                    <div class="card-box p-5">
                        <h4 class="card-title py-2 mbr-fonts-style align-center mbr-white display-5">
                            Easy and Simple to Use
                        </h4>
                        <p class="mbr-text mbr-fonts-style mbr-white display-7">
                            Drop the blocks into the page, edit content inline and publish - no technical skills required.
                        </p>
                    </div>
                </div>
            </div>
            <div class="card col-12 col-md-6 align-center col-lg-4">
                <div class="card-wrap">
                    <div class="card-img">
                        <img src="assets/images/background4.jpg" alt="Mobirise">
                    </div>
                    <div class="card-box p-5">
                        <h4 class="card-title py-2 mbr-fonts-style align-center mbr-white display-5">
                            Unlimited Sites
                        </h4>
                        <p class="mbr-text mbr-fonts-style mbr-white display-7">
                            Mobirise gives you the freedom to develop as many websites as you like given the fact that it is a desktop app.
                        </p>
                    </div>
                </div>
            </div> --}}
        </div>
</div>


</section>

@endsection
