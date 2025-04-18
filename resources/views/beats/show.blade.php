@extends('layouts.app')
@section('title', $beat->title)
@section('content')
<div class="page-content bg-white">
    <x-breadcrumb title="{{ $beat->title }}" content="Beat" />
		<section class="content-inner-3">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-xl-6 col-lg-6 col-md-12 m-b0 m-sm-b30">
						<div class="dz-product-detail">
							<div class="swiper-btn-center-lr">
								<div class="swiper product-gallery-swiper2">
									<div class="swiper-wrapper" id="lightgallery">
										<div class="swiper-slide">
											<div class="dz-media">
												<a class="mfp-link lg-item" href="{{ Storage::url($beat->cover_image) }}" data-src="assets/images/products/headphone-1.png">
													<i class="feather icon-maximize dz-maximize top-right"></i>
												</a>
												<img src="{{ Storage::url($beat->cover_image) }}" alt="image">
                                                
											</div>
										</div>
									</div>
								</div>
							</div>	
						</div>	
					</div>
					<div class="col-xl-6 col-lg-6 col-md-12 m-b30">
						<div class="dz-product-detail style-2">
							<div class="dz-content">
								<div class="dz-content-footer">
									<div class="dz-content-start">
										<span class="badge bg-primary mb-2 rounded-0">SALE 20% Off</span>
										<h4 class="title mb-1">{{ $beat->title }}</h4>
										<div class="dz-player  style-2" data-src="{{ htmlspecialchars(url($beat->preview_url)) }}">
                                            <button class="dz-play-btn"><span class="dz-play-btnIco"><i class="fa-solid fa-play"></i></span></button>
                                            <button class="dz-play-btn"><span class="dz-play-btnIco"><svg class="svg-inline--fa fa-pause" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pause" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M48 64C21.5 64 0 85.5 0 112V400c0 26.5 21.5 48 48 48H80c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48H48zm192 0c-26.5 0-48 21.5-48 48V400c0 26.5 21.5 48 48 48h32c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48H240z"></path></svg></span></button>
                                            <div class="dzPlayNum">
                                                <span class="dzPlayCurDuration">0:00</span>
                                            </div>
                                            <div class="dz-player-range">
                                                <span class="under-dz-player-ranger"></span>
                                                <input class="dzPlayRange" type="range" min="0" value="0" step="1" max="205"><span class="change-dz-player-range"></span>
                                            </div>
                                            <div class="dzPlayNum">
                                                <span class="dzPlayDuration">{{ $beat->duration }}</span>
                                            </div>
                                            <div class="dz-volume-container">
                                                <span class="dzPlayerVolIcon"><i class="fa fa-volume-up"></i></span>
                                                <div class="dz-player-range-volume">
                                                    <span class="under-dz-player-ranger"></span>
                                                    <input class="dzPlayVol" type="range" min="0" max="1" value="1" step="0.1"><span class="change-dz-player-range"></span>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="review-num"> --}}
											{{-- <ul class="dz-rating me-2">
												<li>
													<svg width="14" height="13" viewbox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M6.74805 0.234375L8.72301 4.51608L13.4054 5.07126L9.9436 8.27267L10.8625 12.8975L6.74805 10.5944L2.63355 12.8975L3.5525 8.27267L0.090651 5.07126L4.77309 4.51608L6.74805 0.234375Z" fill="#FF8A00"></path>
													</svg>
												</li>	
												<li>
													<svg width="14" height="13" viewbox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M6.74805 0.234375L8.72301 4.51608L13.4054 5.07126L9.9436 8.27267L10.8625 12.8975L6.74805 10.5944L2.63355 12.8975L3.5525 8.27267L0.090651 5.07126L4.77309 4.51608L6.74805 0.234375Z" fill="#FF8A00"></path>
													</svg>
												</li>
												<li>
													<svg width="14" height="13" viewbox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M6.74805 0.234375L8.72301 4.51608L13.4054 5.07126L9.9436 8.27267L10.8625 12.8975L6.74805 10.5944L2.63355 12.8975L3.5525 8.27267L0.090651 5.07126L4.77309 4.51608L6.74805 0.234375Z" fill="#FF8A00"></path>
													</svg>
												</li>
												<li>
													<svg width="14" height="13" viewbox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path opacity="0.2" d="M6.74805 0.234375L8.72301 4.51608L13.4054 5.07126L9.9436 8.27267L10.8625 12.8975L6.74805 10.5944L2.63355 12.8975L3.5525 8.27267L0.090651 5.07126L4.77309 4.51608L6.74805 0.234375Z" fill="#5E626F"></path>
													</svg>

												</li>
												<li>
													<svg width="14" height="13" viewbox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path opacity="0.2" d="M6.74805 0.234375L8.72301 4.51608L13.4054 5.07126L9.9436 8.27267L10.8625 12.8975L6.74805 10.5944L2.63355 12.8975L3.5525 8.27267L0.090651 5.07126L4.77309 4.51608L6.74805 0.234375Z" fill="#5E626F"></path>
													</svg>
												</li>	
											</ul> --}}
											{{-- <span class="text-secondary me-2">4.7 Rating</span> --}}
											{{-- <a href="javascript:void(0);">(5 customer reviews)</a> --}}
										{{-- </div> --}}
									</div>
								</div>
								<p class="para-text">
									{{ $beat->description }}</p>
								<div class="product-num align-items-center">
									<div class="d-block">
										<div>
											<h5 class="sub-title">Price:</h5>
											<div class="me-3">
												<span class="price-num">
													{{ currency_symbol().number_format($beat->price, 2) }}
													<del>{{ currency_symbol().number_format($beat->price * 1.2, 2) }}</del>
												</span>
												
											</div>	
										</div>
									</div>
								</div>
								<div class="btn-group cart-btn">
				@if($beat->is_sold=== false)
                @auth
                    <form action="{{ route('checkout.initialize') }}" method="POST">
                        @csrf
                        <input type="hidden" name="beat_id" value="{{ $beat->id }}">
                        <button type="submit" class="btn btn-secondary btn-md rounded-0 text-uppercase">
                            Buy Now
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-secondary btn-md rounded-0 text-uppercase">
                        Login to Purchase
                    </a>
                @endauth
				@endif
									<button onclick="toggleWishlist(this,{{ $beat->id }}, true)" class="btn btn-gray btn-md btn-icon rounded-0 {{ $isInWishlist ? 'active' : '' }}">
										<span style="cursor: pointer" id="beat-like-icon" class="{{ $isInWishlist ? 'heart heart-blast' : 'heart' ?? 'heart' }}"></span>
										<span id="theliketext">{{ $isInWishlist ? 'Remove from Wishlist' : 'Add to Wishlist' }}</span>
									</button>
								</div>
								<div class="dz-info">
									<ul>
										<li>
											<strong>BPM:</strong>
											<span>{{ $beat->bpm }}BPM</span>
										</li>
										<li>
											<strong>Genre:</strong>
                                            @foreach($beat->genres as $genre)
                                                <span>{{ collect(json_decode($genre->name, true) ?? [$genre->name])->implode(', ') }}</span>
                                            @endforeach
										</li>
										{{-- <li>
											<strong>Tags:</strong>
											<span>Leather jacket,</span>
											<span>Cap,</span>
											<span>Headphone,</span>
											<span>T-Shirts</span>
										</li> --}}
										@php
											$productUrl = urlencode(route('beats.show', $beat->id)); // or $beat->id
										@endphp

										<li>
											<strong>Share:</strong>
											<span>
												<a href="https://www.facebook.com/sharer/sharer.php?u={{ $productUrl }}" target="_blank">
													<i class="fa-brands fa-facebook-f"></i>
												</a>
											</span>
											<span>
												<a href="https://www.instagram.com/?url={{ $productUrl }}" target="_blank">
													<i class="fa-brands fa-instagram"></i>
												</a>
											</span>
											<span>
												<a href="https://x.com/intent/tweet?url={{ $productUrl }}" target="_blank">
													<i class="fa-brands fa-twitter"></i>
												</a>
											</span>
										</li>

									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
        @if($relatedBeats->count() > 0)
                <section class="content-inner-1">
                    <div class="container">
                        <div class="section-head style-1">
                            <h2 class="title">Related Products</h2>
                        </div>
                        <div class="row row-cols-1 row-cols-md-3 g-4">
                            @foreach($relatedBeats as $beat)
                                <x-beatcolumn :beat="$beat" colClass="col-6 col-lg-3 col-md-3" />
                            @endforeach
                        </div>
                    </div>
                </section>
                @endif
@endsection 