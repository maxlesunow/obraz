@extends('site.layouts.app')

@section('title', $page->seo_title)
@section('description', $page->seo_description)
@section('keywords', $page->seo_keywords)

@section('breadcrumbs')
    @include('site.layouts.breadcrumbs', [
        'title' => 'Расписание курсов',
        'icon' => 'mdi-calendar',
        'breadcrumbs' => array(
            array('url' => '/', 'title' => 'Главная'),
            array('title' => 'Расписание курсов'),
        )])
@endsection

@section('content')
<!-- Page Content-->
<main class="page-content section-98 section-sm-top-110 section-sm-bottom-124">
        <div class="shell">
          <div class="range range-sm-center range-lg-left">
            <div class="cell-sm-10 cell-md-8 cell-lg-7 cell-md-push-2">
              <div class="inset-left-0 inset-md-left-20">
                <!-- Section Blog Modern-->
                <section>
                  <div class="post-modern-timeline-date text-sm-right">
                    <time datetime="2016-01-01">24 Feb</time>
                  </div>
                                  <!-- Post Modern-->
                                  <article class="post post-modern post-modern-timeline post-modern-timeline-right">
                                    <!-- Post media-->
                                    <!-- Post content-->
                                    <section class="post-content text-left">
                                      <ul class="list-inline">
                                        <li>
                                          <div class="post-tags group-xs"><a class="label-custom label-lg-custom label-rounded-custom label-primary" href="blog-classic-single-post.html">News</a>
                                          </div>
                                        </li>
                                        <li>
                                          <div class="icon icon-xxs text-dark mdi mdi-pen"></div>
                                        </li>
                                      </ul>
                                      <!-- Post Title-->
                                      <div class="post-title">
                                        <h6 class="offset-top-24"><a href="blog-classic-single-post.html">5 Steps to Blog’s Success</a></h6>
                                      </div>
                                      <!-- Post Body-->
                                      <div class="post-body offset-top-20">
                                        <p>Unfortunately people will not come to your blog just to see what you have published on it. To make sure that your blog becomes a successful one, you have to work on it to attract visitors interested in your content.</p>
                                      </div>
                                      <div class="post-author">
                                        <div class="post-author-img"><img class="img-circle" width="45" height="45" src="images/users/user-eugene-newman-60x60.jpg" alt="Eugene Newman"></div>
                                        <div class="post-author-name text-middle">Eugene Newman
                                        </div>
                                      </div>
                                    </section>
                                  </article>
                  <div class="post-modern-timeline-date text-sm-right">
                    <time datetime="2016-01-01">21 Feb</time>
                  </div>
                                  <!-- Post Modern-->
                                  <article class="post post-modern post-modern-timeline post-modern-timeline-right">
                                    <!-- Post media-->
                                    <header class="post-media"><img class="img-responsive img-cover" width="570" height="321" src="images/blog/post-05-570x321.jpg" alt="">
                                    </header>
                                    <!-- Post content-->
                                    <section class="post-content text-left">
                                      <ul class="list-inline">
                                        <li>
                                          <div class="post-tags group-xs"><a class="label-custom label-lg-custom label-rounded-custom label-primary" href="blog-classic-single-post.html">Business</a>
                                          </div>
                                        </li>
                                        <li>
                                          <div class="icon icon-xxs text-dark mdi mdi-image"></div>
                                        </li>
                                      </ul>
                                      <!-- Post Title-->
                                      <div class="post-title">
                                        <h6 class="offset-top-24"><a href="blog-classic-single-post.html">Making Money Online with Your Computer Only</a></h6>
                                      </div>
                                      <!-- Post Body-->
                                      <div class="post-body offset-top-20">
                                        <p>Making money online is a kind of everyone’s dream job. No investments are needed and you can do whatever you need to do when you are in the mood or have free time.Flexible work schedule is something you’ll hardly get working at the office. However, online business rarely starts to bring you money from the very first day. It takes some time as a rule. But once you understand the whole process (like what are your abilities, where to work, for whom to work and so on) you'll be earning money in no time.</p>
                                      </div>
                                      <div class="post-author">
                                        <div class="post-author-img"><img class="img-circle" width="45" height="45" src="images/users/user-july-mao-60x60.jpg" alt="July Mao"></div>
                                        <div class="post-author-name text-middle">July Mao
                                        </div>
                                      </div>
                                    </section>
                                  </article>
                                  <!-- Post Modern-->
                                  <article class="post post-modern post-modern-timeline post-modern-timeline-right">
                                    <!-- Post media-->
                                    <header class="post-media">
                                      <div class="post-inset">
                                                        <div class="soundcloud-player-classic"><iframe height="166" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/149065581&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false"></iframe></div>
                                      </div>
                                    </header>
                                    <!-- Post content-->
                                    <section class="post-content text-left">
                                      <ul class="list-inline">
                                        <li>
                                          <div class="post-tags group-xs"><a class="label-custom label-lg-custom label-rounded-custom label-primary" href="blog-classic-single-post.html">Music</a>
                                          </div>
                                        </li>
                                        <li>
                                          <div class="icon icon-xxs text-dark mdi mdi-image"></div>
                                        </li>
                                      </ul>
                                      <!-- Post Title-->
                                      <div class="post-title">
                                        <h6 class="offset-top-24"><a href="blog-classic-single-post.html">Proper Color Solutions For The Office</a></h6>
                                      </div>
                                      <!-- Post Body-->
                                      <div class="post-body offset-top-20">
                                      </div>
                                      <div class="post-author">
                                        <div class="post-author-img"><img class="img-circle" width="45" height="45" src="images/users/user-john-doe-60x60.jpg" alt="John Doe"></div>
                                        <div class="post-author-name text-middle">John Doe
                                        </div>
                                      </div>
                                    </section>
                                  </article>
                  <div class="post-modern-timeline-date text-sm-right">
                    <time datetime="2016-01-01">19 Feb</time>
                  </div>
                                  <!-- Post Modern-->
                                  <article class="post post-modern post-modern-timeline post-modern-timeline-right">
                                    <!-- Post media-->
                                    <header class="post-media">
                                                      <div class="embed-responsive embed-responsive-16by9">
                                                        <iframe class="embed-responsive-item" src="//www.youtube.com/embed/-AhmuMqZB0s?wmode=transparent"></iframe>
                                                      </div>
                                    </header>
                                    <!-- Post content-->
                                    <section class="post-content text-left">
                                      <ul class="list-inline">
                                        <li>
                                          <div class="post-tags group-xs"><a class="label-custom label-lg-custom label-rounded-custom label-primary" href="blog-classic-single-post.html">Music</a>
                                          </div>
                                        </li>
                                        <li>
                                          <div class="icon icon-xxs text-dark mdi mdi-image"></div>
                                        </li>
                                      </ul>
                                      <!-- Post Title-->
                                      <div class="post-title">
                                        <h6 class="offset-top-24"><a href="blog-classic-single-post.html">Four Types of Verbal Communication.</a></h6>
                                      </div>
                                      <!-- Post Body-->
                                      <div class="post-body offset-top-20">
                                      </div>
                                      <div class="post-author">
                                        <div class="post-author-img"><img class="img-circle" width="45" height="45" src="images/users/user-bernard-show-60x60.jpg" alt="Bernard Show"></div>
                                        <div class="post-author-name text-middle">Bernard Show
                                        </div>
                                      </div>
                                    </section>
                                  </article>
                </section>
                <footer class="offset-top-66">
                  <div class="post-modern-timeline-right">
                                    <!-- Bootstrap Pager-->
                                    <nav>
                                      <ul class="pager">
                                        <li class="previous"><a href="#"><span class="icon-left mdi mdi-arrow-left" aria-hidden="true"></span>Older</a></li>
                                        <li class="next"><a href="#">Newer<span class="icon-right mdi mdi-arrow-right" aria-hidden="true"></span></a></li>
                                      </ul>
                                    </nav>
                  </div>
                </footer>
              </div>
            </div>
            <div class="cell-md-3 cell-lg-3 cell-md-push-1 offset-top-66 offset-md-top-0">
              <!-- Section Blog Modern-->
              <aside class="text-left">
                <!-- Search Form-->
                <h6 class="text-uppercase text-spacing-60">Search</h6>
                <div class="text-subline"></div>
                <div class="offset-top-34">
                                <!-- RD Search Form-->
                                <form class="form-search rd-search" action="search-results.html" method="GET">
                                  <div class="form-group">
                                    <label class="form-label form-search-label form-label-sm" for="blog-sidebar-1-form-search-widget">Search</label>
                                    <input class="form-search-input input-sm form-control input-sm" id="blog-sidebar-1-form-search-widget" type="text" name="s" autocomplete="off">
                                  </div>
                                  <button class="form-search-submit" type="submit"><span class="mdi mdi-magnify"></span></button>
                                </form>
                </div>
                <!-- Flickr Feed-->
                <h6 class="offset-top-41 text-uppercase text-spacing-60">Flickr Feed</h6>
                <div class="text-subline"></div>
                <div class="offset-top-34">
                                <div class="group-xs flickr widget-flickrfeed" data-photo-swipe="gallery" data-flickr-tags="tm58888_landscapes"><a class="flickr-item thumbnail-classic" data-photo-swipe-item="" href="" data-image_c="href" data-size="800x800" data-type="flickr-item"><img width="82" height="82" data-title="alt" src="images/_blank.png" alt="" data-image_q="src"></a><a class="flickr-item thumbnail-classic" data-photo-swipe-item="" href="" data-image_c="href" data-size="800x800" data-type="flickr-item"><img width="82" height="82" data-title="alt" src="images/_blank.png" alt="" data-image_q="src"></a><a class="flickr-item thumbnail-classic" data-photo-swipe-item="" href="" data-image_c="href" data-size="800x800" data-type="flickr-item"><img width="82" height="82" data-title="alt" src="images/_blank.png" alt="" data-image_q="src"></a><a class="flickr-item thumbnail-classic" data-photo-swipe-item="" href="" data-image_c="href" data-size="800x800" data-type="flickr-item"><img width="82" height="82" data-title="alt" src="images/_blank.png" alt="" data-image_q="src"></a><a class="flickr-item thumbnail-classic" data-photo-swipe-item="" href="" data-image_c="href" data-size="800x800" data-type="flickr-item"><img width="82" height="82" data-title="alt" src="images/_blank.png" alt="" data-image_q="src"></a><a class="flickr-item thumbnail-classic" data-photo-swipe-item="" href="" data-image_c="href" data-size="800x800" data-type="flickr-item"><img width="82" height="82" data-title="alt" src="images/_blank.png" alt="" data-image_q="src"></a><a class="flickr-item thumbnail-classic" data-photo-swipe-item="" href="" data-image_c="href" data-size="800x800" data-type="flickr-item"><img width="82" height="82" data-title="alt" src="images/_blank.png" alt="" data-image_q="src"></a><a class="flickr-item thumbnail-classic" data-photo-swipe-item="" href="" data-image_c="href" data-size="800x800" data-type="flickr-item"><img width="82" height="82" data-title="alt" src="images/_blank.png" alt="" data-image_q="src"></a><a class="flickr-item thumbnail-classic" data-photo-swipe-item="" href="" data-image_c="href" data-size="800x800" data-type="flickr-item"><img width="82" height="82" data-title="alt" src="images/_blank.png" alt="" data-image_q="src"></a>
                                </div>
                </div>
                <div class="range offset-top-41">
                  <div class="cell-xs-6 cell-md-12">
                    <!-- Category-->
                    <h6 class="text-uppercase text-spacing-60">Categories</h6>
                    <div class="text-subline"></div>
                    <ul class="list list-marked offset-top-30">
                      <li><a href="#">Web Design <span class="text-dark">(37)</span></a></li>
                      <li><a href="#">UX <span class="text-dark">(211)</span></a></li>
                      <li><a href="#">Marketing <span class="text-dark">(12)</span></a></li>
                      <li><a href="#">Events <span class="text-dark">(7)</span></a></li>
                      <li><a href="#">News <span class="text-dark">(15)</span></a></li>
                    </ul>
                  </div>
                  <div class="cell-xs-6 cell-md-12 offset-top-41 offset-xs-top-0 offset-md-top-41">
                    <!-- Archive-->
                    <h6 class="text-uppercase text-spacing-60">Archive</h6>
                    <div class="text-subline"></div>
                    <ul class="list list-marked offset-top-30">
                      <li><a href="#">January 2016 <span class="text-dark">(17)</span></a></li>
                      <li><a href="#">December 2015 <span class="text-dark">(121)</span></a></li>
                      <li><a href="#">November 2015 <span class="text-dark">(19)</span></a></li>
                      <li><a href="#">October 2015 <span class="text-dark">(9)</span></a></li>
                      <li><a href="#">September 2015 <span class="text-dark">(25)</span></a></li>
                    </ul>
                  </div>
                </div>
                <!-- Tags-->
                <h6 class="offset-top-41 text-uppercase text-spacing-60">Tags</h6>
                <div class="text-subline"></div>
                <div class="offset-top-34">
                                <div class="group-xs"><a class="btn btn-xs btn-default" href="#">Web</a><a class="btn btn-xs btn-default" href="#">UX</a><a class="btn btn-xs btn-default" href="#">Marketing</a><a class="btn btn-xs btn-default" href="#">News</a><a class="btn btn-xs btn-default" href="#">Design</a><a class="btn btn-xs btn-default" href="#">Events</a>
                                </div>
                </div>
              </aside>
            </div>
          </div>
        </div>
      </main>
@endsection