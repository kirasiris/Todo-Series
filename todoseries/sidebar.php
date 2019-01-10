            <!-- Sidebar -->
            <aside>
            	<div class="col-md-4">
            		<!-- Search Input -->
					<form role="search" method="get" id="buscador" class="searchform" action="<?php bloginfo('url') ?>">
					    <div class="input-group">
					        <input class="form-control" name="s" placeholder="Search..."/>
					        <span class="input-group-btn">
					        	<button class="btn btn-success" type="submit">Go!</button>
					        </span>
					    </div>
					</form>
            		<!-- Popular Posts -->
            		<div class="panel panel-default">
            			<div class="panel-heading">
            				<h1 class="panel-title"><i class="fa fa-fire" aria-hidden="true"></i> Popular Posts</h1>
            			</div>
            			<div class="panel-body" id="video_player">
				                 <?php
				                    $args = array(
				                        'orderby'   => 'comment_count',
				                        'posts_per_page'    => '3'
				                    );
				                    $my_query = new wp_query( $args );
				                 ?>
							    <div id="owl-demo" class="owl-carousel">
							      <?php while($my_query->have_posts()) : $my_query->the_post(); ?>
							      <div class="text-center">
							      <div class="item products">
								      <a href="<?php the_permalink();?>" target="_self" rel="noopener noreferrer">
								      	<img class="img-responsive" style="width:100%; height: 150px;" src="<?php the_post_thumbnail_url(); ?>">
								      	<figcaption>
								      		<span class="pull-left"><?php the_title(); ?></span>
								      	</figcaption>
								      </a>    
							      </div>
							      </div>
							      <?php endwhile; ?>
							    </div>
            			</div>
            		</div>
					<?php if(is_active_sidebar('sidebar')) : ?>
					<?php dynamic_sidebar('sidebar'); ?>
					<?php endif; ?>
                </div>
            </aside>