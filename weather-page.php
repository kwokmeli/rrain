<?php /*Template Name: weather-page*/ ?>

<?php get_header(); ?>
<div class="header-selection"><?php echo get_the_title(); ?></div>

<div class="weather">
<iframe  height="600"  width="100%" src="http://feed.mikle.com/widget/?rssmikle_url=http%3A%2F%2Falerts.weather.gov%2Fcap%2Fwa.php%3Fx%3D0&rssmikle_frame_width=100%&rssmikle_frame_height=600&frame_height_by_article=0&rssmikle_target=_blank&rssmikle_font=Arial%2C%20Helvetica%2C%20sans-serif&rssmikle_font_size=14&rssmikle_border=on&responsive=on&text_align=left&text_align2=left&corner=on&scrollbar=on&autoscroll=off&scrolldirection=up&scrollstep=3&mcspeed=20&sort=New&rssmikle_title=off&rssmikle_title_bgcolor=%230066FF&rssmikle_title_color=%23FFFFFF&rssmikle_item_bgcolor=%23FFFFFF&rssmikle_item_title_length=55&rssmikle_item_title_color=%231162BF&rssmikle_item_border_bottom=on&rssmikle_item_description=on&item_link=on&rssmikle_item_description_length=150&rssmikle_item_description_color=%23666666&rssmikle_item_date=gl1&rssmikle_timezone=Etc%2FGMT&datetime_format=%25b%20%25e%2C%20%25Y%20%25l%3A%25M%20%25p&item_description_style=text&item_thumbnail=full&item_thumbnail_selection=auto&article_num=15&rssmikle_item_podcast=off&" scrolling="yes" marginwidth="0" marginheight="0" vspace="0" hspace="0" frameborder="0">
</iframe>
</div>

<?php wp_footer(); ?>
