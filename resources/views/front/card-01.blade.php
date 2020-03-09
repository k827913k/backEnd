@extends("layouts/nav")

@section("content")

<div class="container">
    <section class="features13 cid-rREXF6aUB7" id="features13-4">

        <h2 class="mbr-section-title pb-3 mbr-fonts-style align-center display-2">
            Infor
        </h2>

        <div class="media-container-row">

            @foreach ($news_data as $item)

            <div class="card col-12 col-md-6 align-center col-lg-4">
                <div class="card-wrap">
                    <div class="card-img">
                        <img src="{{'/storage/'.$item->url}}" alt="Mobirise" title="">
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
                    <a class="btn btn-sm btn-primary display-4" href="/news/{{$item->id}}">
                        <span class="mbri-save mbr-iconfont mbr-iconfont-btn "></span>
                        more
                    </a>
                </div>
            </div>

            @endforeach

        </div>
</div>


</section>

@endsection
