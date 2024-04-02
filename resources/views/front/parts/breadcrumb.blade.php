<section class="broadcast_section">

    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="text-broadcast-right">
                    <h2>بودكاست سلسله تيكـ</h2>
                    <p>
                        يقدم المسوقين على الموقع مجموعة متنوعة من البودكاست الاحترافية التي تساعد على تطوير اعمالك ونمو مشاريعك
                    </p>
                    <h5>
                        تابع البودكاست
                    </h5>
                    <ul>
                        <li>
                            <a href="#" class="btn-animation-3">
                                Spotify Boadcast
                                <img src="{{asset('dist/front/assets/images/icons/spotify_bodcast.svg') }}" alt="" width=""
                                    height="" />
                            </a>
                        </li>
                        <li>
                            <a href="#" class="btn-animation-3">
                                Google Boadcast
                                <img src="{{asset('dist/front/assets/images/icons/google_bodcast.svg') }}" alt="" width="" height="" />
                            </a>

                        </li>
                        <li>
                            <a href="#" class="btn-animation-3">
                                Apple Boadcast
                                <img src="{{asset('dist/front/assets/images/icons/apple_bodcast.svg') }}" alt="" width="" height="" />
                            </a>
                        </li>
                    </ul>
                    <div class="btn-show-all">
                        <a href="{{ route('all_podcasts') }}" class="btn-animation-4">
                            عرض البودكاست
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 position-relative">
                <div class="slider-wrapper">
                    <div id="broadcastSlider" class="broadcast-slider">
                        @foreach($latest_podcasts as $key => $value)

                            <div class="item voices" 
                                data-id       = "{{$value->id}}"
                                data-title    = "{{$value->title}}"
                                data-image    = "{{$value->image}}"
                                data-file    = "{{$value->file}}"
                                data-avatar    = "{{$value->Provider->avatar}}">
                                <div class="card-broadcast">
                                    <div class="image-card">
                                        <img src="{{asset('uploads/podcasts/'.$value->image)}}" alt="" height="" width="">
                                    </div>
                                    <div class="text-card">
                                        <a href="javascript:;">
                                            <h6>
                                            {{$value->title}}
                                                <i class="fas fa-play"></i>
                                            </h6>
                                            <p>        
                                            {{Str::limit($value->subject,40)}}

                                            </p>

                                            <div class="author">
                                                <img src="{{asset('uploads/providers/avatar/'.$value->Provider->avatar)}}" alt="Admin" width=""
                                                    height="">
                                                <text>
                                                {{$value->Provider->name_f}} {{$value->Provider->name_l}}                                                </text>
                                            </div>

                                        </a>
                                    </div>
                                </div>
                            </div>

                      
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

 <!-- START:: BOADCAST -->
 <div class="simple-audio-player" id="simp" data-config='{"shide_top":false,"shide_btm":true,"auto_load":false}'>
            <div class="simp-playlist container">
                <ul>
                   
                    <li>
                        <div class="text">
                            <span class="simp-source voie" data-src="">

                                <div class="right-part">
                                    <small class="title_v"></small>
                                    <span class="simp-desc">
                                        <img class="image_p" src="" width="25" height="25" />
                                       
                                    </span>
                                </div>

                                <div class="simp-cover">
                                    <img class="image_c" src="" width="50" height="50" />
                                </div>
                            </span>
                        </div>
                    </li>
                    @foreach($podcasts as $value)
                    <li>
                        <div class="text">
                            <span class="simp-source" data-src="{{asset('uploads/podcasts/file/'.$value->file)}}">

                                <div class="right-part">
                                    <small>{{$value->title}}</small>
                                    <span class="simp-desc">
                                        <img src="{{asset('uploads/providers/avatar/'.$value->Provider->avatar)}}" width="25" height="25" />
                                        {{$value->Provider->name_f}} {{$value->Provider->name_l}}
                                    </span>
                                </div>

                                <div class="simp-cover">
                                    <img src="{{asset('uploads/podcasts/'.$value->image)}}" width="50" height="50" />
                                </div>
                            </span>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>

        </div>
        <!-- END:: BOADCAST -->