@extends('frontEnd.layout.master')
<!-- Start PreLoader
    ============================================= -->
	<div class="se-pre-con"></div>
	<!-- Start PreLoader-->

	<!-- Start header
    ============================================= -->
    @include('frontEnd.layout.headerindex')
    <!-- End header -->

	<div class="clearfix"></div>

	<main class="main">

		<!-- Start Hero
		============================================= -->
		<div id="home" class="hero-section">
			<div class="hero-sliderr">
				<!-- owl Slider Begin -->
				<div class="hero-single" data-background="{{ asset('frontEnd/assets/img/header/8.jpg') }}">
					<div class="hero-shapes">
						<img src="{{ asset('frontEnd/assets/img/header/header-2.png') }}" alt="thumb">
					</div>
					<div class="container">
						<div class="row">
							<div class="col-xl-6">
								<div class="hero-content">
									<span class="hero-p1">Generating new ...</span>
									<h2>
										Head Towards For Your Future Course
									</h2>
									<p>
										Consequat! Molestiae in excepturi diam, blandit ad neque reiciendis officia! Similique mi irure, cursus ve
									</p>
									<div class="hro-btn">
										<a href="course.html " class="theme-btn">Search Your Course <i class="ti ti-arrow-right"></i></a>
										<a href="#" class="theme-btn theme-btn-active">About Us</a>
									</div>
								</div>
							</div>
							<div class="col-xl-5">
								<div class="right-bg">
								</div>
							</div>
						</div>
					</div>
				</div><!-- single Slider End -->
			</div>
		</div>
		<!-- End Hero -->

		<!-- Start Search
		============================================= -->
		<div class="t-area header-1-1 de-padding">
			<div class="container">
				<div class="feature-wrapper un-form">
					<form>
						<input type="text" class="srs-in" placeholder="Search Any Course or University">
						<button type="submit" class="srs-bt">Search</button>
					</form>
				</div>
			</div>
		</div>
		<!-- End  Search-->

		<!-- Start Feature
		============================================= -->
		<div class="feature-area header-1-1 de-pb">
			<div class="container">
				<div class="feature-wrapper grid-4">
					<div class="feature-box">
						<div class="feature-header">
							<div class="feature-icon">
								<i class="flaticon-corporate"></i>
								<span>1</span>
							</div>
							<h4>Booking & Application </h4>
						</div>
						<div class="feature-bottom">
							<p>
								Esse mauris arcu eveniet in. Qua hendrerit. Risus! Deleniti
							</p>
							<a href="#" class="feature-btn">Get Started <i class="ti-arrow-right"></i></a>
						</div>
					</div>
					<div class="feature-box">
						<div class="feature-header">
							<div class="feature-icon">
								<i class="flaticon-contract"></i>
								<span>2</span>
							</div>
							<h4>Offer & Acceptance </h4>
						</div>
						<div class="feature-bottom">
							<p>
								Esse mauris arcu eveniet in. Qua hendrerit. Risus! Deleniti
							</p>
							<a href="#" class="feature-btn">Get Started <i class="ti-arrow-right"></i></a>
						</div>
					</div>
					<div class="feature-box">
						<div class="feature-header">
							<div class="feature-icon">
								<i class="flaticon-money"></i>
								<span>3</span>
							</div>
							<h4> Visa &<br>
								 Fees</h4>
						</div>
						<div class="feature-bottom">
							<p>
								Esse mauris arcu eveniet in. Qua hendrerit. Risus! Deleniti
							</p>
							<a href="#" class="feature-btn">Get Started <i class="ti-arrow-right"></i></a>
						</div>
					</div>
					<div class="feature-box">
						<div class="feature-header">
							<div class="feature-icon">
								<i class="flaticon-location"></i>
								<span>4</span>
							</div>
							<h4> Ready to<br> fly</h4>


						</div>
						<div class="feature-bottom">
							<p>
								Esse mauris arcu eveniet in. Qua hendrerit. Risus! Deleniti
							</p>
							<a href="#" class="feature-btn">Get Started <i class="ti-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Feature-->

		<!-- Start About
		============================================= frontEnd/assets/img/about/ab-2-pic.jpg style="background-image: url(frontEnd/assets/img/about/about-bg.png)"-->
        <div class="about-area de-padding posi-rel" data-background="{{asset('frontEnd/assets/img/about/about-bg.png')}}" >
			<div class="container">
				<div class="about-wrapper">
					<div class="about-left">
						<span class="hero-p1">WELCOME TO Project</span>
						<h2>
							Start profitable courses with us What about Project.
						</h2>
						<p>
							Consequuntur atque bibendum sequi vivamus aliqua senectus hendrerit consectetur
							tristique, consequatur laborum unde, aliquet laboris cillum sollicitudin pretium
							doloribus officia quia tincidunt? Eleifend dis, tempora, quam
						</p>
						<div class="about-opt grid-2">
							<div class="about-opt-box">
								<img src="{{ asset('frontEnd/assets/img/about/about-icon.png') }}" alt="thumb">
								<h5>24/7 Support Online-Offline</h5>
								<p>
									Commodo numquam occaecati ullamcorper, aliqua eget. Repellendus aute sem saepe.
								</p>
							</div>
							<div class="about-opt-box">
								<img src="{{ asset('frontEnd/assets/img/about/about-icon-2.png') }}" alt="thumb">
								<h5>Well Consulting System</h5>
								<p>
									Commodo numquam occaecati ullamcorper, aliqua eget. Repellendus aute sem saepe.
								</p>
							</div>
						</div>
                    </div>
                    <!--about-right-pic-2-->
					<div class="about-right">
						<div class="about-right-pic">
							<img src="{{ asset('frontEnd/assets/img/team/t-2.jpg') }}"  alt="thumb">
							<div class="about-ply-btn">
								<a href="#" class="video-play-btn"><i class="fas fa-play"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End About-->

		<!-- Start Categories
		============================================= -->
		<div class="cat-area de-padding">
			<div class="container">
				<div class="row">
					<div class="col-xl-8 offset-xl-2">
						<div data-text="categories" class="site-title text-center">
							<img src="{{ asset('frontEnd/assets/img/heading/site-top.png') }}" alt="thumb">
							<span class="sub-head">Find Perfect one</span>
							<h2>Check all categories and enroll </h2>
						</div>
					</div>
				</div>
				<div class="cat-wrapper grid-4">
					<div class="cat-box">
						<div class="cat-pic">
							<img src="{{ asset('frontEnd/assets/img/categories/1.jpg') }}" alt="thumb">
							<div class="cat-badge">
								<span>28</span>
							</div>
						</div>
						<div class="cat-title">
							<h5>Computer Science</h5>
							<span><i class="ti ti-arrow-right"></i></span>
						</div>
					</div>
					<!-- <div class="cat-box">
						<div class="cat-pic">
							<img src="assets/img/categories/2.jpg" alt="thumb">
							<div class="cat-badge">
								<span>30</span>
							</div>
						</div>
						<div class="cat-title">
							<h5>See all Courses</h5>
							<span><i class="ti ti-arrow-right"></i></span>
						</div>
					</div> -->
					<div class="cat-box">
						<div class="cat-pic">
							<img src="{{ asset('frontEnd/assets/img/categories/1.jpg') }}" alt="thumb">
							<div class="cat-badge">
								<span>50</span>
							</div>
						</div>
						<div class="cat-title">
							<h5>Management</h5>
							<span><i class="ti ti-arrow-right"></i></span>
						</div>
					</div>
					<div class="cat-box">
						<div class="cat-pic">
							<img src="{{ asset('frontEnd/assets/img/categories/4.jpg') }}" alt="thumb">
							<div class="cat-badge">
								<span>23</span>
							</div>
						</div>
						<div class="cat-title">
							<h5>Analysis of Algorithms</h5>
							<span><i class="ti ti-arrow-right"></i></span>
						</div>
					</div>
					<div class="cat-box">
						<div class="cat-pic">
							<img src="{{ asset('frontEnd/assets/img/categories/5.jpg') }}" alt="thumb">
							<div class="cat-badge">
								<span>60</span>
							</div>
						</div>
						<div class="cat-title">
							<h5>Engineering</h5>
							<span><i class="ti ti-arrow-right"></i></span>
						</div>
					</div>
					<div class="cat-box">
						<div class="cat-pic">
							<img src="{{ asset('frontEnd/assets/img/categories/6.jpg') }}" alt="thumb">
							<div class="cat-badge">
								<span>56</span>
							</div>
						</div>
						<div class="cat-title">
							<h5>Art & Designing</h5>
							<span><i class="ti ti-arrow-right"></i></span>
						</div>
					</div>
					<div class="cat-box">
						<div class="cat-pic">
							<img src="{{ asset('frontEnd/assets/img/categories/7.jpg') }}" alt="thumb">
							<div class="cat-badge">
								<span>67</span>
							</div>
						</div>
						<div class="cat-title">
							<h5>Artificial Intelligence</h5>
							<span><i class="ti ti-arrow-right"></i></span>
						</div>
					</div>
					<div class="cat-box">
						<div class="cat-pic">
							<img src="{{ asset('frontEnd/assets/img/categories/1.jpg') }}" alt="thumb">
							<div class="cat-badge">
								<span>63</span>
							</div>
						</div>
						<div class="cat-title">
							<h5>MBBS</h5>
							<span><i class="ti ti-arrow-right"></i></span>
						</div>
					</div>
				</div>
			</div>
			<div class="more-btn">
				<a href="course.html">View All Courses <i class="ti ti-arrow-right"></i></a>
			</div>
		</div>
		<!-- End Categories-->

		<!-- Start Wh
		============================================= -->
		{{-- <div class="wh-area de-padding">
			<div class="container">
				<div class="row">
					<div class="col-xl-8 offset-xl-2">
						<div data-text="Choose us" class="site-title text-center">
							<img src="{{ asset('frontEnd/assets/img/heading/choose.png') }}" alt="thumb">
							<span class="sub-head">Reasons to choose</span>
							<h2>Why choose our courses? Best way to shine <span>yourself</span></h2>
						</div>
					</div>
				</div>
				<div class="wh-wrapper owl-carousel owl-theme">
					<div class="wh-box">
						<div class="wh-pic">
							<img src="{{ asset('frontEnd/assets/img/choose/ch-3.jpg') }}" alt="thumb">
						</div>
						<div class="wh-content">
							<div class="wh-cate">
								<span>Categories:Education,Certificate</span>
							</div>
							<h6>Admit us here. You know the world, you know the society</h6>
						</div>
						<img src="{{ asset('frontEnd/assets/img/choose/choose-icon.png') }}" class="wh-icon-float" alt="thumb">
					</div>
					<div class="wh-box">
						<div class="wh-pic">
							<img src="{{ asset('frontEnd/assets/img/choose/ch-3.jpg') }}" alt="thumb">
						</div>
						<div class="wh-content">
							<div class="wh-cate">
								<span>Categories:Education,Certificate</span>
							</div>
							<h6>Admit us here. You know the world, you know the society</h6>
						</div>
						<img src="{{ asset('frontEnd/assets/img/choose/choose-icon.png') }}" class="wh-icon-float" alt="thumb">
					</div>
					<div class="wh-box">
						<div class="wh-pic">
							<img src="{{ asset('frontEnd/assets/img/choose/ch-3.jpg') }}" alt="thumb">
						</div>
						<div class="wh-content">
							<div class="wh-cate">
								<span>Categories:Education,Certificate</span>
							</div>
							<h6>Admit us here. You know the world, you know the society</h6>
						</div>
						<img src="{{ asset('frontEnd/assets/img/choose/choose-icon.png') }}" class="wh-icon-float" alt="thumb">
					</div>
					<div class="wh-box">
						<div class="wh-pic">
							<img src="{{ asset('frontEnd/assets/img/choose/ch-3.jpg') }}" alt="thumb">
						</div>
						<div class="wh-content">
							<div class="wh-cate">
								<span>Categories:Education,Certificate</span>
							</div>
							<h6>Admit us here. You know the world, you know the society</h6>
						</div>
						<img src="{{ asset('frontEnd/assets/img/choose/choose-icon.png') }}" class="wh-icon-float" alt="thumb">
					</div>
				</div>
			</div>
		</div> --}}
		<!-- End Wh-->

		<!-- Start Course
		============================================= style="background: url(frontEnd/assets/img/course/course-bg.jpg)" -->
        <div id="portfolio" class="portfolio-area de-padding" data-background= "{{asset('frontEnd/assets/img/course/course-bg.jpg')}}" >
			<div class="container">
				<div class="row">
					<div class="col-xl-8 offset-xl-2">
						<div data-text="Courses" class="site-title wh text-center">
							<img src="{{ asset('frontEnd/assets/img/heading/choose.png') }}" alt="thumb">
							<span class="sub-head">Find Perfect one</span>
							<h2>Choose your perfect one</h2>
						</div>
					</div>
				</div>
				<div class="portfolio-items-area">
					<div class="row">
						<div class="col-xl-12 portfolio-content">
							<div class="mix-item-menu active-theme text-center">
								<button class="active" data-filter="*">All</button>
								<button data-filter=".development" class="">Science</button>
								<button data-filter=".design" class="">Engineering</button>
								<button data-filter=".photography" class="">Medical  </button>
								<button data-filter=".branding" class="">Other</button>
								<!-- <button data-filter=".video" class="">Web Development</button> -->
							</div>
							<!-- End Mixitup Nav-->
							<div class="magnific-mix-gallery masonary">
								<div id="portfolio-grid" class="portfolio-items">
									<div class="pf-item video design">
										<div class="course-box">
											<div class="course-pic">
												<img src="{{ asset('frontEnd/assets/img/course/course-1.jpg') }}" class="course-img" alt="thumb">
												<div class="course-pic-content">
													<div class="course-rating">
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
														<span>(12k)</span>
													</div>
													<div class="course-author-time">
														<div class="course-author-pic">
															<img src="{{ asset('frontEnd/assets/img/course/user-1.jpg') }}" alt="thumb">
															<h6>Benjamin</h6>
														</div>
														<div class="course-time">
															<i class="fas fa-book-open"></i>
															<span>3:56:59</span>
														</div>
													</div>
												</div>
											</div>
											<div class="course-content">
												<div class="course-tags">
													<div class="course-tags-link">
														<a href="#">Software</a>
														<a href="#">Data</a>
													</div>
													<div class="course-lesson">
														<i class="fas fa-book-open"></i>
														<p class="mb-0">4 Years</p>
													</div>
												</div>
												<div class="course-text">
													<a href="course-details.html"><h5>B.Tech in Computer Science</h5></a>
													<p>
														Conubia egestas eos laboris netus velit mi aliquid aute euismod, integer? Quo class taciti labore
													</p>
												</div>
												<div class="course-bottom ">
													<button class="course-btn">Enroll course <i class="ti ti-arrow-right"></i></button>

												</div>
											</div>
										</div>
									</div>
									<div class="pf-item video development">
										<div class="course-box">
											<div class="course-pic">
												<img src="{{ asset('frontEnd/assets/img/course/course-2.jpg') }}" class="course-img" alt="thumb">
												<div class="course-pic-content">
													<div class="course-rating">
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
														<span>(12k)</span>
													</div>
													<div class="course-author-time">
														<div class="course-author-pic">
															<img src="{{ asset('frontEnd/assets/img/course/user-1.jpg') }}" alt="thumb">
															<h6> Nicholas</h6>
														</div>
														<div class="course-time">
															<i class="fas fa-book-open"></i>
															<span>3:56:59</span>
														</div>
													</div>
												</div>
											</div>
											<div class="course-content">
												<div class="course-tags">
													<div class="course-tags-link">
														<a href="#">Science</a>
														<a href="#">Maths</a>
													</div>
													<div class="course-lesson">
														<i class="fas fa-book-open"></i>
														<p class="mb-0">3 Years</p>
													</div>
												</div>
												<div class="course-text">
													<a href="course-details.html"><h5>B.Sc in Mathematics</h5></a>
													<p>
														Conubia egestas eos laboris netus velit mi aliquid aute euismod, integer? Quo class taciti labore
													</p>
												</div>
												<div class="course-bottom">
													<button class="course-btn">Enroll course <i class="ti ti-arrow-right"></i></button>

												</div>
											</div>
										</div>
									</div>
									<div class="pf-item video photography">
										<div class="course-box">
											<div class="course-pic">
												<img src="{{ asset('frontEnd/assets/img/course/course-3.jpg') }}" class="course-img" alt="thumb">
												<div class="course-pic-content">
													<div class="course-rating">
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
														<span>(12k)</span>
													</div>
													<div class="course-author-time">
														<div class="course-author-pic">
															<img src="{{ asset('frontEnd/assets/img/course/user-1.jpg') }}" alt="thumb">
															<h6>benjamin Nicholas</h6>
														</div>
														<div class="course-time">
															<i class="fas fa-book-open"></i>
															<span>3:56:59</span>
														</div>
													</div>
												</div>
											</div>
											<div class="course-content">
												<div class="course-tags">
													<div class="course-tags-link">
														<a href="#">Medicine</a>
														<a href="#">Surgery</a>
													</div>
													<div class="course-lesson">
														<i class="fas fa-book-open"></i>
														<p class="mb-0">5 Years</p>
													</div>
												</div>
												<div class="course-text">
													<a href="course-details.html"><h5>MBBS</h5></a>
													<p>
														Conubia egestas eos laboris netus velit mi aliquid aute euismod, integer? Quo class taciti labore
													</p>
												</div>
												<div class="course-bottom">
													<button class="course-btn">Enroll course <i class="ti ti-arrow-right"></i></button>

												</div>
											</div>
										</div>
									</div>
									<div class="pf-item video branding">
										<div class="course-box">
											<div class="course-pic">
												<img src="{{ asset('frontEnd/assets/img/course/course-1.jpg') }}" class="course-img" alt="thumb">
												<div class="course-pic-content">
													<div class="course-rating">
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
														<span>(12k)</span>
													</div>
													<div class="course-author-time">
														<div class="course-author-pic">
															<img src="{{ asset('frontEnd/assets/img/course/user-1.jpg') }}" alt="thumb">
															<h6>Nicholas Benjamin</h6>
														</div>
														<div class="course-time">
															<i class="fas fa-book-open"></i>
															<span>3:56:59</span>
														</div>
													</div>
												</div>
											</div>
											<div class="course-content">
												<div class="course-tags">
													<div class="course-tags-link">
														<a href="#">Art</a>
														<a href="#">Creativity</a>
													</div>
													<div class="course-lesson">
														<i class="fas fa-book-open"></i>
														<p class="mb-0">3 Years</p>
													</div>
												</div>
												<div class="course-text">
													<a href="course-details.html"><h5>Bachelor of Arts</h5></a>
													<p>
														Conubia egestas eos laboris netus velit mi aliquid aute euismod, integer? Quo class taciti labore
													</p>
												</div>
												<div class="course-bottom">
													<button class="course-btn">Enroll course <i class="ti ti-arrow-right"></i></button>

												</div>
											</div>
										</div>
									</div>
									<div class="pf-item video branding">
										<div class="course-box">
											<div class="course-pic">
												<img src="{{ asset('frontEnd/assets/img/course/course-2.jpg') }}" class="course-img" alt="thumb">
												<div class="course-pic-content">
													<div class="course-rating">
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
														<span>(12k)</span>
													</div>
													<div class="course-author-time">
														<div class="course-author-pic">
															<img src="{{ asset('frontEnd/assets/img/course/user-1.jpg') }}" alt="thumb">
															<h6>benjamin Nicholas</h6>
														</div>
														<div class="course-time">
															<i class="fas fa-book-open"></i>
															<span>3:56:59</span>
														</div>
													</div>
												</div>
											</div>
											<div class="course-content">
												<div class="course-tags">
													<div class="course-tags-link">
														<a href="#">Commerce</a>
														<a href="#">Accounting</a>
													</div>
													<div class="course-lesson">
														<i class="fas fa-book-open"></i>
														<p class="mb-0">3 Years</p>
													</div>
												</div>
												<div class="course-text">
													<a href="course-details.html"><h5>Bachelor of Commerce</h5></a>
													<p>
														Conubia egestas eos laboris netus velit mi aliquid aute euismod, integer? Quo class taciti labore
													</p>
												</div>
												<div class="course-bottom">
													<button class="course-btn">Enroll course <i class="ti ti-arrow-right"></i></button>

												</div>
											</div>
										</div>
									</div>
									<div class="pf-item design design branding design">
										<div class="course-box">
											<div class="course-pic">
												<img src="{{ asset('frontEnd/assets/img/course/course-1.jpg') }}" class="course-img" alt="thumb">
												<div class="course-pic-content">
													<div class="course-rating">
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
														<span>(12k)</span>
													</div>
													<div class="course-author-time">
														<div class="course-author-pic">
															<img src="{{ asset('frontEnd/assets/img/course/user-1.jpg') }}" alt="thumb">
															<h6>benjamin Nicholas</h6>
														</div>
														<div class="course-time">
															<i class="fas fa-book-open"></i>
															<span>3:56:59</span>
														</div>
													</div>
												</div>
											</div>
											<div class="course-content">
												<div class="course-tags">
													<div class="course-tags-link">
														<a href="#">Software</a>
														<a href="#">Data</a>
													</div>
													<div class="course-lesson">
														<i class="fas fa-book-open"></i>
														<p class="mb-0">6 Months</p>
													</div>
												</div>
												<div class="course-text">
													<a href="course-details.html"><h5>Computer Science Course 42</h5></a>
													<p>
														Conubia egestas eos laboris netus velit mi aliquid aute euismod, integer? Quo class taciti labore
													</p>
												</div>
												<div class="course-bottom">
													<button class="course-btn">Enroll course <i class="ti ti-arrow-right"></i></button>

												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="more-btn">
				<a href="course.html">View All Courses <i class="ti ti-arrow-right"></i></a>
			</div>
		</div>
		<!-- End Course-->

<!-- Start Event
		============================================= -->
		<div class="event-area de-pb">
			<div class="container">
				<div class="row">
					<div class="col-xl-8 offset-xl-2">
						<div data-text="Courses" class="site-title text-center">
							<span class="sub-2">What's news?</span>
							<h2>Upcoming events</h2>
						</div>
					</div>
				</div>
				<div class="event-area grid-2">
					<div class="event-box">
						<div class="event-pic">
							<img src="{{asset('frontEnd/assets/img/event/event-1.jpg') }}" alt="thumb">
							<div class="event-date">
								<p>27</p>
								<span>sep</span>
							</div>
						</div>
						<div class="event-content">
							<div class="event-meta">
								<p> Speaker: <span>Caron Simon</span></p>                                              		<p>8:00	- 16:00  California, NY 70240</p>
							</div>
							<div class="event-desc">
								<h4>Build your dream Engineering career-2020</h4>
								<p>
									Inceptos habitant excepturi do rerum dignissim consequuntur assumenda aliqua tristique unde cursus aute torquent eros quis! Fames aliquip! Eius aspernatur, debitis error omnis iste ultrices massa
								</p>
								<div class="event-bottom">
									<a href="#" class="event-btn">Book Now</a>
									<div class="event-bottom-right">
										<i class="fas fa-ticket-alt"></i>
										<span>Available (179)</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="event-box">
						<div class="event-pic">
							<img src="{{ asset('frontEnd/assets/img/event/event-2.jpg') }}" alt="thumb">
							<div class="event-date">
								<p>27</p>
								<span>sep</span>
							</div>
						</div>
						<div class="event-content">
							<div class="event-meta">
								<p> Speaker: <span>Caron Simon</span></p>                                              		<p>8:00	- 16:00  California, NY 70240</p>
							</div>
							<div class="event-desc">
								<h4>Build your dream Engineering career-2020</h4>
								<p>
									Inceptos habitant excepturi do rerum dignissim consequuntur assumenda aliqua tristique unde cursus aute torquent eros quis! Fames aliquip! Eius aspernatur, debitis error omnis iste ultrices massa
								</p>
								<div class="event-bottom">
									<a href="#" class="event-btn">Book Now</a>
									<div class="event-bottom-right">
										<i class="fas fa-ticket-alt"></i>
										<span>Available (179)</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="event-box">
						<div class="event-pic">
							<img src="{{ asset('frontEnd/assets/img/event/event-3.jpg') }}" alt="thumb">
							<div class="event-date">
								<p>27</p>
								<span>sep</span>
							</div>
						</div>
						<div class="event-content">
							<div class="event-meta">
								<p> Speaker: <span>Caron Simon</span></p>                                              		<p>8:00	- 16:00  California, NY 70240</p>
							</div>
							<div class="event-desc">
								<h4>Build your dream Engineering career-2020</h4>
								<p>
									Inceptos habitant excepturi do rerum dignissim consequuntur assumenda aliqua tristique unde cursus aute torquent eros quis! Fames aliquip! Eius aspernatur, debitis error omnis iste ultrices massa
								</p>
								<div class="event-bottom">
									<a href="#" class="event-btn">Book Now</a>
									<div class="event-bottom-right">
										<i class="fas fa-ticket-alt"></i>
										<span>Available (179)</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="event-box">
						<div class="event-pic">
							<img src="{{ asset('frontEnd/assets/img/event/event-4.jpg') }}" alt="thumb">
							<div class="event-date">
								<p>27</p>
								<span>sep</span>
							</div>
						</div>
						<div class="event-content">
							<div class="event-meta">
								<p> Speaker: <span>Caron Simon</span></p>                                              		<p>8:00	- 16:00  California, NY 70240</p>
							</div>
							<div class="event-desc">
								<h4>Build your dream Engineering career-2020</h4>
								<p>
									Inceptos habitant excepturi do rerum dignissim consequuntur assumenda aliqua tristique unde cursus aute torquent eros quis! Fames aliquip! Eius aspernatur, debitis error omnis iste ultrices massa
								</p>
								<div class="event-bottom">
									<a href="#" class="event-btn">Book Now</a>
									<div class="event-bottom-right">
										<i class="fas fa-ticket-alt"></i>
										<span>Available (179)</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Event -->

		<!-- Start Address
		============================================= -->
		<div class="addr-area bg-2 de-padding">
			<div class="container">
				<div class="addr-wrapper grid-3">
					<div class="addr-single">
						<i class="fas fa-map-marker-alt"></i>
						<div class="addr-single-txt">
							<h5>Head office</h5>
							<span>Rajasthan, India</span>
						</div>
					</div>
					<div class="addr-single addr-single-active">
						<i class="fas fa-phone-volume"></i>
						<div class="addr-single-txt">
							<h5>Call Us Direct</h5>
							<span>+91-9696336911</span>
						</div>
					</div>
					<div class="addr-single">
						<i class="fas fa-envelope"></i>
						<div class="addr-single-txt">
							<h5>Email Us</h5>
							<span>info@support.com</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Address-->

		<!-- Start Team
		============================================= -->
		<div class="team-area de-padding">
			<div class="container">
				<div class="row">
					<div class="col-xl-8 offset-xl-2">
						<div data-text="Professors" class="site-title text-center">
							<img src="{{ asset('frontEnd/assets/img/heading/choose.png') }}" alt="thumb">
							<span class="sub-head">Our Consultant</span>
							<h2>Our expert consultancy advisor</h2>
						</div>
					</div>
				</div>
				<div class="team-wrapper owl-carousel owl-theme">
					<div class="team-box">
						<div class="team-pic">
							<img src="{{ asset('frontEnd/assets/img/team/t-3.jpg') }}" alt="thumb">
							<div class="team-social">
								<ul>
									<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
									<li><a href="#"><i class="fab fa-twitter"></i></a></li>
									<li><a href="#"><i class="fas fa-basketball-ball"></i></a></li>
								</ul>
							</div>
						</div>
						<div class="team-info">
							<h5>Cardu Manyon</h5>
							<span>Consultant of Engineering</span>
						</div>
					</div>
					<div class="team-box">
						<div class="team-pic">
							<img src="{{ asset('frontEnd/assets/img/team/t-2.jpg') }}" alt="thumb">
							<div class="team-social">
								<ul>
									<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
									<li><a href="#"><i class="fab fa-twitter"></i></a></li>
									<li><a href="#"><i class="fas fa-basketball-ball"></i></a></li>
								</ul>
							</div>
						</div>
						<div class="team-info">
							<h5>Marshall Harris</h5>
							<span>Consultant of Arts</span>
						</div>
					</div>
					<div class="team-box">
						<div class="team-pic">
							<img src="{{ asset('frontEnd/assets/img/team/t-3.jpg') }}" alt="thumb">
							<div class="team-social">
								<ul>
									<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
									<li><a href="#"><i class="fab fa-twitter"></i></a></li>
									<li><a href="#"><i class="fas fa-basketball-ball"></i></a></li>
								</ul>
							</div>
						</div>
						<div class="team-info">
							<h5>Nicholas Gregory</h5>
							<span>Consultant of Medicine</span>
						</div>
					</div>
					<div class="team-box">
						<div class="team-pic">
							<img src="{{ asset('frontEnd/assets/img/team/t-2.jpg') }}" alt="thumb">
							<div class="team-social">
								<ul>
									<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
									<li><a href="#"><i class="fab fa-twitter"></i></a></li>
									<li><a href="#"><i class="fas fa-basketball-ball"></i></a></li>
								</ul>
							</div>
						</div>
						<div class="team-info">
							<h5>Marshall Harris</h5>
							<span>Consultant of Commerce</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Team -->

		<!-- Start Review
		============================================= style="background: url(frontEnd/assets/img/review/review-bg.jpg)"-->
        <div class="review-area de-padding" data-background="{{asset('frontEnd/assets/img/review/review-bg.jpg')}}" >
			<div class="container">
				<div class="row">
					<div class="col-xl-8 offset-xl-2">
						<div data-text="Clients" class="site-title wh text-center">
							<img src="{{ asset('frontEnd/assets/img/heading/choose.png') }}" alt="thumb">
							<span class="sub-head">Satisfied Clients</span>
							<h2>What say Our Clients?</h2>
						</div>
					</div>
				</div>
				<div class="review-wrapper owl-carousel owl-theme">
					<div class="review-box">
						<div class="review-header">
							<img src="{{ asset('frontEnd/assets/img/review/user-1.png') }}" alt="thumb">
							<img src="{{ asset('frontEnd/assets/img/review/qoute.png') }}" alt="thumb">
						</div>
						<div class="review-text">
							<h5>Sraties Morgan - <span> Pusuing B.Tech in Computer Science</span></h5>
							<p>
								Sociis aenean Quaerat nobis! Phasellus elit perferendis occaecato Blandit excepturi, fames diam molestias pellentesque sequi.
							</p>
						</div>
						<div class="review-bottom">
							<span class="review-line"></span>
							<div class="reviw-rating">
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
							</div>
						</div>
					</div>
					<div class="review-box">
						<div class="review-header">
							<img src="{{ asset('frontEnd/assets/img/review/user-2.png') }}" alt="thumb">
							<img src="{{ asset('frontEnd/assets/img/review/qoute.png') }}" alt="thumb">
						</div>
						<div class="review-text">
							<h5>Sraties Morgan - <span>Pursuing MBBS in Abroad</span></h5>
							<p>
								Sociis aenean Quaerat nobis! Phasellus elit perferendis occaecato Blandit excepturi, fames diam molestias pellentesque sequi.
							</p>
						</div>
						<div class="review-bottom">
							<span class="review-line"></span>
							<div class="reviw-rating">
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
							</div>
						</div>
					</div>
					<div class="review-box">
						<div class="review-header">
							<img src="{{ asset('frontEnd/assets/img/review/user-3.png') }}" alt="thumb">
							<img src="{{ asset('frontEnd/assets/img/review/qoute.png') }}" alt="thumb">
						</div>
						<div class="review-text">
							<h5>Sraties Morgan - <span>Pusuing B.Com in Finanace and Accounting</span></h5>
							<p>
								Sociis aenean Quaerat nobis! Phasellus elit perferendis occaecato Blandit excepturi, fames diam molestias pellentesque sequi.
							</p>
						</div>
						<div class="review-bottom">
							<span class="review-line"></span>
							<div class="reviw-rating">
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
							</div>
						</div>
					</div>
					<div class="review-box">
						<div class="review-header">
							<img src="{{ asset('frontEnd/assets/img/review/user-2.png') }}" alt="thumb">
							<img src="{{ asset('frontEnd/assets/img/review/qoute.png') }}" alt="thumb">
						</div>
						<div class="review-text">
							<h5>Sraties Morgan - <span>Pursuing B.A. in Public Administration</span></h5>
							<p>
								Sociis aenean Quaerat nobis! Phasellus elit perferendis occaecato Blandit excepturi, fames diam molestias pellentesque sequi.
							</p>
						</div>
						<div class="review-bottom">
							<span class="review-line"></span>
							<div class="reviw-rating">
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Review -->

		<!-- Start Blog
		============================================= -->
		<div class="wh-area blog-area de-padding">
			<div class="container">
				<div class="row">
					<div class="col-xl-8 offset-xl-2">
						<div data-text="Choose us" class="site-title text-center">
							<img src="{{ asset('frontEnd/assets/img/heading/choose.png') }}" alt="thumb">
							<span class="sub-head">Reasons to choose</span>
							<h2>Why choose our courses? Best way to shine <span>yourself</span></h2>
						</div>
					</div>
				</div>
				<div class="wh-wrapper  owl-carousel owl-theme">
					<div class="wh-box">
						<div class="wh-pic blog-img">
							<img src="{{ asset('frontEnd/assets/img/choose/ch-3.jpg') }}" alt="thumb">
							<div class="blog-date">
								<div class="blog-date-info">
									<p>23 <span>sep</span></p>
								</div>
							</div>
						</div>
						<div class="wh-content">
							<div class="wh-cate">
								<span>Categories:Education,Certificate</span>
							</div>
							<h6>Admit us here. You know the world, you know the society</h6>
						</div>
					</div>
					<div class="wh-box">
						<div class="wh-pic blog-img">
							<img src="{{ asset('frontEnd/assets/img/choose/ch-3.jpg') }}" alt="thumb">
							<div class="blog-date">
								<div class="blog-date-info">
									<p>23 <span>sep</span></p>
								</div>
							</div>
						</div>
						<div class="wh-content">
							<div class="wh-cate">
								<span>Categories:Education,Certificate</span>
							</div>
							<h6>Admit us here. You know the world, you know the society</h6>
						</div>
					</div>
					<div class="wh-box">
						<div class="wh-pic blog-img">
							<img src="{{ asset('frontEnd/assets/img/choose/ch-3.jpg') }}" alt="thumb">
							<div class="blog-date">
								<div class="blog-date-info">
									<p>23 <span>sep</span></p>
								</div>
							</div>
						</div>
						<div class="wh-content">
							<div class="wh-cate">
								<span>Categories:Education,Certificate</span>
							</div>
							<h6>Admit us here. You know the world, you know the society</h6>
						</div>
					</div>
					<div class="wh-box">
						<div class="wh-pic blog-img">
							<img src="{{ asset('frontEnd/assets/img/choose/ch-3.jpg') }}" alt="thumb">
							<div class="blog-date">
								<div class="blog-date-info">
									<p>23 <span>sep</span></p>
								</div>
							</div>
						</div>
						<div class="wh-content">
							<div class="wh-cate">
								<span>Categories:Education,Certificate</span>
							</div>
							<h6>Admit us here. You know the world, you know the society</h6>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Blog-->

		<!-- Start Counter
		=============================================  style="background: url(frontEnd/assets/img/review/review-bg.jpg)" -->
        <div class="counter-area de-padding" data-background="{{asset('frontEnd/assets/img/review/review-bg.jpg')}}">
			<div class="container">
				<div class="row">
					<div class="col-xl-8 offset-xl-2">
						<div data-text="Our History" class="site-title wh text-center">
							<img src="{{ asset('frontEnd/assets/img/heading/choose.png') }}" alt="thumb">
							<span class="sub-head">History since 1990</span>
							<h2>We have over 20 years experience!</h2>
						</div>
					</div>
				</div>
				<div class="counter-wrapper grid-4">
					<div class="fun-fact">
						<img src="{{ asset('frontEnd/assets/img/counter/1.png') }}" alt="thumb">
						<div class="fun-desc">
							<p class="timer" data-to="560" data-speed="3000">560</p>
							<span class="medium">Successfully Project</span>
						</div>
					</div>
					<div class="fun-fact fun-active">
						<img src="{{ asset('frontEnd/assets/img/counter/2.png') }}" alt="thumb">
						<div class="fun-desc">
							<p class="timer" data-to="560" data-speed="3000">560</p>
							<span class="medium">Happy Clients</span>
						</div>
					</div>
					<div class="fun-fact">
						<img src="{{ asset('frontEnd/assets/img/counter/3.png') }}" alt="thumb">
						<div class="fun-desc">
							<p class="timer" data-to="850" data-speed="3000">850</p>
							<span class="medium">Awards Wins</span>
						</div>
					</div>
					<div class="fun-fact">
						<img src="{{ asset('frontEnd/assets/img/counter/4.png') }}" alt="thumb">
						<div class="fun-desc">
							<p class="timer" data-to="502" data-speed="3000">502</p>
							<span class="medium">Cup Of Tea</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Counter-->

		<!-- Start Partner
		============================================= -->
		<!-- <div class="partner-area bg-2 de-padding">
			<div class="row">
				<div class="col-xl-8 offset-xl-2">
					<div data-text="Choose us" class="site-title text-center">
				<img src="assets/img/heading/choose.png" alt="thumb">
				Events Gallery
				<div class="partner-wrapper owl-carousel owl-theme">
					<img src="assets/img/event/event-1.jpg" alt="thumb">
					<img src="assets/img/event/event-2.jpg" alt="thumb">
					<img src="assets/img/event/event-3.jpg" alt="thumb">
					<img src="assets/img/event/event-4.jpg" alt="thumb">
					<img src="assets/img/event/event-2.jpg" alt="thumb">
					<img src="assets/img/event/event-2.jpg" alt="thumb">
					<img src="assets/img/event/event-1.jpg" alt="thumb">

				</div>
			</div>
		</div> -->
		<!-- End Partner-->

	</main>

    <div class="clearfix"></div>
    {{-- @include('frontEnd.layout.footer') --}}
