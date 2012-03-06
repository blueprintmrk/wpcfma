<?php
global $wpdb;
global $easy_gallery_table;

if(isset($_POST['galleryId'])) {
	$wpdb->query( "DELETE FROM $easy_gallery_table WHERE gid = '".$_POST['galleryId']."'" );
	$wpdb->query( "DELETE FROM $easy_gallery_table WHERE Id = '".$_POST['galleryId']."'" );
		
	?>  
	<div class="updated"><p><strong><?php _e('Gallery has been deleted.' ); ?></strong></p></div>  
	<?php	
}

$galleryResults = $wpdb->get_results( "SELECT * FROM $easy_gallery_table" );
?>
<div class='wrap'>
	<h2>Easy Gallery</h2>
    <p>This is a listing of all galleries.</p>
    <table class="widefat post fixed" cellspacing="0">
    	<thead>
        <tr>
        	<th>Gallery Name</th>
            <th>Gallery Short Code</th>
            <th>Description</th>
            <th width="136"></th>
        </tr>
        </thead>
        <tfoot>
        <tr>
        	<th>Gallery Name</th>
            <th>Gallery Short Code</th>
            <th>Description</th>
            <th></th>
        </tr>
        </tfoot>
        <tbody>
        	<?php foreach($galleryResults as $gallery) { ?>				
            <tr>
            	<td><?php echo $gallery->name; ?></td>
                <td><input type="text" size="40" value="[EasyGallery id='<?php echo $gallery->slug; ?>']" /></td>
                <td><?php echo $gallery->description; ?></td>
                <td class="major-publishing-actions">
                <form name="delete_gallery_<?php echo $gallery->Id; ?>" method ="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
                	<input type="hidden" name="galleryId" value="<?php echo $gallery->Id; ?>" />
                    <input type="submit" name="Submit" class="button-primary" value="Delete Gallery" />
                </form>
                </td>
            </tr>
			<?php } ?>
        </tbody>
     </table>
     <br />
     
</div>