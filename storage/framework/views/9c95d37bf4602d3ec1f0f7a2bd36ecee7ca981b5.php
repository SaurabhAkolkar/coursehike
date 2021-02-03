<?php $__env->startSection('content'); ?>
<div class="la-profile">
    <div class="la-profile__wrap">

       <!-- Side Navbar: Start -->
       <?php echo $__env->make('learners.pages.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
       <!-- Side Navbar: End -->

      
      <div class="la-profile__main">
        <div class="container la-anim__wrap">
        <?php if(session('success')): ?>
            <div class="la-btn__alert position-relative">
              <div class="la-btn__alert-success col-lg-4 offset-lg-2 alert alert-success alert-dismissible fade show" role="alert">
                  <span class="la-btn__alert-msg"><?php echo e(session('success')); ?></span>
                  <button type="button" class="close la-btn__alert-close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true" style="color:#56188C">&times;</span>
                  </button>
              </div>
            </div>
          <?php endif; ?>
          <div class="la-profile__main-inner">
            <div class="la-profile__title-wrap la-anim__stagger-item">
              <a class="la-icon la-icon--5xl icon-back-arrow d-block d-md-none ml-n1 mt-n2 mb-6" href="<?php echo e(URL::previous()); ?>"></a>
              <h1 class="la-profile__title">My Playlist</h1>
              <!-- Mobile Version Button to Add Playlist -->
              <a class="d-block d-md-none"  data-toggle="modal" data-target="#create_playlist" >
                <div class="la-btn__add-icon ">
                  <span class="la-playlist__mobile text-lg text-uppercase"> 
                    <span class="la-icon la-icon--md icon-plus mr-3"></span>Create Playlist</span>
                </div>
              </a>
            </div>
            
            <section class="la-section la-playlist__sec pt-0">
              <div class="la-playlist__wrap">

              <?php
                  $playlistItem1 = new stdClass;
                  $playlistItem1->courseName = "Photography";
                  $playlistItem1->classesCount = "2";

                  $playlistItem2 = new stdClass;
                  $playlistItem2->courseName = "Dance";
                  $playlistItem2->classesCount = "5";

                  $playlist = array($playlistItem1, $playlistItem2);
              ?>

                <div class="row la-playlist__items">
                    <?php $__currentLoopData = $playlists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                           <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.playlist-item','data' => ['courseName' => $item->name,'classesCount' => $item->count,'id' => $item->id]]); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['courseName' => $item->name,'classesCount' => $item->count,'id' => $item->id]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                       
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6 col-lg-4 d-none d-md-block la-anim__stagger-item">
                        <a class="la-btn__add la-playlist__add-btn d-flex justify-content-center align-items-center"  data-toggle="modal" data-target="#create_playlist" >
                          <span class="la-btn__add-icon">+</span>
                        </a>
                    </div>

                    <!-- Create Playlist Popup: Start -->
                    <div class="modal fade la-playlist__modal" id="create_playlist">
                      <div class="modal-dialog la-playlist__modal-dialog">
                        <div class="modal-content la-playlist__modal-content">
                        
                          <div class="modal-header la-playlist__modal-header">
                            <h4 class="modal-title la-playlist__modal-title">Create New Playlist</h4>
                            <button type="button" class="close text--black" data-dismiss="modal">&times;</button> <br/>
                          </div>
                         
                          <div class="modal-body la-playlist__modal-body">
                            <form action="<?php echo e(route('create.playlist')); ?>" method="post" id="create_playlist_form" name="create_playlist_form">
                              <?php echo csrf_field(); ?>
                              <div class="la-playlist__modal-create">
                                  <label class="la-playlist__modal-name" for="playlist_name">Playlist Name</label><br/>
                                  <input type="text" class="la-playlist__modal-inputtype w-100" name="playlist_name" id="playlist_name" placeholder="Create New Playlist" value ="<?php echo e(old('playlist_name')); ?>"/>
                                  <?php if(session('playlist_exists')): ?>
                                  <div class="alert alert-danger"><?php echo e(session('playlist_exists')); ?></div>
                                  <?php endif; ?>
                              </div>
                              
                              <div class="la-playlist__modal-update text-center">
                                <a onclick = "$('#create_playlist_form').submit();" role="button" class="la-playlist__modal-btn">Create Playlist</a>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                  </div>
                  <!-- Create Playlist Popup: End -->

                  <!-- Edit Playlist Popup: Start -->
                  <div class="modal fade la-playlist__modal" id="edit_playlist">
                    <div class="modal-dialog la-playlist__modal-dialog">
                      <div class="modal-content la-playlist__modal-content">
                      
                        <div class="modal-header la-playlist__modal-header">
                          <h4 class="modal-title la-playlist__modal-title">Edit Playlist</h4>
                          <button type="button" class="close text--black" data-dismiss="modal">&times;</button> <br/>
                        </div>
                          <form action="/edit-playlist" method="post" id="editPlaylistForm">
                            <?php echo csrf_field(); ?>
                            <div class="modal-body la-playlist__modal-body">
                                <div class="la-playlist__modal-create">
                                    <input type="hidden" value="" name="playlist_id" id="edit_playlist_id" />
                                    <label class="la-playlist__modal-name" for="edit_playlist_name">Playlist Name</label><br/>
                                    <input type="text" class="la-playlist__modal-inputtype w-100" name="edit_playlist_name" id="edit_playlist_name" placeholder="Edit Playlist Name" value =""/>
                                </div>
                                
                                <div class="la-playlist__modal-update text-center">
                                  <a role="button" class="la-playlist__modal-btn" type="submit" onclick="$('#editPlaylistForm').submit()">Save</a>
                                </div>
                            </div>
                          </form>
                      </div>
                    </div>
                </div>
                <!-- Edit Playlist Popup: End -->
                
                <!-- Share Playlist Pop UP -->
                    <div class="modal fade la-playlist__modal" id="share_playlist">
                        <div class="modal-dialog la-playlist__modal-dialog">
                          <div class="modal-content la-playlist__modal-content">
                          
                            <div class="modal-header la-playlist__modal-header d-flex align-items-center">
                              <h4 class="modal-title la-playlist__modal-title">Share Playlist</h4>
                              <button type="button" class="close text--black" data-dismiss="modal">&times;</button> <br/>
                            </div>
                          
                            <div class="modal-body la-playlist__modal-body">
                                  <p>
                                                                    
                                  <a role="button" id="share_playlist_on_facebook" target="_facebook" ><span class="la-icon la-icon--6xl icon-facebook-colored"></span></a>
                                  <a role="button" id="share_playlist_on_twitter" target="_twitter" ><span class="la-icon la-icon--6xl icon-twitter"></span></a>
                                  <a role="button" id="share_playlist_on_whatsapp" target="_whatsapp" ><span class="la-icon la-icon--6xl icon-whatsapp"></span></a>
                                  <a role="button" id="share_playlist_on_pinterest" target="_pinterest" ><span class="la-icon la-icon--6xl icon-pinterest"></span></a>  
                                </p>
                                  <p><input class="border-0 w-75" id="playlist_url_copy"><span role="button" class="float-right" onclick="copyPlaylistUrl()"><span class="la-icon la-icon--3xl icon-copy-clipboard la-playlist__item-clipboard"></span></p>
                            </div>
                          </div>
                        </div>
                    </div>
                <!-- Share Playlist POP UP :END -->
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('footerScripts'); ?>
<script>
 
<?php if(session('playlist_exists')): ?>
  $('#create_playlist').modal('show');
<?php endif; ?>

  $("form[name='create_playlist_form']").validate({
      
      rules: {

        playlist_name: {
          required: true,
          minlength: 3
        }
      },
      // Specify validation error messages
      messages: {
        playlist_name: {
          required: "Please provide a Playlist Name.",
          minlength: "Playlist Name must be minimum 3 characters."
        }
      },
      // Make sure the form is submitted to the destination defined
      // in the "action" attribute of the form when valid
      submitHandler: function(form) {
        form.submit();
      }
      
    });

    function sharePlaylistPopup(id){
      let URL = "<?php echo e(Request::url()); ?>/"+id;
      let facebookURL = encodeURI(`http://www.facebook.com/sharer/sharer.php?u=${URL}`);
      let pinterestURL = encodeURI(`https://pinterest.com/pin/create/bookmarklet/?&url=${URL}description=this is a playlist from lila`);
      let twitterURL = encodeURI(`https://twitter.com/share?url=${URL}`);
      let whatsappURL = encodeURI(`https://wa.me/?text=${URL}`);
      $('#share_playlist_on_facebook').attr('href',facebookURL);
      $('#share_playlist_on_twitter').attr('href',twitterURL);
      $('#share_playlist_on_whatsapp').attr('href',whatsappURL);
      $('#share_playlist_on_pinterest').attr('href',pinterestURL);
      $('#playlist_url_copy').val(URL);
      $('#share_playlist').modal('show');
    }

    function editPlaylistPopup(id, name){
        $('#edit_playlist_id').val(id);
        $('#edit_playlist_name').val(name);
        $('#edit_playlist').modal('show');
    }
    function copyPlaylistUrl() {
      /* Get the text field */
      var copyText = document.getElementById("playlist_url_copy");

      /* Select the text field */
      copyText.select();
      // copyText.setSelectionRange(0, 99999); /*For mobile devices*/

      /* Copy the text inside the text field */
      document.execCommand("copy");
    }

  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('learners.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/learners/pages/playlist.blade.php ENDPATH**/ ?>