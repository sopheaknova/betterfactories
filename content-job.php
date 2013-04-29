<div class="entry-body">
    <h2><?php the_title(); ?></h2>
    <p class="postmetadata">Posted on <?php the_time('l, F jS, Y') ?></p>
    <hr>
    <p>
        <strong>Project title: </strong><?php echo sp_get_custom_field( 'sp_project_title', $post->ID ); ?><br />
        <strong>Post level: </strong><?php echo sp_get_custom_field( 'sp_post_level', $post->ID ); ?><br />
        <strong>Contract type: </strong><?php echo sp_get_custom_field( 'sp_contract_type', $post->ID ); ?><br />
        <strong>Duration of contract: </strong><?php echo sp_get_custom_field( 'sp_contract_duration', $post->ID ); ?><br />
        <strong>Duty station: </strong><?php echo sp_get_custom_field( 'sp_duty_station', $post->ID ); ?>
    </p>
    <?php the_content(); ?>

</div><!-- end .entry-body -->