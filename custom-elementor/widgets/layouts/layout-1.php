<?php
while ($all_posts->have_posts()) :

    $all_posts->the_post(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class('wpcap-post'); ?>>

        <div class="post-grid-inner">

            <div class="row">

                <?php if (get_the_post_thumbnail_url($this->ID, 'post-thumbnail')) { ?>
                    <div class="col-sm-12 col-md-4">
                        <?php // $this->render_thumbnail(); 
                        ?>
                        <div class="post-grid-image" style="background-image: url(<?php echo get_the_post_thumbnail_url($this->ID, 'post-thumbnail') ?>)">
                        </div>
                    </div>
                <?php } ?>
                <div class="col-sm-12 <?php if (get_the_post_thumbnail_url($this->ID, 'post-thumbnail')) {
                                            echo "col-md-8";
                                        } else {
                                            echo "col-md-12";
                                        } ?>">
                    <div class="post-grid-text-wrap custom-post-grid-text-wrap d-flex align-items-start flex-column">
                        <?php $this->render_title(); ?>
                        <?php $this->render_meta(); ?>
                        <?php $this->render_excerpt(); ?>
                        <div class="post-grid-buttons mt-auto">
                            <?php $this->render_readmore(); ?>
                            <div class="post-grid-share-box">
                                <p>Share</p>
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $this->render_post_link(); ?>&t=<?php echo $this->render_post_title(); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Facebook">
                                    <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M18.9542 33.553C27.238 32.5853 33.6663 25.5432 33.6663 16.9997C33.6663 7.79493 26.2044 0.333008 16.9997 0.333008C7.79493 0.333008 0.333008 7.79493 0.333008 16.9997C0.333008 25.2527 6.33166 32.1047 14.2067 33.4334V22.6605H10.333V17.6247H14.2067V13.6569C14.2067 9.34603 16.6108 6.99967 20.1209 6.99967C21.8027 6.99967 23.2472 7.13802 23.6663 7.19889V11.7035H21.232C19.3229 11.7035 18.9542 12.6995 18.9542 14.1549V17.6247H23.2623L22.6714 22.6605H18.9542V33.553Z" fill="#1877F2" />
                                    </svg>
                                </a>
                                <a href="https://twitter.com/intent/tweet?url=<?php echo $this->render_post_link(); ?>&text=<?php echo $this->render_post_title(); ?>">
                                    <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16.9997 33.6663C26.2044 33.6663 33.6663 26.2044 33.6663 16.9997C33.6663 7.79493 26.2044 0.333008 16.9997 0.333008C7.79493 0.333008 0.333008 7.79493 0.333008 16.9997C0.333008 26.2044 7.79493 33.6663 16.9997 33.6663ZM25.1268 14.5635C25.1268 14.3994 25.1268 14.2353 25.1152 14.0713C25.8481 13.5322 26.4879 12.8642 26.9997 12.1143C26.325 12.4072 25.5921 12.6182 24.836 12.7002C25.6154 12.2315 26.2086 11.4932 26.4878 10.6143C25.7666 11.0478 24.9523 11.3643 24.1031 11.5283C23.4167 10.79 22.4396 10.333 21.3577 10.333C19.2755 10.333 17.6003 12.0322 17.6003 14.1182C17.6003 14.4111 17.6352 14.7041 17.6934 14.9853C14.5758 14.8212 11.7956 13.3213 9.94592 11.0244C9.62018 11.5869 9.43409 12.2314 9.43409 12.9345C9.43409 14.2471 10.0971 15.4072 11.1092 16.0869C10.4927 16.0635 9.91101 15.8877 9.41081 15.6065V15.6533C9.41081 17.4932 10.7021 19.0166 12.4238 19.3682C12.1097 19.4502 11.7723 19.4971 11.435 19.4971C11.1907 19.4971 10.958 19.4736 10.7253 19.4385C11.2023 20.9385 12.5866 22.0283 14.2385 22.0635C12.9472 23.083 11.3302 23.6807 9.5737 23.6807C9.2596 23.6807 8.96881 23.6689 8.66634 23.6338C10.3298 24.7119 12.3074 25.333 14.4362 25.333C21.3462 25.333 25.1268 19.5674 25.1268 14.5635Z" fill="#67C1CD" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16.9997 33.6663C26.2044 33.6663 33.6663 26.2044 33.6663 16.9997C33.6663 7.79493 26.2044 0.333008 16.9997 0.333008C7.79493 0.333008 0.333008 7.79493 0.333008 16.9997C0.333008 26.2044 7.79493 33.6663 16.9997 33.6663ZM25.1268 14.5635C25.1268 14.3994 25.1268 14.2353 25.1152 14.0713C25.8481 13.5322 26.4879 12.8642 26.9997 12.1143C26.325 12.4072 25.5921 12.6182 24.836 12.7002C25.6154 12.2315 26.2086 11.4932 26.4878 10.6143C25.7666 11.0478 24.9523 11.3643 24.1031 11.5283C23.4167 10.79 22.4396 10.333 21.3577 10.333C19.2755 10.333 17.6003 12.0322 17.6003 14.1182C17.6003 14.4111 17.6352 14.7041 17.6934 14.9853C14.5758 14.8212 11.7956 13.3213 9.94592 11.0244C9.62018 11.5869 9.43409 12.2314 9.43409 12.9345C9.43409 14.2471 10.0971 15.4072 11.1092 16.0869C10.4927 16.0635 9.91101 15.8877 9.41081 15.6065V15.6533C9.41081 17.4932 10.7021 19.0166 12.4238 19.3682C12.1097 19.4502 11.7723 19.4971 11.435 19.4971C11.1907 19.4971 10.958 19.4736 10.7253 19.4385C11.2023 20.9385 12.5866 22.0283 14.2385 22.0635C12.9472 23.083 11.3302 23.6807 9.5737 23.6807C9.2596 23.6807 8.96881 23.6689 8.66634 23.6338C10.3298 24.7119 12.3074 25.333 14.4362 25.333C21.3462 25.333 25.1268 19.5674 25.1268 14.5635Z" fill="#00ACED" />
                                    </svg>
                                </a>
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo $this->render_post_link(); ?>&text=<?php echo $this->render_post_title(); ?>">
                                    <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16.9997 33.6663C26.2044 33.6663 33.6663 26.2044 33.6663 16.9997C33.6663 7.79493 26.2044 0.333008 16.9997 0.333008C7.79493 0.333008 0.333008 7.79493 0.333008 16.9997C0.333008 26.2044 7.79493 33.6663 16.9997 33.6663ZM8.94158 25.333H12.3969V14.2058H8.94158V25.333ZM8.66634 10.6678C8.66634 11.7727 9.56272 12.6879 10.6674 12.6879C11.772 12.6879 12.6684 11.7727 12.6684 10.6678C12.6684 9.56292 11.772 8.66634 10.6674 8.66634C9.56272 8.66634 8.66634 9.56292 8.66634 10.6678ZM21.8814 25.333H25.3293H25.333V19.2207C25.333 16.2296 24.6895 13.9268 21.1933 13.9268C19.5121 13.9268 18.3852 14.8494 17.9239 15.7236H17.8756V14.2058H14.5616V25.333H18.0132V19.8233C18.0132 18.3724 18.2884 16.9699 20.0849 16.9699C21.8554 16.9699 21.8814 18.6254 21.8814 19.9163V25.333Z" fill="#0077B5" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <!-- https://www.linkedin.com/shareArticle?mini=true&url= -->
                    </div>

                </div>

            </div><!-- .blog-inner -->

    </article>
    <script src="https://platform.linkedin.com/in.js" type="text/javascript">lang: en_US</script>
    <script type="IN/Share" data-url="<?php echo $this->render_post_link(); ?>"></script>
<?php

endwhile;

wp_reset_postdata();
