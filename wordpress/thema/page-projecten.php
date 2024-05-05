<?php
/*
Template Name: page Projecten
*/
?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content="HTML,CSS,XML,JavaScript">
  <meta name="author" content="Kenrie Vandekerckhove">
  <meta name="author" content="Domien Verstraete">
  <meta name="author" content="Seraphin Sampers">
  <script type="text/javascript" src="<?php echo get_partone_url() ?>/recourses/js/Disable_scroll.js" defer></script>
  <title>Bachelor Kiosk</title>
  <?php wp_head();?>
</head>

<body <?php body_class();?>>
<div id="top" style="height: 100px; position: fixed; top: 0; width: 100vw;"></div>
<div id="bottom" style="height: 100px; position: fixed; bottom: 0; width: 100vw;"></div> 
  <div class="TopText">
    <h1>projecten</h1>
    <p>Deze pagina bevat informatie over de bachelor proeven van de richting <br>Elektronica-ICT</p>
  </div>
  <div class="bodydiv">
    <div class="leftbodydiv">
    <!-- The sidebar -->
    <div class="sidebar">
    <?php echo get_menu_links(array("page-menu.php","page-projecten.php","page-richtingen.php","page-game.php"));?>
      <img src="<?php echo get_partone_url() ?>/recourses/images/asemgou-of-aventura-arcade.gif" class="kong">
    </div>
</div>
<div style="display:none" class="data">
</div>
    <!-- proeven -->
    <div class="content" id="proevenDiv">
      <?php
	$args = array(
    'post_type' => 'page',
    'meta_key' => '_wp_page_template',
    'posts_per_page' => -1, // Display all pages, remove pagination
    'meta_value' => $template_name
  );
  $pages_query = new WP_Query($args);
  echo '<ul>';
  //echo count($pages_query);
  $i =0;
  $args = array(
    'post_type' => 'attachment',
    'post_mime_type' => 'application/pdf',
    'posts_per_page' => -1, // Retrieve all PDFs
  );
  $pdf_attachments = get_posts($args);
  foreach ($pdf_attachments as $attachment) {
    echo '<li><a href="' . get_link_page("page-docu.php")."?&file=".wp_get_attachment_url($attachment->ID)."&id=". $i . '">' . get_the_title($attachment) . '</a></li>';
    $i += 1;
  }
  echo '</ul>';

    // Restore original post data
    wp_reset_postdata();
	?>
    </div>
  </div>
<?php wp_footer();?>
</body>
</html>
