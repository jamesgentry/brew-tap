<?php
/*
Template Name: Home Page Template
*/
?>

<?php get_header(); ?>

<?php if ( has_post_thumbnail() ) { ?>
<div class="homebanner" style="background-image: url('<?php $params = array( 'width' => 1200, 'opacity' => 100, 'grayscale' => false, 'colorize' => '#ff0000' ); echo bfi_img( 'full', $params ); ?>');">
<?php } else { ?>
<div class="homebanner">
<?php } ?>
  <div class="container">
    <div class="row">
      <div class="animated zoomInDown col-md-8 col-md-offset-2">
        <h1>It's a Bird, it's a Plane!</h1>
        <p>It's a place to start!</p>
        <a href="http://jamesgentry.us" target="_blank" class="btn btn-lg btn-primary">Gentry</a></p>
      </div>
    </div><!-- end .row-->
  </div> <!-- end .container-->
</div> <!-- end #banner-->

<div class="container">
  <div class="row text-center">

    <!--Section 1-->
    <div class="col-sm-4 about">
      <i class="fa fa-rocket fa-4x light-gray"></i>
      <h3>One Box</h3>
      <p>Don't be too proud of this technological terror you've constructed. The ability to destroy a planet is insignificant next to the power of the Force. I care. So, what do you think of her, Han? Oh God, my uncle. How am I ever gonna explain this? Still, she's got a lot of spirit. I don't know, what do you think? Red Five standing by. In my experience, there is no such thing as luck.</p>
    </div>

    <!--Section 2-->
    <div class="col-sm-4 about">
      <i class="fa fa-space-shuttle fa-4x light-gray"></i>
      <h3>Two Box</h3>
      <p>The more you tighten your grip, Tarkin, the more star systems will slip through your fingers. Still, she's got a lot of spirit. I don't know, what do you think? Leave that to me. Send a distress signal, and inform the Senate that all on board were killed. Still, she's got a lot of spirit. I don't know, what do you think?</p>
    </div>

    <!--Section 3-->
    <div class="col-sm-4 about">
      <i class="fa fa-paper-plane fa-4x light-gray"></i>
      <h3>Three Box</h3>
      <p>Don't act so surprised, Your Highness. You weren't on any mercy mission this time. Several transmissions were beamed to this ship by Rebel spies. I want to know what happened to the plans they sent you. No! Alderaan is peaceful. We have no weapons. You can't possibly&hellip; I'm surprised you had the courage to take the responsibility yourself. In my experience, there is no such thing as luck. Don't underestimate the Force.</p>
    </div>

  </div>
</div>

<?php get_footer(); ?>
