<?php 

// metabox job customer_exchange
function meta_box_job_customer_exchange(){
  add_meta_box('job-customer','Chức danh','job_customer_output','customer_exchange');
}
add_action('add_meta_boxes','meta_box_job_customer_exchange');
function job_customer_output($post){
  $job_customer = get_post_meta($post->ID,'_job_customer', true); ?>
  <input type="text" id="job_customer" name="job_customer" value="<?php echo $job_customer; ?>"  style="width: 100%;">
  <?php
}
function meta_box_save($post_id){
    $job_customer = isset($_POST['job_customer']) ? $_POST['job_customer'] : '';
    update_post_meta( $post_id, '_job_customer', $job_customer );
 }
 add_action('save_post' , 'meta_box_save');