<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
  <!-- Google Analytics -->
  <script>
    window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
    ga('create', '<?php the_field('global_google_analytics_code', 'option'); ?>', 'auto');
    ga('send', 'pageview');
  </script>
  <script async src='//www.google-analytics.com/analytics.js'></script>
</head>
