<!-- BEGIN HEADER -->
<?php Loader::packageElement('theme_header', 'shield', array(
    'navigationSettings' => array(
        'displayPages'   => 'top',
        'displaySubPages' => 'all',
        'displaySubPageLevels' => 'custom',
        'displaySubPageLevelsNum' => 1
    )
)); ?>
<!-- END HEADER   -->

<!-- BEGIN .masthead -->
<?php Loader::packageElement('blue_masthead', 'shield', array('pageObj' => Page::getCurrentPage())); ?>
<!-- END .masthead -->

<!-- BEGIN .content -->
<article class="container main bg-gray">
    <div class="row">
        <div class="small-12 medium-3 columns">
            <br/><br/>
            <h3 class="sans">Svalinn</h3>
            <p>P.O. BOX 7497<br>JACKSON, WY 83002</p>
            <p>(307) 200-1223</p>
        </div>
        <div class="small-12 medium-9 columns">
            <!--<p class="lead">If you feel like discussing any of our dogs and would rather not fill in the contact us form, please feel free to call us in Jackson, Wyoming . We are open from 9am-5pm Monday through Saturday. Please leave us a message telling us when best to call you back so that we may answer your questions.</p>-->
            <?php $a = new Area('Main'); $a->display($c); ?>

            <form id="frm-contact" class="contact-form" action="<?php echo $this->action('send_form'); ?>">
                <div class="row">
                    <div class="large-6 columns" data-field="name">
                        <label>Name
                            <input name="name" type="text" placeholder="Your Name">
                        </label>
                        <small class="error">Name field is required.</small>
                    </div>
                    <div class="large-6 columns" data-field="email">
                        <label>Email
                            <input name="email" type="text" placeholder="Email Address">
                        </label>
                        <small class="error">A valid email address is required.</small>
                    </div>
                </div>
                <div class="row">
                    <div class="large-6 columns" data-field="phone">
                        <label>Phone
                            <input name="phone" type="text" placeholder="Phone Number">
                        </label>
                    </div>
                    <div class="large-6 columns" data-field="city">
                        <label>Your Location (City/State)
                            <input name="location" type="text" placeholder="Location">
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="large-6 columns">
                        <label>Type of Client
                            <select name="client_type">
                                <option value="Family">Family</option>
                                <option value="Professional">Professional</option>
                                <option value="Executive">Executive</option>
                                <option value="Individual">Individual</option>
                            </select>
                        </label>
                    </div>
                    <div class="large-6 columns">
                        <label>Other Pets
                            <select name="other_pets">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="large-12 columns">
                        <label>Tell Us Little About Yourself
                            <textarea name="about_yourself" placeholder="About You / Questions"></textarea>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="large-12 columns">
                        <input type="submit" class="button btn btn-lg btn-contact btn-arrow uppercase push-right" value="Send">
                        <div data-alert class="alert-box success">
                            <span>Thanks for reaching out, we will be in touch shortly.</span>
                            <a href="#" class="close">&times;</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</article>
<!-- END .content -->