<?php
/*
Template Name: fileTest 
*/
$args = array(
  'post_type' => 'attachment',
  'post_mime_type' => 'application/pdf',
  'posts_per_page' => -1, // Retrieve all PDFs
);
$pdf_attachments = get_posts($args);
foreach ($pdf_attachments as $attachment) {
  //echo wp_get_attachment_url($attachment->ID);
  echo print_r($attachment);
  echo get_the_title($attachment);
}
?>