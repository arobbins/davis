<section class="l-box l-box-3 widget">
  <h1 class="widget-title">Contact</h1>
  <ul class="footer-contact">
    <li class="footer-contact-item">Phone: <?php the_field('global_contact_phone', 'options'); ?></li>
    <li class="footer-contact-item">Fax: <?php the_field('global_contact_fax', 'options'); ?></li>
    <li class="footer-contact-item">
      <a href="mailto:<?php the_field('global_contact_email', 'options'); ?>"><?php the_field('global_contact_email', 'options'); ?></a>
    </li>
  </ul>
  <ul class="footer-social">
    <li class="footer-social-item">
      <a href="<?php the_field('global_social_facebook', 'options'); ?>">
        <i class="fa fa-facebook"></i>
      </a>
    </li>
    <li class="footer-social-item">
      <a href="<?php the_field('global_social_twitter', 'options'); ?>">
        <i class="fa fa-twitter"></i>
      </a>
    </li>
  </ul>
</section>