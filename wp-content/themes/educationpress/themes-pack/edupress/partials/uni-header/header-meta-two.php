<?php
/*
 * Header Meta
 */
global $edupress_options;
?>
<nav class="meta-login" role="navigation">
    <ul>
      <li class="call"><i class="lnr lnr-smartphone"></i><?php esc_html_e('Call Us  ', 'edupress'); echo $edupress_options['edupress_header_phone'];?></li>
      <li class="call"><i class="fa fa-envelope-o"></i><?php esc_html_e('Email Us  ', 'edupress'); echo $edupress_options['edupress_header_email'];?></li>
    </ul>
</nav>