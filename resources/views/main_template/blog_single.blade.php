<?php
declare(strict_types = 1);

/**
 * @var string $navChain
 */
?>
@include('main_template.header')

{!! $navChain !!}

<section id="about-us" class="container">
    <div class="row-fluid">
        <div class="span8">
            <div class="blog">
                <div class="blog-item well">
                    <a href="#"><h2>Duis sed odio sit amet nibh vulputate cursus</h2></a>
                    <div class="blog-meta clearfix">
                        <p class="pull-left">
                            <i class="icon-user"></i> by <a href="#">John</a> | <i class="icon-folder-close"></i>
                            Category <a href="#">Bootstrap</a> | <i class="icon-calendar"></i> Sept 16th, 2012
                        </p>
                        <p class="pull-right"><i class="icon-comment pull"></i> <a href="#comments">3 Comments</a></p>
                    </div>
                    <p><img src="/public/static/images/sample/blog1.jpg" width="100%" alt=""/></p>
                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of
                        classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a
                        Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin
                        words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in
                        classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32
                        and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero,
                        written in 45 BC. This book is a treatise on the theory of ethics, very popular during the
                        Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in
                        section 1.10.32.</p>

                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of
                        classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a
                        Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin
                        words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word </p>

                    <div class="tag">
                        Tags : <a href="#"><span class="label label-success">CSS3</span></a>
                        <a href="#"><span class="label label-success">HTML5</span></a>
                        <a href="#"><span class="label label-success">Bootstrap</span></a>
                        <a href="#"><span class="label label-success">WordPress</span></a>
                    </div>

                    <div class="user-info media box">
                        <div class="pull-left">
                            <img src="/public/static/images/sample/avatar.jpg" alt=""/>
                        </div>
                        <div class="media-body">
                            <h5 style="margin-top: 0">John Doe</h5>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                suffered alteration in some form, by injected humour, or randomised words which don't
                                look even slightly believable. If you are going to use a passage of Lorem Ipsum, you
                                need to be sure there isn't anything.</p>
                            <div class="author-meta">
                                <a class="btn btn-social btn-facebook" href="#"><i class="icon-facebook"></i></a> <a
                                        class="btn btn-social btn-google-plus" href="#"><i class="icon-google-plus"></i></a>
                                <a class="btn btn-social btn-twitter" href="#"><i class="icon-twitter"></i></a> <a
                                        class="btn btn-social btn-linkedin" href="#"><i class="icon-linkedin"></i></a>
                            </div>
                        </div>
                    </div>

                    <p>&nbsp;</p>

                    <div id="comments" class="comments">

                        <h4>3 Comments</h4>
                        <div class="comments-list">
                            <div class="comment media">
                                <div class="pull-left">
                                    <img class="avatar" src="/public/static/images/sample/cAvatar1.jpg" alt=""/>
                                </div>

                                <div class="media-body">
                                    <strong>Posted by <a href="#">Krikor</a></strong><br>
                                    <small>Thursday, 01 March 2012 15:26</small>
                                    <br>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority
                                        have suffered alteration in some form, by injected humour, or randomised words
                                        which don't look even slightly believable. If you are going to use a passage</p>
                                </div>
                            </div>

                            <div class="comment media">
                                <div class="pull-left">
                                    <img class="avatar" src="/public/static/images/sample/cAvatar2.jpg" alt=""/>
                                </div>

                                <div class="media-body">
                                    <strong>Posted by <a href="#">Krikor</a></strong><br>
                                    <small>Thursday, 01 March 2012 15:26</small>
                                    <br>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority
                                        have suffered alteration in some form, by injected humour, or randomised words
                                        which don't look even slightly believable. If you are going to use a passage</p>
                                </div>
                            </div>

                        </div>

                        <!-- Start Comment Form -->
                        <div class="comment-form">
                            <h4>Leave a Comment</h4>
                            <p class="muted">Make sure you enter the (*) required information where indicated. HTML code
                                is not allowed.</p>

                            <form action="/blog/{!! $result['post']['code'] !!}" method="post" name="comment-form" id="comment-form">
                                <div class="row-fluid">
                                    <div class="span4">
                                        <input type="text" name="name" required="required" class="input-block-level"
                                               placeholder="Name"/>
                                    </div>
                                    <div class="span4">
                                        <input type="text" name="email" required="required" class="input-block-level"
                                               placeholder="Email"/>
                                    </div>
                                    <div class="span4">
                                        <input type="text" name="website" class="input-block-level"
                                               placeholder="Website"/>
                                    </div>
                                    <input type="hidden" name="_token" value="{{ $token }}">
                                </div>
                                <textarea rows="10" name="message" id="message" required="required"
                                          class="input-block-level" placeholder="Message"></textarea>
                                <input type="submit" value="Submit Comment" class="btn btn-large btn-primary"/>
                            </form>
                        </div>
                        <!-- End Comment Form -->

                    </div>

                </div>
                <!-- End Blog Item -->

            </div>
        </div>
        {{--rigth bar--}}
        {!! $rightBar !!}
    </div>

</section>

@include('main_template.footer')