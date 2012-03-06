<?php
    $prefix = 'cfma_page_';

    $post_meta_box = array(
        'id' => 'cfma-post-meta-bg-box',
        'title' => 'Post Background Image',
        'page' => 'post',
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'name' => 'Post Background Image',
                'desc' => 'Image size : 1024px*640px. Paste the background url here.',
                'id' => $prefix . 'bg_upload',
                'type' => 'upload',
                'std' => ''
            ) 
        )
    );
    
    add_action('admin_init', 'cfma_post_bg_add_box');

    // Add meta box
    function cfma_post_bg_add_box() { //mytheme_add_box
        
        global $post_meta_box;
        add_meta_box($post_meta_box['id'], $post_meta_box['title'], 'cfma_post_bg_show_box', $post_meta_box['page'], $post_meta_box['context'], $post_meta_box['priority']);
        add_action('save_post', 'cfma_post_bg_save_data');
    }
     // Callback function to show fields in meta box
    function cfma_post_bg_show_box() { 
        global $post_meta_box, $post;

        // Use nonce for verification
        echo '<input type="hidden" name="cfma_post_bg_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
    
        echo '<table class="form-table">';
    
        foreach ($post_meta_box['fields'] as $field) {
            // get current post meta data
            $meta = get_post_meta($post->ID, $field['id'], true);
    
           echo '<tr><td>',
                '<label for="', $field['id'], '">', $field['desc'], '</label></td></tr>',
                '<tr><td>';
 
            echo "<span><label for='upload_image'>";
    		echo '<input value="'.stripslashes(get_post_meta($post->ID, $field['id'], true)).'" type="text" name="'.$field['id'].'"  id="'.$field['id'].'" size="80%" />';
    		echo '<input class="upload_img_button"  id="'.$field['id'].'" type="button" value="Upload Image" />';
    		echo '</label></span>';

            echo     '<td>',
                '</tr>';
        }
    
        echo '</table>';
    }
    add_action('admin_init','custompostmeta_jsscript');

    function custompostmeta_jsscript(){
        wp_enqueue_script('custompostmeta_script', get_template_directory_uri() .'/lib/js/custommeta_jsscript.js',array('jquery'));
    }

    // Save data from meta box
    function cfma_post_bg_save_data($post_id) {
        global $post_meta_box;
    
        // verify nonce
        if (!wp_verify_nonce($_POST['cfma_post_bg_meta_box_nonce'], basename(__FILE__))) {
            return $post_id;
        }
    
        // check autosave
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return $post_id;
        }
        
    
        // check permissions
        if ('page' == $_POST['post_type']) {
            if (!current_user_can('edit_page', $post_id)) {
                return $post_id;
            }
        } elseif (!current_user_can('edit_post', $post_id)) {
            return $post_id;
        }
    
        foreach ($post_meta_box['fields'] as $field) {
            $old = get_post_meta($post_id, $field['id'], true);
            $new = $_POST[$field['id']];
    
            if ($new && $new != $old) {
                update_post_meta($post_id, $field['id'], $new);
            } elseif ('' == $new && $old) {
                delete_post_meta($post_id, $field['id'], $old);
            }
        }
    }
?>