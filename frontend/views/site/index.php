<?php

/* @var $this yii\web\View */

$this->title = 'Maxim - Modern One Page Bootstrap Template';


?>

<!-- Header area -->
<div id="header-wrapper" class="header-slider">
    <header class="clearfix">
        <div class="logo">
            <img src="<?=$dist?>img/logo-image.png" alt="" />
        </div>
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div id="main-flexslider" class="flexslider">
                        <ul class="slides">

                            <?php foreach ($slider_text as $k => $v): ?>

                                <li>
                                    <?= $v['name'] ?>
                                </li>

                            <?php endforeach; ?>


                        </ul>
                    </div>
                    <!-- end slider -->
                </div>
            </div>
        </div>
    </header>
</div>
<!-- spacer section -->
<section class="spacer green">
    <div class="container">
        <div class="row">
            <div class="span6 alignright flyLeft">
                <blockquote class="large">
                    There's huge space beetween creativity and imagination <cite>Mark Simmons, Nett Media</cite>
                </blockquote>
            </div>
            <div class="span6 aligncenter flyRight">
                <i class="icon-coffee icon-10x"></i>
            </div>
        </div>
    </div>
</section>
<!-- end spacer section -->
<!-- section: team -->
<section id="about" class="section">
    <div class="container">
        <h4>Who We Are</h4>
        <div class="row">
            <div class="span4 offset1">
                <div>
                    <h2>We live with <strong>creativity</strong></h2>
                    <p>
                        Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules. Omnicos directe al desirabilite de un nov lingua franca: On refusa continuar payar custosi traductores.
                    </p>
                </div>
            </div>
            <div class="span6">
                <div class="aligncenter">
                    <img src="<?=$dist?>img/icons/creativity.png" alt="" />
                </div>
            </div>
        </div>
        <div class="row">

            <?php $x=0; foreach ($team as $k => $v):?>

                <div class="span2 flyIn <?= ($x == 0) ? 'offset1': ''?>">
                    <div class="people">
                        <img class="team-thumb img-circle" src="<?= $uploads ?>/team/<?= $v['image'] ?>" alt="" />
                        <h3><?= $v['name'] ?></h3>
                        <p> <?= $v['profession'] ?> </p>
                    </div>
                </div>

            <?php $x++; endforeach; ?>

        </div>
    </div>
    <!-- /.container -->
</section>
<!-- end section: team -->
<!-- section: services -->
<section id="services" class="section orange">
    <div class="container">
        <h4>Services</h4>
        <!-- Four columns -->
        <div class="row">

            <?php foreach ($services as $k => $v): ?>

                <div class="span3 animated-slow flyIn">
                    <div class="service-box">
                        <img src="<?=$uploads?>/services/<?= $v['image'] ?>" alt="" />
                        <h2><?= $v['name'] ?></h2>
                        <p> <?= $v['description'] ?> </p>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>
    </div>
</section>
<!-- end section: services -->
<!-- section: works -->
<section id="works" class="section">
    <div class="container clearfix">
        <h4>Our Works</h4>
        <!-- portfolio filter -->
        <div class="row">
            <div id="filters" class="span12">
                <ul class="clearfix">

                    <?php foreach ($categories_arr as $k => $v): ?>

                        <li>
                            <a href="#" data-filter=".<?= $v['name'] ?>" class="active">
                                <h5><?= $v['name'] ?></h5>
                            </a>
                        </li>

                    <?php endforeach; ?>

                </ul>
            </div>
            <!-- END PORTFOLIO FILTERING -->
        </div>
        <div class="row">
            <div class="span12">
                <div id="portfolio-wrap">
                    <!-- portfolio item -->

                    <?php foreach ($portfolio as $k => $v): ?>

                        <div class="portfolio-item grid print <?= str_replace(',', ' ', $v['category']) ?>">
                            <div class="portfolio">
                                <a href="<?=$uploads?>/portfolio/<?= $v['image'] ?>" data-pretty="prettyPhoto[gallery1]" class="portfolio-image">
                                    <img src="<?=$uploads?>/portfolio/<?= $v['image'] ?>" alt="" />
                                    <div class="portfolio-overlay">
                                        <div class="thumb-info">
                                            <h5><?= $v['name'] ?></h5>
                                            <i class="icon-plus icon-2x"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                    <?php endforeach; ?>

                    <!-- end portfolio item -->

                </div>
            </div>
        </div>
    </div>
</section>
<!-- spacer section -->
<section class="spacer bg3">
    <div class="container">
        <div class="row">
            <div class="span12 aligncenter flyLeft">
                <blockquote class="large">
                    We are an established and trusted web agency with a reputation for commitment and high integrity
                </blockquote>
            </div>
            <div class="span12 aligncenter flyRight">
                <i class="icon-rocket icon-10x"></i>
            </div>
        </div>
    </div>
</section>
<!-- end spacer section -->
<!-- section: blog -->
<section id="blog" class="section">
    <div class="container">
        <h4>Our Blog</h4>
        <!-- Three columns -->
        <div class="row">

            <?php foreach ($blog as $k => $v):  $date = strtotime($v['date'])?>

                <div class="span3">
                    <div class="home-post">
                        <div class="post-image" style="max-height: 201px">
                            <img class="max-img" src="<?=$uploads?>/blog/<?= $v['image'] ?>" alt="" />
                        </div>
                        <div class="post-meta">
                            <i class="icon-file icon-2x"></i>
                            <span class="date"><?= strftime('%B', $date).' '.date('d', $date).', '.date('Y', $date)  ?></span>
                            <span class="tags"><a href="#"> <?= str_replace(',', ', ', $v['category']) ?> </a></span>
                        </div>
                        <div class="entry-content">
                            <h5><strong><a href="#"><?= $v['name'] ?></a></strong></h5>
                            <p>
                                <?= \yii\helpers\BaseStringHelper::truncate($v['description'], 73, '&hellip;', 'UTF-8') ?>
                            </p>
                            <a href="#" class="more">Read more</a>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>
        <div class="blankdivider30"></div>
        <div class="aligncenter">
            <a href="#" class="btn btn-large btn-theme">More blog post</a>
        </div>
    </div>
</section>

<!-- end spacer section -->
<!-- section: contact -->
<section id="contact" class="section green">
    <div class="container">
        <h4>Get in Touch</h4>
        <p>
            Reque facer nostro et ius, cu persius mnesarchum disputando eam, clita prompta et mel vidisse phaedrum pri et. Facilisis posidonium ex his. Mutat iudico vis in, mea aeque tamquam scripserit an, mea eu ignota viderer probatus. Lorem legere consetetur ei eum. Sumo aeque assentior te eam, pri nominati posidonium consttuam
        </p>
        <div class="blankdivider30">
        </div>
        <div class="row">
            <div class="span12">
                <div class="cform" id="contact-form">
                    <div id="sendmessage">Your message has been sent. Thank you!</div>
                    <div id="errormessage"></div>
                    <form action="site/mail" method="post" role="form" class="contactForm">
                        <div class="row">
                            <div class="span6">
                                <div class="field your-name form-group">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                    <div class="validation"></div>
                                </div>
                                <div class="field your-email form-group">
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                    <div class="validation"></div>
                                </div>
                                <div class="field subject form-group">
                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                                    <div class="validation"></div>
                                </div>
                            </div>
                            <input type="hidden" name="<?=Yii::$app->request->csrfParam; ?>" value="<?=Yii::$app->request->getCsrfToken(); ?>" />
                            <div class="span6">
                                <div class="field message form-group">
                                    <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                                    <div class="validation"></div>
                                </div>
                                <input type="submit" value="Send message" class="btn btn-theme pull-left">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- ./span12 -->
        </div>
    </div>
</section>

<a href="#" class="scrollup"><i class="icon-angle-up icon-square icon-bgdark icon-2x"></i></a>

<div class="modal fade in" tabindex="-1" role="dialog" id="modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Safaroff Agency</h4>
            </div>
            <div class="modal-body">
                <h5>Created for `Safaroff Agency`</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php

