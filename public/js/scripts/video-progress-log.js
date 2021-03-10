

// Video Course JS
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
var video_id;
var lilaPlayer = videojs('lila-video',{errorDisplay: false}).ready(function () {

    var progress_log = [], debounce = true;

    var updateProgress = function() {
        
        let currentTime = this.currentTime();
        var intPlayedTime = parseInt(currentTime, 10);
        var isFifteen     = intPlayedTime % 20 == 0 && intPlayedTime !== 0;
        if (isFifteen && debounce && progress_log.findIndex(x => x.position == intPlayedTime ) < 0) {
            debounce = false;
            progress_log.push({
                "position": intPlayedTime,
                "time": moment().format(),
                // "time": toLocal(new Date()),
                "total": parseInt(this.duration(), 10)
            });

            if(progress_log.length >= 3){

                $.ajax({
                    type: 'POST',
                    url: "/subscribed-courses/" + course_id + "/" + video_id + "/progress-logs",
                    data: JSON.stringify(progress_log),
                    contentType: "application/json",
                    dataType: 'json',
                    success: function(response){
                      let data = response.data;
                      console.log(data);
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) { 
                        // alert("You need to Login/Subscribe");
                    }  
                  });

                setTimeout(function() {
                    progress_log = []
                }, 1000);
            }
        } else {
            debounce = true;
        }
    };

    var endProgress = function() {
      
        $.ajax({
            type: 'POST',
            url: "/subscribed-courses/" + course_id + "/" + video_id + "/completion",
            data: JSON.stringify({currentTime: parseInt(this.currentTime())}),
            contentType: "application/json",
            dataType: 'json',
            success: function(response){
              let data = response.data;
              console.log(data);
            }
          });

        $.ajax({
            type: 'POST',
            url: "/subscribed-courses/" + course_id + "/" + video_id + "/progress-logs",
            data: JSON.stringify(progress_log),
            contentType: "application/json",
            dataType: 'json',
            success: function(response){
              let data = response.data;
              console.log(data);
            }
          });
  };

    this.on('timeupdate', updateProgress);
    this.on('ended', endProgress);
});

$('.la-vcourse__lesson').on('click', function() {

    video_id = $(this).attr('data-video-id');
    $('.la-vcourse__lesson').removeClass('active');
    $(this).addClass('active');
  
    $.ajax({
      type: 'POST',
      url: "/learn/course/" + video_id,
      data:{video_id:video_id},
      success: function(response){
        let data = response.data;
  
        $('.la-vlesson__title').text(data.title);         

        var lilaPlayer = videojs('lila-video', {
          preload: 'auto',
          errorDisplay: false
        });
        // var vhs = lilaPlayer.tech().vhs;

        // vhs.options_.externHls.GOAL_BUFFER_LENGTH = 60;
        // vhs.options_.externHls.MAX_GOAL_BUFFER_LENGTH = 80;
        // lilaPlayer.Hls.GOAL_BUFFER_LENGTH = 60;

        lilaPlayer.src([
          {
             src: data.url,
             type: 'application/x-mpegURL',
             label: 'Auto',
             selected: true,
          },
          {
             src: data.url+'?clientBandwidthHint=5',
             type: 'application/x-mpegURL',
             label: '1080P',
          },
          {
            src: data.url+'?clientBandwidthHint=3.6',
            type: 'application/x-mpegURL',
            label: '720P',
         },
          {
             src: data.url+'?clientBandwidthHint=2.4',
             type: 'application/x-mpegURL',
             label: '480P',
          },
          {
             src: data.url+'?clientBandwidthHint=1',
             type: 'application/x-mpegURL',
             label: '360P',
          },
          {
             src: data.url+'?clientBandwidthHint=0.6',
             type: 'application/x-mpegURL',
             label: '240p',
          },
        ]);
  
        lilaPlayer.poster(data.poster)
  
        if(lilaPlayer.controlBar.getChild('QualitySelector') == undefined)
          lilaPlayer.controlBar.addChild('QualitySelector');
      
        lilaPlayer.play();

        lilaPlayer.on('error', function(e) {
              console.log(e);
              console.log(player.error());

              e.stopImmediatePropagation();
                var error = this.player().error();
                console.log('error!', error.code, error.type , error.message);
        });
      
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) { 
          $('#locked_login').modal('show');
      }  
    });
  
}); 

var date = new Date();

function toLocal (date) {
var local = new Date(date),
    zoneOffset = date.getTimezoneOffset();
local.setMinutes(date.getMinutes() - zoneOffset);
return local.toJSON().slice(0, -1) + (zoneOffset < 0 ? "+" : "-") + ( Math.floor( Math.abs(zoneOffset) / 60))  + ":" + Math.abs(zoneOffset % 60);
}
console.log(toLocal(date));