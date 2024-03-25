<html lang="en">
<?php
/*
Template Name: test
*/
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="Kenrie Vandekerckhove">
    <meta name="author" content="Domien Verstraete">
    <meta name="author" content="Seraphin Sampers">
    <title>Bachelor Kiosk</title>
    <?php wp_head();?>
</head>

<body <?php body_class();?>>
    say yooo-o

      <?php
$cont = get_the_content();
// Match the URL of the PDF file in the post content
preg_match('/<a\s+(?:[^>]*?\s+)?href="([^"]*\.pdf)"[^>]*>(?:[^<]+)<\/a>/', $cont, $matches);

if ($matches && isset($matches[1])) {
    $pdf_url = $matches[1];
    // Output the embedded PDF using an iframe
    echo '<iframe src="' . esc_url($pdf_url) . '" width="100%" height="1000px"></iframe>';
} else {
    // If no PDF link found in the content
    echo 'No PDF found in the content.';
}
?>

<?php wp_footer();?>

</body>

</html>