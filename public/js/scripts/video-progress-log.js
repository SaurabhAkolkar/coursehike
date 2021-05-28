

// Video Course JS
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

$(function() {
	$('#lila-video').on('mouseenter', '.language-switcher', function() {
		$(this).find(".vjs-multilngual_list").removeClass("invisible");
	 }).on('mouseleave', '.language-switcher', function() {
		$(this).find(".vjs-multilngual_list").addClass("invisible");
	 });
})


var video_id;
var lilaPlayer = videojs('lila-video',{errorDisplay: false}).ready(function () {

  var promise = this.play();
  var that = this;

  if (promise !== undefined) {
    promise.catch(function(error) {
      that.muted(true);
      that.play();
    });
  }

  this.userActive(false);

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

    this.on('useractive', function(){
		console.log('useractive');
	});
    this.on('userinactive', function(){
		console.log('userinactive');
	});
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

			var lang_list = data.multilingual;

			const MenuButton = videojs.getComponent('MenuButton');
			const MenuItem = videojs.getComponent('MenuItem');

			var menuButton = new MenuButton(lilaPlayer);
			var langMenu = menuButton.createMenu();
			langMenu.addClass('vjs-multilngual_list');

			var default_item = new MenuItem(lilaPlayer, { label:'Audio Language', selectable: false});
			default_item.addClass('vjs-multilngual_default_item');
			langMenu.addItem(default_item);

			for(let i=0; i < lang_list.length; i++){
				var lang_item = new MenuItem(lilaPlayer,{label:lang_list[i].lang, selectable: true});
				lang_item.addClass('vjs-multilngual_item');
				lang_item.on('click',function(){
					const stream_path = lang_list[i].stream_url;
					lilaPlayer.src([
						{
							src: stream_path,
							type: 'application/x-mpegURL',
							label: 'Auto',
							selected: true,
						},
						{
							src: stream_path+'?clientBandwidthHint=5',
							type: 'application/x-mpegURL',
							label: '1080P',
						},
						{
							src: stream_path+'?clientBandwidthHint=3.6',
							type: 'application/x-mpegURL',
							label: '720P',
						},
						{
							src: stream_path+'?clientBandwidthHint=2.4',
							type: 'application/x-mpegURL',
							label: '480P',
						},
						{
							src: stream_path+'?clientBandwidthHint=1',
							type: 'application/x-mpegURL',
							label: '360P',
						},
						{
							src: stream_path+'?clientBandwidthHint=0.6',
							type: 'application/x-mpegURL',
							label: '240p',
						},
					]);

					const referenceTrack = this;
					const tracks = langMenu.children();
					for (let i = 0; i < tracks.length; i++) {
						const track = tracks[i];
						if (track !== referenceTrack) {
							track.removeClass('vjs-selected')
							track.mode = 'disabled';
						}
					}
					$(".vjs-multilngual_list").addClass("invisible");
				})
				langMenu.addItem(lang_item);
			}

			if($(lilaPlayer.controlBar).find('.language-switcher').length > 0){
				$(lilaPlayer.controlBar).find('.language-switcher').remove();
				console.log("already exist");
			}
			var button = lilaPlayer.addChild('button', { text: "Lang" });
			button.addClass("language-switcher");
			button.addChild(langMenu);

			var lang_icon = document.createElement('div');
			lang_icon.innerHTML = "<i class='icon-change-language' aria-hidden='true'></i>";
			// lang_icon.innerHTML = "Change Lang";
			button.el().insertBefore(lang_icon, button.el().firstChild);

			button.addChild(lang_icon);
			console.log(button.el())

	
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