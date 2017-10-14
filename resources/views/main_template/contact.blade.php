@include('main_template.header')

<section class="no-margin">
    <iframe width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
            src="https://maps.google.com.au/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Dhaka,+Dhaka+Division,+Bangladesh&amp;aq=0&amp;oq=dhaka+ban&amp;sll=40.714353,-74.005973&amp;sspn=0.836898,1.815491&amp;ie=UTF8&amp;hq=&amp;hnear=Dhaka+Division,+Bangladesh&amp;t=m&amp;ll=24.542126,90.293884&amp;spn=0.124922,0.411301&amp;z=8&amp;output=embed"></iframe>
</section>

<section id="contact-page" class="container">
    <div class="row-fluid">

        <div class="span8">
            <h4>Contact Form</h4>
            <div class="status alert alert-success" style="display: none"></div>

            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Ошибка!</strong><br>
                    @foreach((array)$errors as $error)
                        @if(is_array($error))
                            @foreach((array)$error as $errorMessage)
                                {{ $errorMessage }} <br>
                            @endforeach
                        @endif
                    @endforeach
                </div>
            @endif

            @if('' !== $feed_back_message_success)
                <div class="alert alert-success">
                    <strong>{{ $feed_back_message_success }}</strong>
                </div>
            @endif

            <form id="main-contact-form" name="contact-form" method="post" action="/contact">
                <div class="row-fluid">
                    <div class="span5">
                        <input type="hidden" name="_token" value="{{ $token }}">
                        <label>First Name</label>
                        <input name="first_name" type="text" class="input-block-level" required="required"
                               placeholder="Your First Name">
                        <label>Last Name</label>
                        <input name="last_name" type="text" class="input-block-level" required="required"
                               placeholder="Your Last Name">
                        <label>Email Address</label>
                        <input name="email" type="text" class="input-block-level" required="required"
                               placeholder="Your email address">
                    </div>
                    <div class="span7">
                        <label>Message</label>
                        <textarea name="message" id="message" required="required" class="input-block-level"
                                  rows="8"></textarea>
                    </div>

                </div>
                <input type="submit" value="Send Message" class="btn btn-primary btn-large pull-right">
                <p></p>

            </form>

        </div>

        <div class="span3">
            <h4>Our Address</h4>
            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
            <p>
                <i class="icon-map-marker pull-left"></i> 1209 Willow Oaks Lane, New York<br>
                Lafayette, 1212, United States
            </p>
            <p>
                <i class="icon-envelope"></i> &nbsp;email@example.com
            </p>
            <p>
                <i class="icon-phone"></i> &nbsp;+123 45 67 89
            </p>
            <p>
                <i class="icon-globe"></i> &nbsp;http://www.shapebootstrap.net
            </p>
        </div>

    </div>

</section>

@include('main_template.footer')